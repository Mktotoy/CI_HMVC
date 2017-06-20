<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Watched extends CI_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->data=array();
        $this->load->model('Watched_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'watched/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'watched/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'watched/index.html';
            $config['first_url'] = base_url() . 'watched/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Watched_model->total_rows($q);
        $watched = $this->Watched_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'watched_data' => $watched,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );$this->template->view('watched/watched_list', $this->data);
    }

    public function read() 
    {
            $ids = array(
		'watchedId' => $this->input->get('watchedId',TRUE),
	    );
        $row = $this->Watched_model->get_by_id($ids);
        if ($row) {
            $this->data = array(
		'watchedId' => $row->watchedId,
		'videoId' => $row->videoId,
		'login' => $row->login,
		'watched_timestamp' => $row->watched_timestamp,
	    );
            $this->template->view('watched/watched_read', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('watched'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('watched/create_action'),
	    'watchedId' => set_value('watchedId'),
	    'videoId' => set_value('videoId'),
	    'login' => set_value('login'),
	    'watched_timestamp' => set_value('watched_timestamp'),
	);
        $this->template->view('watched/watched_form', $this->data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->data = array(
		'watchedId' => $this->input->post('watchedId',TRUE),
		'videoId' => $this->input->post('videoId',TRUE),
		'login' => $this->input->post('login',TRUE),
		'watched_timestamp' => $this->input->post('watched_timestamp',TRUE),
	    );

            $this->Watched_model->insert($this->data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('watched'));
        }
    }
    
    public function update() 
    {
             $ids = array(
		'watchedId' => $this->input->get('watchedId',TRUE),
	    );
        $row = $this->Watched_model->get_by_id($ids);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('watched/update_action'),
		'watchedId' => set_value('watchedId', $row->watchedId),
		'videoId' => set_value('videoId', $row->videoId),
		'login' => set_value('login', $row->login),
		'watched_timestamp' => set_value('watched_timestamp', $row->watched_timestamp),
	    );
            $this->template->view('watched/watched_form', $this->data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('watched'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Array', TRUE));
        } else {
            $this->data = array(
		'watchedId' => $this->input->post('watchedId',TRUE),
		'videoId' => $this->input->post('videoId',TRUE),
		'login' => $this->input->post('login',TRUE),
		'watched_timestamp' => $this->input->post('watched_timestamp',TRUE),
	    );

 $ids = array(
		'watchedId' => $this->input->post('watchedId',TRUE),
	    );

            $this->Watched_model->update($ids, $this->data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('watched'));
        }
    }
    
    public function delete() 
    {
        
       $ids = array(
		'watchedId' => $this->input->get('watchedId',TRUE),
	    );
        $row = $this->Watched_model->get_by_id($ids);
        if ($row) {
            $this->Watched_model->delete($ids);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('watched'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('watched'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('watchedId', 'watchedid', 'trim|required');
	$this->form_validation->set_rules('videoId', 'videoid', 'trim|required');
	$this->form_validation->set_rules('login', 'login', 'trim|required');
	$this->form_validation->set_rules('watched_timestamp', 'watched timestamp', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Watched.php */
/* Location: ./application/controllers/Watched.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-20 15:18:34 */
/* http://harviacode.com */