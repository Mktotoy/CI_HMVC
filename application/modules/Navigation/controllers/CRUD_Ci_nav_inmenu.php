<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CRUD_Ci_nav_inmenu extends MX_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();

        $allow = array(2);
        if(!$this->session->userdata('matricule') || !in_array($this->session->userdata('usergroup'),$allow))
            redirect(base_url());

        $this->load->model('User/CRUD_Usergroup_model','CRUD_Usergroup_model');
        $usergroup=array();
        $row=$this->CRUD_Usergroup_model->get_all_array();


        $this->data=array();
        $this->load->model('CRUD_Ci_nav_inmenu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ci_nav_inmenu?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ci_nav_inmenu?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ci_nav_inmenu';
            $config['first_url'] = base_url() . 'ci_nav_inmenu';
        }

        $config['per_page'] = 25;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->CRUD_Ci_nav_inmenu_model->total_rows($q);
        $ci_nav_inmenu = $this->CRUD_Ci_nav_inmenu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'ci_nav_inmenu_data' => $ci_nav_inmenu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load_foreignkeys_reference();
        $this->template->view('ci_nav_inmenu/ci_nav_inmenu_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->CRUD_Ci_nav_inmenu_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'KeyID' => $row->KeyID,
		'MenuID' => $row->MenuID,
		'ItemID' => $row->ItemID,
		'LinkWeight' => $row->LinkWeight,
	    );$this->load_foreignkeys_reference();
            $this->template->view('ci_nav_inmenu/ci_nav_inmenu_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ci_nav_inmenu'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('ci_nav_inmenu/create_action'),
	    'KeyID' => set_value('KeyID'),
	    'MenuID' => set_value('MenuID'),
	    'ItemID' => set_value('ItemID'),
	    'LinkWeight' => set_value('LinkWeight'),
	);$this->load_foreignkeys_reference();
        $this->template->view('ci_nav_inmenu/ci_nav_inmenu_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'KeyID' => $this->input->post('KeyID',TRUE),
		'MenuID' => $this->input->post('MenuID',TRUE),
		'ItemID' => $this->input->post('ItemID',TRUE),
		'LinkWeight' => $this->input->post('LinkWeight',TRUE),
	    );

            $this->CRUD_Ci_nav_inmenu_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ci_nav_inmenu'));

        }
    }
    
    public function update($id) 
    {
        $row = $this->CRUD_Ci_nav_inmenu_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('ci_nav_inmenu/update_action'),
		'KeyID' => set_value('KeyID', $row->KeyID),
		'MenuID' => set_value('MenuID', $row->MenuID),
		'ItemID' => set_value('ItemID', $row->ItemID),
		'LinkWeight' => set_value('LinkWeight', $row->LinkWeight),
	    );$this->load_foreignkeys_reference();
            $this->template->view('ci_nav_inmenu/ci_nav_inmenu_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ci_nav_inmenu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('KeyID', TRUE));
        } else {
            $this->data = array(
		'KeyID' => $this->input->post('KeyID',TRUE),
		'MenuID' => $this->input->post('MenuID',TRUE),
		'ItemID' => $this->input->post('ItemID',TRUE),
		'LinkWeight' => $this->input->post('LinkWeight',TRUE),
	    );

            $this->CRUD_Ci_nav_inmenu_model->update($this->input->post('KeyID', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ci_nav_inmenu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->CRUD_Ci_nav_inmenu_model->get_by_id($id);

        if ($row) {
            $this->CRUD_Ci_nav_inmenu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ci_nav_inmenu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ci_nav_inmenu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('KeyID', 'keyid', 'trim');
	$this->form_validation->set_rules('KeyID', 'keyid', 'trim');
	$this->form_validation->set_rules('KeyID', 'keyid', 'trim');
	$this->form_validation->set_rules('MenuID', 'menuid', 'trim|required');
	$this->form_validation->set_rules('MenuID', 'menuid', 'trim|required');
	$this->form_validation->set_rules('MenuID', 'menuid', 'trim|required');
	$this->form_validation->set_rules('ItemID', 'itemid', 'trim|required');
	$this->form_validation->set_rules('ItemID', 'itemid', 'trim|required');
	$this->form_validation->set_rules('ItemID', 'itemid', 'trim|required');
	$this->form_validation->set_rules('LinkWeight', 'linkweight', 'trim|required');
	$this->form_validation->set_rules('LinkWeight', 'linkweight', 'trim|required');
	$this->form_validation->set_rules('LinkWeight', 'linkweight', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    function load_foreignkeys_reference()
    {
        $this->load->model('CRUD_Ci_nav_items_model');
        $this->data['ci_nav_items']=array();
        $row=$this->CRUD_Ci_nav_items_model->get_all_array();
        foreach($row as $elem){
            $this->data['ci_nav_items'][$elem['ItemID']]=$elem['ItemName'];
        }
        $this->load->model('CRUD_Ci_nav_menus_model');
        $this->data['ci_nav_menus']=array();
        $row=$this->CRUD_Ci_nav_menus_model->get_all_array();
        foreach($row as $elem){
            $this->data['ci_nav_menus'][$elem['MenuID']]=$elem['MenuName'];
        }
    }
    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ci_nav_inmenu.xlsx";
        $judul = "ci_nav_inmenu";
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
	xlsWriteLabel($tablehead, $kolomhead++, "KeyID");
	xlsWriteLabel($tablehead, $kolomhead++, "MenuID");
	xlsWriteLabel($tablehead, $kolomhead++, "ItemID");
	xlsWriteLabel($tablehead, $kolomhead++, "LinkWeight");

	foreach ($this->CRUD_Ci_nav_inmenu_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $this->data->KeyID);
	    xlsWriteNumber($tablebody, $kolombody++, $this->data->MenuID);
	    xlsWriteNumber($tablebody, $kolombody++, $this->data->ItemID);
	    xlsWriteNumber($tablebody, $kolombody++, $this->data->LinkWeight);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=ci_nav_inmenu.doc");

        $this->data = array(
            'ci_nav_inmenu_data' => $this->CRUD_Ci_nav_inmenu_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('ci_nav_inmenu/ci_nav_inmenu_doc',$this->data);
    }

}

/* End of file Ci_nav_inmenu.php */
/* Location: ./application/controllers/Ci_nav_inmenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-01 14:25:36 */
/* http://harviacode.com */