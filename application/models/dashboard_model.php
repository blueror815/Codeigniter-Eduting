<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

	public $result_data = array();
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		

	}

	public function get_random_videos($current_page, $clips_per_page) {
		$cate = 'c';
		
		$query = $this->db->query("SELECT 'MOV' as mtype, data_type, file_name as mov_url, embed, upload_type, upload_no as movie_code, 1 as code2, title, viewcount,
			(SELECT COUNT(*) FROM upload_comment cm WHERE cm.kind = '" . $cate  . "' AND cm.upload_no = up.upload_no ) AS count_comment,
			(SELECT IFNULL(AVG(rate),0) FROM upload_comment cm WHERE cm.kind = 'r' AND cm.upload_no = up.upload_no ) AS avr_rate,
			(SELECT IFNULL(de.detail_name, '') FROM college cg, detail_code de WHERE cg.college_code = up.college_code AND de.detail_code = cg.college_type AND de.master_code='A001') as college_type_name, 
			(SELECT IFNULL(cg.college_name, '') FROM college cg WHERE cg.college_code = up.college_code) as college_name, 
			(SELECT IFNULL(cg.college_type, '') FROM college cg WHERE cg.college_code = up.college_code) as college_type, 
			(SELECT IFNULL(cg.college_desc, '') FROM college cg WHERE cg.college_code = up.college_code) as college_desc, 
			(SELECT IFNULL(cg.college_code, '') FROM college cg WHERE cg.college_code = up.college_code) as college_code 
			FROM upload up ORDER BY RAND() LIMIT " . $current_page * $clips_per_page . ", " . $clips_per_page);
		$result = $query->result_array();
		
		return $result;
	}
	
	public function get_clips($current_page, $clips_per_page, $search_type, $detail_code, $search_word) {
		if($search_type == 'c') {
			$col = 'college_code';
			$code = $detail_code;
			
			if(substr_count($detail_code,'b-')>0) {
				$code=str_replace('b-','', $detail_code);
				$col = 'school_code';
			}
		} elseif ($search_type == 'j') {
			if(substr_count($detail_code,'j-') > 0) {
				$code = str_replace('j-','', $detail_code);
				$col = 'job_code';
			} elseif(substr_count($detail_code,'m-') > 0) {
				$code = str_replace('m-','', $detail_code);
				$col = 'major_code';
			} else {
				$code = $detail_code;
				$col = 'college_code';
			}
		} elseif ($search_type == 'p') {
			//something
		} else {
			$code = $detail_code;
			$col = 'college_code';
		}
		
		if($detail_code) {

			$query = $this->db->query("SELECT 'MOV' as mtype , data_type , file_name as mov_url, embed, upload_type , upload_no as movie_code, 1 as code2, title, viewcount, 
				(SELECT COUNT(*) FROM upload_comment cm WHERE cm.kind = 'c' AND cm.upload_no = up.upload_no ) AS count_comment, 
				(SELECT IFNULL(AVG(rate),0) FROM upload_comment cm WHERE cm.kind = 'r' AND cm.upload_no = up.upload_no ) AS avr_rate, 
				(SELECT IFNULL(de.detail_name, '') FROM college cg, detail_code de WHERE cg.college_code = up.college_code AND de.detail_code = cg.college_type AND de.master_code='A001') as college_type_name, 
				(SELECT IFNULL(cg.college_name, '') FROM college cg WHERE cg.college_code = up.college_code) as college_name, 
				(SELECT IFNULL(cg.college_type, '') FROM college cg WHERE cg.college_code = up.college_code) as college_type, 
				(SELECT IFNULL(cg.college_desc, '') FROM college cg WHERE cg.college_code = up.college_code) as college_desc, 
				(SELECT IFNULL(cg.college_code, '') FROM college cg WHERE cg.college_code = up.college_code) as college_code 
				FROM upload up WHERE  up." . $col . " = '" . $code . "'
				LIMIT " . $current_page * $clips_per_page . ", " . $clips_per_page);		
				
		} else {
			if($search_word) {
				$query = $this->db->query("SELECT 'MOV' as mtype , data_type , file_name as mov_url, embed, upload_type , upload_no as movie_code, 1 as code2, title, viewcount, 
					(SELECT COUNT(*) FROM upload_comment cm WHERE cm.kind = 'c' AND cm.upload_no = up.upload_no ) AS count_comment, 
					(SELECT IFNULL(AVG(rate),0) FROM upload_comment cm WHERE cm.kind = 'r' AND cm.upload_no = up.upload_no ) AS avr_rate, 
					(SELECT IFNULL(de.detail_name, '') FROM college cg, detail_code de WHERE cg.college_code = up.college_code AND de.detail_code = cg.college_type AND de.master_code='A001') as college_type_name, 
					(SELECT IFNULL(cg.college_name, '') FROM college cg WHERE cg.college_code = up.college_code) as college_name, 
					(SELECT IFNULL(cg.college_type, '') FROM college cg WHERE cg.college_code = up.college_code) as college_type, 
					(SELECT IFNULL(cg.college_desc, '') FROM college cg WHERE cg.college_code = up.college_code) as college_desc, 
					(SELECT IFNULL(cg.college_code, '') FROM college cg WHERE cg.college_code = up.college_code) as college_code 
					FROM upload up WHERE (up.title like '%$search_word%') OR up.upload_no in( SELECT t.upload_no FROM upload_tag t WHERE t.tag like '%$search_word%') 
					LIMIT " . $current_page * $clips_per_page . ", " . $clips_per_page);
					
			} else {
				$query = $this->db->query("SELECT 'MOV' as mtype , data_type , file_name as mov_url, embed, upload_type , upload_no as movie_code, 1 as code2, title, viewcount, 
					(SELECT COUNT(*) FROM upload_comment cm WHERE cm.kind = 'c' AND cm.upload_no = up.upload_no ) AS count_comment, 
					(SELECT IFNULL(AVG(rate),0) FROM upload_comment cm WHERE cm.kind = 'r' AND cm.upload_no = up.upload_no ) AS avr_rate, 
					(SELECT IFNULL(de.detail_name, '') FROM college cg, detail_code de WHERE cg.college_code = up.college_code AND de.detail_code = cg.college_type AND de.master_code='A001') as college_type_name, 
					(SELECT IFNULL(cg.college_name, '') FROM college cg WHERE cg.college_code = up.college_code) as college_name, 
					(SELECT IFNULL(cg.college_type, '') FROM college cg WHERE cg.college_code = up.college_code) as college_type, 
					(SELECT IFNULL(cg.college_desc, '') FROM college cg WHERE cg.college_code = up.college_code) as college_desc, 
					(SELECT IFNULL(cg.college_code, '') FROM college cg WHERE cg.college_code = up.college_code) as college_code 
					FROM upload up
					LIMIT " . $current_page * $clips_per_page . ", " . $clips_per_page);
			}
		
		}
		
		$result = $query->result_array();

		return $result;
	}
  
  public function get_detail($type, $code) {

    $result['data'] = $this->db->query("SELECT * FROM college cg WHERE cg.college_code = $code")->result_array();
    
    $result['type'] = $this->db->query("SELECT dc.detail_name FROM detail_code dc, college cg WHERE cg.college_type = dc.detail_code AND 
    dc.master_code = 'A001' AND cg.college_code = $code")->result_array();
    
    $result['logo'] = $this->db->query("SELECT cf.file_name FROM college_file cf WHERE cf.college_code = $code ORDER BY cf.file_seq")->result_array();
    
    $result['video'] = $this->db->query("SELECT up.upload_no, up.embed, up.title, up.embed FROM upload up WHERE up.college_code = $code")->result_array();
    
    $temp = $result['data']['0'];
    
    $result['total_student'] = $temp['enrollment_ft'] + $temp['enrollment_pt'] + $temp['enrollment_grad'];
    
    $result['undergrad'] = $temp['enrollment_ft'] + $temp['enrollment_pt'];
    
    $result['grad'] = $temp['enrollment_grad'];
    
    $result['i_student'] = $temp['istudent_count'];
    
    if($result['total_student'] != 0) {
      $result['undergra_rate'] = round(100 * $result['undergrad']/$result['total_student']);
      $result['grad_rate'] = round(100 * $result['grad']/$result['total_student']);
      $result['i_rate'] = round(100 * $result['i_student']/$result['total_student']);
    } else {
      $result['undergra_rate'] = 0;
      $result['grad_rate'] = 0;
    }
    
    $result['exams'] = $temp['sat_cmw'];
    
    
    return $result;
  }
}