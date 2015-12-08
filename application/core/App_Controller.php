<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Base Controller
 *
 */
class App_Controller extends CI_Controller
{

    /**
     * Site Title
     * 
     * @var string
     */
    public $site_title = 'Eduting'; //non use
    
    /**
     * Page Title
     * 
     * @var string
     */
    public $page_title = ''; // use in child controller
    
    /**
     * Page Meta Keywords
     * 
     * @var string
     */
    public $page_meta_keywords = 'MVC Pattern, bootstrap 3.x, codeigniter for godaddy shared hosting server->coming soon to migrate to Ruby on Rails with AngularJS ';
    
    /**
     * Page Meta Description
     * 
     * @var string
     */
    public $page_meta_description = 'Eduting are a dynamic global online education provider specializing in school searches and academic management with related services.';

    /**
     * Page Meta Author
     * 
     * @var string
     */
    public $page_meta_author = 'Ryan Kim, Albert Heino';

    /**
     * Additional Style Sheet
     * 
     * @var array 
     */
    public $extra_css = array();
    
    /**
     * Additional Javascript
     * 
     * @var array 
     */
    public $extra_js = array();
    
    /**
     * JS Calls on DOM Ready
     * 
     * @var array 
     */
    public $js_domready = array();
    
    /**
     * JS Calls on window load
     * 
     * @var array 
     */
    public $js_windowload = array();

    /**
     * Body classes
     * 
     * @var array 
     */
    public $body_class = array();

    /**
     * Current section
     * 
     * @var string
     */
    public $current_section = '';  //non use
	
	
	public $validation_config = array();
	
	public $show_searchbar = true;
	
	public $userdata = array();
	
	public $bLogin = true;
	
	public $search_list = array();
    
    /**
     * Class Constructor
     */
    public function __construct()
    {
        // Call Parent Constructor
        parent::__construct();

        // Site Page Title
        $this->site_title = $this->config->item('app_title');
		
        // Initialize array with assets we use site wide
        $this->assets_css = array(
			'common/bootstrap/css/bootstrap.css',
			'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
			'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
			'common/dist/css/AdminLTE.css',
			'common/dist/css/common.css',
            );
        $this->assets_js = array(
            'common/plugins/jQuery/jQuery-2.1.4.min.js',
            'common/plugins/jQueryUI/jquery-ui.min.js',
            'common/bootstrap/js/bootstrap.min.js',
            'common/dist/js/app.min.js',
            'common/plugins/slider/jssor.js',
            'common/plugins/slider/jssor.slider.js',
            'common/dist/js/common.js'
            );

        $this->template->set('is_frontend', true);
		 
        //$this->output->enable_profiler(TRUE);
    }
    
    /**
     * Prepare BASE Javascript
     */
    private function prepare_base_javascript()
    {
        $str = "<script type=\"text/javascript\">\n";
        
        if (count($this->js_domready) > 0)
        {
            $str.= "$(document).ready(function() {\n";
            $str.= implode("\n", $this->js_domready) . "\n";
            $str.= "});\n";
        }
        
        if (count($this->js_windowload) > 0)
        {
            $str.= "$(window).load(function() {\n";
            $str.= implode("\n", $this->js_windowload) . "\n";
            $str.= "});\n";
        }
        
        $str.= "</script>\n";
        $this->template->append_metadata($str);
    }
    
