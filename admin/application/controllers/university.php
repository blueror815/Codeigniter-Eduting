<?php defined('BASEPATH') OR exit('No direct script access allowed');

class University extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('authentication');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('university_model');
        $this->load->library('pagination');

    }

    //redirect if needed, otherwise display the user list
    function index() {
        if (!$this->authentication->logged_in()) {
            //redirect them to the login page
            redirect('login', 'refresh');
        } else {
            
            //get college list
            $this->db->select("*");
            $this->db->from("detail_code");
            $this->db->where(array("master_code" => 'A001'));
            $this->db->order_by("detail_name", "ASC");
            $query = $this->db->get();
            $college_list = $query->result_array();
            
            //get state list
            $this->db->select("*");
            $this->db->from("detail_code");
            $this->db->where(array("master_code" => 'A028'));
            $this->db->order_by("detail_name", "ASC");
            $states = $this->db->get();
            $state_list = $states->result_array();
            
            //get gender list
            $this->db->select("*");
            $this->db->from("detail_code");
            $this->db->where(array("master_code" => 'A023'));
            $this->db->order_by("detail_name", "ASC");
            $genders = $this->db->get();
            $genders_list = $genders->result_array();
            
            $config = array();
            $config["base_url"] = base_url() . "university";
            $config["total_rows"] = $this->university_model->get_count_university();
            $config["per_page"] = 15;
            $config["uri_segment"] = 2;
            
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            
            $result_array = $this->university_model->fetch_universities($config['per_page'], $page);
            $this->data['all_data'] = $result_array;
            $str_links = $this->pagination->create_links();
            $this->data['state_list'] = $state_list;
            $this->data['college_list'] = $college_list;
            $this->data['genders_list'] = $genders_list;
            $this->data['links'] = explode('&nbsp;',$str_links );
            $this->render();
		}
	}
    
    function edit($college_code = 0) {
        if (!$this->authentication->logged_in()) {
            //redirect them to the login page
            redirect('login', 'refresh');
        } else {
            if (intval($college_code) != 0) {
                $this->data['university_data'] = $this->university_model->find_by_college_code(intval($college_code));
                $this->render();
            } else {
                redirect("university");
            }
		}
    }
    
    function search() {
        if (!$this->authentication->logged_in()) {
            //redirect them to the login page
            redirect('login', 'refresh');
        } else {
            $search_result = $this->university_model->searchByArray($this->input->post());
            $this->data['all_data'] = $search_result;
            $this->render();
        }
    }
}
