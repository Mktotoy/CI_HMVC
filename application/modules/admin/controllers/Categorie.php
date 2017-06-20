<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categorie extends CI_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->data=array();
        $this->load->model('Categorie_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $categorie = $this->Categorie_model->get_all();

        $this->data = array(
            'categorie_data' => $categorie
        );
        $this->template->view('categorie/categorie_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->Categorie_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'name' => $row->name,
		'icon' => $row->icon,
	    );
            $this->template->view('categorie/categorie_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categorie'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('categorie/create_action'),
	    'name' => set_value('name'),
	    'icon' => set_value('icon'),
	);
        $this->template->view('categorie/categorie_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'name' => $this->input->post('name',TRUE),
		'icon' => $this->input->post('icon',TRUE),
	    );

            $this->Categorie_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('categorie'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Categorie_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('categorie/update_action'),
		'name' => set_value('name', $row->name),
		'icon' => set_value('icon', $row->icon),
	    );
            $this->template->view('categorie/categorie_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categorie'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('name', TRUE));
        } else {
            $this->data = array(
		'name' => $this->input->post('name',TRUE),
		'icon' => $this->input->post('icon',TRUE),
	    );

            $this->Categorie_model->update($this->input->post('name', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('categorie'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Categorie_model->get_by_id($id);

        if ($row) {
            $this->Categorie_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('categorie'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categorie'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('icon', 'icon', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "categorie.xls";
        $judul = "categorie";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Icon");

	foreach ($this->Categorie_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->icon);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=categorie.doc");

        $this->data = array(
            'categorie_data' => $this->Categorie_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('categorie/categorie_doc',$this->data);
    }

}

/* End of file Categorie.php */
/* Location: ./application/controllers/Categorie.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-14 15:50:36 */
/* http://harviacode.com */