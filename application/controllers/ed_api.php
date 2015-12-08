<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ed_api extends App_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function Get_AutoComplete() {
		
		if($_POST['key']) {
			$key = $_POST['key'];
		}
		
		if(isset($_POST['cate'])) {
			$cate = $_POST['cate'];
		}

		if($key == 'college') {
			$result = $this->Ed_api_model->get_college_search_list();
			$result = $result[$cate];

		} elseif($key == 'people') {
			$result = $this->Ed_api_model->get_sub_people_search_list();
			$result = $result[$cate];
		} else {
			$result = $this->Ed_api_model->get_job_major_search_list();
		}
		
		echo $result;
	}
  
  public function get_college_list() {
    $result = $this->Ed_api_model->get_college_search_list();
    echo json_encode($result);
  }
  
  public function add_vidoe_favorite() {
    $code = $_POST['movie_code'];
    $kind = 1; //video kind value
    $s_no = $this->session->userdata['snum'];
    
    $result = $this->Ed_api_model->add_favorite($kind, $code, $s_no);
    echo $result;
  }
	
  public function add_favorite() {
    $search_type = $_POST['search_type'];
    $detail_code = $_POST['detail_code'];
    $code = $detail_code;
    $s_no = $this->session->userdata['snum'];
    
		if($search_type == 'c') {
			$code = $detail_code;
     $kind = 3;
			
			if(substr_count($detail_code,'b-')>0) {
				$code=str_replace('b-','', $detail_code);
			}
		} elseif ($search_type == 'j') {
			if(substr_count($detail_code,'j-') > 0) {
        
				 $code = str_replace('j-','', $detail_code);
        $kind = 4;
        
			} elseif(substr_count($detail_code,'m-') > 0) {
        
        $code = str_replace('m-','', $detail_code);
        $kind = 5;
			} else {
				$code = $detail_code;
			}
		} elseif ($search_type == 'p') {
			//something
      $kind = 2;
		} else {
			$code = $detail_code;
      $kind = 3;
		}

    $result = $this->Ed_api_model->add_favorite($kind, $code, $s_no);
    echo $result;
  }
  
}