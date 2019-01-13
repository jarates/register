<?php
Class News_model extends CI_Model{

	public function get_news($limit=null){
		if($limit == null){
			return $this->db->order_by('news.news_id','desc')
						->join('account_login','account_login.login_id = news.login_id')
						->get('news');
		}else{
			return $this->db->order_by('news.news_id','desc')
						->limit($limit)
						->join('account_login','account_login.login_id = news.login_id')
						->get('news');
		}
	}

	public function get_news_byId($news_id){
		return $this->db->where('news_id',$news_id)
						->get('news');
	}

	public function insert_news($data){
		$this->db->insert('news', $data);
	}

	public function update_news($news_id,$data){
		$this->db->where('news_id',$news_id)->update('news', $data);
	}

	public function delete_news($news_id){
		$this->db->where('news_id',$news_id)->delete('news');
	}

}