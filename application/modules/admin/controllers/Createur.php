<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Createur extends MX_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();

        $this->is_logged_in();

        $this->data=array();
        $this->load->model('Question_model');
        $this->load->model('Question_line_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
       $this->create();
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
            'action' => site_url('Createur/create_action'),
	    'questionId' => set_value('questionId'),
	    'videoId' => set_value('videoId'),
	    'questionText' => set_value('questionText'),
	    'questionType' => set_value('questionType'),
	);
        $this->template->view('Createur/form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $this->data = array(
                'videoId' => $this->input->post('videoId',TRUE),
                'questionText' => $this->input->post('questionText',TRUE),
                'questionType' => $this->input->post('questionType',TRUE),
            );
            $back_id=$this->Question_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');

            $question_lineText=$this->input->post('question_lineText', TRUE);        // array
            $question_lineTrue=$this->input->post('question_lineTrue', TRUE);	   // array


            foreach($question_lineText as $a => $qltext){
                $this->data = array(
                    'questionId' => $back_id,
                    'question_lineText' => $qltext,
                    'question_lineTrue' => $question_lineTrue[$a],
                );
                $this->Question_line_model->insert($this->data);
                $this->session->set_flashdata('message', 'Create Record Success');
            }
            redirect('Createur');

        }
    }

    public function create_ajax()
    {
         echo "\"videoId=\"+$(\"#VideoId\").val()+\"&questionText=\"+$(\"#questionText\").val()+\"&questionType=\"+$(\"#questionType\").val()+\"&question_lineText=\"+JSON.stringify(question_lineText)+\"&question_lineTrue=\"+JSON.stringify(question_lineTrue), // données à transmettre";

        /*if ($this->input->post('videoId')&&$this->input->post('questionText')&&$this->input->post('questionType')
            &&$this->input->post('question_lineText')&&$this->input->post('question_lineTrue')) {
            
            $this->data = array(
                'videoId' => $this->input->post('videoId',TRUE),
                'questionText' => $this->input->post('questionText',TRUE),
                'questionType' => $this->input->post('questionType',TRUE),
            );
            $back_id=$this->Question_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');

            $question_lineText=json_decode($this->input->post('question_lineText', TRUE));        // array
            $question_lineTrue=json_decode($this->input->post('question_lineTrue', TRUE));	   // array

            foreach($question_lineText as $a => $qltext){
                $this->data = array(
                    'questionId' => $back_id,
                    'question_lineText' => $qltext,
                    'question_lineTrue' => $question_lineTrue[$a],
                );
                $bak=$this->Question_line_model->insert($this->data);
                $this->session->set_flashdata('message', 'Create Record Success');
            }
            echo ($bak&&$back_id)?1:0;
        }*/
    }
    
    public function update($id) 
    {
        $row = $this->Question_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('Createur/update_action'),
		'questionId' => set_value('questionId', $row->questionId),
		'videoId' => set_value('videoId', $row->videoId),
		'questionText' => set_value('questionText', $row->questionText),
		'questionType' => set_value('questionType', $row->questionType),
	    );
            $this->template->view('Createur/form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Createur'));
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
	    );

            $this->Question_model->update($this->input->post('questionId', TRUE), $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Createur'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Question_model->get_by_id($id);

        if ($row) {
            $this->Question_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Createur'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Createur'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('questionId', 'questionid', 'trim');
	$this->form_validation->set_rules('videoId', 'videoid', 'trim|required');
	$this->form_validation->set_rules('questionText', 'questiontext', 'trim|required');
	$this->form_validation->set_rules('questionType', 'questiontype', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function _rules_line()
    {
        $this->form_validation->set_rules('question_lineId', 'question lineid', 'trim');
        $this->form_validation->set_rules('questionId', 'questionid', 'trim');
        $this->form_validation->set_rules('question_lineText', 'question linetext', 'trim|required');
        $this->form_validation->set_rules('question_lineTrue', 'question linetrue', 'trim|required');
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

	foreach ($this->Question_model->get_all() as $this->data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->questionId);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->videoId);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->questionText);
	    xlsWriteLabel($tablebody, $kolombody++, $this->data->questionType);

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

    function is_logged_in()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if((!isset($is_logged_in) || $is_logged_in != true)|| $this->session->userdata('user')['role']!= 2)
        {
            redirect(site_url('Plateform'));
            //$this->load->view('login_form');
        }
    }

}

/* End of file Question.php */
/* Location: ./application/controllers/Question.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-07 23:29:29 */
/* http://harviacode.com */