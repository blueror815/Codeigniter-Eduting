<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
    
    public $flash_message;
    
    public $error_message;
    
    function __construct() {
        parent::__construct();
        $this->load->library('authentication');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library("pagination");
    }

    //redirect if needed, otherwise display the user list
    function index() {
        if (!$this->authentication->logged_in()) {
            //redirect them to the login page
            redirect('login', 'refresh');
        } else {
            $config = array();
            $config["base_url"] = base_url() . "user";
            $config["total_rows"] = $this->user_model->record_count();
            $config["per_page"] = 15;
            $config["uri_segment"] = 2;
            
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            
            $result_array = $this->user_model->fetch_users($config['per_page'], $page);
            $this->data['all_data'] = $result_array;
            $str_links = $this->pagination->create_links();
            $this->data['links'] = explode('&nbsp;',$str_links );
            $this->data['flash'] = $this->flash_message;
            $this->render();
        }
    }
    
    function edit($s_no = "") {
        if (!$this->authentication->logged_in()) {
            //redirect them to the login page
            redirect('login', 'refresh');
        } else {
            $result = $this->user_model->find_by_s_no($s_no);
            
            //get country list
            $this->db->select("*");
            $this->db->from("detail_code");
            $this->db->where(array("master_code" => 'A041'));
            $this->db->order_by("detail_name", "ASC");
            $query = $this->db->get();
            $nation_list = $query->result_array();
            
            //get state list original get "detail_code, short_name, detail_name"

            $this->db->select("*");
            $this->db->from("detail_code");
            $this->db->where(array("master_code" => 'A028', 'use_yn' => 'Y'));
            $this->db->order_by("detail_name", "ASC");
            $query = $this->db->get();
            $state_list = $query->result_array();
            
            
            //get ethnicity list get detail_code, detail_name from detail_code
            
            $this->db->select("*");
            $this->db->from("detail_code");
            $this->db->where(array("master_code" => 'A040'));
            $query = $this->db->get();
            $ethnicity_list = $query->result_array();
            
            if ($result) {
                $this->data['user'] = $result;
                $this->data['nationality_list'] = $nation_list;
                $this->data['state_list'] = $state_list;
                $this->data['ethnicity_list'] = $ethnicity_list;
            } else {
                redirect("user");
            }
            $this->render();
		}
    }
    
    function search($search_key = "") {
        if (!$this->authentication->logged_in()) {
            //redirect them to the login page
            redirect('login', 'refresh');
        } else {
            if ($search_key == "") {
                redirect("user");
            }
            $config = array();
            $config["base_url"] = base_url() . "user/search/".$search_key;
            $config["total_rows"] = $this->user_model->record_count_by_search_key($search_key);
            $config["per_page"] = 15;
            $config["uri_segment"] = 4;
            
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $result_array = $this->user_model->fetch_users_by_search_key($config['per_page'], $page, $search_key);
            $this->data['all_data'] = $result_array;
            $str_links = $this->pagination->create_links();
            $this->data['links'] = explode('&nbsp;',$str_links );
            $this->render();
		}
    }
    
    function save() {
        $s_no = $this->input->post("s_no");
        $data = array(
               'nickname' => $this->input->post("nickname"),
               'gender' => $this->input->post("gender"),
               'file_name' => $this->input->post("file"),
               'birthday_month' => $this->input->post("month"),
               'birthday_day' => $this->input->post("day"),
               'birthday_year' => $this->input->post("year"),
               'nationality' => $this->input->post("national"),
               'addr1' => $this->input->post("address"),
               'addr2' => $this->input->post("city"),
               'addr3' => $this->input->post("state"),
               'country' => $this->input->post("country"),
               'graduation_year' => $this->input->post("graduation"),
               'area_of_interests' => $this->input->post("interest"),
               'occupation_of_interests' => $this->input->post("interest1"),
               'religion' => $this->input->post("religion"),
               'language' => $this->input->post("language"),
               'currently_school' => $this->input->post("school"),
               'legacy' => $this->input->post("legacy"),
               'finance' => $this->input->post("finance"),
               'user_type' => $this->input->post("user_type"),
               'major' => $this->input->post("major"),
               'minor' => $this->input->post("minor"),
               'ethnicity' => $this->input->post("ethnicity")
            );


        if ($this->user_model->update_user($data, $s_no)) {
            $this->setFlashdata("Successfully updated.");
            redirect("user");
        } else {
            redirect("user/edit".$s_no);
        }
    }
    
    public function setFlashdata($flash_message) {
        $this->flash_message = $flash_message;
    }
    
}
