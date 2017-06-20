<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Badge extends CI_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->data=array();
        $this->load->model('Badge_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $badge = $this->Badge_model->get_all();

        $this->data = array(
            'badge_data' => $badge
        );
        $this->template->view('badge/badge_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->Badge_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'badgeId' => $row->badgeId,
		'badgeTitle' => $row->badgeTitle,
		'badgeText' => $row->badgeText,
		'badgeThumbnail' => $row->badgeThumbnail,
	    );
            $this->template->view('badge/badge_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('badge'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('badge/create_action'),
	    'badgeId' => set_value('badgeId'),
	    'badgeTitle' => set_value('badgeTitle'),
	    'badgeText' => set_value('badgeText'),
	    'badgeThumbnail' => set_value('badgeThumbnail'),
	);
        $this->template->view('badge/badge_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'badgeId' => $this->input->post('badgeId',TRUE),
		'badgeTitle' => $this->input->post('badgeTitle',TRUE),
		'badgeText' => $this->input->post('badgeText',TRUE),
		'badgeThumbnail' => $this->input->post('badgeThumbnail',TRUE),
	    );

            $this->Badge_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('badge'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Badge_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('badge/update_action'),
		'badgeId' => set_value('badgeId', $row->badgeId),
		'badgeTitle' => set_value('badgeTitle', $row->badgeTitle),
		'badgeText' => set_value('badgeText', $row->badgeText),
		'badgeThumbnail' => set_value('badgeThumbnail', $row->badgeThumbnail),
	    );
            $this->template->view('badge/badge_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('badge'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('badgeId', TRUE));
        } else {
            $this->data = array(
		'badgeId' => $this->input->post('badgeId',TRUE),
		'badgeTitle' => $this->input->post('badgeTitle',TRUE),
		'badgeText' => $this->input->post('badgeText',TRUE),
		'badgeThumbnail' => $this->input->post('badgeThumbnail',TRUE),
	    );

            $this->Badge_model->update($this->input->post('badgeId', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('badge'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Badge_model->get_by_id($id);

        if ($row) {
            $this->Badge_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('badge'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('badge'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('badgeId', 'badgeid', 'trim|required');
	$this->form_validation->set_rules('badgeTitle', 'badgetitle', 'trim|required');
	$this->form_validation->set_rules('badgeText', 'badgetext', 'trim|required');
	$this->form_validation->set_rules('badgeThumbnail', 'badgethumbnail', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "badge.xls";
        $judul = "badge";
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
	xlsWriteLabel($tablehead, $kolomhead++, "BadgeId");
	xlsWriteLabel($tablehead, $kolomhead++, "BadgeTitle");
	xlsWriteLabel($tablehead, $kolomhead++, "BadgeText");
	xlsWriteLabel($tablehead, $kolomhead++, "BadgeThumbnail");

	foreach ($this->Badge_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->badgeId);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->badgeTitle);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->badgeText);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->badgeThumbnail);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=badge.doc");

        $this->data = array(
            'badge_data' => $this->Badge_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('badge/badge_doc',$this->data);
    }

}

/* End of file Badge.php */
/* Location: ./application/controllers/Badge.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-14 15:50:36 */
/* http://harviacode.com */