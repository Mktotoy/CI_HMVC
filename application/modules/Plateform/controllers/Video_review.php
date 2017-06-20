<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Video_review extends CI_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->data=array();
        $this->load->model('Video_review_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $video_review = $this->Video_review_model->get_all();

        $this->data = array(
            'video_review_data' => $video_review
        );
        $this->template->view('video_review/video_review_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->Video_review_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'video_reviewId' => $row->video_reviewId,
		'videoId' => $row->videoId,
		'login' => $row->login,
		'video_reviewText' => $row->video_reviewText,
	    );
            $this->template->view('video_review/video_review_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('video_review'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('video_review/create_action'),
	    'video_reviewId' => set_value('video_reviewId'),
	    'videoId' => set_value('videoId'),
	    'login' => set_value('login'),
	    'video_reviewText' => set_value('video_reviewText'),
	);
        $this->template->view('video_review/video_review_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'video_reviewId' => $this->input->post('video_reviewId',TRUE),
		'videoId' => $this->input->post('videoId',TRUE),
		'login' => $this->input->post('login',TRUE),
		'video_reviewText' => $this->input->post('video_reviewText',TRUE),
	    );

            $this->Video_review_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('video_review'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Video_review_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('video_review/update_action'),
		'video_reviewId' => set_value('video_reviewId', $row->video_reviewId),
		'videoId' => set_value('videoId', $row->videoId),
		'login' => set_value('login', $row->login),
		'video_reviewText' => set_value('video_reviewText', $row->video_reviewText),
	    );
            $this->template->view('video_review/video_review_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('video_review'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('video_reviewId', TRUE));
        } else {
            $this->data = array(
		'video_reviewId' => $this->input->post('video_reviewId',TRUE),
		'videoId' => $this->input->post('videoId',TRUE),
		'login' => $this->input->post('login',TRUE),
		'video_reviewText' => $this->input->post('video_reviewText',TRUE),
	    );

            $this->Video_review_model->update($this->input->post('video_reviewId', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('video_review'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Video_review_model->get_by_id($id);

        if ($row) {
            $this->Video_review_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('video_review'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('video_review'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('video_reviewId', 'video reviewid', 'trim|required');
	$this->form_validation->set_rules('videoId', 'videoid', 'trim|required');
	$this->form_validation->set_rules('login', 'login', 'trim|required');
	$this->form_validation->set_rules('video_reviewText', 'video reviewtext', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "video_review.xls";
        $judul = "video_review";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Video ReviewId");
	xlsWriteLabel($tablehead, $kolomhead++, "VideoId");
	xlsWriteLabel($tablehead, $kolomhead++, "Login");
	xlsWriteLabel($tablehead, $kolomhead++, "Video ReviewText");

	foreach ($this->Video_review_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->video_reviewId);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->videoId);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->login);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->video_reviewText);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=video_review.doc");

        $this->data = array(
            'video_review_data' => $this->Video_review_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('video_review/video_review_doc',$this->data);
    }

}

/* End of file Video_review.php */
/* Location: ./application/controllers/Video_review.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-14 15:50:37 */
/* http://harviacode.com */