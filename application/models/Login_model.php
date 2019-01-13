<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login_model extends CI_Model{

	public function check_login($data){
		$return = ['row' => 0, 'rs' => []];
		if(is_array($data)){
			$sql = "SELECT * FROM account_login WHERE username = '".$data['user']."' ";
			$q = $this->db->query($sql);
			$row = $q->num_rows();
			if($row > 0){
				$r = $q->result();
				$hashed_password = $r[0]->password;
				if(password_verify($data['pass'], $hashed_password)) {
					$return = ['row' => $row,'rs' => $r];
				}
			}
		}
		return $return;
	}

}