    <div class="tm-hero d-flex justify-content-center align-items-center mt-5" data-parallax="scroll" data-image-src="<?=base_url()?>img/IMG_5941.jpg" style="height: 450px;">
        <div class="banner mt-5">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12 text-center bg-primary p-3">
                        <h1 class="text-white">BIENVENU SUR </h1>
                        <h3 class="text-white">ECOFOOT-GL</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <img src="<?=base_url('img/IMG_5939.JPG')?>" class="img-fluid rounded-top" alt="">
            </div>
             <div class="col-lg-6">
                 <p>Nous trouvons les perles rare du footbal pour vous, rien que ca, si vous etez a la recherche d'un bon joueur vous pouvez visualiser les videos et voir les actions de nos joueurs sur cette meme platform.</p>
             </div>
        </div>
    </div>
    <div class="container">
        <div class="row no-gutters justify-content-center mb-3 pb-2">
            <div class="col-md-12 text-center pt-3">
                <h2 class="mb-4 tm-text-primary">VUE GLOBAL DE NOS JOUEURS</h2>
            </div>
        </div>
        <div class="row no-gutters d-flex align-items-stretch">
<?php
    foreach ($list_players as $key => $value) {

 ?>
            <div class="col-md-4 col-lg-4 d-flex align-self-stretch mt-1">
                <div class="row d-sm-flex align-items-stretch">
                    <div class="col-lg-12" style="width:100%; height:50%;" > 
                        <img src="<?=base_url('img/'.$value->profile)?>" class="img-fluid" alt="" style="height: 100%;">
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-8">
                                <strong><?=$value->name?></strong>
                            </div>
                            <div class="col-lg-4 mt-2">
                                <span class="price"><?=$value->age?> ans</span>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p><?=$value->description?></p>
                            </div>
                            <div class="col-lg-12">
                                <a href="<?=base_url("pages/joueur/".$value->id)?>" class="btn btn-info w-100 shadow-none text-white">Voir Plus</a>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
<?php }?>
              
        </div>
        
    </div>

    <div class="container tm-container-content tm-mt-60">
        <div class="row mb-4">
            <div class="col-8 d-flex justify-content-start">
                <strong class="tm-text-primary">Profiter des meilleurs videos d'action des jeunes talents du footbal.</strong>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <h2 class="tm-text-primary">
                    <a href="<?=base_url('pages/view/videos')?>">VIDEOS RECENTES</a>
                </h2>
            </div>
            
        </div>
        <div class="row tm-mb-90 tm-gallery">
            <?php
            $count = 1;
                foreach ($list_video as $key => $video) {
                    if ($count <= 12) {
             ?>
        	<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <video id="tm-video" style="max-height: 150px!important;">
                        <source src="<?=base_url('video/'.$video->video)?>" type="video/mp4" width="100">
                    </video>
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>
                            <i class="fas fa-play tm-text-primary"></i>
                        </h2>
                        <a href="#show_video" class="text-dark" data-toggle="modal" data-id="<?=base_url('video/'.$video->video)?>">VOIR VIDEO</a>
                    </figcaption>                    
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light text-dark"><strong><?=$video->titre?></strong> Le <?=date('d m Y',$video->date)?></span>
                    <span class="text-dark"><?=$video->contenu?></span>
                </div>
            </div>
        <?php $count +=1; }}?>       
        </div>
    </div> 

    <div class="container tm-container-content tm-mt-60"><div class="row mb-1">
            <div class="col-12 d-flex justify-content-start">
                <h2 class="tm-text-primary"><a href="<?=base_url('pages/view/photos')?>">PHOTOS RECENTS</a></h2>
            </div>
        </div>
        <div class="row tm-mb-90 tm-gallery">
            <?php
            $count = 1;
                foreach ($list_photo as $key => $photo) {
                    if ($count <= 12) {
             ?>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-2">
                <div class="card p-2">
                    <figure class="effect-ming tm-video-item">
                    <div style="height: 20em!important;">
                        <img src="<?=base_url('img/'.$photo->photo)?>" alt="<?=$photo->photo?>" class="rounded-top img-fluid" style="width: 100%;">
                    </div>
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2><?=$photo->titre?></h2>
                    </figcaption>                    
                </figure>
                <hr>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <strong><?=$photo->contenu?></strong>
                        <span><?=date('d-m-Y',$photo->date)?></span>
                    </div>
                    <p><?=$photo->description?></p>
                </div>
            </div> 
        <?php $count +=1; }}?>       
        </div>
    </div>

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4"> <img src="<?=base_url('img/LOGO ECOFOOOT/logo ECOFOOT.jpg')?>" style="height: 40px;"> ECOFOOT-GL</h3>
                    <p></p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4">CLIQUER ICI</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="<?=base_url('pages/view/videos')?>">Video</a></li>
                        <li><a href="<?=base_url('pages/view/photos')?>">Photo</a></li>
                        <li><a href="<?=base_url('pages/view/about')?>">A propos</a></li>
                        <li><a href="<?=base_url('pages/view/contact')?>">Contact</a></li>
                        <li><a href="#">Autres</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <!-- <a href="#" class="tm-text-gray text-right d-block mb-2">Terms of Use</a>
                    <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a> -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-5 col-12 px-5 mb-3">
                    Copyright 2022
                </div>
                <div class="col-lg-8 col-md-7 col-12 px-5 text-right">
                   Developper par <a href="">LMK Kalala</a> et <a href="">JRK Katanda</a>
                </div>
            </div>
        </div>
    </footer>