<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CRUD_Ci_nav_menus extends MX_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();

        $allow = array(2);
        if(!$this->session->userdata('matricule') || !in_array($this->session->userdata('usergroup'),$allow))
            redirect(base_url());
        
        $this->data=array();
        $this->load->model('CRUD_Ci_nav_menus_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ci_nav_menus?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ci_nav_menus?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ci_nav_menus';
            $config['first_url'] = base_url() . 'ci_nav_menus';
        }

        $config['per_page'] = 25;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->CRUD_Ci_nav_menus_model->total_rows($q);
        $ci_nav_menus = $this->CRUD_Ci_nav_menus_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'ci_nav_menus_data' => $ci_nav_menus,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );$this->template->view('ci_nav_menus/ci_nav_menus_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->CRUD_Ci_nav_menus_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'MenuID' => $row->MenuID,
		'MenuName' => $row->MenuName,
	    );
            $this->template->view('ci_nav_menus/ci_nav_menus_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ci_nav_menus'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('ci_nav_menus/create_action'),
	    'MenuID' => set_value('MenuID'),
	    'MenuName' => set_value('MenuName'),
	);
        $this->template->view('ci_nav_menus/ci_nav_menus_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'MenuID' => $this->input->post('MenuID',TRUE),
		'MenuName' => $this->input->post('MenuName',TRUE),
	    );

            $this->CRUD_Ci_nav_menus_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ci_nav_menus'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->CRUD_Ci_nav_menus_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('ci_nav_menus/update_action'),
		'MenuID' => set_value('MenuID', $row->MenuID),
		'MenuName' => set_value('MenuName', $row->MenuName),
	    );
            $this->template->view('ci_nav_menus/ci_nav_menus_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ci_nav_menus'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('MenuID', TRUE));
        } else {
            $this->data = array(
		'MenuID' => $this->input->post('MenuID',TRUE),
		'MenuName' => $this->input->post('MenuName',TRUE),
	    );

            $this->CRUD_Ci_nav_menus_model->update($this->input->post('MenuID', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ci_nav_menus'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->CRUD_Ci_nav_menus_model->get_by_id($id);

        if ($row) {
            $this->CRUD_Ci_nav_menus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ci_nav_menus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ci_nav_menus'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('MenuID', 'menuid', 'trim');
	$this->form_validation->set_rules('MenuID', 'menuid', 'trim');
	$this->form_validation->set_rules('MenuID', 'menuid', 'trim');
	$this->form_validation->set_rules('MenuName', 'menuname', 'trim|required');
	$this->form_validation->set_rules('MenuName', 'menuname', 'trim|required');
	$this->form_validation->set_rules('MenuName', 'menuname', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ci_nav_menus.xlsx";
        $judul = "ci_nav_menus";
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
	xlsWriteLabel($tablehead, $kolomhead++, "MenuID");
	xlsWriteLabel($tablehead, $kolomhead++, "MenuName");

	foreach ($this->CRUD_Ci_nav_menus_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $this->data->MenuID);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->MenuName);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=ci_nav_menus.doc");

        $this->data = array(
            'ci_nav_menus_data' => $this->CRUD_Ci_nav_menus_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('ci_nav_menus/ci_nav_menus_doc',$this->data);
    }

}

/* End of file Ci_nav_menus.php */
/* Location: ./application/controllers/Ci_nav_menus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-06 11:32:23 */
/* http://harviacode.com */