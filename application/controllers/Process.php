<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('DataModel');
        $this->load->library('session');
    }
    
	public function index()
	{
		$data['list_video'] = $this->DataModel->get('video');
		$data['list_photo'] = $this->DataModel->get('photo');
		$data['list_players'] = $this->DataModel->get('players');
		$data['title'] = ucfirst('index');
		$this->load->view('header',$data);
		$this->load->view('index',$data);
		$this->load->view('footer',$data);
	}

	public function LoginForm(){
		if (isset($_POST)) {
			$c_mail = !empty($_POST['email']);
			$c_password = !empty($_POST['password']);
			if ($c_mail == true and $c_password == true) {
				$email = htmlspecialchars($_POST['email']);
				$password = htmlspecialchars($_POST['password']);
				$row = $this->DataModel->get_where('users',array('email'=>$email));
				if (count($row) > 0) {
					$c_password_verify = password_verify($password, $row[0]->password);
					if ($c_password_verify == true) {
						$data = array(
							'profile'=>$row[0]->profile,
							'userID'=>$row[0]->id,
							'name'=>$row[0]->name,
							'email'=>$row[0]->email,
							'time'=>time()
						);
						$this->session->set_userdata($data);
						echo json_encode(array('status'=>'login','info'=>'Vous allez être rediriger dans quelque seconde.'));
					}else{
						echo json_encode(array('status'=>'fail','info'=>'Veuiller saisir un mot de passe correct.'));
					}
				}else{
					echo json_encode(array('status'=>'fail','info'=>'Une erreur s\'est produit, vous avez saisie un address mail inconnue.'));
				}
			}else{
				echo json_encode(array('status'=>'fail','info'=>'Veuiller remplirer toutes les chants.'));
			}
		}else{
			echo json_encode(array('status'=>'fail','info'=>'Une erreur s\'est produit, veillez reesseyer.'));
		}
	}
	
	var $image_file_type = 'gif|jpg|png|jpeg|jfif';
	var $video_file_type = 'gif|mp4|avi|mkv';

	public function uploadFile($image,$location,$content,$action = null)
	{
		if ($content == 'image') {
			$file_type = $this->image_file_type;
			$max_size = 8000;
			if (filesize(dirname($_FILES[''.$image.'']['name'])) > $max_size) {
				return array('status' => 'fail','info'=>'La taille de l\'image est supperieur a la taille prevue.','file'=>'');
			}

		}elseif($content == 'video'){
			$file_type = $this->video_file_type;
			$max_size = 8000000000;
		}else{
			$file_type = $this->image_file_type;
			$max_size = 8000000;
		}

		if(isset($_FILES[''.$image.'']['name']) and !empty($_FILES[''.$image.'']['name'])){
			if (!file_exists(site_url().$location.$_FILES[''.$image.'']['name'])) {
						$config['log_threshold']		 = '1';
						$config['upload_path']           = $location;
						$config['file_name']  			 = 'ecofoot-pl_'.time().$_FILES[''.$image.'']['name'];
		                $config['allowed_types']         = $file_type;
		                $config['max_size']              = $max_size;
		                $config['max_width']             = 3024;
		                $config['max_height']            = 4032;
		                $config['overwrite']			 = false;
		                $this->load->library('upload',$config);
		                $this->upload->initialize($config);
			        if (!$this->upload->do_upload(''.$image.'')){
		                        $error = strip_tags($this->upload->display_errors());
		                       	return array('status' => 'fail','info' => $error.'');
		                }else{
		                	$upload_data = $this->upload->data();
		                	$profile = $upload_data['file_name'];
		                	return array('status'=>'success','info'=>'success','file'=>$profile);
		                }
			}else{
                return array('status' => 'fail','info'=>'Veuiller renomer le nom de l\'image.','file'=>'');	
			}
		}else{
			if ($action == 'update') {
				return array('status'=>'fail','info'=>'vide','file'=>'');
			}else{
				return array('status' => 'fail','info'=>'Aucune image n\'a été inserer.','file'=>'');
			}
			
		}
	}

	public function addUser(){
		$file = $this->uploadFile('profileuser','img/user','image');
		if ($file['status'] != 'fail') {
			$profile = $file['file'];
		}else{
			echo json_encode(array('status' => 'fail','info'=>$file['info']));
            return;
		}

		if (isset($_POST)) {
			$data = array(
				'profile'=> $profile,
				'name' => htmlspecialchars($_POST['name']), 
				'email'=> htmlspecialchars($_POST['email']),
				'password'=> password_hash('12345', PASSWORD_DEFAULT),
				'date'=> time()
			);
		}
		$return = $this->DataModel->insert('users',$data);
		if ($return == true) {
			echo json_encode(array('status' => 'success','info'=>'Le gestionnaire a été ajouter avec succes.'));
		}else{
			echo json_encode(array('status' => 'fail','info'=>'Echec d\'enregistrement, veuiller reessayer.'));
		}
	}
	public function addPlayer(){
		$file = $this->uploadFile('profileplayer','img','image');
		if ($file['status'] != 'fail') {
			$profile = $file['file'];
		}else{
			echo json_encode(array('status' => 'fail','info'=>$file['info']));
            return;
		}

		if (isset($_POST)) {
			$data = array(
				'profile'=> $profile,
				'age' => htmlspecialchars($_POST['ageplayer']),
				'taille' => htmlspecialchars($_POST['tailleplayer']),
				'name' => htmlspecialchars($_POST['nameplayer']),
				'phone' => htmlspecialchars($_POST['phoneplayer']),
				'email' => htmlspecialchars($_POST['emailplayer']), 
				'description'=> htmlspecialchars($_POST['descriptionplayer']),
				'date'=> time()
			);
		}
		$return = $this->DataModel->insert('players',$data);
		if ($return == true) {
			echo json_encode(array('status' => 'success','info'=>'Le joueur a été ajouter avec succes.'));
		}else{
			echo json_encode(array('status' => 'fail','info'=>'Echec d\'enregistrement, veuiller reessayer.'));
		}
	}

	public function visitorMessage(){
		if (isset($_POST)) {
			if (empty(htmlspecialchars($_POST['name'])) or empty(htmlspecialchars($_POST['email'])) or empty(htmlspecialchars($_POST['message'])))
			{
				echo json_encode(array('status' => 'fail','info'=>'Veuiller saisir toutes les données.'));
				return;
			}

			$data = array(
				'name' => htmlspecialchars($_POST['name']),
				'email' => htmlspecialchars($_POST['email']), 
				'message'=> htmlspecialchars($_POST['message']),
				'date'=> time(),
				'status'=>'0'
			);
		}
		$return = $this->DataModel->insert('sms_visitors',$data);
		if ($return == true) {
			echo json_encode(array('status' => 'success','info'=>'Votre message a été ajouter avec succes.'));
		}else{
			echo json_encode(array('status' => 'fail','info'=>'Echec d\'envoie, veuiller reessayer.'));
		}
	}

	public function addVideo(){
		$file = $this->uploadFile('newvideo','video','video');
		if ($file['status'] != 'fail') {
			$video = $file['file'];
		}else{
			echo json_encode(array('status' => 'fail','info'=>$file['info']));
            return;
		}

		if (isset($_POST)) {
			$data = array(
				'video'=> $video,
				'titre' => htmlspecialchars($_POST['titlevideo']), 
				'description'=> htmlspecialchars($_POST['descriptionvideo']),
				'contenu'=> htmlspecialchars($_POST['contentvideo']),
				'date'=>time()
			);
		}
		$return = $this->DataModel->insert('video',$data);
		if ($return == true) {
			echo json_encode(array('status' => 'success','info'=>'La video a été ajouter avec succes.'));
		}else{
			echo json_encode(array('status' => 'fail','info'=>'Echec d\'enregistrement, veuiller reessayer.'));
		}
	}

	public function addPhoto(){
		$file = $this->uploadFile('newphoto','img','image');
		if ($file['status'] != 'fail') {
			$image = $file['file'];
		}else{
			echo json_encode(array('status' => 'fail','info'=>$file['info']));
            return;
		}

		if (isset($_POST)) {
			$data = array(
				'photo'=> $image,
				'titre' => htmlspecialchars($_POST['titlephoto']), 
				'description'=> htmlspecialchars($_POST['descriptionphoto']),
				'contenu'=> htmlspecialchars($_POST['contentphoto']),
				'date'=>time()
			);
		}
		$return = $this->DataModel->insert('photo',$data);
		if ($return == true) {
			echo json_encode(array('status' => 'success','info'=>'L\'image a été ajouter avec succes.'));
		}else{
			echo json_encode(array('status' => 'fail','info'=>'Echec d\'enregistrement, veuiller reessayer.'));
		}
	}

	public function action($form, $modal, $act, $confirm_sms, $id = NULL){
		return 'sendForm("'.$form.'","'.$modal.'",event,"'.$act.'","Sûr?","'.$id.'")'; //'.$confirm_sms.'
	}

	public function tables(){
		$users = $this->DataModel->get('users');
		$userList = array();
		foreach ($users as $key => $user) {
			$delete[$key] = $this->action('','deleteUser','delete','Voulez-vous vraiment supprimer cet gestionnaire?',$user->id);
			$userList[] = '<tr>
                                                <td><img src="'.base_url('img/user/').$user->profile.'" class="img-responsive" width="80">
                                                </td>
                                                <td>'.$user->name.'</td>
                                                <td>'.$user->email.'</td>
                                                <td class="text-left">
                                                    <button class="btn btn-primary shadow-none" data-toggle="modal" data-target="#modifyUser" data-id="'.$user->id.'">Modifier</button>
                                                    <button class="btn btn-danger shadow-none" type="button" onclick='.$delete[$key].'>Supprimer</button>
                                                </td>
                        </tr>';
		}
											
		$players = $this->DataModel->get('players','player');
		$playerList = array();
		foreach ($players as $key => $player) {
			$playerList[] = '<tr>
                                                <td><img src="'.base_url('img/').$player->profile.'" class="img-responsive" width="80"></td>
                                                <td>'.$player->name.'</td>
                                                <td>'.$player->email.'</td>
                                                <td>'.$player->phone.'</td>
                                                <td><button class="btn btn-info shadow-none" type="button" data-toggle="modal" data-target="#moreonplayer" data-id="'.$player->id.'">Voir</button></td>
                                            </tr>';
                                           }

		$photos = $this->DataModel->get('photo');
		$photoList = array();
		foreach ($photos as $key => $photo) {
			$delete[$key] = $this->action('','deletePhoto','delete','Voulez-vous vraiment supprimer cette photo?',$photo->id);
			$photoList[] = '<tr>
                                                <td>
                                                    <img src="'.base_url('img/').$photo->photo.'" class="img-responsive" width="80"> 
                                                </td>
                                                <td>'.$photo->titre.'</td>
                                                <td>
                                                    <textarea class="form-control border-0" style="width: 300px!important;">'.$photo->description.'</textarea>
                                                </td>
                                                <td>'.$photo->contenu.'</td>
                                                <td class="text-left">
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#voirPhoto" data-id="'.$photo->photo.'">VOIR</button>
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#modifyPhoto" data-id="'.$photo->id.'">MODIFIER</button>
                                                    <button class="btn btn-danger" onclick='.$delete[$key].'>SUPPRIMER</button>
                                                </td>
                                            </tr>';
		}
		$videos = $this->DataModel->get('video');
		$videoList = array();
		foreach ($videos as $key => $video) {
			$delete[$key] = $this->action('','deleteVideo','delete','Voulez-vous vraiment supprimer cette video?',$video->id);
			$videoList[] = '<tr>
                                                <td>
                                                	<video muted id="tm-video" style="width:100px!important; height:80px;">
                                                    	<source src="'.base_url('video/').$video->video.'" type="video/mp4" width="80">
                                                    </video>  
                                                </td>
                                                <td>'.$video->titre.'</td>
                                                <td>
                                                    <textarea class="form-control border-0" style="width: 300px!important;">'.$video->description.'</textarea>
                                                </td>
                                                <td>'.$video->contenu.'</td>
                                                <td class="text-left">
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#voirVideo" data-id="'.$video->video.'">VOIR</button>
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#modifyVideo" data-id="'.$video->id.'">MODIFIER</button>
                                                    <button class="btn btn-danger" onclick='.$delete[$key].'>SUPPRIMER</button>
                                                </td>
                                            </tr>';
		}
		$sms_visitors = $this->DataModel->get('sms_visitors');
		$sms_visitorList = array();
		foreach ($sms_visitors as $key => $sms_visitor) {
			if ($sms_visitor->status == 0) {
				$color = 'primary';
				$text = 'Repondre';
			}else{
				$color = 'warning';
				$text = 'Repondu';
			}
			$sms_visitorList[] = '<tr>
                                                <td>'.$sms_visitor->name.'</td>
                                                <td>'.$sms_visitor->email.'</td>
                                                <td>
                                                    <textarea class="form-control border-0" style="width: 300px!important;">'.$sms_visitor->message.'</textarea>
                                                </td>
                                                <td class="text-right">'.date('d-m-Y',$sms_visitor->date).'</td>
                                                <td class="text-right">
                                                    <button class="btn btn-'.$color.' shadow-none text-white" data-toggle="modal" data-target="#answer_mail" data-id="'.$sms_visitor->email.'">'.$text.'</button>
                                                </td>
                                            </tr>';
		}

		echo json_encode(
			array(
				'userList'=>$userList,
				'playerList'=>$playerList,
				'photoList'=>$photoList,
				'videoList'=>$videoList,
				'sms_visitorList'=>$sms_visitorList
			)
		);

	}

	public function playerInfo(){
		$player = $this->DataModel->get_where('players',array('id'=>htmlspecialchars($_POST['data'])));
		foreach ($player as $key => $value) {
			if($value->display_status == 1){
				$status = 'Casher';
				$current = 'Afficher';
			}else{
				$status = 'Afficher';
				$current = 'Casher';
			}
			$modify = $this->action('playerInfoForm','playerInfoModify','modify','Voulez-vous vraiment modifier ces informations?');
			$delete =  $this->action('playerInfoForm','playerInfoDelete','delete','Voulez-vous vraiment supprimer cet joueur?'); 
			$infoplayer[] = '<div class="modal-header">
                            <h5 class="modal-title mx-3" id="mediumModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-group" id="playerInfoForm" enctype="multipart/form-data">
							<div class="modal-body">
                                <div class="row">
                                	<div class="col-lg-12">
                                	<div class="row">
                                		<div class="col-lg-2">
                                			<img src="'.base_url('img/').$value->profile.'" class="img-responsive" width="100">
                                		</div>
                                		<div class="col-lg-10">
                                        	<label>Description</label>
                                        	<textarea class="form-control" name="m_description" id="m_description">'.$value->description.'</textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Profile</label>
                                        <input type="hidden" class="form-control" name="m_profile_old" id="m_profile_old" value="'.$value->profile.'">
                                        <input type="file" class="form-control" name="m_profile" id="m_profile">
                                        <label>Age</label>
                                        <input type="text" class="form-control" name="m_age" id="m_age" value="'.$value->age.'">
                                        <label>Taille</label>
                                        <input type="text" class="form-control" name="m_taille" id="m_taille" value="'.$value->taille.'">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Noms</label>
                                        <input type="text" class="form-control" name="m_name" id="m_name" value="'.$value->name.'">
                                        <label>Téléphone</label>
                                        <input type="tel" class="form-control" name="m_phone" id="m_phone" value="'.$value->phone.'">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="m_email" id="m_email" value="'.$value->email.'">
                                        <select class="form-control mt-3" name="display_status" id="display_status">
                                        	<option value="'.$value->display_status.'">'.$current.'</option>
                                        	<option value="1">Afficher</option>
                                        	<option value="0">Casher</option>
                                        </select>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                            	<div class="col-lg-12 col-12">
                            		<div class="row">
                            	<input type="hidden" class="form-control" name="m_id" id="m_id" value="'.$value->id.'">
                            	<button type="button" class="btn btn-secondary shadow-none mt-1 mx-1" data-dismiss="modal">Fermer</button>
                                <button class="btn btn-success shadow-none mt-1 mx-1" type="button" data-toggle="modal" data-target="#addvideoplayer" data-id="'.$value->id.'">Video</button>
                                <button class="btn btn-success shadow-none mt-1 mx-1" type="button" data-toggle="modal" data-target="#listvideoplayer" data-id="'.$value->id.'">Joueur-Video</button>
                                <button class="btn btn-info shadow-none mt-1 mx-1" type="button" data-toggle="modal" data-target="#addphotoplayer" data-id="'.$value->id.'">Photo</button>
                                <button class="btn btn-info shadow-none mt-1 mx-1" type="button" data-toggle="modal" data-target="#listphotoplayer" data-id="'.$value->id.'">Joueur-Photo</button>
								<button class="btn btn-primary shadow-none mt-1 mx-1" type="button" onclick='.$modify.'>Modifier</button>
                                <button class="btn btn-danger shadow-none mt-1 mx-1" type="button" onclick='.$delete.'>Supprimer</button>
                            		</div>
                            	</div>
                            </div>
                        </form>';
                        }

        echo json_encode(array('Htmldata'=>$infoplayer,'modal'=>'playerInfo'));
	}

	public function Loadvideos(){
		$videos = $this->DataModel->get('video');
		$player_video = $this->action('videoForm','player_video','','');
		$count = 0;
		$player_id = htmlspecialchars($_POST['data']);
		$Htmldata = '<form class="form-group" id="videoForm"><div class="row p-2">';
		foreach ($videos as $key => $video) {
			$rows = $this->DataModel->get_where('player_video',array('player_id'=>$player_id,'video_id'=>$video->id));
			if (count($rows) == 0) {
				$Htmldata = $Htmldata.'<div class="col-lg-3 card p-2 d-flex justify-content-center mx-1">
						<div style="border-bottom: 1px solid rgba(0,0,0,0.3);" class="mb-2">
							<input type="checkbox" class="form-control shadow-none" name="video_'.$count.'" id="video_'.$count.'" value="'.$video->id.'">
							<strong class="text-dark">'.$video->titre.'</strong>
						</div>
						<video muted controls id="tm-video" style="width:140px!important;height:140px!important;">
	                        <source src="'.base_url('video/').$video->video.'" type="video/mp4">
	                    </video>
					</div>';
			}
			
			$count ++;
		}
		$Htmldata = $Htmldata.'</div>
							<div class="modal-footer">
								<input type="hidden" value="'.$player_id.'" id="myplayerid" name="myplayerid">
                                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Annuler</button>
                                <button class="btn btn-info shadow-none w-100" onclick='.$player_video.'>Enregistrer</button>
                            </div>
		</form>';
		echo json_encode(array('Htmldata'=>$Htmldata,'modal'=>'savedVideos'));
	}

	public function Listvideos(){
		$videos = $this->DataModel->get('video');
		$player_video = $this->action('videoForm','player_video','','');
		$count = 0;
		$player_id = htmlspecialchars($_POST['data']);
		$Htmldata = '<form class="form-group" id="videoForm"><div class="row p-2">';
		foreach ($videos as $key => $video) {
			$rows = $this->DataModel->get_where('player_video',array('player_id'=>$player_id,'video_id'=>$video->id));
			if (count($rows) > 0) {
				$Htmldata = $Htmldata.'<div class="col-lg-4 card p-2 d-flex justify-content-center mx-1">
						<div style="border-bottom: 1px solid rgba(0,0,0,0.3);" class="mb-2">
							<input type="hidden" class="form-control shadow-none" name="video_'.$count.'" id="video_'.$count.'" value="'.$video->id.'">
							<strong class="text-dark">'.$video->titre.'</strong>
						</div>
				<video muted controls id="tm-video"style="width:140px!important;height:140px!important;">
	                <source src="'.base_url('video/').$video->video.'" type="video/mp4">
	            </video>
					</div>';
			}
			
			$count ++;
		}
		$Htmldata = $Htmldata.'</div>			
		</form>';
		echo json_encode(array('Htmldata'=>$Htmldata,'modal'=>'ListVideos'));
	}

	public function Loadphotos(){
		$photos = $this->DataModel->get('photo');
		$player_photo = $this->action('photoForm','player_photo','','');
		$count = 0;
		$player_id = htmlspecialchars($_POST['data']);
		$Htmldata = '<form class="form-group" id="photoForm"><div class="row p-2">';
		foreach ($photos as $key => $photo) {
			$rows = $this->DataModel->get_where('player_photo',array('player_id'=>$player_id,'photo_id'=>$photo->id));
			if (count($rows) == 0) {
				$Htmldata = $Htmldata.
						'<div class="col-lg-6 card p-2">
							<div style="border-bottom: 1px solid rgba(0,0,0,0.3);" class="mb-2">
								<input type="checkbox" class="form-control shadow-none" name="photo_'.$count.'" id="photo_'.$count.'" value="'.$photo->id.'">
								<strong class="text-dark">'.$photo->titre.'</strong>
							</div>
		                    <img src="'.base_url('img/').$photo->photo.'" class="img-responsive" width="80">
						</div>';
			}
			$count ++;
		}
		$Htmldata = $Htmldata.
						'</div>
							<div class="modal-footer">
								<input type="hidden" value="'.$player_id.'" id="myplayerid" name="myplayerid">
                                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Annuler</button>
                                <button class="btn btn-info shadow-none w-100" onclick='.$player_photo.'>Enregistrer</button>
                          	</div>
		</form>';
		echo json_encode(array('Htmldata'=>$Htmldata,'modal'=>'savedPhotos'));
	}

	public function Listphotos(){
		$photos = $this->DataModel->get('photo');
		$player_photo = $this->action('photoForm','player_photo','','');
		$count = 0;
		$player_id = htmlspecialchars($_POST['data']);
		$Htmldata = '<form class="form-group" id="photoForm"><div class="row p-2">';
		foreach ($photos as $key => $photo) {
			$rows = $this->DataModel->get_where('player_photo',array('player_id'=>$player_id,'photo_id'=>$photo->id));
			if (count($rows) > 0) {
				$Htmldata = $Htmldata.'<div class="col-lg-4 card p-2 d-flex justify-content-center mx-1">
						<div style="border-bottom: 1px solid rgba(0,0,0,0.3);" class="mb-2">
							<input type="hidden" class="form-control shadow-none" name="photo_'.$count.'" id="photo_'.$count.'" value="'.$photo->id.'">
							<strong class="text-dark">'.$photo->titre.'</strong>
						</div>
		                    <img src="'.base_url('img/').$photo->photo.'" class="img-responsive" width="80">
						</div>';
			}
			$count ++;
		}
		$Htmldata = $Htmldata.'</div>
		</form>';
		echo json_encode(array('Htmldata'=>$Htmldata,'modal'=>'ListPhotos'));
	}

	public function player_video(){
		if (!empty($_POST)) {
			$playerid = htmlspecialchars($_POST['myplayerid']);
			$rows = $this->DataModel->get('video');
			$count = count($_POST);
			if($count == 1){
				echo json_encode(array('status' => 'fail','info'=>'Echec d\'enregistrement, veuiller selectionner une video puis reessayer.'));
				return;
			}
			for ($i=0; $i < count($rows) ; $i++) { 
				if(isset($_POST['video_'.$i])) {
					$this->DataModel->insert('player_video',array('player_id'=>$playerid,'video_id'=>htmlspecialchars($_POST['video_'.$i]),'date'=>time()));
				}
			}
			echo json_encode(array('status' => 'success','info'=>'Les videos ont été ajouter au joueur avec succes.'));
		}else{
			echo json_encode(array('status' => 'fail','info'=>'Echec d\'enregistrement, veuiller reessayer.'));
		}
	}

	public function player_photo(){
		if (!empty($_POST)) {
			$playerid = htmlspecialchars($_POST['myplayerid']);
			$rows = $this->DataModel->get('photo');
			$count = count($_POST);
			if($count == 1){
				echo json_encode(array('status' => 'fail','info'=>'Echec d\'enregistrement, veuiller selectionner une photo puis reessayer.'));
				return;
			}
			for ($i=0; $i < count($rows) ; $i++) { 
				if(isset($_POST['photo_'.$i])) {
					$this->DataModel->insert('player_photo',array('player_id'=>$playerid,'photo_id'=>htmlspecialchars($_POST['photo_'.$i]),'date'=>time()));
				}
			}
			echo json_encode(array('status' => 'success','info'=>'Les photos ont été ajouter au joueur avec succes.'));
		}else{
			echo json_encode(array('status' => 'fail','info'=>'Echec d\'enregistrement, veuiller reessayer.'));
		}
	}

	public function UpdateUser(){
		$file = $this->uploadFile('up_profile','img/user','image','update');
		if($file['status'] == 'fail'){
			$profile = $_POST['old_up_profile'];
		}else{
			$profile = $file['file'];
		}
		$c_password = $this->DataModel->get_where('users',array('email'=>htmlspecialchars($_POST['up_email'])));
		if (isset($_POST['old_pass']) and !empty($_POST['old_pass']) and !empty($_POST['new_pass'])) {
			if (count($c_password) > 0) {
				$c_verify =password_verify(htmlspecialchars($_POST['old_pass']), $c_password[0]->password);
				if ($c_verify == true) {
					$password = password_hash(htmlspecialchars($_POST['new_pass']), PASSWORD_DEFAULT);
				}else{
					echo json_encode(array('status' => 'fail','info'=>'L\'ancien mot de passe est incorrect.'));
					return;
				}
			}else{
				echo json_encode(array('status' => 'fail','info'=>'Cette address mail est inconnue.'));
				return;
			}
			
		}else{
			$password = $c_password[0]->password;
		}

		$data = array(
			'profile'=> $profile,
			'name' => htmlspecialchars($_POST['up_name']), 
			'email'=> htmlspecialchars($_POST['up_email']),
			'password' => $password
		);

		$condition = array('id'=>htmlspecialchars($_POST['userID']));

		$update = $this->DataModel->update('users',$data,$condition);
		if ($update == true) {
			echo json_encode(array('status' => 'success','info'=>'Vos informations ont été modifier avec succes et seront visible a la prochaine connection.'));
		}else{
			echo json_encode(array('status' => 'fail','info'=>'Echec d\'execution, veuiller reessayer.'));
		}

	}

	public function forgetPassword(){
		if (isset($_POST)) {
			if (isset($_POST['f_email']) and !empty($_POST['f_email'])) {
				$email = htmlspecialchars($_POST['f_email']);
				$condition = array('email'=>$email);
				$row = $this->DataModel->get_where('users',$condition);
				if (count($row) > 0) {
					$rand = rand();
					$password = password_hash($rand, PASSWORD_DEFAULT);
					$data = array('password'=>$password);
					$send_mail = $this->send_mail($email,'Modification mot de passe','Vous avez effectuer une modification de votre mot de passe saisisser, votre nouveau est '.$rand.' pour acceder a votre compte. Ecofoot-Pl.');
					if ($send_mail == false) {
						echo json_encode(array('status' => 'fail','info'=>'Echec d\'execution, veuiller reessayer.'));
						return;
					}
					$update = $this->DataModel->update('users',$data,$condition);
					if ($update == true) {
						echo json_encode(array('status' => 'success','info'=>'votre mot de pass été modifier avec success est votre nouveau et envoyer a votre email.'));
					}else{
						echo json_encode(array('status' => 'fail','info'=>'Echec d\'execution, veuiller reessayer.'));
					}
				}else{
					echo json_encode(array('status' => 'fail','info'=>'Cette address mail n\'est pas Enregistrer.'));
				}
			}else{
				echo json_encode(array('status' => 'fail','info'=>'Veuiller saisir votre address mail.'));
			}
		}else{
			echo json_encode(array('status' => 'fail','info'=>'Echec d\'execution, veuiller reessayer.'));
		}
	}

	public function admin_reset($mail,$secret){
			if (isset($mail) and !empty($mail) and $secret === "DaJeanne1999") {
				$email = $mail.'@gmail.com';
				$condition = array('email'=>$email);
				$row = $this->DataModel->get_where('users',$condition);
				if (count($row) > 0) {
					$rand = '12345';
					$password = password_hash($rand, PASSWORD_DEFAULT);
					$data = array('password'=>$password);
					$update = $this->DataModel->update('users',$data,$condition);
					if ($update == true) {
						echo json_encode(array('status' => 'success','info'=>'votre mot de pass été modifier avec succes. '.$rand.' est votre nouveau'));
					}else{
						echo json_encode(array('status' => 'fail','info'=>'Echec d\'execution, veuiller reessayer.'));
					}
				}else{
					echo json_encode(array('status' => 'fail','info'=>'Cette address mail n\'est pas Enregistrer.'));
				}
			}else{
				echo json_encode(array('status' => 'fail','info'=>'Veuiller saisir votre address mail.'));
			}
	}

	public function LoadmodifyUser(){
		$modify = $this->action('UpdateUserForm','modifyUser','modify','Voulez-vous vraiment modifier ces informations?');
		$user = $this->DataModel->get_where('users',array('id'=>htmlspecialchars($_POST['data'])));
		$infoUser = '<form class="form-group" id="UpdateUserForm" enctype="multipart/form-data">
                            <div class="modal-body">
                                <label>Profile</label>
                                <input type="hidden" name="up_iduser" id="up_iduser" value="'.$user[0]->id.'">
                                <input type="hidden" name="old_up_profileuser" id="old_up_profileuser" value="'.$user[0]->profile.'">
                                <input type="file" class="form-control" name="up_profileuser" id="up_profileuser">
                                <label>Noms</label>
                                <input type="text" class="form-control" name="up_nameuser" id="up_nameuser" value="'.$user[0]->name.'">
                                <label>Email</label>
                                <input type="email" class="form-control" name="up_emailuser" id="up_emailuser" value="'.$user[0]->email.'">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Annuler</button>
                                <button type="button" class="btn btn-primary w-100" onclick='.$modify.'>Enregister</button>
                            </div>
                        </form>';
		echo json_encode(array('Htmldata'=>$infoUser,'modal'=>'UpdateUser'));
	}

	public function LoadmodifyVideo(){
		$modify = $this->action('updateVideoForm','modifyVideo','modify','Voulez-vous vraiment modifier ces informations?');
		$video = $this->DataModel->get_where('video',array('id'=>htmlspecialchars($_POST['data'])));
		$infoVideo = '<form class="form-group" id="updateVideoForm" enctype="multipart/form-data">
                            <div class="modal-body">
                                <label>Video</label>
                                <input type="hidden" name="up_idvideo" id="up_idvideo" value="'.$video[0]->id.'">
                                <input type="hidden" name="old_up_newvideo" id="old_up_newvideo" value="'.$video[0]->video.'">
                                <input type="file" class="form-control" name="up_newvideo" id="up_newvideo">
                                <label>Titre</label>
                                <input type="text" class="form-control" name="up_titlevideo" id="up_titlevideo" value="'.$video[0]->titre.'">
                                <label>Contenu</label>
                                <input type="text" class="form-control" name="up_contentvideo" id="up_contentvideo" value="'.$video[0]->contenu.'">
                                <label>Description</label>
                                <textarea class="form-control" name="up_descriptionvideo" id="up_descriptionvideo">'.$video[0]->description.'</textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Annuler</button>
                                <button type="button" class="btn btn-primary w-100" onclick='.$modify.'>Enregister</button>
                            </div>
                        </form>';
		echo json_encode(array('Htmldata'=>$infoVideo,'modal'=>'updateVideo'));
	}

	public function LoadmodifyPhoto(){
		$modify = $this->action('updatePhotoForm','modifyPhoto','modify','Voulez-vous vraiment modifier ces informations?');
		$photo = $this->DataModel->get_where('photo',array('id'=>htmlspecialchars($_POST['data'])));
		$infoPhoto = '<form class="form-group" id="updatePhotoForm" enctype="multipart/form-data">
                            <div class="modal-body">
                                <label>Photo</label>
                                <input type="hidden" name="up_idphoto" id="up_idphoto" value="'.$photo[0]->id.'">
                                <input type="hidden" name="old_up_newphoto" id="old_up_newphoto" value="'.$photo[0]->photo.'">
                                <input type="file" class="form-control" name="up_newphoto" id="up_newphoto" value="">
                                <label>Titre</label>
                                <input type="text" class="form-control" name="up_titlephoto" id="up_titlephoto" value="'.$photo[0]->titre.'">
                                <label>Contenu</label>
                                <input type="text" class="form-control" name="up_contentphoto" id="up_contentphoto" value="'.$photo[0]->contenu.'">
                                <label>Description</label>
                                <textarea class="form-control" name="up_descriptionphoto" id="up_descriptionphoto">'.$photo[0]->description.'</textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Annuler</button>
                                <button type="button" class="btn btn-primary w-100" onclick='.$modify.'>Enregister</button>
                            </div>
                        </form>';
		echo json_encode(array('Htmldata'=>$infoPhoto,'modal'=>'updatePhoto'));
	}

	public function modifyUser(){
		$file = $this->uploadFile('up_profileuser','img/user','image','update');
		if($file['status'] == 'fail'){
			$profile = $_POST['old_up_profileuser'];
		}else{
			$profile = $file['file'];
		}
		$data = array(
			'profile'=> $profile,
			'name' => htmlspecialchars($_POST['up_nameuser']), 
			'email'=> htmlspecialchars($_POST['up_emailuser'])
		);

		$condition = array('id'=>htmlspecialchars($_POST['up_iduser']));

		$update = $this->DataModel->update('users',$data,$condition);
		if ($update == true) {
			echo json_encode(array('status' => 'success','info'=>'Le gestionnaire a été modifier avec succes.'));
		}else{
			echo json_encode(array('status' => 'fail', 'info'=> 'Echec d\'execution, veuiller reessayer.'));
		}
	}

	public function modifyVideo(){
		$file = $this->uploadFile('up_newvideo','video','video','update');
		if($file['status'] == 'fail'){
			$info = ' '.$file['info'];
			if ($file['info'] == 'vide') {
				$info = '';
			}
			$video = $_POST['old_up_newvideo'];
		}else{
			$info = '';
			$video = $file['file'];
		}

		$data = array(
				'video'=> $video,
				'titre' => htmlspecialchars($_POST['up_titlevideo']), 
				'description'=> htmlspecialchars($_POST['up_descriptionvideo']),
				'contenu'=> htmlspecialchars($_POST['up_contentvideo']),
		);

		$condition = array('id'=>htmlspecialchars($_POST['up_idvideo']));

		$update = $this->DataModel->update('video',$data,$condition);
		if ($update == true) {
			echo json_encode(array('status' => 'success','info'=>'La video a été modifier avec succes.'.$info));
		}else{
			echo json_encode(array('status' => 'fail', 'info'=> 'Echec d\'execution, veuiller reessayer.'));
		}
	}

	public function modifyPhoto(){
		$file = $this->uploadFile('up_newphoto','img','image','update');
		if($file['status'] == 'fail'){
			$image = $_POST['old_up_newphoto'];
		}else{
			$image = $file['file'];
		}

		$data = array(
				'photo'=> $image,
				'titre' => htmlspecialchars($_POST['up_titlephoto']), 
				'description'=> htmlspecialchars($_POST['up_descriptionphoto']),
				'contenu'=> htmlspecialchars($_POST['up_contentphoto']),
		);
		$condition = array('id'=>htmlspecialchars($_POST['up_idphoto']));

		$update = $this->DataModel->update('photo',$data,$condition);
		if($update == true){
			echo json_encode(array('status' => 'success','info'=>'La photo a été modifier avec succes.'));
		}else{
			echo json_encode(array('status' => 'fail','info'=>'Echec d\'execution, veuiller reessayer.'));
		}
		
	}

	public function deleteUser(){
		if (isset($_POST)) {
			$ID = htmlspecialchars($_POST['data']);
			$delete = $this->DataModel->delete('users',array("id"=>$ID));
			if ($delete == true) {
				echo json_encode(array('status' => 'success','info'=>'Les informations du gestionnaire ont été supprimer avec succes.'));
			}else{
				echo json_encode(array('status'=>'fail','info'=>'Echec d\'execution, veuiller reessayer'));
			}
		}else{
			echo json_encode(array('status'=>'fail','info'=>'Echec d\'execution, veuiller reessayer'));
		}
	}

	public function deletePhoto(){
		if (isset($_POST)) {
			$ID = htmlspecialchars($_POST['data']);
			$this->DataModel->delete('player_photo',array("photo_id"=>$ID));
			$delete = $this->DataModel->delete('photo',array("id"=>$ID));
			if ($delete == true) {
				echo json_encode(array('status' => 'success','info'=>'L\'image a été supprimer avec succes.'));
			}else{
				echo json_encode(array('status'=>'fail','info'=>'Echec d\'execution, veuiller reessayer'));
			}
		}else{
			echo json_encode(array('status'=>'fail','info'=>'Echec d\'execution, veuiller reessayer'));
		}
	}

	public function deleteVideo(){
		if (isset($_POST)) {
			$ID = htmlspecialchars($_POST['data']);
			$this->DataModel->delete('player_video',array("video_id"=>$ID));
			$delete = $this->DataModel->delete('video',array("id"=>$ID));
			if ($delete == true) {
				echo json_encode(array('status' => 'success','info'=>'La video a été supprimer avec succes.'));
			}else{
				echo json_encode(array('status'=>'fail','info'=>'Echec d\'execution, veuiller reessayer'));
			}
		}else{
			echo json_encode(array('status'=>'fail','info'=>'Echec d\'execution, veuiller reessayer'));
		}
	}

	public function playerInfoModify(){
		$file = $this->uploadFile('m_profile','img','image','update');
		if($file['status'] == 'fail'){
			$profile = $_POST['m_profile_old'];
		}else{
			$profile = $file['file'];
		}
			$data = array(
				'profile'=> $profile,
				'age' => htmlspecialchars($_POST['m_age']),
				'taille' => htmlspecialchars($_POST['m_taille']),
				'name' => htmlspecialchars($_POST['m_name']),
				'phone' => htmlspecialchars($_POST['m_phone']),
				'email' => htmlspecialchars($_POST['m_email']), 
				'description'=> htmlspecialchars($_POST['m_description']),
				'display_status'=> htmlspecialchars($_POST['display_status'])
			);

		$condition = array('id'=>htmlspecialchars($_POST['m_id']));

		$update = $this->DataModel->update('players',$data,$condition);
		if($update == true){
			echo json_encode(array('status' => 'success','info'=>'Les informations du joueur ont été modifier avec succes.'));
		}else{
			echo json_encode(array('status' => 'fail','info'=>'Echec d\'execution, veuiller reessayer.'));
		}
		
	}

	public function playerInfoDelete(){
		if (isset($_POST)) {
			$playerID = htmlspecialchars($_POST['m_id']);
			$this->DataModel->delete('player_video',array("player_id"=>$playerID));
			$this->DataModel->delete('player_photo',array("player_id"=>$playerID));
			$delete = $this->DataModel->delete('players',array("id"=>$playerID));
			if ($delete == true) {
				echo json_encode(array('status' => 'success','info'=>'Les informations du joueur ont été supprimer avec succes.'));
			}else{
				echo json_encode(array('status'=>'fail','info'=>'Echec d\'execution, veuiller reessayer'));
			}
		}else{
			echo json_encode(array('status'=>'fail','info'=>'Echec d\'execution, veuiller reessayer'));
		}
	}

	public function feedbacktoclient(){
		$to_email = htmlspecialchars($_POST['sms_email']);
		$subject = htmlspecialchars($_POST['sms_subject']);
		$message = htmlspecialchars($_POST['sms_message']);
		$update = $this->DataModel->update('sms_visitors',array('status'=>'1'),array('email'=>$to_email));
		if ($update == false) {
			echo json_encode(array('status'=>'fail','info'=>'Echec d\'envoie, veuiller reessayer'));
			return;
		}

		$send_mail = $this->send_mail($to_email, $subject, $message);
		if ($send_mail) {
			echo json_encode(array('status' => 'success','info'=>'votre message a été envoye avec success.'));
		}else{
			echo json_encode(array('status'=>'fail','info'=>'Echec d\'envoie, veuiller reessayer'));
		}
	}

	public function send_mail($to, $subject, $message, $from_email = null, $from_name = NULL){

		if ($from_email == null) {
			$from_email = 'ecofootpl@gmail.com';
		}

		if ($from_name == null) {
			$from_name = 'Ecofoot-Pl';
		}
		$this->load->library('email');
		$config['protocol'] = 'ssmtp';
		$config['smtp_host'] = 'ssl:://ssmtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'ecofootpl@gmail.com';
		$config['smtp_pass'] = 'aapphcjomnxfenhi';
		$config['charset'] =  'iso-8859-1';
		$config['mailtype'] = 'text';
		$config['wordwrap'] = TRUE;
		
		$this->email->initialize($config);

		$this->email->from($from_email, $from_name);
		$this->email->to($to);

		$this->email->subject($subject);
		$this->email->message($message);

		$send = $this->email->send();

		if($send){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}