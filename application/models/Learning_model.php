<?php
Class Learning_model extends CI_Model{

	public function get_learning_byPeriod($period_id){
		return $this->db->where('master_learning.period_id', $period_id)
						->join('master_period','master_period.period_id = master_learning.period_id')
						->get('master_learning');
	}

	public function get_learning_byId($learning_id){
		return $this->db->where('learning_id', $learning_id)->get('master_learning');
	}

	public function insert_learning($data){
		$this->db->insert('master_learning', $data);
	}

	public function update_learning($learning_id, $data){
		$this->db->where('learning_id', $learning_id)->update('master_learning', $data);
	}

}