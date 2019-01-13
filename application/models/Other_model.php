<?php
Class Other_model extends CI_Model{

	public function get_geographies(){
		return $this->db->get('geographies');
	}

	public function get_provinces_by_geographies($geography_id){
		return $this->db->where('geography_id',$geography_id)->get('provinces');
	}

	public function get_provinces(){
		return $this->db->get('provinces');
	}

	public function get_province_byId($id){
		return $this->db->where('id', $id)->get('provinces');
	}

	public function get_amphures_by_province($province_id){
		return $this->db->where('province_id', $province_id)->get('amphures');
	}

	public function get_amphures_byId($id){
		return $this->db->where('id', $id)->get('amphures');
	}

	public function get_districts_by_amphure($amphure_id){
		return $this->db->where('amphure_id',$amphure_id)->get('districts');
	}

	public function get_districts_byId($id){
		return $this->db->where('id',$id)->get('districts');
	}

	public function get_programe(){
		return $this->db->get('programe');
	}

	public function get_register_period(){
		return $this->db->get('register_period');
	}

	public function get_register_period_true(){
		$q = $this->db->where('period_active','true')->limit(1)->get('register_period');
		$r = $q->result();
		$period_id = $r[0]->period_id;
		return $period_id;
	}

	public function get_data_period_true(){
		$q = $this->db->where('period_active','true')->limit(1)->get('register_period');
		$r = $q->result();
		return $r;
	}

	public function get_info_school(){
		$q = $this->db->where('id',1)->get('info_school');
		$r = $q->result();
		return [
			'logo_pdf' => $r[0]->logo_pdf,
			'school_name' => $r[0]->school_name,
			'website_name' => $r[0]->website_name,
			'website_title' => $r[0]->website_title,
			'website_footer' => $r[0]->website_footer
		];
	}

	public function get_pages(){
		$q = $this->db->where('page_id',1)->get('pages');
		$r = $q->result();
		return ['about' => $r[0]->about,'contact' => $r[0]->contact,'help' => $r[0]->help];
	}

	public function update_info_school($id, $data){
		$this->db->where('id',$id)->update('info_school',$data);
	}

	public function update_pages($id, $data){
		$this->db->where('page_id',$id)->update('pages',$data);
	}


}