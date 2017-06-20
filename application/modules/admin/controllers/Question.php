<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Question extends CI_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->data=array();
        $this->load->model('Question_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $question = $this->Question_model->get_all();

        $this->data = array(
            'question_data' => $question
        );
        $this->template->view('question/question_list', $this->data);
    }

    public function read($id) 
    {
        $row = $this->Question_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'questionId' => $row->questionId,
		'videoId' => $row->videoId,
		'questionText' => $row->questionText,
		'questionType' => $row->questionType,
		'validate' => $row->validate,
	    );
            $this->template->view('question/question_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('question'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('question/create_action'),
	    'questionId' => set_value('questionId'),
	    'videoId' => set_value('videoId'),
	    'questionText' => set_value('questionText'),
	    'questionType' => set_value('questionType'),
	    'validate' => set_value('validate'),
	);
        $this->template->view('question/question_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'questionId' => $this->input->post('questionId',TRUE),
		'videoId' => $this->input->post('videoId',TRUE),
		'questionText' => $this->input->post('questionText',TRUE),
		'questionType' => $this->input->post('questionType',TRUE),
		'validate' => $this->input->post('validate',TRUE),
	    );

            $this->Question_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('question'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Question_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('question/update_action'),
		'questionId' => set_value('questionId', $row->questionId),
		'videoId' => set_value('videoId', $row->videoId),
		'questionText' => set_value('questionText', $row->questionText),
		'questionType' => set_value('questionType', $row->questionType),
		'validate' => set_value('validate', $row->validate),
	    );
            $this->template->view('question/question_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('question'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('questionId', TRUE));
        } else {
            $this->data = array(
		'questionId' => $this->input->post('questionId',TRUE),
		'videoId' => $this->input->post('videoId',TRUE),
		'questionText' => $this->input->post('questionText',TRUE),
		'questionType' => $this->input->post('questionType',TRUE),
		'validate' => $this->input->post('validate',TRUE),
	    );

            $this->Question_model->update($this->input->post('questionId', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('question'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Question_model->get_by_id($id);

        if ($row) {
            $this->Question_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('question'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('question'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('questionId', 'questionid', 'trim|required');
	$this->form_validation->set_rules('videoId', 'videoid', 'trim|required');
	$this->form_validation->set_rules('questionText', 'questiontext', 'trim|required');
	$this->form_validation->set_rules('questionType', 'questiontype', 'trim|required');
	$this->form_validation->set_rules('validate', 'validate', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "question.xls";
        $judul = "question";
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
	xlsWriteLabel($tablehead, $kolomhead++, "QuestionId");
	xlsWriteLabel($tablehead, $kolomhead++, "VideoId");
	xlsWriteLabel($tablehead, $kolomhead++, "QuestionText");
	xlsWriteLabel($tablehead, $kolomhead++, "QuestionType");
	xlsWriteLabel($tablehead, $kolomhead++, "Validate");

	foreach ($this->Question_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->questionId);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->videoId);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->questionText);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->questionType);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->validate);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=question.doc");

        $this->data = array(
            'question_data' => $this->Question_model->get_all(),
            'start' => 0
        );
        
        $this->template->view('question/question_doc',$this->data);
    }

}

/* End of file Question.php */
/* Location: ./application/controllers/Question.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-14 15:50:36 */
/* http://harviacode.com */