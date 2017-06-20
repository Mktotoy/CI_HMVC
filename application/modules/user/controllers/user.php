<?php

class User extends MX_Controller {


	/**
	 * Login constructor.
	 */
	public function __construct()
	{

	}
	function index()
	{
		$this->login();
	}

	function login()
	{
		//$data['main_content'] = 'login_form';
		//$this->load->view('includes/template_init', $data);
		$this->template->set_theme("landpage");
		$this->template->ajouter_css('css/template/login');
		$this->template->view('login_form');

		$this->load->library('encryption');

	}

	function validate_credentials()
	{		
		$this->load->model('User_model');
		$this->load->model('User_userrole_model');
		$this->load->library('encryption');

		$query = $this->User_model->get_by_cols_array(array('login'=>$this->input->post('username'),'password'=>md5($this->input->post('password'))));

		if($query) // if the user's credentials validated...
		{
			//print_r($query);
			//$userrole = $this->User_userrole_model->get_by_id($query[0]['login']);
			$data = array(
				'user' => $query[0],
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);



			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			$this->data = array(
						'lastip' => $ip,
			);

			$this->User_model->update(array('login'=>$this->session->userdata('user')['login']), $this->data);
			redirect('Plateform/');


		}
		else // incorrect username or password
		{
			$this->index();
		}
	}

	function signup()
	{
		$this->template->set_theme("landpage");
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
            $this->template->set_theme("landpage");
            $this->template->view('signup_form');

		}

		else
		{
			$this->load->model('User_model');
			$data = array(
				'login' => $this->input->post('username',TRUE),
				'last_name' => $this->input->post('last_name',TRUE),
				'first_name' => $this->input->post('first_name',TRUE),
				'mail' => $this->input->post('email_address',TRUE),
				'mailConfirmed' => 0,
				'pwd' => md5($this->input->post('password',TRUE)),
			);
			$query = $this->User_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');

			if($query)
			{
				/*$data['main_content'] = 'signup_successful';
				$this->load->view('includes/template', $data);*/
				$this->template->set_theme("landpage");
				$this->template->view('signup_successful');
			}
			else
			{
				//$this->load->view('signup_form');
				$this->template->set_theme("landpage");
				$this->template->view('signup_form');

			}
		}

	}

	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}

	function profile()
	{

		$this->load->model('Watched_model');

		$data['watched'] = $this->Watched_model->get_by_cols_array(array("login"=>$this->session->userdata('user')['login']));
		if(!empty($data['watched'][0])){
			$this->load->model('admin/Videos_model','Videos_model');
			foreach ($data['watched'] as $id=>$watched_line){
				$data['watched'][$id]['videoDetails'] = $this->Videos_model->get_by_cols_array(array('videoId' => $watched_line['videoId']));
			}
		}
		print_r($data);
		$this->template->view('profile/profile',$data);
	}
	function edit_profile()
	{
		$this->template->view('profile/edit_profile');
	}

}