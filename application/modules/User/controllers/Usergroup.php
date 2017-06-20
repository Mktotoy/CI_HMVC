<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usergroup extends CI_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->data=array();
        $this->load->model('Usergroup_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $usergroup = $this->Usergroup_model->get_all();

        $this->data = array(
            'usergroup_data' => $usergroup
        );
        $this->template->view('usergroup/usergroup_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->Usergroup_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'IDUserGroup' => $row->IDUserGroup,
		'Libelle' => $row->Libelle,
	    );
            $this->template->view('usergroup/usergroup_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usergroup'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('usergroup/create_action'),
	    'IDUserGroup' => set_value('IDUserGroup'),
	    'Libelle' => set_value('Libelle'),
	);
        $this->template->view('usergroup/usergroup_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'IDUserGroup' => $this->input->post('IDUserGroup',TRUE),
		'Libelle' => $this->input->post('Libelle',TRUE),
	    );

            $this->Usergroup_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('usergroup'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Usergroup_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('usergroup/update_action'),
		'IDUserGroup' => set_value('IDUserGroup', $row->IDUserGroup),
		'Libelle' => set_value('Libelle', $row->Libelle),
	    );
            $this->template->view('usergroup/usergroup_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usergroup'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('IDUserGroup', TRUE));
        } else {
            $this->data = array(
		'IDUserGroup' => $this->input->post('IDUserGroup',TRUE),
		'Libelle' => $this->input->post('Libelle',TRUE),
	    );

            $this->Usergroup_model->update($this->input->post('IDUserGroup', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('usergroup'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Usergroup_model->get_by_id($id);

        if ($row) {
            $this->Usergroup_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('usergroup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usergroup'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('IDUserGroup', 'idusergroup', 'trim|required');
	$this->form_validation->set_rules('Libelle', 'libelle', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "usergroup.xls";
        $judul = "usergroup";
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
	xlsWriteLabel($tablehead, $kolomhead++, "IDUserGroup");
	xlsWriteLabel($tablehead, $kolomhead++, "Libelle");

	foreach ($this->Usergroup_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->IDUserGroup);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->Libelle);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=usergroup.doc");

        $this->data = array(
            'usergroup_data' => $this->Usergroup_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('usergroup/usergroup_doc',$this->data);
    }

}

/* End of file Usergroup.php */
/* Location: ./application/controllers/Usergroup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-06 13:40:47 */
/* http://harviacode.com */