<?php
Class Period_model extends CI_Model{

	public function get_all_period(){
		return $this->db->order_by('period_id','desc')->get('master_period');
	}

	public function get_period_byId($period_id){
		return $this->db->where('period_id',$period_id)->get('master_period');
	}

	public function get_period_byYear($period_year){
		return $this->db->where('period_year',$period_year)->get('master_period');
	}

	public function get_period_Active(){
		return $this->db->where('period_status',1)->limit(1)->get('master_period');
	}

	public function insert_period($data){
		$this->db->insert('master_period', $data);
	}

	public function update_period($period_id, $data){
		$this->db->where('period_id',$period_id)->update('master_period', $data);
	}

	public function update_all_period($data){
		$this->db->update('master_period', $data);
	}

}