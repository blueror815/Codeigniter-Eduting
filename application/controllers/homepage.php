<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends App_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->body_class = array('sidebar-mini', 'home_page');

		$this->page_title = 'Home';

		$this->extra_css = array('homepage/style.css');

		$this->extra_js = array('homepage/script.js');

		$this->current_section = 'homepage';
		
		$this->show_searchbar = false;

		$this->template->set_partial("college_slider", "partials/college_slider");

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

		$this->render_page('homepage/index', $data);
	}
}