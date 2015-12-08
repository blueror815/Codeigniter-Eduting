<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Authentication
{
	/**
	 * CodeIgniter global
	 *
	 * @var string
	 **/
	protected $ci;

	/**
	 * account status ('not_activated', etc ...)
	 *
	 * @var string
	 **/
	protected $status;

	/**
	 * extra where
	 *
	 * @var array
	 **/
	public $_extra_where = array();

	/**
	 * extra set
	 *
	 * @var array
	 **/
	public $_extra_set = array();

	/**
	 * __construct
	 *
	 * @return void
	 * @author Ben
	 **/
	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('email');
		$this->ci->load->library('session');
		$this->ci->load->model('authentication_model');
		$this->ci->load->helper('cookie');

		//auto-login the user if they are remembered
		if (!$this->logged_in() && get_cookie('identity') && get_cookie('remember_code'))
		{
			$this->ci->ion_auth = $this;
			$this->ci->authentication_model->login_remembered_user();
		}
	}
    
    
	public function logout()
	{
		$identity = "email";
		$this->ci->session->unset_userdata($identity);
		
		//delete the remember me cookies if they exist
		if (get_cookie('identity'))
		{
			delete_cookie('identity');
		}
		if (get_cookie('remember_code'))
		{
			delete_cookie('remember_code');
		}

		$this->ci->session->sess_destroy();

		return TRUE;
	}

	public function logged_in()
	{
		$identity = "email";
		return (bool) $this->ci->session->userdata($identity);
	}

}