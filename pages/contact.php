    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src=""></div>

    <div class="container tm-mt-60" style="margin-top:-4%;">
        <div class="row tm-mb-50">
            <div class="col-lg-4 col-12 mb-5">
                <h2 class="tm-text-primary mb-5">Contacter Nous</h2>
                <form id="sendMessage" action="" method="POST" class="tm-contact-form mx-auto">
                    <p id="status"></p>
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control rounded-0" placeholder="Noms" required />
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="Address mail" required />
                    </div>
                    <!-- <div class="form-group">
                        <input type="text" name="about" class="form-control rounded-0" placeholder="Sujet" required />
                    </div> -->
                    <div class="form-group">
                        <textarea rows="8" name="message" id="message" class="form-control rounded-0" placeholder="Message" required=></textarea>
                    </div>

                    <div class="form-group tm-text-right">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>                
            </div>
            <div class="col-lg-4 col-12 mb-5">
                <div class="tm-address-col">
                    <h2 class="tm-text-primary mb-5">Nos Addresses</h2>
                    <p class="tm-mb-50"> </p>
                    <p class="tm-mb-50"></p>
                    <address class="tm-text-gray tm-mb-50">
                        
                    </address>
                    <ul class="tm-contacts">
                        <li>
                            <a href="#" class="tm-text-gray">
                                <i class="fas fa-envelope"></i>
                                Email: info@company.com
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tm-text-gray">
                                <i class="fas fa-phone"></i>
                                Tel: 010-020-0340
                            </a>
                        </li>
                        <!-- <li>
                            <a href="#" class="tm-text-gray">
                                <i class="fas fa-globe"></i>
                                URL: www.company.com
                            </a>
                        </li> -->
                    </ul>
                </div>                
            </div>
            <div class="col-lg-4 col-12">
                <h2 class="tm-text-primary mb-5">Location sur Map</h2>
                <div class="mapouter mb-4">
                    <div class="gmap-canvas">
                        <iframe width="100%" height="520" id="gmap-canvas"
                            src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </div>               
            </div>
        </div>
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
    
    <script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
</html>