<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Channel extends CI_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->data=array();
        $this->load->model('Channel_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $channel = $this->Channel_model->get_all();

        $this->data = array(
            'channel_data' => $channel
        );
        $this->template->view('channel/channel_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->Channel_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'channelID' => $row->channelID,
		'channelName' => $row->channelName,
		'channelKeywords' => $row->channelKeywords,
		'channelLastUpdate' => $row->channelLastUpdate,
		'channelType' => $row->channelType,
		'channelThumbnail' => $row->channelThumbnail,
	    );
            $this->template->view('channel/channel_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('channel'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('channel/create_action'),
	    'channelID' => set_value('channelID'),
	    'channelName' => set_value('channelName'),
	    'channelKeywords' => set_value('channelKeywords'),
	    'channelLastUpdate' => set_value('channelLastUpdate'),
	    'channelType' => set_value('channelType'),
	    'channelThumbnail' => set_value('channelThumbnail'),
	);
        $this->template->view('channel/channel_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'channelID' => $this->input->post('channelID',TRUE),
		'channelName' => $this->input->post('channelName',TRUE),
		'channelKeywords' => $this->input->post('channelKeywords',TRUE),
		'channelLastUpdate' => $this->input->post('channelLastUpdate',TRUE),
		'channelType' => $this->input->post('channelType',TRUE),
		'channelThumbnail' => $this->input->post('channelThumbnail',TRUE),
	    );

            $this->Channel_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('channel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Channel_model->get_by_id(array('channelId'=>$id));

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('channel/update_action'),
		'channelID' => set_value('channelID', $row->channelID),
		'channelName' => set_value('channelName', $row->channelName),
		'channelKeywords' => set_value('channelKeywords', $row->channelKeywords),
		'channelLastUpdate' => set_value('channelLastUpdate', $row->channelLastUpdate),
		'channelType' => set_value('channelType', $row->channelType),
		'channelThumbnail' => set_value('channelThumbnail', $row->channelThumbnail),
	    );
            $this->template->view('channel/channel_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('channel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('channelID', TRUE));
        } else {
            $this->data = array(
		'channelID' => $this->input->post('channelID',TRUE),
		'channelName' => $this->input->post('channelName',TRUE),
		'channelKeywords' => $this->input->post('channelKeywords',TRUE),
		'channelLastUpdate' => $this->input->post('channelLastUpdate',TRUE),
		'channelType' => $this->input->post('channelType',TRUE),
		'channelThumbnail' => $this->input->post('channelThumbnail',TRUE),
	    );

            $this->Channel_model->update(array('channelId'=>$this->input->post('channelID', TRUE)), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('channel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Channel_model->get_by_id($id);

        if ($row) {
            $this->Channel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('channel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('channel'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('channelID', 'channelid', 'trim|required');
	$this->form_validation->set_rules('channelName', 'channelname', 'trim');
	$this->form_validation->set_rules('channelKeywords', 'channelkeywords', 'trim');
	$this->form_validation->set_rules('channelLastUpdate', 'channellastupdate', 'trim');
	$this->form_validation->set_rules('channelType', 'channeltype', 'trim');
	$this->form_validation->set_rules('channelThumbnail', 'channelthumbnail', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "channel.xls";
        $judul = "channel";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ChannelID");
	xlsWriteLabel($tablehead, $kolomhead++, "ChannelName");
	xlsWriteLabel($tablehead, $kolomhead++, "ChannelKeywords");
	xlsWriteLabel($tablehead, $kolomhead++, "ChannelLastUpdate");
	xlsWriteLabel($tablehead, $kolomhead++, "ChannelType");
	xlsWriteLabel($tablehead, $kolomhead++, "ChannelThumbnail");

	foreach ($this->Channel_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->channelID);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->channelName);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->channelKeywords);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->channelLastUpdate);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->channelType);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->channelThumbnail);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=channel.doc");

        $this->data = array(
            'channel_data' => $this->Channel_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('channel/channel_doc',$this->data);
    }

}

/* End of file Channel.php */
/* Location: ./application/controllers/Channel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-14 15:50:36 */
/* http://harviacode.com */