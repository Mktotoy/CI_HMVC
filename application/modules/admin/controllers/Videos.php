<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Videos extends CI_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->data=array();
        $this->load->model('Videos_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $videos = $this->Videos_model->get_all();

        $this->data = array(
            'videos_data' => $videos
        );
        $this->template->view('videos/videos_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->Videos_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'videoId' => $row->videoId,
		'videoDate' => $row->videoDate,
		'videoTitle' => $row->videoTitle,
		'videoDescription' => $row->videoDescription,
		'videoRessourceId' => $row->videoRessourceId,
		'videoState' => $row->videoState,
		'channelID' => $row->channelID,
		'videoThumbnail' => $row->videoThumbnail,
		'pertinent' => $row->pertinent,
	    );
            $this->template->view('videos/videos_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('videos'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('videos/create_action'),
	    'videoId' => set_value('videoId'),
	    'videoDate' => set_value('videoDate'),
	    'videoTitle' => set_value('videoTitle'),
	    'videoDescription' => set_value('videoDescription'),
	    'videoRessourceId' => set_value('videoRessourceId'),
	    'videoState' => set_value('videoState'),
	    'channelID' => set_value('channelID'),
	    'videoThumbnail' => set_value('videoThumbnail'),
	    'pertinent' => set_value('pertinent'),
	);
        $this->template->view('videos/videos_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'videoId' => $this->input->post('videoId',TRUE),
		'videoDate' => $this->input->post('videoDate',TRUE),
		'videoTitle' => $this->input->post('videoTitle',TRUE),
		'videoDescription' => $this->input->post('videoDescription',TRUE),
		'videoRessourceId' => $this->input->post('videoRessourceId',TRUE),
		'videoState' => $this->input->post('videoState',TRUE),
		'channelID' => $this->input->post('channelID',TRUE),
		'videoThumbnail' => $this->input->post('videoThumbnail',TRUE),
		'pertinent' => $this->input->post('pertinent',TRUE),
	    );

            $this->Videos_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('videos'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Videos_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('videos/update_action'),
		'videoId' => set_value('videoId', $row->videoId),
		'videoDate' => set_value('videoDate', $row->videoDate),
		'videoTitle' => set_value('videoTitle', $row->videoTitle),
		'videoDescription' => set_value('videoDescription', $row->videoDescription),
		'videoRessourceId' => set_value('videoRessourceId', $row->videoRessourceId),
		'videoState' => set_value('videoState', $row->videoState),
		'channelID' => set_value('channelID', $row->channelID),
		'videoThumbnail' => set_value('videoThumbnail', $row->videoThumbnail),
		'pertinent' => set_value('pertinent', $row->pertinent),
	    );
            $this->template->view('videos/videos_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('videos'));
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
		'videoDate' => $this->input->post('videoDate',TRUE),
		'videoTitle' => $this->input->post('videoTitle',TRUE),
		'videoDescription' => $this->input->post('videoDescription',TRUE),
		'videoRessourceId' => $this->input->post('videoRessourceId',TRUE),
		'videoState' => $this->input->post('videoState',TRUE),
		'channelID' => $this->input->post('channelID',TRUE),
		'videoThumbnail' => $this->input->post('videoThumbnail',TRUE),
		'pertinent' => $this->input->post('pertinent',TRUE),
	    );

            $this->Videos_model->update($this->input->post('videoId', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('videos'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Videos_model->get_by_id($id);

        if ($row) {
            $this->Videos_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('videos'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('videos'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('videoId', 'videoid', 'trim|required');
	$this->form_validation->set_rules('videoDate', 'videodate', 'trim|required');
	$this->form_validation->set_rules('videoTitle', 'videotitle', 'trim|required');
	$this->form_validation->set_rules('videoDescription', 'videodescription', 'trim|required');
	$this->form_validation->set_rules('videoRessourceId', 'videoressourceid', 'trim|required');
	$this->form_validation->set_rules('videoState', 'videostate', 'trim|required');
	$this->form_validation->set_rules('channelID', 'channelid', 'trim|required');
	$this->form_validation->set_rules('videoThumbnail', 'videothumbnail', 'trim|required');
	$this->form_validation->set_rules('pertinent', 'pertinent', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "videos.xls";
        $judul = "videos";
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
	xlsWriteLabel($tablehead, $kolomhead++, "VideoDate");
	xlsWriteLabel($tablehead, $kolomhead++, "VideoTitle");
	xlsWriteLabel($tablehead, $kolomhead++, "VideoDescription");
	xlsWriteLabel($tablehead, $kolomhead++, "VideoRessourceId");
	xlsWriteLabel($tablehead, $kolomhead++, "VideoState");
	xlsWriteLabel($tablehead, $kolomhead++, "ChannelID");
	xlsWriteLabel($tablehead, $kolomhead++, "VideoThumbnail");
	xlsWriteLabel($tablehead, $kolomhead++, "Pertinent");

	foreach ($this->Videos_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->videoId);
	    xlsWriteNumber($tablebody, $kolombody++, $this->data->videoDate);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->videoTitle);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->videoDescription);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->videoRessourceId);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->videoState);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->channelID);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->videoThumbnail);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->pertinent);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=videos.doc");

        $this->data = array(
            'videos_data' => $this->Videos_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('videos/videos_doc',$this->data);
    }

}

/* End of file Videos.php */
/* Location: ./application/controllers/Videos.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-14 15:50:37 */
/* http://harviacode.com */