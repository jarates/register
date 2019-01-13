<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Page extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('other_model','other');
		$this->load->model('news_model','news');
		$this->load->model('period_model','period');
		$this->load->model('learning_model','learning');
		$this->load->model('register_model','reg');
	}

	public function home(){
		$news = $this->news->get_news(5);
		$data = ['news' => $news->result()];
		//$this->load->view('page/home');
		$this->load->view('page/news', $data);
	}

	public function news(){
		$news = $this->news->get_news(100);
		$data = ['news' => $news->result()];
		$this->load->view('page/news', $data);
	}

	public function register(){

		$pro = $this->other->get_provinces();
		$programe = $this->other->get_programe();
		$period_online = $this->period->get_period_Active();
		$period_online = $period_online->result();
		$period_id = $period_online[0]->period_id;
		$learnings = $this->learning->get_learning_byPeriod($period_id);
		$data = [
			'pro' => $pro->result(),
			'programe' => $programe->result(),
			'learnings' => $learnings->result(),
			'period_id' => $period_id
		];

		if($period_online[0]->period_status == 1){
			$this->load->view('page/register', $data);
		}

		
	}

	public function print_register(){
		$this->load->view('page/print_register');
	}

	public function print_payment(){
		$this->load->view('page/print_payment');
	}

	public function result_register(){

		$period_online = $this->period->get_period_Active();
		$period_online = $period_online->result();
		$period_id = $period_online[0]->period_id;
		$register = $this->reg->get_register_byPeriod($period_id);
		$data = [
			'register' => $register->result()
		];

		$this->load->view('page/result_register', $data);
	}

	public function print_card_exam(){
		$this->load->view('page/print_card_exam');
	}

	public function about(){
		$page = $this->other->get_pages();
		$data = ['about' => $page['about']];
		$this->load->view('page/about', $data);
	}

	public function help(){
		$page = $this->other->get_pages();
		$data = ['help' => $page['help']];
		$this->load->view('page/help', $data);
	}

	public function contact(){
		$page = $this->other->get_pages();
		$data = ['contact' => $page['contact']];
		$this->load->view('page/contact', $data);
	}

	public function modal_show_print_student_card(){

		if(!empty($this->input->post())){

			$reg_id = $this->input->post('reg_id');
			$period_online = $this->period->get_period_Active();
			$period_online = $period_online->result();

			$data = [
				'reg_id' => $reg_id,
				'what_has_been' => $period_online[0]->what_has_been,
				'opening_date' => $period_online[0]->opening_date,
				'report_date' => $period_online[0]->report_date
			];

			$this->load->view('page/modal/modal_show_print_student_card', $data);

		}
		
	}

}