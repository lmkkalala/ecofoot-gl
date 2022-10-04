    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                          <div class="carousel-item active" > 
                                <div class="single_product_img" >
                                    <img src="<?=base_url()?>img/img_2334.jpg" alt="#" class="img-fluid d-block w-100 p-0">
                                </div>
                          </div>
                          <div class="carousel-item">
                                <div class="single_product_img">
                                    <img src="<?=base_url()?>img/img_0118.jpg" alt="#" class="img-fluid d-block w-100 p-0">
                                </div>
                          </div>
                          <div class="carousel-item">
                                <div class="single_product_img">
                                    <img src="<?=base_url()?>img/img_0088.jpg" alt="#" class="img-fluid d-block w-100 p-0">
                                </div>
                          </div>
                          <div class="carousel-item">
                                <div class="single_product_img">
                                    <img src="<?=base_url()?>img/img_5939.jpg" alt="#" class="img-fluid d-block w-100 p-0">
                                </div>
                          </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                  </div>
    
    <div class="container tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                GALLERIE 
            </h2>
        </div>
        <div class="row tm-mb-90 tm-gallery">
            <?php foreach ($list_photo as $key => $photo) {?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
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
            <?php }?>    
        </div>
    </div> <!-- container-fluid, tm-container-content -->

    <div class="tm-bg-gray pt-5 pb-3 tm-text-gray">
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
    </div>