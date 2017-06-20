<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Question_line extends CI_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->data=array();
        $this->load->model('Question_line_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $question_line = $this->Question_line_model->get_all();

        $this->data = array(
            'question_line_data' => $question_line
        );
        $this->template->view('question_line/question_line_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->Question_line_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'question_lineId' => $row->question_lineId,
		'questionId' => $row->questionId,
		'question_lineText' => $row->question_lineText,
		'question_lineTrue' => $row->question_lineTrue,
	    );
            $this->template->view('question_line/question_line_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('question_line'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('question_line/create_action'),
	    'question_lineId' => set_value('question_lineId'),
	    'questionId' => set_value('questionId'),
	    'question_lineText' => set_value('question_lineText'),
	    'question_lineTrue' => set_value('question_lineTrue'),
	);
        $this->template->view('question_line/question_line_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'question_lineId' => $this->input->post('question_lineId',TRUE),
		'questionId' => $this->input->post('questionId',TRUE),
		'question_lineText' => $this->input->post('question_lineText',TRUE),
		'question_lineTrue' => $this->input->post('question_lineTrue',TRUE),
	    );

            $this->Question_line_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('question_line'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Question_line_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('question_line/update_action'),
		'question_lineId' => set_value('question_lineId', $row->question_lineId),
		'questionId' => set_value('questionId', $row->questionId),
		'question_lineText' => set_value('question_lineText', $row->question_lineText),
		'question_lineTrue' => set_value('question_lineTrue', $row->question_lineTrue),
	    );
            $this->template->view('question_line/question_line_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('question_line'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('question_lineId', TRUE));
        } else {
            $this->data = array(
		'question_lineId' => $this->input->post('question_lineId',TRUE),
		'questionId' => $this->input->post('questionId',TRUE),
		'question_lineText' => $this->input->post('question_lineText',TRUE),
		'question_lineTrue' => $this->input->post('question_lineTrue',TRUE),
	    );

            $this->Question_line_model->update($this->input->post('question_lineId', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('question_line'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Question_line_model->get_by_id($id);

        if ($row) {
            $this->Question_line_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('question_line'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('question_line'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('question_lineId', 'question lineid', 'trim|required');
	$this->form_validation->set_rules('questionId', 'questionid', 'trim|required');
	$this->form_validation->set_rules('question_lineText', 'question linetext', 'trim|required');
	$this->form_validation->set_rules('question_lineTrue', 'question linetrue', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "question_line.xls";
        $judul = "question_line";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Question LineId");
	xlsWriteLabel($tablehead, $kolomhead++, "QuestionId");
	xlsWriteLabel($tablehead, $kolomhead++, "Question LineText");
	xlsWriteLabel($tablehead, $kolomhead++, "Question LineTrue");

	foreach ($this->Question_line_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->question_lineId);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->questionId);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->question_lineText);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->question_lineTrue);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=question_line.doc");

        $this->data = array(
            'question_line_data' => $this->Question_line_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('question_line/question_line_doc',$this->data);
    }

}

/* End of file Question_line.php */
/* Location: ./application/controllers/Question_line.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-14 15:50:36 */
/* http://harviacode.com */