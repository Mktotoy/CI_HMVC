<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userrole extends CI_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->data=array();
        $this->load->model('Userrole_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $userrole = $this->Userrole_model->get_all();

        $this->data = array(
            'userrole_data' => $userrole
        );
        $this->template->view('userrole/userrole_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->Userrole_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'name' => $row->name,
	    );
            $this->template->view('userrole/userrole_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userrole'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('userrole/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	);
        $this->template->view('userrole/userrole_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'id' => $this->input->post('id',TRUE),
		'name' => $this->input->post('name',TRUE),
	    );

            $this->Userrole_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('userrole'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Userrole_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('userrole/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
	    );
            $this->template->view('userrole/userrole_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userrole'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $this->data = array(
		'id' => $this->input->post('id',TRUE),
		'name' => $this->input->post('name',TRUE),
	    );

            $this->Userrole_model->update($this->input->post('id', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('userrole'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Userrole_model->get_by_id($id);

        if ($row) {
            $this->Userrole_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('userrole'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userrole'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id', 'id', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "userrole.xls";
        $judul = "userrole";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");

	foreach ($this->Userrole_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->id);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->name);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=userrole.doc");

        $this->data = array(
            'userrole_data' => $this->Userrole_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('userrole/userrole_doc',$this->data);
    }

}

/* End of file Userrole.php */
/* Location: ./application/controllers/Userrole.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-14 15:50:36 */
/* http://harviacode.com */