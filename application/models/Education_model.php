<?php
Class Education_model extends CI_Model{

	public function get_education_byLearning($learning_id){
		return $this->db->where('learning_id',$learning_id)->get('master_education');
	}

	public function get_education_byId($education_id){
		return $this->db->where('education_id',$education_id)->get('master_education');
	}

	public function insert_education($data){
		$this->db->insert('master_education', $data);
	}

	public function update_education($education_id,$data){
		$this->db->where('education_id',$education_id)->update('master_education', $data);
	}

}