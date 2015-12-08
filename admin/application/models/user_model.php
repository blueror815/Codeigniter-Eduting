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

class User_model extends CI_Model
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
	}
    
    public function record_count() {
        return $this->db->count_all("user");
    }
 
    public function fetch_users($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("user");
        if (!$query) {
            return false;
        }
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
    
    public function record_count_by_search_key($search_key) {
        
        $this->db->like('s_no', $search_key);
        $this->db->or_like('first_name', $search_key); 
        $this->db->or_like('last_name', $search_key);
        $query = $this->db->get('user');
        return count($query->result_array());
    }
 
    public function fetch_users_by_search_key($limit, $start, $search_key) {
        
        $this->db->limit($limit, $start);
        $this->db->like('s_no', $search_key);
        $this->db->or_like('first_name', $search_key); 
        $this->db->or_like('last_name', $search_key);
        $query = $this->db->get("user");
        
        if (!$query) {
            return false;
        }
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
    
    function find_by_s_no($s_no) {
        
        $user = $this->db->get_where("user", array('s_no'=>$s_no));
        if (!$user) {
            return false;
        } else {
            return $user->result_array()[0];
        }
        
    }
    
    function update_user($data, $s_no) {

        $this->db->where('s_no', $s_no);
        if ($this->db->update('user', $data)) {
            return true;
        } else {
            return false;
        }
    }
}
