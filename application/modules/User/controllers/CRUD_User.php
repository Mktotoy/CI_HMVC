<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CRUD_User extends CI_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->data=array();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $user = $this->User_model->get_all();

        $this->data = array(
            'user_data' => $user
        );
        $this->template->view('user/user_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'login' => $row->login,
		'lastname' => $row->lastname,
		'firstname' => $row->firstname,
		'mail' => $row->mail,
		'mailConfirmed' => $row->mailConfirmed,
		'password' => $row->password,
		'createdat' => $row->createdat,
		'thumbnail' => $row->thumbnail,
		'lastip' => $row->lastip,
	    );
            $this->template->view('user/user_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'login' => set_value('login'),
	    'lastname' => set_value('lastname'),
	    'firstname' => set_value('firstname'),
	    'mail' => set_value('mail'),
	    'mailConfirmed' => set_value('mailConfirmed'),
	    'password' => set_value('password'),
	    'createdat' => set_value('createdat'),
	    'thumbnail' => set_value('thumbnail'),
	    'lastip' => set_value('lastip'),
	);
        $this->template->view('user/user_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'login' => $this->input->post('login',TRUE),
		'lastname' => $this->input->post('lastname',TRUE),
		'firstname' => $this->input->post('firstname',TRUE),
		'mail' => $this->input->post('mail',TRUE),
		'mailConfirmed' => $this->input->post('mailConfirmed',TRUE),
		'password' => $this->input->post('password',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
		'thumbnail' => $this->input->post('thumbnail',TRUE),
		'lastip' => $this->input->post('lastip',TRUE),
	    );

            $this->User_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'login' => set_value('login', $row->login),
		'lastname' => set_value('lastname', $row->lastname),
		'firstname' => set_value('firstname', $row->firstname),
		'mail' => set_value('mail', $row->mail),
		'mailConfirmed' => set_value('mailConfirmed', $row->mailConfirmed),
		'password' => set_value('password', $row->password),
		'createdat' => set_value('createdat', $row->createdat),
		'thumbnail' => set_value('thumbnail', $row->thumbnail),
		'lastip' => set_value('lastip', $row->lastip),
	    );
            $this->template->view('user/user_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('login', TRUE));
        } else {
            $this->data = array(
		'login' => $this->input->post('login',TRUE),
		'lastname' => $this->input->post('lastname',TRUE),
		'firstname' => $this->input->post('firstname',TRUE),
		'mail' => $this->input->post('mail',TRUE),
		'mailConfirmed' => $this->input->post('mailConfirmed',TRUE),
		'password' => $this->input->post('password',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
		'thumbnail' => $this->input->post('thumbnail',TRUE),
		'lastip' => $this->input->post('lastip',TRUE),
	    );

            $this->User_model->update($this->input->post('login', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('login', 'login', 'trim|required');
	$this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
	$this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
	$this->form_validation->set_rules('mail', 'mail', 'trim|required');
	$this->form_validation->set_rules('mailConfirmed', 'mailconfirmed', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('createdat', 'createdat', 'trim|required');
	$this->form_validation->set_rules('thumbnail', 'thumbnail', 'trim|required');
	$this->form_validation->set_rules('lastip', 'lastip', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "user.xls";
        $judul = "user";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Lastname");
	xlsWriteLabel($tablehead, $kolomhead++, "Firstname");
	xlsWriteLabel($tablehead, $kolomhead++, "Mail");
	xlsWriteLabel($tablehead, $kolomhead++, "MailConfirmed");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Createdat");
	xlsWriteLabel($tablehead, $kolomhead++, "Thumbnail");
	xlsWriteLabel($tablehead, $kolomhead++, "Lastip");

	foreach ($this->User_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->login);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->lastname);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->firstname);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->mail);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->mailConfirmed);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->createdat);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->thumbnail);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->lastip);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=user.doc");

        $this->data = array(
            'user_data' => $this->User_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('user/user_doc',$this->data);
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-14 15:50:36 */
/* http://harviacode.com */