    /**
     * Set CSS Meta
     */
    private function set_styles()
    {
    	
    		$this->template->append_metadata('<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">');
    	
    		$this->template->append_metadata('<link rel="shortcut icon" href="' .  $this->config->item('base_url') . 'common/dist/img/favicon.ico" type="image/x-icon">');
    		$this->template->append_metadata('<link rel="icon" href="' .  $this->config->item('base_url') . 'common/dist/img/favicon.ico" type="image/x-icon">');

    		$this->assets_css = array_merge($this->assets_css, $this->extra_css);
    		
        if (count($this->assets_css) > 0)
        {
            foreach($this->assets_css as $asset)
                if (stristr($asset, 'http') === FALSE)
                    $this->template->append_metadata('<link rel="stylesheet" type="text/css" href="' . $this->config->item('base_url') . 'assets/' . $asset . '" />');
                else
                    $this->template->append_metadata('<link rel="stylesheet" type="text/css" href="' . $asset . '" />');
        }
        
        
        // Internet Explorer styles
        $this->template->append_metadata('<!--[if IE 6]><link rel="stylesheet" type="text/css" href="' . $this->config->item('base_url') . 'assets/css/cross_browser/ie6.css" media="screen" /><![endif]-->');
        $this->template->append_metadata('<!--[if IE 7]><link rel="stylesheet" type="text/css" href="' . $this->config->item('base_url') . 'assets/css/cross_browser/ie7.css" media="screen" /><![endif]-->');
        $this->template->append_metadata('<!--[if IE 8]><link rel="stylesheet" type="text/css" href="' . $this->config->item('base_url') . 'assets/css/cross_browser/ie8.css" media="screen" /><![endif]-->');
        $this->template->append_metadata('<!--[if IE 9]><link rel="stylesheet" type="text/css" href="' . $this->config->item('base_url') . 'assets/css/cross_browser/ie9.css" media="screen" /><![endif]-->');
    }
    
    /**
     * Set Javascript Meta
     */
    private function set_javascript()
    {
    		/* HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
    		WARNING: Respond.js doesn't work if you view the page via file:// */
    		
    		$this->template->append_metadata('<!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->');
    	
    		$this->assets_js = array_merge($this->assets_js, $this->extra_js);
    		
        if (count($this->assets_js) > 0)
        {
            foreach($this->assets_js as $asset)
                if (stristr($asset, 'http') === FALSE)
                    $this->template->append_metadata('<script type="text/javascript" src="' . $this->config->item('base_url') . 'assets/' . $asset . '"></script>');
                else
                    $this->template->append_metadata('<script type="text/javascript" src="' . $asset . '"></script>');
        }
        
        $this->template->append_metadata('<script type="text/javascript" src="http://arrow.scrolltotop.com/arrow21.js"></script>');
    		$this->template->append_metadata('<noscript>Not seeing a <a href="http://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more info.</noscript>');

        $this->template->append_metadata('<!--[if lt IE 9]><script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->');
    }

    /**
     * Locks in controller and/or methods
     */
    public function lock_in()
    {
        if ( ! $this->ion_auth->logged_in())
        {
            $this->session->set_flashdata('app_error', 'Please log in first.');
            redirect('login');
        }
    }

    /**
     * Make sure user is admin
     */
    public function admins_only()
    {
        // Make sure user is logged in
        if ( ! $this->ion_auth->logged_in())
            redirect('admin/login');

        if ( ! $this->ion_auth->in_group('admin'))
        {
            $this->session->set_flashdata('app_error', 'Please log in first.');
            redirect('dashboard');
        }
    }

    /**
     * Renders page
     */
    public function render_page($page, $data = array())
    {
      
      echo "<script language='javascript'>var base_url ='" . site_url() . "'; </script>";
    // Renders the whole page
    $this->template
        ->set_metadata('keywords', $this->page_meta_keywords)
        ->set_metadata('description', $this->page_meta_description)
        ->set_metadata('author', $this->page_meta_author)
        ->title($this->page_title, $this->site_title);

    $this->set_styles();
    $this->set_javascript();
    $this->prepare_base_javascript();
		
    $this->userdata = array(
      'snum'					  => $this->session->userdata("snum"),
      'username'     => $this->session->userdata("username"),
      'email'        => $this->session->userdata("email"),
      'nickname'			=> $this->session->userdata("nickname")
    );
		
    if($this->userdata['snum'] == '') {
      $this->bLogin = false;
      echo "<script language='javascript'>var bLogin = false; </script>";
    } else {
      $this->bLogin = true;
      echo "<script language='javascript'>var bLogin = true; </script>";
    }

    // Set global template vars
    $this->template
    ->set('current_section', $this->current_section)
    ->set('user_logged_in', $this->ion_auth->logged_in())
    ->set('show_searchbar', $this->show_searchbar)
    ->set('body_class', implode(' ', $this->body_class));
        
    $this->template
        ->set_partial('flash_messages', 'partials/flash_messages')
        ->set_partial('header', 'partials/header')
        ->set_partial('asider', 'partials/asider')
        ->set_partial('footer', 'partials/footer');

    // Renders the main layout
    $this->template->build($page, $data);
    }
}
