<?php

class badges extends MX_Controller {


	/**
	 * Login constructor.
	 */
	public function __construct()
	{
		$this->template->theme = "empty";
		$this->template->ajouter_css('css/template/login');
	}

	function index()
	{
		//$data['main_content'] = 'login_form';
		//$this->load->view('includes/template_init', $data);
		$this->template->view('login_form');

	}
	
	function validate_credentials()
	{		
		$this->load->model('CRUD_Utilisateur_model');
		$query = $this->CRUD_Utilisateur_model->get_by_login_mdp($this->input->post('username'),md5($this->input->post('password')));
		
		if($query) // if the user's credentials validated...
		{
			$data = array(
				'matricule' => $query[0]['Matricule'],
				'usergroup' => $query[0]['IDUsergroup'],
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('site/members_area');
		}
		else // incorrect username or password
		{
			$this->index();
		}
	}	
	
	function signup()
	{
		/*$data['main_content'] = 'signup_form';
		$this->load->view('includes/template_init', $data);*/
		$this->template->view('signup_form');

	}
	
	function create_member()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Matricule', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			//$this->load->view('signup_form');
			$this->template->view('signup_form');

		}
		
		else
		{			
			$this->load->model('CRUD_Utilisateur_model');
			$data = array(
				'Matricule' => $this->input->post('username',TRUE),
				'Nom' => $this->input->post('first_name',TRUE),
				'Prenom' => $this->input->post('last_name',TRUE),
				'Email' => $this->input->post('email_address',TRUE),
				'Password' => md5($this->input->post('password',TRUE)),
				'IDUserGroup' => 1,
			);
			$this->CRUD_Utilisateur_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');

			if($query = $this->CRUD_Utilisateur_model->create_member())
			{
				/*$data['main_content'] = 'signup_successful';
				$this->load->view('includes/template', $data);*/
				$this->template->view('signup_successful');
			}
			else
			{
				//$this->load->view('signup_form');
				$this->template->view('signup_form');

			}
		}
		
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}

}