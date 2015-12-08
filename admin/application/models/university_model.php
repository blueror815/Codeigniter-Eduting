<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  
*
* Author:  
*
* Added Awesomeness: 
*
* Location: 
*
* Created:  
* 
* Description:  
*
* Requirements: 
* 
*/

class University_model extends CI_Model
{

    /**
	 * Holds an array of tables used
	 *
	 * @var string
	 **/
	public $tables = array();


    
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');

		//initialize messages and error
		$this->messages = array();
		$this->errors = array();
		$this->message_start_delimiter = '<p>';
		$this->message_end_delimiter   = '</p>';
		$this->error_start_delimiter   = '<p>';
		$this->error_end_delimiter     = '</p>';

	}
    
	function get_count_university () {
        $query = $this->db->query("SELECT college_code, college_name, ca_org_file_name, soa_org_file_name, 
                    ( SELECT detail_name FROM detail_code WHERE master_code = 'A001' AND detail_code = college_type) college_type_name, 
                    ( SELECT detail_name FROM detail_code WHERE master_code = 'A004' AND detail_code = ranking_code) ranking_code_name, 
                    ( SELECT detail_name FROM detail_code WHERE master_code = 'A023' AND detail_code = gender) gender_name, 
                    ( SELECT detail_name FROM detail_code WHERE master_code = 'A028' AND detail_code = state) state_name, 
                    address, city, web_site, 
                    ( SELECT COUNT(*) FROM college_major WHERE college_code = college.college_code) major_count 
                    FROM college WHERE deleted <> 'Y' ORDER BY college_name");
                    
        if (!$query) {
            return false;
        } else {
            return count($query->result_array());
        }
    }
 
    public function fetch_universities($limit, $start) {
        
        $query = $this->db->query("SELECT college_code, college_name, ca_org_file_name, soa_org_file_name, 
                    ( SELECT detail_name FROM detail_code WHERE master_code = 'A001' AND detail_code = college_type) college_type_name, 
                    ( SELECT detail_name FROM detail_code WHERE master_code = 'A004' AND detail_code = ranking_code) ranking_code_name, 
                    ( SELECT detail_name FROM detail_code WHERE master_code = 'A023' AND detail_code = gender) gender_name, 
                    ( SELECT detail_name FROM detail_code WHERE master_code = 'A028' AND detail_code = state) state_name, 
                    address, city, web_site, 
                    ( SELECT COUNT(*) FROM college_major WHERE college_code = college.college_code) major_count 
                    FROM college WHERE deleted <> 'Y' ORDER BY college_name limit $limit offset $start");
                    
        $result = @$this->db->query($query);
        
        if (!$result) {
            return false;
        }
        if (count($query->result_array()) > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
    function find_by_college_code($college_code) {
        $university = $this->db->get_where("college", array('college_code'=>$college_code));
        if (!$university) return false;
        $university_result = $university->result_array()[0];
        return $university_result;
    }
    
    function searchByArray($search_key = array()) {
        $condition = "college_name like '%".$search_key['q_college_name']."%' AND college_type like '%".$search_key['q_college_type']."%' and gender like '%".$search_key['q_gender']."%' and state like '%".$search_key['q_state']."%'";
        $result = $this->db->get_where('college' , $condition);
        return $result->result_array();        
    }
}
