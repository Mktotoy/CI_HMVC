<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CRUD_Ci_nav_items extends MX_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->load->model('User/User_userrole_model');

        $allow = array(2);
        if(!$this->session->userdata('user') ||
            !in_array($this->User_userrole_model->get_by_id(array('login'=>$this->session->userdata('user')['login'],'role_id'=>""))['role_id'],$allow))
            //redirect(base_url());
        
        $this->data=array();
        $this->load->model('CRUD_Ci_nav_items_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ci_nav_items?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ci_nav_items?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ci_nav_items';
            $config['first_url'] = base_url() . 'ci_nav_items';
        }

        $config['per_page'] = 25;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->CRUD_Ci_nav_items_model->total_rows($q);
        $ci_nav_items = $this->CRUD_Ci_nav_items_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'ci_nav_items_data' => $ci_nav_items,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );$this->load_foreignkeys_reference();$this->template->view('ci_nav_items/Ci_nav_items_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->CRUD_Ci_nav_items_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'ItemID' => $row->ItemID,
		'ItemName' => $row->ItemName,
		'ItemHumanName' => $row->ItemHumanName,
		'ItemLink' => $row->ItemLink,
		'ParentItem' => $row->ParentItem,
	    );
            $this->load_foreignkeys_reference();
            $this->template->view('ci_nav_items/Ci_nav_items_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ci_nav_items'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('ci_nav_items/create_action'),
	    'ItemID' => set_value('ItemID'),
	    'ItemName' => set_value('ItemName'),
	    'ItemHumanName' => set_value('ItemHumanName'),
	    'ItemLink' => set_value('ItemLink'),
	    'ParentItem' => set_value('ParentItem'),
	);$this->load_foreignkeys_reference();
        $this->template->view('ci_nav_items/Ci_nav_items_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'ItemID' => $this->input->post('ItemID',TRUE),
		'ItemName' => $this->input->post('ItemName',TRUE),
		'ItemHumanName' => $this->input->post('ItemHumanName',TRUE),
		'ItemLink' => $this->input->post('ItemLink',TRUE),
		'ParentItem' => $this->input->post('ParentItem',TRUE)==0?NULL:$this->input->post('ParentItem',TRUE),
	    );

            $this->CRUD_Ci_nav_items_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ci_nav_items'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->CRUD_Ci_nav_items_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('ci_nav_items/update_action'),
		'ItemID' => set_value('ItemID', $row->ItemID),
		'ItemName' => set_value('ItemName', $row->ItemName),
		'ItemHumanName' => set_value('ItemHumanName', $row->ItemHumanName),
		'ItemLink' => set_value('ItemLink', $row->ItemLink),
		'ParentItem' => set_value('ParentItem', $row->ParentItem),
	    );$this->load_foreignkeys_reference();
            $this->template->view('ci_nav_items/Ci_nav_items_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ci_nav_items'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ItemID', TRUE));
        } else {
            $this->data = array(
		'ItemID' => $this->input->post('ItemID',TRUE),
		'ItemName' => $this->input->post('ItemName',TRUE),
		'ItemHumanName' => $this->input->post('ItemHumanName',TRUE),
		'ItemLink' => $this->input->post('ItemLink',TRUE),
		'ParentItem' =>  $this->input->post('ParentItem',TRUE)==0?NULL:$this->input->post('ParentItem',TRUE),
	    );

            $this->CRUD_Ci_nav_items_model->update($this->input->post('ItemID', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ci_nav_items'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->CRUD_Ci_nav_items_model->get_by_id($id);

        if ($row) {
            $this->CRUD_Ci_nav_items_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ci_nav_items'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ci_nav_items'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ItemID', 'itemid', 'trim');
	$this->form_validation->set_rules('ItemName', 'itemname', 'trim|required');
    $this->form_validation->set_rules('ItemHumanName', 'itemhumanname', 'trim|required');
	$this->form_validation->set_rules('ItemLink', 'itemlink', 'trim|required');
	$this->form_validation->set_rules('ParentItem', 'parentitem', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "Ci_nav_items.xlsx";
        $judul = "Ci_nav_items";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ItemID");
	xlsWriteLabel($tablehead, $kolomhead++, "ItemName");
	xlsWriteLabel($tablehead, $kolomhead++, "ItemHumanName");
	xlsWriteLabel($tablehead, $kolomhead++, "ItemLink");
	xlsWriteLabel($tablehead, $kolomhead++, "ParentItem");

	foreach ($this->CRUD_Ci_nav_items_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $this->data->ItemID);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->ItemName);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->ItemHumanName);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->ItemLink);
	    xlsWriteNumber($tablebody, $kolombody++, $this->data->ParentItem);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    function load_foreignkeys_reference()
    {
        $this->load->model('CRUD_Ci_nav_items_model');
        $this->data['ci_nav_items']=array();
        $row=$this->CRUD_Ci_nav_items_model->get_all_array();
            foreach($row as $elem){
                $this->data['ci_nav_items'][$elem['ItemID']]=$elem['ItemName'];
            }
        $this->data['ci_nav_items'][0]='No Parents';
    }
    

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Ci_nav_items.doc");

        $this->data = array(
            'Ci_nav_items_data' => $this->CRUD_Ci_nav_items_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('ci_nav_items/Ci_nav_items_doc',$this->data);
    }

}

/* End of file Ci_nav_items.php */
/* Location: ./application/controllers/Ci_nav_items.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-01 14:25:29 */
/* http://harviacode.com */