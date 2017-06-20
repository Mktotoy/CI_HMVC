<?php

/**
 * Created by PhpStorm.
 * User: M418485
 * Date: 09/12/2016
 * Time: 13:53
 */
class Moderation extends MX_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
        $this->data=array();
        $this->load->model('Videos_model','Videos_model');
        $this->load->model('Question_model','Question_model');
        $this->load->model('Question_line_model','Question_line_model');
        $this->load->library('form_validation');

    }

    public function index()
    {
        $this->moderate_accept();
    }

    public function moderate_accept(){

        $this->data ['videos'] = array_slice($this->Videos_model->get_by_cols(array('pertinent'=>0)), 0, 100);
        $this->data['validate'] = 1;
        $this->template->view('moderation/moderate',$this->data);
    }

    public function moderate_decline(){

        $this->data ['videos'] = array_slice($this->Videos_model->get_by_col(array('pertinent'=>0)), 0, 100);
        $this->data['validate'] = -1;
        $this->template->view('moderation/moderate',$this->data);
    }
    
    public function moderate_action(){
        
        $moderate_arr= $this->input->post('moderate'); //array;
        $validate= $this->input->post('validate');
        if($moderate_arr&&$validate){
            foreach($moderate_arr as $moderation_line){
                if($moderation_line){
                    $this->data = array(
                        'pertinent' => $validate
                    );
                    $this->Videos_model->update(array('videoId'=>$moderation_line),$this->data);
                }
            }
            $this->moderate_accept();
        }
        else
            redirect(site_url('admin/Moderation'));
    }

    public function set_categories(){
        $this->load->model('Plateform/Videos_model','Videos_model');
    }
    public function set_categories_action(){

    }
    public function question_moderation(){
        $this->data['questions'] = $this->Question_model->get_by_Xcol_array(array("validate" => 0));
        foreach($this->data['questions'] as $key=>$question){
            $question_line = $this->Question_line_model->get_by_col_array('questionId',$question['questionId']);
            $this->data['questions'][$key]['question_lines'] = $question_line;
        }
        
        $this->data['validate'] = 1;
        $this->template->view('moderation/moderate_questions',$this->data);
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