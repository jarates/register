<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('login_model','login');
		$this->load->model('other_model','other');
	}

	public function index(){
		$info = $this->other->get_info_school();
		$data = ['info' => $info];
		$this->load->view('authen/login', $data);
	}

	public function check_login(){
		if(!empty($this->input->post())){
			$data = [
				'user' => trim($this->input->post('user')),
				'pass' => $this->input->post('pass'),
			];
			$get_data = $this->login->check_login($data);
			if($get_data['row'] > 0){

				$login_id = $get_data['rs'][0]->login_id;
				$login_name = $get_data['rs'][0]->login_name;
				$login_username = $get_data['rs'][0]->username;
				$login_level = $get_data['rs'][0]->login_level;
				$ses_data = [
					'login_id' => $login_id,
					'login_name' => $login_name,
					'login_username' => $login_username,
					'login_level' => $login_level
				];
				$this->session->set_userdata($ses_data);
				redirect(site_url('admin/setting_info_website'));
			}else{
				redirect(site_url('login'));
			}
		}
	}

	public function check_logout(){
		$ses_data = ['login_id','login_name','login_username','login_level'];
		$this->session->unset_userdata($ses_data);
		redirect(site_url('login'));
	}

	public function pass(){
		$password = 'admin@2';
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		echo $hashed_password;
	}

}