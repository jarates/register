<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('other_model','other');
		$this->load->model('register_model','reg');
		$this->load->model('learning_model','learning');
		$this->load->model('education_model','education');
		$this->load->model('majoring_model','majoring');
		$this->load->model('faculty_model','faculty');
		$this->load->model('period_model','period');
	}

	public function ajax_select_education(){
		if(!empty($this->input->post('learning_id'))){
			$learning_id = $this->input->post('learning_id');
			$education = $this->education->get_education_byLearning($learning_id);
			$data = [];
			foreach ($education->result() as $key => $value) {
				$data[] = [
                    'education_id' => $value->education_id,
                    'education_name' => $value->education_name
				];
			}
			$jdata = ['data' => $data];
			echo json_encode($jdata);
		}
	}

	public function ajax_select_faculty(){
		if(!empty($this->input->post('education_id'))){
			$education_id = $this->input->post('education_id');
			$faculty = $this->faculty->get_faculty_byEducation($education_id);
			$data = [];
			foreach ($faculty->result() as $key => $value) {
				$data[] = [
                    'faculty_id' => $value->faculty_id,
                    'faculty_name' => $value->faculty_name
				];
			}
			$jdata = ['data' => $data];
			echo json_encode($jdata);
		}
	}

	public function ajax_select_majoring(){
		if(!empty($this->input->post('faculty_id'))){
			$faculty_id = $this->input->post('faculty_id');
			$majoring = $this->majoring->get_majoring_byFaculty($faculty_id);
			$data = [];
			foreach ($majoring->result() as $key => $value) {
				$data[] = [
                    'majoring_id' => $value->majoring_id,
                    'majoring_name' => $value->majoring_name
				];
			}
			$jdata = ['data' => $data];
			echo json_encode($jdata);
		}
	}

	public function ajax_select_amphures(){
		if(!empty($this->input->post('province_id'))){
			$province_id = $this->input->post('province_id');
			$am = $this->other->get_amphures_by_province($province_id);
			$data = [];
			foreach ($am->result() as $key => $value) {
				$data[] = [
                    'amphure_id' => $value->id,
                    'name_th' => $value->name_th
				];
			}
			$jdata = ['data' => $data];
			echo json_encode($jdata);
		}
	}

	public function ajax_select_district(){
		if(!empty($this->input->post('amphure_id'))){
			$amphure_id = $this->input->post('amphure_id');
			$districts = $this->other->get_districts_by_amphure($amphure_id);
			$data = [];
			foreach ($districts->result() as $key => $value) {
				$data[] = [
                    'districts_id' => $value->id,
                    'name_th' => $value->name_th,
                    'zip_code' => $value->zip_code
				];
			}
			$jdata = ['data' => $data];
			echo json_encode($jdata);
		}
	}

	public function save_register(){
		if(!empty($this->input->post())){
			$status = 'error';
			$msg = 'error';

			$period_online = $this->period->get_period_Active();
			$period_online = $period_online->result();
			$period_id = $period_online[0]->period_id;

			$reg_date_create = date_now();
			$reg_code = $this->input->post('reg_code');
			$reg_name_prefix = $this->input->post('reg_name_prefix');
			$reg_fname = $this->input->post('reg_fname');
			$reg_lname = $this->input->post('reg_lname');
			$reg_gender = $this->input->post('reg_gender');
			$reg_race = $this->input->post('reg_race');
			$reg_nationality = $this->input->post('reg_nationality');
			$reg_religion = $this->input->post('reg_religion');
			$reg_birthday = $this->input->post('reg_birthday');

			$reg_birthday = explode('/', $reg_birthday);
			$day = $reg_birthday[0];
			$month = $reg_birthday[1];
			$year = $reg_birthday[2];
			$reg_birthday = $year.'-'.$month.'-'.$day;

			$reg_addr_number = $this->input->post('reg_addr_number');
			$reg_addr_village = $this->input->post('reg_addr_village');
			$reg_addr_moo = $this->input->post('reg_addr_moo');
			$reg_addr_tumbon = $this->input->post('reg_addr_tumbon');
			$reg_addr_district = $this->input->post('reg_addr_district');
			$reg_addr_province = $this->input->post('reg_addr_province');
			$reg_addr_zipcode = $this->input->post('reg_addr_zipcode');
			$reg_tel = $this->input->post('reg_tel');
			$reg_name_father = $this->input->post('reg_name_father');
			$reg_age_father = $this->input->post('reg_age_father');
			$reg_career_father = $this->input->post('reg_career_father');
			$reg_office_father = $this->input->post('reg_office_father');
			$reg_tel_father = $this->input->post('reg_tel_father');
			$reg_name_mother = $this->input->post('reg_name_mother');
			$reg_age_mother = $this->input->post('reg_age_mother');
			$reg_career_mother = $this->input->post('reg_career_mother');
			$reg_office_mother = $this->input->post('reg_office_mother');
			$reg_tel_mother = $this->input->post('reg_tel_mother');
			$reg_from_school = $this->input->post('reg_from_school');
			$reg_from_school_district = $this->input->post('reg_from_school_district');
			$reg_from_school_province = $this->input->post('reg_from_school_province');
			$reg_from_grade = $this->input->post('reg_from_grade');
			$reg_programe = $this->input->post('reg_programe');
			$reg_status = 0;
			$reg_datetime = datetime_now();
			$learning_id = $this->input->post('learning_id');
			$education_id = $this->input->post('education_id');
			$faculty_id = $this->input->post('faculty_id');
			$majoring_id = $this->input->post('majoring_id');

			$data = [
				'period_id' => $period_id,
				'reg_date_create' => $reg_date_create,
				'reg_code' => str_replace('-', '', $reg_code),
				'reg_name_prefix' => $reg_name_prefix,
				'reg_fname' => $reg_fname,
				'reg_lname' => $reg_lname,
				'reg_gender' => $reg_gender,
				'reg_race' => $reg_race,
				'reg_nationality' => $reg_nationality,
				'reg_religion' => $reg_religion,
				'reg_birthday' => $reg_birthday,
				'reg_addr_number' => $reg_addr_number,
				'reg_addr_village' => $reg_addr_village,
				'reg_addr_moo' => $reg_addr_moo,
				'reg_addr_tumbon' => $reg_addr_tumbon,
				'reg_addr_district' => $reg_addr_district,
				'reg_addr_province' => $reg_addr_province,
				'reg_addr_zipcode' => $reg_addr_zipcode,
				'reg_tel' => $reg_tel,
				'reg_name_father' => $reg_name_father,
				'reg_age_father' => $reg_age_father,
				'reg_career_father' => $reg_career_father,
				'reg_office_father' => $reg_office_father,
				'reg_tel_father' => $reg_tel_father,
				'reg_name_mother' => $reg_name_mother,
				'reg_age_mother' => $reg_age_mother,
				'reg_career_mother' => $reg_career_mother,
				'reg_office_mother' => $reg_office_mother,
				'reg_tel_mother' => $reg_tel_mother,
				'reg_from_school' => $reg_from_school,
				'reg_from_school_district' => $reg_from_school_district,
				'reg_from_school_province' => $reg_from_school_province,
				'reg_from_grade' => $reg_from_grade,
				'reg_programe' => $reg_programe,
				'reg_status' => $reg_status,
				'reg_datetime' => $reg_datetime,
				'learning_id' => $learning_id,
				'education_id' => $education_id,
				'faculty_id' => $faculty_id,
				'majoring_id' => $majoring_id
			];

			$chk_code_reg = $this->reg->check_code_register(str_replace('-', '', $reg_code));
			if($chk_code_reg <= 0){

				$this->reg->insert_register($data);
				$status = 'success';
				$msg = 'เลขประจำตัวประชาชน "'.$reg_code.'" ได้สมัครเรียนเรียบร้อยแล้ว';

			}else if($chk_code_reg > 0){

				$status = 'error';
				$msg = 'เลขประจำตัวประชาชน "'.$reg_code.'" ไม่สามารถสมัครเรียนได้ กรุณาลองใหม่อีกครั้ง';

			}

			$jdata = ['status' => $status, 'msg' => $msg];
			echo json_encode($jdata);
		}
	}

	public function search_print_register(){
		if(!empty($this->input->post())){
			$code = $this->input->post('code');
			$reg = $this->reg->search_print_register($code);
			$data = [];
			foreach ($reg['rs'] as $key => $value) {

				$fee = 0.00;
				if($value->reg_level == 1){
					$fee = $value->period_fee1;
				}else if($value->reg_level == 4){
					$fee = $value->period_fee4;
				}

				$status = status_register($value->reg_status);
				if($value->reg_status == 0){
					if($fee > 0){
						$status = 'ยังไม่ชำระค่าสมัคร';
					}
				}

				$data[] = [
					'id' => $value->reg_id,
					'majoring_name' => $value->majoring_name,
					'learning_name' => $value->learning_name,
					'faculty_name' => $value->faculty_name,
					'education_name' => $value->education_name,
					'date_create' => date("d/m/Y", strtotime($value->reg_date_create)),
					'code' => $value->reg_code,
					'fullname' => $value->reg_name_prefix.' '.$value->reg_fname.' '.$value->reg_lname,
					'status' => $status,
					'url_print' => site_url('report')
				];
			}
			$jdata = ['data' => $data];
			echo json_encode($jdata);
		}
	}

}