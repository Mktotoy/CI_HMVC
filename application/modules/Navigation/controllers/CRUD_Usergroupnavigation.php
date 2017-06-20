<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CRUD_Usergroupnavigation extends MX_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $allow = array(2);
        if(!$this->session->userdata('matricule') || !in_array($this->session->userdata('usergroup'),$allow))
            redirect(base_url());
        $this->data=array();
        $this->load->model('User/CRUD_Usergroup_model','CRUD_Usergroup_model');
        $this->load->model('CRUD_Usergroupnavigation_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'usergroupnavigation?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'usergroupnavigation?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'usergroupnavigation';
            $config['first_url'] = base_url() . 'usergroupnavigation';
        }

        $config['per_page'] = 25;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->CRUD_Usergroupnavigation_model->total_rows($q);
        $usergroupnavigation = $this->CRUD_Usergroupnavigation_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'usergroupnavigation_data' => $usergroupnavigation,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );$this->load_foreignkeys_reference();
        $this->template->view('usergroupnavigation/Usergroupnavigation_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->CRUD_Usergroupnavigation_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'IDUsergroupnav' => $row->IDUsergroupnav,
		'IDUserGroup' => $row->IDUserGroup,
		'MenuID' => $row->MenuID,
		'Position' => $row->Position,
	    );$this->load_foreignkeys_reference();
            $this->template->view('usergroupnavigation/Usergroupnavigation_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usergroupnavigation'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('usergroupnavigation/create_action'),
	    'IDUsergroupnav' => set_value('IDUsergroupnav'),
	    'IDUserGroup' => set_value('IDUserGroup'),
	    'MenuID' => set_value('MenuID'),
	    'Position' => set_value('Position'),
	);$this->load_foreignkeys_reference();
        $this->template->view('usergroupnavigation/Usergroupnavigation_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'IDUsergroupnav' => $this->input->post('IDUsergroupnav',TRUE),
		'IDUserGroup' => $this->input->post('IDUserGroup',TRUE),
		'MenuID' => $this->input->post('MenuID',TRUE),
		'Position' => $this->input->post('Position',TRUE),
	    );

            $this->CRUD_Usergroupnavigation_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('usergroupnavigation'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->CRUD_Usergroupnavigation_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('usergroupnavigation/update_action'),
		'IDUsergroupnav' => set_value('IDUsergroupnav', $row->IDUsergroupnav),
		'IDUserGroup' => set_value('IDUserGroup', $row->IDUserGroup),
		'MenuID' => set_value('MenuID', $row->MenuID),
		'Position' => set_value('Position', $row->Position),
	    );$this->load_foreignkeys_reference();
            $this->template->view('usergroupnavigation/Usergroupnavigation_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usergroupnavigation'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $this->data = array(
		'IDUsergroupnav' => $this->input->post('IDUsergroupnav',TRUE),
		'IDUserGroup' => $this->input->post('IDUserGroup',TRUE),
		'MenuID' => $this->input->post('MenuID',TRUE),
		'Position' => $this->input->post('Position',TRUE),
	    );

            $this->CRUD_Usergroupnavigation_model->update($this->input->post('IDUsergroupnav', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('usergroupnavigation'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->CRUD_Usergroupnavigation_model->get_by_id($id);

        if ($row) {
            $this->CRUD_Usergroupnavigation_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('usergroupnavigation'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usergroupnavigation'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('IDUsergroupnav', 'idusergroup', 'trim');
        $this->form_validation->set_rules('IDUserGroup', 'idusergroup', 'trim|required');
        $this->form_validation->set_rules('MenuID', 'menuid', 'trim|required');
        $this->form_validation->set_rules('Position', 'position', 'trim|required');
	    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "Usergroupnavigation.xlsx";
        $judul = "Usergroupnavigation";
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
	xlsWriteLabel($tablehead, $kolomhead++, "IDUsergroupnav");
	xlsWriteLabel($tablehead, $kolomhead++, "IDUserGroup");
	xlsWriteLabel($tablehead, $kolomhead++, "MenuID");
	xlsWriteLabel($tablehead, $kolomhead++, "Position");

	foreach ($this->CRUD_Usergroupnavigation_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->IDUsergroupnav);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->IDUserGroup);
	    xlsWriteNumber($tablebody, $kolombody++, $this->data->MenuID);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->Position);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    function load_foreignkeys_reference()
    {$this->load->model('CRUD_Usergroup_model');
        $this->data['usergroup']=array();
        $row=$this->CRUD_Usergroup_model->get_all_array();
            foreach($row as $elem){
                $this->data['usergroup'][$elem['IDUserGroup']]=$elem['Libelle'];
            }	
            $this->load->model('CRUD_Ci_nav_menus_model');
        $this->data['ci_nav_menus']=array();
        $row=$this->CRUD_Ci_nav_menus_model->get_all_array();
            foreach($row as $elem){
                $this->data['ci_nav_menus'][$elem['MenuID']]=$elem['MenuName'];
            }	
            
    }
    

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Usergroupnavigation.doc");

        $this->data = array(
            'Usergroupnavigation_data' => $this->CRUD_Usergroupnavigation_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('usergroupnavigation/Usergroupnavigation_doc',$this->data);
    }

}

/* End of file Usergroupnavigation.php */
/* Location: ./application/controllers/Usergroupnavigation.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-06 11:32:24 */
/* http://harviacode.com */