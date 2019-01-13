<?php
Class Register_model extends CI_Model{

	public function insert_register($data){
		$this->db->insert('register', $data);
	}

	public function check_code_register($reg_code){
		$q = $this->db->where('reg_code',$reg_code)->get('register');
		return $q->num_rows();
	}

	public function search_print_register($code){
		$sql = "SELECT * FROM register INNER JOIN master_period ON register.period_id = master_period.period_id JOIN master_education ON register.education_id = master_education.education_id JOIN master_faculty ON register.faculty_id = master_faculty.faculty_id JOIN master_learning ON register.learning_id = master_learning.learning_id JOIN master_majoring ON register.majoring_id = master_majoring.majoring_id WHERE register.reg_code = '$code' OR register.reg_id = '$code' LIMIT 1 ";
		$q = $this->db->query($sql);
		$row = $q->num_rows();
		$r = $q->result();
		$return = ['row' => $row, 'rs' => $r];
		return $return;
	}

	public function get_register_byPeriod($period_id){
		return $this->db->where('register.period_id',$period_id)
						->join('master_learning','master_learning.learning_id = register.learning_id')
						->join('master_education','master_education.education_id = register.education_id')
						->join('master_faculty','master_faculty.faculty_id = register.faculty_id')
						->join('master_majoring','master_majoring.majoring_id = register.majoring_id')
						->order_by('register.reg_datetime','desc')
						->get('register');
	}

	public function update_register_byId($reg_id, $data){
		$this->db->where('reg_id',$reg_id)->update('register', $data);
	}

}