<?php 
	class News_model extends CI_Model
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

		public function Insert($id){
			$condition = $this->db->set('id',$id);
			$query = $this->db->update('news',$condition);
			return $query->row_array();
	}
?>