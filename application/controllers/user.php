<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends App_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Ion_auth_model');
		
		$this->lang->load('auth');
		$this->load->helper('language');
	}

	public function index()
	{
		redirect('home');
	}

	public function login()
	{
		$this->body_class = array('sidebar-mini', 'signin_page');

		$this->page_title = 'Please sign in';

		$this->extra_css = array('Signin/style.css');
		
		$this->extra_js = array('Signin/script.js');

		$this->current_section = 'login';
		
		$this->show_searchbar = false;

		$this->template->set_partial("college_slider", "partials/college_slider");
		
		//$this->output->enable_profiler(True);

		if(isset($this->session->userdata['snum']) && $this->ion_auth_model->login_remembered_user()) {
			$this->session->set_flashdata('app_success', $this->ion_auth->messages());
			redirect('dashboard');
		} else {
			// validate form input
			$this->form_validation->set_rules('identity', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');

			//$this->output->enable_profiler(TRUE);

			if ($this->form_validation->run() == true)
			{ 
				// check to see if the user is logging in
				// check for "remember me"
				$remember = (bool) $this->input->post('remember');
				
				
				
				if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
				{ 
					$this->session->set_flashdata('app_success', $this->ion_auth->messages());
					redirect('dashboard');
				}
				else
				{ 
					$this->session->set_flashdata('app_error', $this->ion_auth->errors());
					redirect('login');
				}
			}
			else
			{  
				// the user is not logging in so display the login page
				// set the flash data error message if there is one
				$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$data['identity'] = array('name' => 'identity',
					'id' => 'identity',
					'type' => 'text',
					'value' => $this->form_validation->set_value('identity'),
					'class' => 'input-block-level form-control input-lg',
					'placeholder' => 'EMAIL ADDRESS'
				);
				$data['password'] = array('name' => 'password',
					'id' => 'password',
					'type' => 'password',
					'class' => 'input-block-level form-control input-lg',
					'placeholder' => 'PASSWORD'
				);

				$this->render_page('user/login', $data);
			}
			
		}
		
		
	}

	public function logout()
	{
		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them back to the login page
		redirect('home');
	}

	public function forgot_password()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if ($this->form_validation->run())
		{
			$forgotten = $this->ion_auth->forgotten_password($this->input->post('email', TRUE));

			if ($forgotten)
			{ 
				// if there were no errors
				$this->session->set_flashdata('app_success', $this->ion_auth->messages());
				redirect('login');
			}
			else
			{
				$this->session->set_flashdata('app_error', $this->ion_auth->errors());
				redirect('login');
			}
		}

		$this->body_class[] = 'forgot_password';

		$this->page_title = 'Forgot password';
		
		$this->extra_css = array('forgot_password/style.css');
		
		$this->extra_js = array('forgot_password/script.js');

		$this->current_section = 'forgot_password';
		
		$this->show_searchbar = false;
		
		$this->template->set_partial("college_slider", "partials/college_slider");
		
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$data['email'] = array('name' => 'email',
			'id' => 'email',
			'type' => 'text',
			'value' => $this->form_validation->set_value('email'),
			'class' => 'input-block-level form-control input-lg',
			'placeholder' => 'EMAIL ADDRESS'
		);

		$this->render_page('user/forgot_password', $data);
	}
	
	//reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}
		
		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			//if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			$this->body_class[] = 'reset_password';

			$this->page_title = 'Reset password';
			
			$this->extra_css = array('reset_password/style.css');
			
			$this->extra_js = array('reset_password/script.js');

			$this->current_section = 'reset_password';
			
			$this->show_searchbar = false;

			if ($this->form_validation->run() == false)
			{

				//set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				
				$this->data['new'] = array(
					'name' => 'new',
					'id'   => 'new',
					'type' => 'password',
					'class' => 'input-block-level form-control input-lg',
					'placeholder' => 'PASSWORD',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['new_confirm'] = array(
					'name' => 'new_confirm',
					'id'   => 'new_confirm',
					'type' => 'password',
					'class' => 'input-block-level form-control input-lg',
					'placeholder' => 'CONFIRM PASSWORD',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->s_no,
				);

				$this->data['code'] = $code;

				//render
				$this->render_page('user/reset_password', $this->data);
			}
			else
			{

				// finally change the password
				$identity = $user->{$this->config->item('identity', 'ion_auth')};

				$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

				if ($change)
				{
					//if the password was successfully changed
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					$this->logout();
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect('user/reset_password/' . $code, 'refresh');
				}

			}
		}
		else
		{
			//if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("user/forgot_password", 'refresh');
		}
	}



	public function profile()
	{
		echo get_cookie('identity') . "hello world"; die;
		$this->body_class[] = 'my_profile';

		$this->page_title = 'My Profile';

		$this->current_section = 'my_profile';
		
		$this->extra_css = array('profile/style.css');

		$this->extra_js = array('profile/script.js');

		$user = $this->ion_auth->user()->row_array();

		$this->render_page('user/profile', array('user' => $user));
	}
}