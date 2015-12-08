<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Authentication_model extends CI_Model
{

    /**
	 * Holds an array of tables used
	 *
	 * @var string
	 **/
	public $tables = array();



	/**
	 * Identity
	 *
	 * @var string
	 **/
	public $identity;

	
	
	/**
	 * message (uses lang file)
	 *
	 * @var string
	 **/
	protected $messages;

	/**
	 * error message (uses lang file)
	 *
	 * @var string
	 **/
	protected $errors;

	/**
	 * error start delimiter
	 *
	 * @var string
	 **/
	protected $error_start_delimiter;

	/**
	 * error end delimiter
	 *
	 * @var string
	 **/
	protected $error_end_delimiter;
    
    
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('cookie');
		$this->load->helper('date');
		$this->load->library('session');

		//initialize db tables data

		//initialize data
		$this->identity_column = 'email';
		

		//initialize messages and error
		$this->messages = array();
		$this->errors = array();
		$this->message_start_delimiter = '<p>';
		$this->message_end_delimiter   = '</p>';
		$this->error_start_delimiter   = '<p>';
		$this->error_end_delimiter     = '</p>';

	}
    
	function login($email, $password, $remember=false) {
		if(empty($email) || empty($password)) {
            return false;
		} else {
            $query = $this->db->select('pass')
		                  ->where('email', $email)
		                  ->limit(1)
		                  ->get('admin');
            $result = $this->db->get_where("admin", array("email" => $email));
            $result_user = $result->result_array();
            if (count($result_user) == 0) {
                return false;
            }
            if($result_user[0]['pass'] == $password) {
                return true;
            } else {
                return false;
            }
       }
	}
}
