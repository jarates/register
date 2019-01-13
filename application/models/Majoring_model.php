<?php
Class Majoring_model extends CI_Model{

	public function get_majoring_byFaculty($faculty_id){
		return $this->db->where('faculty_id',$faculty_id)->get('master_majoring');
	}

	public function insert_majoring($data){
		$this->db->insert('master_majoring', $data);
	}

	public function delete_majoring_byFaculty($faculty_id){
		$this->db->where('faculty_id',$faculty_id)->delete('master_majoring');
	}

}