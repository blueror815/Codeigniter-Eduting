<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Faqpage extends App_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
    $this->body_class = array('sidebar-mini', 'faq_page');

		$this->page_title = 'Faq';
		
		$this->extra_css = array('faqpage/style.css');
		
		$this->extra_js = array('faqpage/script.js');

    $this->current_section = 'faqpage';

		$this->template->set_partial("college_slider", "partials/college_slider");

		$this->render_page('faq/index');
	}
}