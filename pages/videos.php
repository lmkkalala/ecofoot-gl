    <div class="tm-hero d-flex justify-content-center align-items-center" id="tm-video-container">
        <video autoplay muted loop id="tm-video">
            <source src="<?=base_url()?>video/hero.mp4" type="video/mp4">
        </video>
    </div>

    <div class="container tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                TOUTES NOS VIDEOS
            </h2>
        </div>
        <div class="row mb-3 tm-gallery">
            <?php
                foreach ($list_video as $key => $video) {
             ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <video  id="tm-video" style="max-height: 150px!important;">
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
                    <span class="tm-text-gray-light text-dark"><strong><?=$video->titre?></strong> Le <?=date('d-m-Y',$video->date)?></span>
                    <span class="text-dark"><?=$video->contenu?></span>
                </div>
            </div>
        <?php }?>       
        </div> <!-- row -->
    </div> <!-- container-fluid, tm-container-content -->

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