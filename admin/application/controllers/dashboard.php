<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('authentication');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('url');
	}

	//redirect if needed, otherwise display the user list
	function index()
	{
		if (!$this->authentication->logged_in())
		{
			//redirect them to the login page
			redirect('login', 'refresh');
		} else {
			
           redirect('university');
		}
	}


	function manage_user() {
		
		if (!$this->authentication->logged_in())
		{
			//redirect them to the login page
			redirect('login', 'refresh');
		} else {
			$this->load->view("dashboard_mange_user");
		}
	}
	function detail_university() {
       if (!$this->authentication->logged_in())
		{
			//redirect them to the login page
			redirect('login', 'refresh');
		} else {
			$this->load->view("dashboard/dashboard_mange_university");
		} 
    }
    function login()
    {
        $this->data['title'] = "Login";

        $this->form_validation->set_rules('identity', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == true)
        {
            if ($this->authentication_model->login($this->input->post('identity'), $this->input->post('password'), false)) {
                
                $user_value = array('email' => $this->input->post('identity'));
                
                $this->session->set_userdata($user_value);
            }
            redirect('dashboard', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
        }
        else
        {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'type' => 'email',
                'class' => 'form-control',
                'placeholder' => 'Email',
                'value' => $this->form_validation->set_value('identity'),
            );
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
              'class' => 'form-control',
              'placeholder' => 'Password',
			);
			$this->render();
		}
	}

	//log the user out
	function logout()
	{
		$this->data['title'] = "Logout";

		//log the user out
		$logout = $this->authentication->logout();

		redirect('dashboard', 'refresh');
	}

	//change password

	

	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

    function _valid_csrf_nonce()
    {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
            $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
