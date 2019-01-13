<?php
Class Faculty_model extends CI_Model{

	public function get_faculty_byEducation($education_id){
		return $this->db->where('education_id',$education_id)->get('master_faculty');
	}

	public function insert_faculty($data){
		$this->db->insert('master_faculty', $data);
		return $this->db->insert_id();
	}

	public function delete_faculty_byEducation($education_id){
		$this->db->where('education_id',$education_id)->delete('master_faculty');
	}

}