            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <h2 class="title-1 m-b-25">PROFILE</h2>
                                    </div>
                                    <div class="col-lg-3">
                                        <button class="btn w-100 text-primary"><i class="fas fa-circle text-primary"></i> Connecté</button>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center m-b-40 mt-2">
                                    <div class="col-lg-4">
                                        <img src="<?=base_url('img/user/'.$this->session->profile)?>" class="img-responsive">
                                    </div>
                                    <div class="col-lg-8">
                                        <form id="UpdateUser" enctype="multipart/form-data">
                                            <label>Profile</label>
                                            <input type="hidden" class="form-control" id="userID" name="userID" value="<?=$this->session->userID?>" placeholder="">
                                            <input type="hidden" class="form-control" id="old_up_profile" name="old_up_profile" value="<?=$this->session->profile?>" placeholder="">
                                            <input type="file" class="form-control" id="up_profile" name="up_profile" placeholder="">
                                            <label>Noms</label>
                                            <input type="text" class="form-control" id="up_name" name="up_name" placeholder="" value="<?=$this->session->name?>">
                                            <label>Email</label>
                                            <input type="text" class="form-control" id="up_email" name="up_email" placeholder="" value="<?=$this->session->email?>">
                                            <label>Ancien Mot de passe</label>
                                            <input type="password" class="form-control" id="old_pass" name="old_pass" placeholder="Pour modifier le Mot de passe ...">
                                            <label>Nouveau Mot de passe</label>
                                            <input type="password" class="form-control" id="new_pass" name="new_pass" placeholder="Pour modifier le Mot de passe ...">
                                            <button class="btn btn-primary w-100 mt-2" onclick="sendForm('UpdateUser','UpdateUser',event,'modify','Voulez-vous vraiment modifier?')">Modifier</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
