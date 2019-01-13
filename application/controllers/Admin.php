<?php
Class Admin extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('other_model','other');
		$this->load->model('majoring_model','majoring');
		$this->load->model('faculty_model','faculty');
		$this->load->model('period_model','period');
		$this->load->model('learning_model','learning');
		$this->load->model('education_model','education');
		$this->load->model('news_model','news');
		$this->load->model('register_model','reg');
		
	}

	public function chk_login(){
		if($this->session->userdata('login_id') == ''){
			redirect(site_url('login/check_logout'));
		}
	}

	public function index(){
		$this->chk_login();
	}

	public function dashboard(){
		$this->chk_login();
	}

	public function news(){
		$this->chk_login();
		$news = $this->news->get_news();
		$data = ['news' => $news->result()];
		$this->load->view('admin/news', $data);
	}

	public function modal_add_news(){
		$this->chk_login();
		$this->load->view('admin/modal/modal_add_news');
	}

	public function modal_edit_news(){
		$this->chk_login();

		if(!empty($this->input->post())){
			$news_id = $this->input->post('news_id');
			$news = $this->news->get_news_byId($news_id);
			$data = ['rs' => $news->result()];
			$this->load->view('admin/modal/modal_edit_news', $data);
		}
	}

	public function save_news(){
		$this->chk_login();
		if(!empty($this->input->post())){

			$action = $this->input->post('action');
			$login_id = $this->session->userdata('login_id');
			$news_topic = $this->input->post('news_topic');
			$news_detail = $this->input->post('news_detail');
			$news_date = date("Y-m-d H:i:s");

			$news_picture = '';
			if($_FILES['news_picture']['name'] != ''){
				$path = 'uploadFile/news/';
				$news_picture = uploadFile('news_picture',$path,'news');
			}else{
				$news_picture = $this->input->post('old_news_picture');
			}

			if($action == 'add'){

				$data = [
					'login_id' => $login_id,
					'news_picture' => $news_picture,
					'news_topic' => $news_topic,
					'news_detail' => $news_detail,
					'news_date' => $news_date
				];
				$this->news->insert_news($data);

			}else if($action == 'edit'){
				$news_id = $this->input->post('news_id');
				$data = [
					'login_id' => $login_id,
					'news_picture' => $news_picture,
					'news_topic' => $news_topic,
					'news_detail' => $news_detail
				];
				$this->news->update_news($news_id,$data);

			}
			redirect(site_url('admin/news'));

		}
	}

	public function delete_news(){
		$this->chk_login();
		if(!empty($this->input->get('news_id'))){
			$news_id = $this->input->get('news_id');
			$this->news->delete_news($news_id);
			redirect(site_url('admin/news'));
		}
	}

	public function setting_info_website(){
		$this->chk_login();
		$page = $this->other->get_pages();
		$info = $this->other->get_info_school();
		$data = [
			'page' => $page,
			'info' => $info
		];
		$this->load->view('admin/setting_info_website', $data);
	}

	public function save_setting_info_website(){
		$this->chk_login();
		if(!empty($this->input->post())){

			if($_FILES['logo_pdf']['name'] != ''){
				$path = 'uploadFile/info-school/';
				$logo_pdf = uploadFile('logo_pdf',$path,'info-school');
			}else{
				$logo_pdf = $this->input->post('old_logo_pdf');
			}

			$school_name = $this->input->post('school_name');
			$website_name = $this->input->post('website_name');
			$website_title = $this->input->post('website_title');
			$website_footer = $this->input->post('website_footer');

			$about = $this->input->post('about');
			$contact = $this->input->post('contact');
			$help = $this->input->post('help');

			$data_info = [
				'logo_pdf' => $logo_pdf,
				'school_name' => $school_name,
				'website_name' => $website_name,
				'website_title' => $website_title,
				'website_footer' => $website_footer
			];
			$this->other->update_info_school(1, $data_info);

			$data_page = [
				'about' => $about,
				'contact' => $contact,
				'help' => $help
			];
			$this->other->update_pages(1, $data_page);

			redirect(site_url('admin/setting_info_website'));

		}
	}

	public function setting_form_register(){
		$this->chk_login();

		$periods = $this->period->get_all_period();
		$period_online = $this->period->get_period_Active();
		$period_online = $period_online->result();
		$period_id = $period_online[0]->period_id;
		$learnings = $this->learning->get_learning_byPeriod($period_id);
		$data = [
			'periods' => $periods->result(),
			'learnings' => $learnings->result(),
			'period_id' => $period_id
		];
		$this->load->view('admin/setting_form_register', $data);
	}

	public function modal_add_period(){
		$this->chk_login();
		$this->load->view('admin/modal/modal_add_period');
	}

	public function modal_edit_period(){
		$this->chk_login();
		$period_id = $this->input->post('period_id');
		$period = $this->period->get_period_byId($period_id);
		$data = ['rs' => $period->result()];
		$this->load->view('admin/modal/modal_edit_period', $data);
	}

	public function save_period(){
		$this->chk_login();
		if(!empty($this->input->post())){

			$action = $this->input->post('action');

			$period_year = $this->input->post('period_year');
			$period_date_begin = $this->input->post('period_date_begin');
			$period_date_end = $this->input->post('period_date_end');
			$period_date_payment_end = $this->input->post('period_date_payment_end');
			$what_has_been = $this->input->post('what_has_been');
			$opening_date = $this->input->post('opening_date');
			$report_date = $this->input->post('report_date');
			$period_status = $this->input->post('period_status');

			if($period_status == 1){
				$this->period->update_all_period(['period_status' => 0]);
			}

			$data = [
				'period_year' => $period_year,
				'period_date_begin' => $period_date_begin,
				'period_date_end' => $period_date_end,
				'period_date_payment_end' => $period_date_payment_end,
				'what_has_been' => $what_has_been,
				'opening_date' => $opening_date,
				'report_date' => $report_date,
				'period_status' => $period_status
			];

			if($action == 'add'){
				$this->period->insert_period($data);
			}else if($action == 'edit'){
				$period_id = $this->input->post('period_id');
				$this->period->update_period($period_id, $data);
			}

			redirect(site_url('admin/setting_form_register'));

		}
	}

	public function modal_add_learning(){
		$this->chk_login();
		if(!empty($this->input->post('period_id'))){
			$data = [
				'period_id' => $this->input->post('period_id')
			];
			$this->load->view('admin/modal/modal_add_learning', $data);
		}
	}

	public function modal_edit_learning(){
		$this->chk_login();
		if(!empty($this->input->post('learning_id'))){
			$learning_id = $this->input->post('learning_id');
			$learning = $this->learning->get_learning_byId($learning_id);

			$data = [
				'rs' => $learning->result()
			];
			$this->load->view('admin/modal/modal_edit_learning', $data);
		}
	}

	public function save_learning(){
		$this->chk_login();
		if(!empty($this->input->post())){
			$action = $this->input->post('action');
			$period_id = $this->input->post('period_id');
			$learning_name = $this->input->post('learning_name');
			$learning_fee = $this->input->post('learning_fee');
			

			$data = [
				'period_id' => $period_id,
				'learning_name' => $learning_name,
				'learning_fee' => $learning_fee
			];

			if($action == 'add'){
				$this->learning->insert_learning($data);
			}else if($action == 'edit'){
				$learning_id = $this->input->post('learning_id');
				$this->learning->update_learning($learning_id,$data);
			}

			redirect(site_url('admin/setting_form_register'));

		}
	}

	public function modal_management_education(){
		$this->chk_login();
		if(!empty($this->input->post())){
			$learning_id = $this->input->post('learning_id');
			$learning = $this->learning->get_learning_byId($learning_id);
			$education = $this->education->get_education_byLearning($learning_id);
			$data = [
				'learning_id' => $learning_id,
				'education' => $education->result(),
				'learning' => $learning->result()
			];
			$this->load->view('admin/modal/modal_management_education', $data);
		}
	}

	public function save_education(){
		$this->chk_login();
		if(!empty($this->input->post())){
			$status = 'error';
			$learning_id = $this->input->post('learning_id');
			$education_name = $this->input->post('education_name');

			if(empty($this->input->post('education_id'))){
				$data = [
					'learning_id' => $learning_id,
					'education_name' => $education_name
				];
				$this->education->insert_education($data);
				$status = 'success';
			}else{
				$education_id = $this->input->post('education_id');
				$data = [
					'education_name' => $education_name
				];
				$this->education->update_education($education_id,$data);
				$status = 'success';
			}

			$jdata = ['status' => $status];
			echo json_encode($jdata);

		}
	}

	public function ajax_management_education(){
		$this->chk_login();
		if(!empty($this->input->post())){
			$learning_id = $this->input->post('learning_id');
			$learning = $this->learning->get_learning_byId($learning_id);
			$education = $this->education->get_education_byLearning($learning_id);
			$data = [
				'learning_id' => $learning_id,
				'education' => $education->result(),
				'learning' => $learning->result()
			];
			$this->load->view('admin/ajax/ajax_management_education', $data);
		}
	}

	public function save_setting_form_register(){

		$this->chk_login();
		if(!empty($this->input->post())){

			foreach ($this->input->post('education_id') as $key => $value) {
				$education_id = $value;
				$education_name = $_POST['education_name'][$key];

				//delete faculty
				$this->faculty->delete_faculty_byEducation($education_id);

				foreach ($this->input->post('faculty_code_'.$key) as $p => $d) {
					$faculty_code = $d;
					$faculty_name = $_POST['faculty_name_'.$key][$p];
					
					$data_faculty = [
						'education_id' => $education_id,
						'faculty_code' => $faculty_code,
						'faculty_name' => $faculty_name
					];

					if($faculty_code != '' && $faculty_name != ''){
						$faculty_id = $this->faculty->insert_faculty($data_faculty);
					}

					// delete majoring
					$this->majoring->delete_majoring_byFaculty($faculty_id);

					for($i = 0; $i < count($_POST['majoring_code_'.$key.'_'.$p]);$i++){
						$majoring_code = $_POST['majoring_code_'.$key.'_'.$p][$i];
						$majoring_name = $_POST['majoring_name_'.$key.'_'.$p][$i];
						$data_majoring = [
							'faculty_id' => $faculty_id,
							'majoring_code' => $majoring_code,
							'majoring_name' => $majoring_name
						];
						if($majoring_code != '' && $majoring_name != ''){
							$this->majoring->insert_majoring($data_majoring);
						}
					}

				}
			}

			redirect(site_url('admin/setting_form_register'));

		}

	}

	public function check_register(){
		$this->chk_login();
		$period_online = $this->period->get_period_Active();
		$period_online = $period_online->result();
		$period_id = $period_online[0]->period_id;
		$register = $this->reg->get_register_byPeriod($period_id);
		$data = [
			'register' => $register->result()
		];
		$this->load->view('admin/check_register', $data);
	}

	public function check_payment(){
		$this->chk_login();
		$period_online = $this->period->get_period_Active();
		$period_online = $period_online->result();
		$period_id = $period_online[0]->period_id;
		$register = $this->reg->get_register_byPeriod($period_id);
		$data = [
			'register' => $register->result()
		];
		$this->load->view('admin/check_payment', $data);
	}

	public function check_confirm(){
		$this->chk_login();
		$period_online = $this->period->get_period_Active();
		$period_online = $period_online->result();
		$period_id = $period_online[0]->period_id;
		$register = $this->reg->get_register_byPeriod($period_id);
		$data = [
			'register' => $register->result()
		];
		$this->load->view('admin/check_confirm', $data);
	}

	public function change_status_register(){
		$this->chk_login();
		if(!empty($this->input->post())){
			$reg_id = $this->input->post('reg_id');
			$reg_status = $this->input->post('reg_status');

			$data = [
				'reg_status' => $reg_status
			];
			$this->reg->update_register_byId($reg_id, $data);
			echo json_encode(['status' => 'success']);

		}
	}

}