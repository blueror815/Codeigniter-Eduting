<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends App_Controller
{
	public $video_lists = array();
	
	public $current_page = 0;
	
	public $clips_per_page = 6;
	
	public $search_type = "c"; //swich of college(c), people(p), major&job(j)
	
	public $detail_code = ""; // code value for college, people, major and job
	
	public $search_word = "";
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model("Dashboard_model");

		$this->body_class = array('sidebar-mini', 'dashboard_page');

		$this->page_title = 'Dashboard';

		$this->extra_css = array('dashboard/style.css');

		$this->extra_js = array('dashboard/script.js');

		$this->current_section = 'dashboard';
	}
	


	public function index()
	{

		$this->current_page = 0;
		
//		$_POST['search_type'] = 'c';
//		$_POST['search_word'] = 'a';
//		$_POST['people_word'] = 'a';
//		$_POST['job_word'] = 'a';
//		$_POST['detail_code'] = '1168';
		
//		echo "cate :" . $_POST['search_type'] . " - word :" . $_POST['search_word'] . " - code :" . $_POST['detail_code'];

    $data['search_type'] = "";
    $data['detail_code'] = "";
    $data['search_word'] = "";
		
		$data['pages'] = $this->current_page;
    
    $data['colleges'] = $this->Ed_api_model->get_college_search_list();
		
		if(!isset($_POST['search_type']))  { //First Dashboard Page
      $this->search_type = 'c';

      $data['videos'] = $this->get_random_videos($this->current_page);
      $data['bRand'] = 't';
      $data['search_type'] = $this->search_type;

      if(count($data['videos']) < 6) { $data['no_more'] = true; }
      else { $data['no_more'] = false; }

      $this->render_page('dashboard/index', $data);

      return;
      
		} else { //search function
    
			$this->search_type = $_POST['search_type'];
      
		}
		
		$this->detail_code = $_POST['detail_code'];
		
		if($this->search_type == 'c') { //college search
    
      $this->search_word = $_POST['search_word'];
      
		} elseif ($this->search_type == 'p') { //people search
    
      $this->search_word = $_POST['people_word'];

      $data['humen'] = $this->get_peoples();
      $data['bRand'] = 'f';

      $data['search_type'] = $this->search_type;
      $data['detail_code'] = $this->detail_code;
      $data['search_word'] = $this->search_word;
      
      if(count($data['videos']) < 6) { $data['no_more'] = true; }
      else { $data['no_more'] = false; }

      $this->render_page('dashboard/people', $data);
      return;
		} else { //job and major search
      $this->search_word = $_POST['job_word'];
		}
    
    $data['search_type'] = $this->search_type;
    $data['detail_code'] = $this->detail_code;
    $data['search_word'] = $this->search_word;

    $data['videos'] = $this->get_clips($this->current_page);
    
    if(count($data['videos']) < 6) { $data['no_more'] = true; }
    else { $data['no_more'] = false; }
    
    $data['bRand'] = 'f';
    $this->render_page('dashboard/index', $data);

    return;
}
	
	
	// api for load-more-function
	public function get_videos() {
		if(isset($_POST['page_no'])) {	$page_no = $_POST['page_no']; } else {$page_no = 0;}
	
		if($_POST['rand'] == 't')  {
			$result = $this->get_random_videos($page_no);
		} else {  
			$result = $this->Dashboard_model->get_clips($page_no, $this->clips_per_page, $_POST['cate'], $_POST['code'], $_POST['word']);
		}

		echo json_encode($result);
	}
	
	public function get_random_videos($page_no) {

		if(isset($_POST['page_no'])) {	$page_no = $_POST['page_no']; } else {$page_no = 0;}
		return $this->Dashboard_model->get_random_videos($page_no, $this->clips_per_page);
	}
	
	public function get_clips($page_no) {
		if(isset($_POST['page_no'])) {	$page_no = $_POST['page_no']; } else {$page_no = 0;}
		return $this->Dashboard_model->get_clips($page_no, $this->clips_per_page, $this->search_type, $this->detail_code, $this->search_word);
	}
	
	public function get_peoples() {
		//$result = $this->Dashboard_model->get_videos($this->current_page, $this->clips_per_page, $this->search_type, $this->detail_code, $this->search_word);
		return 0;
	}
  
  
  public function search() { //nav search function
      if ($this->uri->segment(3) === FALSE)
      {
          $code = 0;
      }
      else
      {
          $code = $this->uri->segment(3);
      }
      
      $data['pages'] = 0;

      $data['search_type'] = "c";
      $data['detail_code'] = $code;
      $data['search_word'] = "";
            
      $data['colleges'] = $this->Ed_api_model->get_college_search_list();
      
      $this->search_type = 'c';
      $this->detail_code = $code;
      $this->search_word = "";

      $data['videos'] = $this->get_clips($this->current_page);
      
      if(count($data['videos']) < 6) { $data['no_more'] = true; }
      else { $data['no_more'] = false; }
      
      $data['bRand'] = 'f';
      $this->render_page('dashboard/index', $data);
      return;
  }
  
  public function detail() {
      if ($this->uri->segment(3) === FALSE)
      {
          $type = "c";
      }
      else
      {
          $type = $this->uri->segment(3);
      }
      
      if ($this->uri->segment(4) === FALSE)
      {
          $code = 0;
      }
      else
      {
          $code = $this->uri->segment(4);
      }
      
      $data = $this->Dashboard_model->get_detail($type, $code);

      $this->render_page('dashboard/detail', $data);
      return;
  }
	
}