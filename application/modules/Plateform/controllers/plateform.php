<?php

/**
 * Created by PhpStorm.
 * User: M418485
 * Date: 05/12/2016
 * Time: 15:37
 */
class Plateform extends MX_Controller
{
    private $data;

    function __construct()
    {
        //$this->is_logged_in();

        $params['apikey'] = $this->config->item('youtube_api_key');
        $this->template->set_theme("gentelella");
        $this->data = array();
        
        $this->load->model('admin/Videos_model');
        $this->load->model('admin/Channel_model','Channel_model');
        $this->load->model('admin/Question_line_model','Question_line_model');
        $this->load->model('admin/Question_model','Question_model');
    }

    function index()
    {
        
       


        $this->template->view('welcome');
        
    }
    function video_solo($id)
    {
        if(empty($id))
            redirect(base_url());

        $this->data['video'] = $this->Videos_model->get_by_id(array('videoId'=>$id));
        $this->data['channel'] = $this->Channel_model->get_by_id(array("channelId"=>($this->data['video']->channelID)));
        $this->data['questions'] = $this->Question_model->get_by_Xcol_array(array('videoId' => $this->data['video']->videoId,"validate" => 1));
        foreach($this->data['questions'] as $key=>$question){
            $question_line = $this->Question_line_model->get_by_col_array('questionId',$question['questionId']);
            $this->data['questions'][$key]['question_lines'] = $question_line;
        }
        $this->template->add_subscript($this->load->view('scripts/video_solo_script',null,true));
        $this->template->view('video_solo',$this->data);
    }

    function channel_videos($channelID)
    {
        if(empty($channelID))
            show_404();
        $this->data['channelID'] = $channelID;
        $this->data['videos'] = $this->Videos_model->get_by_cols(
            array(
                'channelID'=>$channelID,
                'videoState'=> 'public'
                )
        );

        /*$tmp = array();
        foreach($this->data['videos'] as $k => $v)
            if($v['videoState'] != 'public')
                array_push($tmp,$k);
        foreach($tmp as $v)
            unset($this->data['videos'][$v]);*/
        $this->template->view('channel_videos',$this->data);
    }

    function theme_channels($theme= '')
    {
        if(empty($theme))
            show_404();
        $this->data['theme'] = $theme;
        $this->data['channels'] = $this->Channel_model->get_by_cols_array(array('channelType'=>$theme));
        $this->template->view('theme_channels',$this->data);
    }

    function set_review(){
        $this->load->model('Video_review_model');
        if ($this->input->post('video_reviewText',TRUE)&&$this->input->post('login',TRUE)&&$this->input->post('videoId',TRUE)) {

            $this->data = array(
                'videoId' => $this->input->post('videoId',TRUE),
                'login' => $this->input->post('login',TRUE),
                'video_reviewText' => $this->input->post('video_reviewText',TRUE),
            );

            $this->Video_review_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Plateform'));
        }
        else {

        }
    }

    function is_logged_in()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true)
        {
            redirect(site_url('User'));
            //$this->load->view('login_form');
        }
    }    
}