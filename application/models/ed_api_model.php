<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ed_api_model extends CI_Model
{
	/**
	 * Holds an array of tables used
	 *
	 * @var array
	 **/

	public $result_data = array();
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		

	}

	public function get_college_search_list() {
		$result_data['1'] = $this->get_all_college_search_list();
		
		$result_data['2'] = $this->get_world_college_search_list();
		$result_data['3'] = $this->get_boarding_college_search_list();
		
		$result = $this->get_usa_college_search_list();
		foreach($result as $key => $value) {
			$result_data[$key] = $value;
		}
		
		return $result_data;
	}

	public function get_all_college_search_list() {
		$query = $this->db->query("SELECT college_code as code, college_name as value FROM college WHERE deleted<>'Y' order by value");
		$result = $query->result_array();
		return json_encode($result);
	}
	
	public function get_usa_college_search_list() {
		$college_type = $this->db->query(" SELECT * FROM  detail_code WHERE master_code = 'A001'")->result_array();

		foreach($college_type as $type) {
			$collect_list[$type['detail_code']] = json_encode($this->db->query("SELECT college_code as code, college_name as value FROM   college c WHERE ( college_type='" . $type['detail_code'] . "') AND country='0001' AND deleted<>'Y' ORDER BY value")->result_array());
		}
		return $collect_list;
	}

	
	public function get_world_college_search_list() {
		$query = $this->db->query("SELECT college_name as value,college_code as code FROM college WHERE international_yn='Y' and deleted<>'Y' order by value");
		$result = $query->result_array();
		return json_encode($result);
	}

	public function get_boarding_college_search_list() {
		$query = $this->db->query("SELECT school_name as value, concat('b-',school_code) as code FROM boarding_school order by value");
		$result = $query->result_array();
		return json_encode($result);
	}
	
	public function get_people_search_list() {
		$query = $this->db->query("SELECT nickname as value, s_no as code FROM user order by value");
		$result = $query->result_array();
		return json_encode($result);		
	}
	
	public function get_sub_people_search_list() {
		for($i = 1; $i < 6; $i++) {
			$result[$i] = json_encode($this->db->query("SELECT s.nickname as value, s.s_no as code FROM user s, myprofiles m WHERE m.profile_type= $i AND m.s_no=s.s_no order by value")->result_array());
		}
		return $result;
	}
	
	public function get_job_major_search_list() {
		$query = $this->db->query("SELECT job_name as value, concat('j-',job_code) as code FROM job order by value");
		$result = $query->result_array();
		
		$query = $this->db->query("SELECT major_name as value, concat('m-',major_code) as code FROM major order by value");
		$result1 = $query->result_array();
		
		array_push($result, $result1);
		return json_encode($result);
	}
  
	public function add_favorite($kind, $f_no, $s_no) {
		$query = $this->db->query("SELECT count(*) FROM Favorites WHERE f_kind = '$kind' AND f_no ='$f_no' AND s_no = '$s_no'");
		$result = $query->result_array();
    
    if($result[0]['count(*)'] == "0")
    {
      $sql = " INSERT INTO  Favorites ( s_no, f_kind, f_no, reg_date ) VALUES  ( '$s_no' , '$kind', '$f_no', now() ) ";
      
      $result = $this->db->query($sql);
      
      if($result) $msg = "Successfully added to your favorites.";
    }
    else
    {
      $msg = "This is already added to your favorites!";
    }
    return json_encode($msg);
	}
}
