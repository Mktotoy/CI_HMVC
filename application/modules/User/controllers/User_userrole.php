<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_userrole extends CI_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->data=array();
        $this->load->model('User_userrole_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $user_userrole = $this->User_userrole_model->get_all();

        $this->data = array(
            'user_userrole_data' => $user_userrole
        );
        $this->template->view('user_userrole/user_userrole_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->User_userrole_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'login' => $row->login,
		'role_id' => $row->role_id,
	    );
            $this->template->view('user_userrole/user_userrole_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_userrole'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('user_userrole/create_action'),
	    'login' => set_value('login'),
	    'role_id' => set_value('role_id'),
	);
        $this->template->view('user_userrole/user_userrole_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'login' => $this->input->post('login',TRUE),
		'role_id' => $this->input->post('role_id',TRUE),
	    );

            $this->User_userrole_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user_userrole'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_userrole_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('user_userrole/update_action'),
		'login' => set_value('login', $row->login),
		'role_id' => set_value('role_id', $row->role_id),
	    );
            $this->template->view('user_userrole/user_userrole_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_userrole'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $this->data = array(
		'login' => $this->input->post('login',TRUE),
		'role_id' => $this->input->post('role_id',TRUE),
	    );

            $this->User_userrole_model->update($this->input->post('', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user_userrole'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_userrole_model->get_by_id($id);

        if ($row) {
            $this->User_userrole_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user_userrole'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_userrole'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('login', 'login', 'trim|required');
	$this->form_validation->set_rules('role_id', 'role id', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "user_userrole.xls";
        $judul = "user_userrole";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Login");
	xlsWriteLabel($tablehead, $kolomhead++, "Role Id");

	foreach ($this->User_userrole_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->login);
	    xlsWriteNumber($tablebody, $kolombody++, $this->data->role_id);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=user_userrole.doc");

        $this->data = array(
            'user_userrole_data' => $this->User_userrole_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('user_userrole/user_userrole_doc',$this->data);
    }

}

/* End of file User_userrole.php */
/* Location: ./application/controllers/User_userrole.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-14 15:50:36 */
/* http://harviacode.com */