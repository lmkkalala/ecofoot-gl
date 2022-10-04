<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
	class Pages extends CI_Controller{

		public function __construct(){
	        parent::__construct();
	        $this->load->helper('url');
	        $this->load->helper('form');
	        $this->load->model('DataModel');
	        $this->load->library('session');
	    }

	    public function index(){
	    	redirect(base_url().'pages/view');
	    }

	    public function c_session(){
	    	if ($this->session->userID == '') {
	    		$data['title'] = ucfirst('index');
	    		$this->load->view('MyPanel/header',$data);
		        $this->load->view('MyPanel/index',$data);
		        $this->load->view('MyPanel/footer',$data);
		        return TRUE;
		    }else{
		    	return FALSE;
		    }
	    }

		public function view($page = null)
		{
			if (empty($page)) {
					$page = 'index';
				}
			$data['list_video'] = $this->DataModel->get('video');
			$data['list_photo'] = $this->DataModel->get('photo');
			$data['list_players'] = $this->DataModel->get('players');
			$data['title'] = ucfirst($page);
			$this->load->view('header',$data);
			$this->load->view($page,$data);
			$this->load->view('footer',$data);
		}

		public function player_photo($player_id){
			$photo_player = $this->DataModel->get_player_photo($player_id);
			echo json_encode($photo_player);
		}

		public function player_video($player_id){
			$video_player = $this->DataModel->get_player_video($player_id);
			echo json_encode($video_player);
		}
		public function joueur($id){
			$data['player'] = $this->DataModel->get_where('players',array('id'=>$id));
			$data['photo_player'] = $this->DataModel->get_player_photo($id);
			$data['video_player'] = $this->DataModel->get_player_video($id);
			$data['title'] = ucfirst("Joueurs");
			$this->load->view('header',$data);
			$this->load->view('joueur',$data);
			$this->load->view('footer',$data);
		}

		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url().'pages/view');
		}

		public function panel($page = null)
		{
				$data['title'] = ucfirst($page);
				$data['sms_number'] = count($this->DataModel->get_where('sms_visitors',array('status'=>'0')));

				$data['user'] = count($this->DataModel->get('users'));
				$data['photo'] = count($this->DataModel->get('photo'));
				$data['video'] = count($this->DataModel->get('video'));
				$data['player'] = count($this->DataModel->get('players'));
			$s = $this->c_session();
			
			if ($s == FALSE) {
				if (empty($page)) {
					$page = 'dashboard';
				}

				$this->load->view('MyPanel/header',$data);
				if ($page != 'index' and $page != 'register') {
					$this->load->view('MyPanel/sidebar',$data);
				}
				$this->load->view('MyPanel/'.$page,$data);
				if ($page != 'index' and $page != 'register') {
					$this->load->view('MyPanel/copyright',$data);
				}
				$this->load->view('MyPanel/footer',$data);
			}
		}

	}