<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Howitworks extends App_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->body_class = array('sidebar-mini', 'howitworks_page');

		$this->page_title = 'HowItWorks';

		$this->extra_css = array('howitworks/style.css');

		$this->extra_js = array('howitworks/script.js');

		$this->current_section = 'howitworks';

		$this->template->set_partial("college_slider", "partials/college_slider");

		$this->render_page('howitworks/index');
	}
}