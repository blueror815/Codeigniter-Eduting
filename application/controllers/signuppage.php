<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Signuppage extends App_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ion_auth_model');
		
		$this->body_class = array('sidebar-mini', 'signup_page');

		$this->page_title = 'Sign Up';

		$this->extra_css = array('signup/style.css');

		$this->extra_js = array('signup/script.js');

		$this->current_section = 'singup';
		
		$this->show_searchbar = false;

		$this->template->set_partial("college_slider", "partials/college_slider");

		$this->form_validation->set_rules('nickname', 'Nickname', 'required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('national', 'Nationality', 'required|callback_validate_national');
		
	}

	public function index()
	{
		$data['national'] = $this->config->item('national');
		
		$data['nickname'] = array('name' => 'nickname',
			'id' => 'nickname',
			'type' => 'text',
			'value' => $this->form_validation->set_value('nickname'),
			'class' => 'form-control input-lg',
			'placeholder' => 'NICKNAME *'
		);
		
		$data['email'] = array('name' => 'email',
			'id' => 'email',
			'type' => 'text',
			'value' => $this->form_validation->set_value('email'),
			'class' => 'form-control input-lg',
			'placeholder' => 'EMAIL ADDRESS *'
		);
		
		$data['password'] = array('name' => 'password',
			'id' => 'password',
			'type' => 'password',
			'value' => $this->form_validation->set_value('password'),
			'class' => 'form-control input-lg',
			'placeholder' => 'PASSWORD *'
		);
		
		$data['cpassword'] = array('name' => 'cpassword',
			'id' => 'cpassword',
			'type' => 'password',
			'value' => $this->form_validation->set_value('cpassword'),
			'class' => 'form-control input-lg',
			'placeholder' => 'CONFIRM PASSWORD *'
		);
		
		$data['lang'] = array('name' => 'lang',
			'id' => 'lang',
			'type' => 'text',
			'class' => 'form-control input-lg',
			'placeholder' => 'LANGUAGE SPOKEN'
		);

		$data['show_form'] = "hide";
		
		$this->render_page('signup/index', $data);
	}
	
	//create a new user
	function create_user()
	{
		$additional_data = array();
		if ($this->form_validation->run() == true)
		{
			$nickname 	= $this->input->post('nickname');
			$email    	= $this->input->post('email');
			$password 	= $this->input->post('password');
			$national	= $this->input->post('national');
			$plan 		= $this->input->post('plan');
			$ed_level	= $this->input->post('ed_level');
			$lang		= $this->input->post('lang');
			$gender	= $this->input->post('gender');
			
			$additional_data = array(
				'email'				=> $email,
				'pass' 			=> $password,
				'nickname' 			=> $nickname,
				'last_name' 			=> '',
				'middle_name'			=> '',
				'first_name'			=> '',
				'gender'				=> $gender,
				'addr1'				=> '',
				'addr2'				=> '',
				'addr3'				=> '',
				'country'				=> '',
				'zip_code'				=> '',
				'nationality' 		=> $national,
				'ethnicity' 			=> '',
				'birthday_day' 		=> '',
				'birthday_month' 		=> '',
				'birthday_year' 		=> '',
				'language' 			=> $lang,
				'currently_school' 	=> '',
				'graduation_year' 	=> '',
				'area_of_interests' 	=> '',
				'major' 				=> '',
				'parents_email' 		=> '',
				'grade' 				=> $ed_level,
				'activationKey' 		=> mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand(),
				'remember_code'		=> sha1($password)
			);

		}


		if ($this->form_validation->run() == true && $this->ion_auth->register($email, $password, $additional_data))
		{
			//check to see if we are creating the user
			//redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("dashboard");
		}
		else
		{
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			
			$this->session->set_flashdata('app_error', $this->ion_auth->errors());
			
			$data['national'] = $this->config->item('national');
			
			$data['nickname'] = array('name' => 'nickname',
				'id' => 'nickname',
				'type' => 'text',
				'value' => $this->form_validation->set_value('nickname'),
				'class' => 'form-control input-lg',
				'placeholder' => 'NICKNAME *'
			);
			
			$data['email'] = array('name' => 'email',
				'id' => 'email',
				'type' => 'email',
				'value' => $this->form_validation->set_value('email'),
				'class' => 'form-control input-lg',
				'placeholder' => 'EMAIL ADDRESS'
			);
			
			$data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password'),
				'class' => 'form-control input-lg',
				'placeholder' => 'PASSWORD'
			);
			
			$data['cpassword'] = array('name' => 'cpassword',
				'id' => 'cpassword',
				'type' => 'password',
				'value' => $this->form_validation->set_value('cpassword'),
				'class' => 'form-control input-lg',
				'placeholder' => 'CONFIRM PASSWORD'
			);
			
			$data['lang'] = array('name' => 'lang',
				'id' => 'lang',
				'type' => 'text',
				'class' => 'form-control input-lg',
				'placeholder' => 'LANGUAGE SPOKEN'
			);
			
			$data['show_form'] = "show";

			
			$this->render_page('signup/index', $data);
		}
	}

	function validate_national($code)
	{	
	   if((int)$code > -1)
	   {
			return TRUE;
	   }
	   else
	   {
			$this->form_validation->set_message('validate_national', 'Your Nationality is required.');
			return FALSE;
	   }
	}
}