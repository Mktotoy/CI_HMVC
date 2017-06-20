<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Utilisateur extends CI_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->data=array();
        $this->load->model('Utilisateur_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $utilisateur = $this->Utilisateur_model->get_all();

        $this->data = array(
            'utilisateur_data' => $utilisateur
        );
        $this->template->view('utilisateur/utilisateur_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->Utilisateur_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'Matricule' => $row->Matricule,
		'Nom' => $row->Nom,
		'Prenom' => $row->Prenom,
		'Email' => $row->Email,
		'Password' => $row->Password,
		'IDUserGroup' => $row->IDUserGroup,
	    );
            $this->template->view('utilisateur/utilisateur_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('utilisateur'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('utilisateur/create_action'),
	    'Matricule' => set_value('Matricule'),
	    'Nom' => set_value('Nom'),
	    'Prenom' => set_value('Prenom'),
	    'Email' => set_value('Email'),
	    'Password' => set_value('Password'),
	    'IDUserGroup' => set_value('IDUserGroup'),
	);
        $this->template->view('utilisateur/utilisateur_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'Matricule' => $this->input->post('Matricule',TRUE),
		'Nom' => $this->input->post('Nom',TRUE),
		'Prenom' => $this->input->post('Prenom',TRUE),
		'Email' => $this->input->post('Email',TRUE),
		'Password' => $this->input->post('Password',TRUE),
		'IDUserGroup' => $this->input->post('IDUserGroup',TRUE),
	    );

            $this->Utilisateur_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('utilisateur'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Utilisateur_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('utilisateur/update_action'),
		'Matricule' => set_value('Matricule', $row->Matricule),
		'Nom' => set_value('Nom', $row->Nom),
		'Prenom' => set_value('Prenom', $row->Prenom),
		'Email' => set_value('Email', $row->Email),
		'Password' => set_value('Password', $row->Password),
		'IDUserGroup' => set_value('IDUserGroup', $row->IDUserGroup),
	    );
            $this->template->view('utilisateur/utilisateur_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('utilisateur'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Matricule', TRUE));
        } else {
            $this->data = array(
		'Matricule' => $this->input->post('Matricule',TRUE),
		'Nom' => $this->input->post('Nom',TRUE),
		'Prenom' => $this->input->post('Prenom',TRUE),
		'Email' => $this->input->post('Email',TRUE),
		'Password' => $this->input->post('Password',TRUE),
		'IDUserGroup' => $this->input->post('IDUserGroup',TRUE),
	    );

            $this->Utilisateur_model->update($this->input->post('Matricule', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('utilisateur'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Utilisateur_model->get_by_id($id);

        if ($row) {
            $this->Utilisateur_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('utilisateur'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('utilisateur'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Matricule', 'matricule', 'trim|required');
	$this->form_validation->set_rules('Nom', 'nom', 'trim|required');
	$this->form_validation->set_rules('Prenom', 'prenom', 'trim|required');
	$this->form_validation->set_rules('Email', 'email', 'trim|required');
	$this->form_validation->set_rules('Password', 'password', 'trim|required');
	$this->form_validation->set_rules('IDUserGroup', 'idusergroup', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "utilisateur.xls";
        $judul = "utilisateur";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Matricule");
	xlsWriteLabel($tablehead, $kolomhead++, "Nom");
	xlsWriteLabel($tablehead, $kolomhead++, "Prenom");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "IDUserGroup");

	foreach ($this->Utilisateur_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->Matricule);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->Nom);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->Prenom);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->Email);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->Password);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->IDUserGroup);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=utilisateur.doc");

        $this->data = array(
            'utilisateur_data' => $this->Utilisateur_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('utilisateur/utilisateur_doc',$this->data);
    }

}

/* End of file Utilisateur.php */
/* Location: ./application/controllers/Utilisateur.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-06 13:40:47 */
/* http://harviacode.com */