 Jquery JS-->
<script src="<?=base_url()?>vendor/jquery-3.2.1.min.js"></script>

    <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Nouveau Gestionnaire</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-group" id="addUser" enctype="multipart/form-data">
                            <div class="modal-body">
                                <label>Profile</label>
                                <input type="file" class="form-control" name="profileuser" id="profileuser">
                                <label>Noms</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary w-100" onclick="sendForm('addUser','addUser',event)">Enregister</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    <div class="modal fade" id="modifyUser" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Modifier Gestionnaire</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="UpdateUser"></div>
                    </div>
                </div>
            </div>

    <div class="modal fade" id="player" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Nouveau Joueur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-group" id="addPlayer" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Profile</label>
                                        <input type="file" class="form-control" name="profileplayer" id="profileplayer">
                                        <label>Age</label>
                                        <input type="text" class="form-control" name="ageplayer" id="ageplayer">
                                        <label>Taille</label>
                                        <input type="text" class="form-control" name="tailleplayer" id="tailleplayer">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Noms</label>
                                        <input type="text" class="form-control" name="nameplayer" id="nameplayer">
                                        <label>Téléphone</label>
                                        <input type="tel" class="form-control" name="phoneplayer" id="phoneplayer">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="emailplayer" id="emailplayer">
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Description</label>
                                        <textarea class="form-control" name="descriptionplayer" id="descriptionplayer"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary w-100" onclick="sendForm('addPlayer','addPlayer',event)">Enregister</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    <div class="modal fade" id="moreonplayer" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" id="playerInfo"></div>
                </div>
            </div>

    <div class="modal fade" id="addvideoplayer" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="height:600px;overflow: auto;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Nos Videos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="savedVideos"></div>
                    </div>
                </div>
            </div>

    <div class="modal fade" id="listvideoplayer" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="height:600px;overflow: auto;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Liste Videos du Joueur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p class="mt-3">Ici vous trouver la liste des videos du joueur.</p>
                        </div>
                        <div class="modal-body" id="ListVideos"></div>
                    </div>
                </div>
            </div>

    <div class="modal fade" id="voirPhoto" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Voir Photo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="" class="img-responsive" id="fullPhoto" width="400">
                        </div>
                    </div>
                </div>
            </div>

    <div class="modal fade" id="voirVideo" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Voir Video</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <video src="" controls id="fullVideo" style="width:250px!important;height: 200px;"></video>
                        </div>
                    </div>
                </div>
            </div>

    <div class="modal fade" id="addphotoplayer" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="height:600px;overflow: auto;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Nos Photos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="savedPhotos"></div>
                    </div>
                </div>
            </div>

    <div class="modal fade" id="listphotoplayer" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="height:600px;overflow: auto;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Liste Photos du joueur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p class="mt-3">Ici vous trouver la liste des photos du joueur.</p>
                        </div>
                        <div class="modal-body" id="ListPhotos"></div>
                    </div>
                </div>
            </div>

    <div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Nouvelle Video</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-group" id="addVideo" enctype="multipart/form-data">
                            <div class="modal-body">
                                <label>Video</label>
                                <input type="file" class="form-control" name="newvideo" id="newvideo">
                                <label>Titre</label>
                                <input type="text" class="form-control" name="titlevideo" id="titlevideo">
                                <label>Contenu</label>
                                <input type="text" class="form-control" name="contentvideo" id="contentvideo">
                                <label>Description</label>
                                <textarea class="form-control" name="descriptionvideo" id="descriptionvideo"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary w-100" onclick="sendForm('addVideo','addVideo',event)">Enregister</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    <div class="modal fade" id="answer_mail" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Repondre Mail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-group" id="feedbacktoclient" enctype="multipart/form-data">
                            <div class="modal-body">
                                <label>Email</label>
                                <input type="email" class="form-control" name="sms_email" id="sms_email">
                                <label>Sujet</label>
                                <input type="text" class="form-control" name="sms_subject" id="sms_subject" value="Ecofoot-Pl Reponse">
                                <label>Description</label>
                                <textarea class="form-control" name="sms_message" id="sms_message"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary w-100" onclick="sendForm('feedbacktoclient','feedbacktoclient',event)">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    <div class="modal fade" id="modifyVideo" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Modifier Données</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="updateVideo"></div>
                    </div>
                </div>
            </div>

    <div class="modal fade" id="photo" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Nouvelle Photo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-group" id="addPhoto" enctype="multipart/form-data">
                            <div class="modal-body">
                                <label>Photo</label>
                                <input type="file" class="form-control" name="newphoto" id="newphoto">
                                <label>Titre</label>
                                <input type="text" class="form-control" name="titlephoto" id="titlephoto">
                                <label>Contenu</label>
                                <input type="text" class="form-control" name="contentphoto" id="contentphoto">
                                <label>Description</label>
                                <textarea class="form-control" name="descriptionphoto" id="descriptionphoto"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary w-100" onclick="sendForm('addPhoto','addPhoto',event)">Enregister</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


    <div class="modal fade" id="modifyPhoto" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Modifier Données</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="updatePhoto"></div>
                    </div>
                </div>
            </div>

    <div class="modal fade" id="forgetpassword" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Mot de passe oblier.</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-group" id="forgetPassword">
                            <div class="modal-body">
                                <label>Address mail</label>
                                <input type="text" class="form-control" name="f_email" id="f_email" placeholder="Saississez votre address mail">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary w-100" onclick="sendForm('forgetPassword','forgetPassword',event)">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <!-- Bootstrap JS-->
    <script src="<?=base_url()?>vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?=base_url()?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?=base_url()?>vendor/slick/slick.min.js">
    </script>
    <script src="<?=base_url()?>vendor/wow/wow.min.js"></script>
    <script src="<?=base_url()?>vendor/animsition/animsition.min.js"></script>
    <script src="<?=base_url()?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?=base_url()?>vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=base_url()?>vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?=base_url()?>vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?=base_url()?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=base_url()?>vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?=base_url()?>vendor/select2/select2.min.js"></script>
    <script src="<?=base_url()?>vendor/sweetalert-all/sweetalert2.min.js"></script>
    <!-- Main JS-->
    <script src="<?=base_url()?>js/main.js"></script>

    <script type="text/javascript">
        function alert_sms(sms,icon){
          const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 8000,
          timerProgressBar: true,
          heightAuto: false,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
            })
            Toast.fire({
              icon: icon,
              title: sms
            });
        }

        function confirm_sms_function(sms,icon){
        // Swal.fire({
        //   title: 'Etes vous sur?',
        //   text: sms,
        //   icon: icon,
        //   showCancelButton: true,
        //   confirmButtonColor: '#3085d6',
        //   cancelButtonColor: '#d33',
        //   confirmButtonText: 'Oui, proceder!',
        //   cancelButtonText: 'Non,annuler'
        // }).then((result) => {
        //   if (result.isConfirmed) {
        //     return true;
        //   }else{
        //     return false;
        //   }
        // })
            return confirm(sms);
        }

        function Tables() {
            $.ajax({
                url: '<?=base_url('Process/tables')?>',
                type:'POST',
                dataType: 'json',
                success: function(response){
                    $('#userList').html(response.userList);
                    $('#playerList').html(response.playerList);
                    $('#photoList').html(response.photoList);
                    $('#videoList').html(response.videoList);
                    $('#visitorList').html(response.sms_visitorList);
                }
            });
        }

        function  Ajax(data,method, other = null) {
            $.ajax({
                url: '<?=base_url('Process/')?>'+method+'',
                type:'POST',
                data: {"data": data},
                dataType: 'json',
                success: function(response){
                    if (other != null) {
                        $('button').prop('disabled',false);
                        if(response.status == 'fail'){
                            icon = 'warning';
                        }else{
                            icon = 'success';
                        }
                        alert_sms(response.info,icon);
                        Tables();
                    }else{
                        $('#'+response.modal+'').html(response.Htmldata);
                    }
                }
            });
        }

        function sendForm(form,method,event,action = null,confirm_sms = null,other = null){
            event.preventDefault();
            if (action != null) {
                if (action == 'modify') {
                    var a = confirm_sms_function(confirm_sms,'warning');
                    if(a == false) return;
                }else if (action == 'delete') {
                    var a = confirm_sms_function(confirm_sms,'warning');
                    if(a == false) return;
                }else if (action == 'modifyUser') {
                    var a = confirm_sms_function(confirm_sms,'warning');
                    if(a == false) return;
                }
            }

            if (form != '') {
                let t = $('#'+form+'')[0];
                datas = new FormData(t);
            }else{
                if (other != null) {
                    data = other;
                    $('button').prop('disabled',true);
                    Ajax(data,method, other);
                    return;
                }else{
                    datas = '';
                }
            }

            $.ajax({
                url: '<?=base_url('Process/')?>'+method+'',
                type:'POST',
                data: datas,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: function(){
                    if(action != 'modifyUser'){
                        $('button').prop('disabled',true);
                    }
                },
                success: function(response){
                    if(response.status == 'success'){
                        icon = 'success';
                        if (form != '') {
                            $('#'+form+'')[0].reset();
                        }
                        $('.modal').modal('hide');
                        Tables();
                    }else if(response.status == 'login'){
                        icon = 'success';
                        alert_sms(response.info,icon);
                        setTimeout(function(){
                            window.location.href = '<?=base_url('pages/panel/dashboard')?>';
                        },3000);
                        return;
                    }else{
                        icon = 'warning';
                    }
                    alert_sms(response.info,icon);
                    $('button').prop('disabled',false);
                }
            })
        }

        $(document).ready(function(){
                Tables();
            $('#moreonplayer').on('show.bs.modal', function (e) {
                playerid = $(e.relatedTarget).data('id');
                Ajax(playerid,'playerInfo');
            });
            $('#addvideoplayer').on('show.bs.modal', function (e) {
                $('#moreonplayer').modal('hide');
               vplayerid = $(e.relatedTarget).data('id');
                Ajax(vplayerid,'Loadvideos');
            });
            $('#addphotoplayer').on('show.bs.modal', function (e) {
                $('#moreonplayer').modal('hide');
                pplayerid = $(e.relatedTarget).data('id');
                Ajax(pplayerid,'Loadphotos');
            });
            $('#listvideoplayer').on('show.bs.modal', function (e) {
                $('#moreonplayer').modal('hide');
               vplayerid = $(e.relatedTarget).data('id');
                Ajax(vplayerid,'Listvideos');
            });
            $('#listphotoplayer').on('show.bs.modal', function (e) {
                $('#moreonplayer').modal('hide');
                pplayerid = $(e.relatedTarget).data('id');
                Ajax(pplayerid,'Listphotos');
            });

            $('#modifyPhoto').on('show.bs.modal', function (e) {
                photoID = $(e.relatedTarget).data('id');
                Ajax(photoID,'LoadmodifyPhoto');
            });
            $('#modifyVideo').on('show.bs.modal', function (e) {
                videoID = $(e.relatedTarget).data('id');
                Ajax(videoID,'LoadmodifyVideo');
            });
            $('#modifyUser').on('show.bs.modal', function (e) {
                userID = $(e.relatedTarget).data('id');
                Ajax(userID,'LoadmodifyUser');
            });

            $('#voirPhoto').on('show.bs.modal', function (e) {
                photo = $(e.relatedTarget).data('id');
                $('#fullPhoto').prop('src','<?=base_url('img/')?>'+photo);
            });
            $('#voirVideo').on('show.bs.modal', function (e) {
                video = $(e.relatedTarget).data('id');
                $('#fullVideo').prop('src','<?=base_url('video/')?>'+video);
            });
            $('#answer_mail').on('show.bs.modal', function (e) {
                email = $(e.relatedTarget).data('id');
                $('#sms_email').val(email);
            });
        });

    </script>
</html>
<!-- end document