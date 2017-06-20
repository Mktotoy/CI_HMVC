<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Video_categorie extends CI_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->data=array();
        $this->load->model('Video_categorie_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $video_categorie = $this->Video_categorie_model->get_all();

        $this->data = array(
            'video_categorie_data' => $video_categorie
        );
        $this->template->view('video_categorie/video_categorie_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->Video_categorie_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'videoId' => $row->videoId,
		'name' => $row->name,
	    );
            $this->template->view('video_categorie/video_categorie_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('video_categorie'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('video_categorie/create_action'),
	    'videoId' => set_value('videoId'),
	    'name' => set_value('name'),
	);
        $this->template->view('video_categorie/video_categorie_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'videoId' => $this->input->post('videoId',TRUE),
		'name' => $this->input->post('name',TRUE),
	    );

            $this->Video_categorie_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('video_categorie'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Video_categorie_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('video_categorie/update_action'),
		'videoId' => set_value('videoId', $row->videoId),
		'name' => set_value('name', $row->name),
	    );
            $this->template->view('video_categorie/video_categorie_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('video_categorie'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('videoId', TRUE));
        } else {
            $this->data = array(
		'videoId' => $this->input->post('videoId',TRUE),
		'name' => $this->input->post('name',TRUE),
	    );

            $this->Video_categorie_model->update($this->input->post('videoId', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('video_categorie'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Video_categorie_model->get_by_id($id);

        if ($row) {
            $this->Video_categorie_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('video_categorie'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('video_categorie'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('videoId', 'videoid', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "video_categorie.xls";
        $judul = "video_categorie";
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
	xlsWriteLabel($tablehead, $kolomhead++, "VideoId");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");

	foreach ($this->Video_categorie_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->videoId);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->name);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=video_categorie.doc");

        $this->data = array(
            'video_categorie_data' => $this->Video_categorie_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('video_categorie/video_categorie_doc',$this->data);
    }

}

/* End of file Video_categorie.php */
/* Location: ./application/controllers/Video_categorie.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-14 15:50:37 */
/* http://harviacode.com */