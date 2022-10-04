<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
	class DataModel extends CI_Model
	{
		
		function __construct()
		{
			$this->load->database();
		}

		public function get_news($slug = FALSE){
			if ($slug == FALSE) {
				$query = $this->db->get('news');
				return $query->result_array();
			}
			$query = $this->db->get_where('news',array('slug'=>$slug));
			return $query->row_array();
		}

		public function update($table,$data = array(),$condition = array()){
			return $this->db->update($table,$data,$condition);
		}

		public function insert($table,$data = array()){
			return $this->db->insert($table,$data);
		}

		public function delete($table,$where = array()){
			return $this->db->delete($table,$where);
		}

		public function get($table, $page = null){
			$this->db->order_by('id','DESC');
			if($table == 'players' and $page == null){
				$this->db->where(array('display_status'=>'1'));
			}
			return $this->db->get($table)->result();
		}

		public function get_player_photo($id){
			$this->db->join('players','players.id = player_photo.player_id');
			$this->db->join('photo','photo.id = player_photo.photo_id');
			$this->db->where(array('player_id'=>$id));
			return $this->db->get('player_photo')->result();
		}

		public function get_player_video($id){
			$this->db->join('players','players.id = player_video.player_id');
			$this->db->join('video','video.id = player_video.video_id');
			$this->db->where(array('player_id'=>$id));
			return $this->db->get('player_video')->result();
		}

		public function get_where($table,$condition = array()){
			return $this->db->get_where($table,$condition)->result();
		}
	}