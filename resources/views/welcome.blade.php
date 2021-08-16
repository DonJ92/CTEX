@extends('layouts.app')

@section('content')
    <!-- WELCOME -->
    <section id="welcome" class="p-b-0">
        <div class="container">
            <div class="heading-text heading-section text-center m-b-40" data-animate="animate__fadeInUp">
                <h2>WELCOME TO THE WORLD OF POLO</h2>
                <span class="lead">Create amam ipsum dolor sit amet, Beautiful nature, and rare feathers!.</span>
            </div>
            <div class="row" data-animate="animate__fadeInUp">
                <div class="col-lg-12">
                    <img class="img-fluid" src="images/other/responsive-1.jpg" alt="Welcome to POLO">
                </div>
            </div>
        </div>
    </section>
    <!-- end: WELCOME -->
    <!-- WHAT WE DO -->
    <section class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>WHAT WE DO</h2>
                <span class="lead">Create amam ipsum dolor sit amet, Beautiful nature, and rare feathers!.</span>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div data-animate="animate__fadeInUp" data-animate-delay="0">
                        <h4>Modern Design</h4>
                        <p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div data-animate="animate__fadeInUp" data-animate-delay="200">
                        <h4>Loaded with Features</h4>
                        <p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div data-animate="animate__fadeInUp" data-animate-delay="400">
                        <h4>Completely Customizable</h4>
                        <p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div data-animate="animate__fadeInUp" data-animate-delay="600">
                        <h4>100% Responsive Layout</h4>
                        <p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div data-animate="animate__fadeInUp" data-animate-delay="800">
                        <h4>Clean Modern Code</h4>
                        <p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div data-animate="animate__fadeInUp" data-animate-delay="1000">
                        <h4>Free Updates & Support</h4>
                        <p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END WHAT WE DO -->
    <!-- PORTFOLIO -->
    <section class="p-b-0">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>Recent Work</h2>
                <span class="lead">Lorem ipsum dolor sit amet, coper suscipit lobortis nisl ut aliquip ex ea commodo
                        consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                        consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto.</span>
            </div>
        </div>
        <div class="portfolio">
            <!-- Portfolio Items -->
            <div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="0">
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay ct-photography ct-media ct-branding ct-Media ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-slider">
                            <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="1500">
                                <a href="#"><img src="images/portfolio/64.jpg" alt=""></a>
                                <a href="#"><img src="images/portfolio/70.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item img-zoom ct-photography ct-marketing ct-media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="images/portfolio/60.jpg" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a title="Paper Pouch!" data-lightbox="image" href="images/portfolio/83l.jpg"><i class="icon-maximize"></i></a>
                            <a href="portfolio-page-grid-gallery.html"><i class="icon-link"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="images/portfolio/61.jpg" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Let's Go Outside</h3>
                                <span>Illustrations / Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-marketing ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="images/portfolio/65.jpg" alt=""></a>
                        </div>
                        <div class="portfolio-description" data-lightbox="gallery">
                            <a title="Photoshop Mock-up!" data-lightbox="gallery-image" href="images/portfolio/80l.jpg"><i class="icon-copy"></i></a>
                            <a title="Paper Pouch!" data-lightbox="gallery-image" href="images/portfolio/81l.jpg" class="hidden"></a>
                            <a title="Mock-up" data-lightbox="gallery-image" href="images/portfolio/82l.jpg" class="hidden"></a>
                            <a href="portfolio-page-grid-gallery.html"><i class="icon-link"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item img-zoom ct-marketing ct-media ct-branding ct-marketing ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="images/portfolio/66.jpg" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Last Iceland Sunshine</h3>
                                <span>Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-marketing ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="images/portfolio/67.jpg" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a title="Paper Pouch!" data-lightbox="iframe" href="https://www.youtube.com/watch?v=k6Kly58LYzY"><i class="icon-play"></i></a>
                            <a href="portfolio-page-grid-gallery.html"><i class="icon-link"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item no-overlay ct-photography ct-media ct-branding ct-Media ct-marketing ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-slider">
                            <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="1500">
                                <a href="#"><img src="images/portfolio/68.jpg" alt=""></a>
                                <a href="#"><img src="images/portfolio/71.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
                <!-- portfolio item -->
                <div class="portfolio-item img-zoom ct-photography ct-marketing ct-media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="images/portfolio/69.jpg" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Luxury Wine</h3>
                                <span>Graphics / Branding</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
            </div>
            <!-- end: Portfolio Items -->
        </div>
    </section>
    <!-- end: PORTFOLIO -->
    <!-- SERVICES -->
    <section>
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2>SERVICES</h2>
                <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.
                </p>
            </div>
            <div class="row">
                <div class="col-lg-4" data-animate="animate__fadeInUp" data-animate-delay="0">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fa fa-plug"></i></a>
                        </div>
                        <h3>Powerful template</h3>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="animate__fadeInUp" data-animate-delay="200">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fa fa-desktop"></i></a>
                        </div>
                        <h3>Flexible Layouts</h3>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="animate__fadeInUp" data-animate-delay="400">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fa fa-cloud"></i></a>
                        </div>
                        <h3>Retina Ready</h3>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="animate__fadeInUp" data-animate-delay="600">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="far fa-lightbulb"></i></a>
                        </div>
                        <h3>Fast processing</h3>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="animate__fadeInUp" data-animate-delay="800">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fa fa-trophy"></i></a>
                        </div>
                        <h3>Unlimited Colors</h3>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="animate__fadeInUp" data-animate-delay="1000">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fa fa-thumbs-up"></i></a>
                        </div>
                        <h3>Premium Sliders</h3>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="animate__fadeInUp" data-animate-delay="1200">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fa fa-rocket"></i></a>
                        </div>
                        <h3>Modern Design</h3>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="animate__fadeInUp" data-animate-delay="1400">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fa fa-flask"></i></a>
                        </div>
                        <h3>Clean Modern Code</h3>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="animate__fadeInUp" data-animate-delay="1600">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fa fa-umbrella"></i></a>
                        </div>
                        <h3>Free Updates & Support</h3>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: SERVICES -->
    <!-- COUNTERS -->
    <section class="text-light p-t-150 p-b-150 " data-bg-parallax="images/parallax/12.jpg">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="text-center">
                        <div class="icon"><i class="fa fa-3x fa-code"></i></div>
                        <div class="counter"> <span data-speed="3000" data-refresh-interval="50" data-to="12416" data-from="600" data-seperator="true"></span> </div>
                        <div class="seperator seperator-small"></div>
                        <p>LINES OF CODE</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-center">
                        <div class="icon"><i class="fa fa-3x fa-coffee"></i></div>
                        <div class="counter"> <span data-speed="4500" data-refresh-interval="23" data-to="365" data-from="100" data-seperator="true"></span> </div>
                        <div class="seperator seperator-small"></div>
                        <p>CUPS OF COFFEE</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-center">
                        <div class="icon"><i class="fa fa-3x fa-rocket"></i></div>
                        <div class="counter"> <span data-speed="3000" data-refresh-interval="12" data-to="114" data-from="50" data-seperator="true"></span> </div>
                        <div class="seperator seperator-small"></div>
                        <p>FINISHED PROJECTS</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-center">
                        <div class="icon"><i class="fa fa-3x fa-smile-o"></i></div>
                        <div class="counter"> <span data-speed="4550" data-refresh-interval="50" data-to="14825" data-from="48" data-seperator="true"></span> </div>
                        <div class="seperator seperator-small"></div>
                        <p>SATISFIED CLIENTS</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: COUNTERS -->
    <!-- BLOG -->
    <section class="content background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>OUR BLOG</h2>
                <span class="lead">The most happiest time of the day!. Morbi sagittis, sem quis lacinia faucibus,
                        orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id
                        molestie ipsum volutpat quis. A true story, that never been told!. Fusce id mi diam, non ornare
                        orci. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor. </span>
            </div>
            <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">
                <!-- Post item-->
                <div class="post-item border">
                    <div class="post-item-wrap">
                        <div class="post-image">
                            <a href="#">
                                <img alt="" src="images/blog/12.jpg">
                            </a>
                            <span class="post-meta-category"><a href="">Lifestyle</a></span>
                        </div>
                        <div class="post-item-description">
                            <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Jan 21, 2017</span>
                            <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33
                                        Comments</a></span>
                            <h2><a href="#">Standard post with a single image
                                </a></h2>
                            <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet.</p>
                            <a href="#" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end: Post item-->
                <!-- Post item-->
                <div class="post-item border">
                    <div class="post-item-wrap">
                        <div class="post-image">
                            <a href="#">
                                <img alt="" src="images/blog/17.jpg">
                            </a>
                            <span class="post-meta-category"><a href="">Science</a></span>
                        </div>
                        <div class="post-item-description">
                            <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Jan 21, 2017</span>
                            <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33
                                        Comments</a></span>
                            <h2><a href="#">Standard post with a single image
                                </a></h2>
                            <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet.</p>
                            <a href="#" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end: Post item-->
                <!-- Post item-->
                <div class="post-item border">
                    <div class="post-item-wrap">
                        <div class="post-image">
                            <a href="#">
                                <img alt="" src="images/blog/18.jpg">
                            </a>
                            <span class="post-meta-category"><a href="">Science</a></span>
                        </div>
                        <div class="post-item-description">
                            <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Jan 21, 2017</span>
                            <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33
                                        Comments</a></span>
                            <h2><a href="#">Standard post with a single image
                                </a></h2>
                            <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet.</p>
                            <a href="#" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end: Post item-->
            </div>
        </div>
    </section>
    <!-- end: BLOG -->
    <!-- CLIENTS -->
    <section class="p-t-60">
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2>CLIENTS</h2>
                <span class="lead">Our awesome clients we've had the pleasure to work with! </span>
            </div>
            <div class="carousel client-logos" data-items="6" data-items-sm="4" data-items-xs="3" data-items-xxs="2" data-margin="20" data-arrows="false" data-autoplay="true" data-autoplay="3000" data-loop="true">
                <div>
                    <a href="#"><img alt="" src="images/clients/1.png"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="images/clients/2.png"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="images/clients/3.png"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="images/clients/4.png"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="images/clients/5.png"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="images/clients/6.png"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="images/clients/7.png"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="images/clients/8.png"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="images/clients/9.png"> </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end: CLIENTS -->
    <!-- TEAM -->
    <section class="background-grey">
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2>MEET OUR TEAM</h2>
                <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.
                </p>
            </div>
            <div class="row team-members">
                <div class="col-lg-3">
                    <div class="team-member">
                        <div class="team-image">
                            <img src="images/team/6.jpg">
                        </div>
                        <div class="team-desc">
                            <h3>Alea Smith</h3>
                            <span>Software Developer</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing tristique hendrerit laoreet. </p>
                            <div class="align-center">
                                <a class="btn btn-xs btn-slide btn-light" href="#">
                                    <i class="fab fa-facebook-f"></i>
                                    <span>Facebook</span>
                                </a>
                                <a class="btn btn-xs btn-slide btn-light" href="#" data-width="100">
                                    <i class="fab fa-twitter"></i>
                                    <span>Twitter</span>
                                </a>
                                <a class="btn btn-xs btn-slide btn-light" href="#" data-width="118">
                                    <i class="fab fa-instagram"></i>
                                    <span>Instagram</span>
                                </a>
                                <a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
                                    <i class="icon-mail"></i>
                                    <span>Mail</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="team-member">
                        <div class="team-image">
                            <img src="images/team/7.jpg">
                        </div>
                        <div class="team-desc">
                            <h3>Ariol Doe</h3>
                            <span>Software Developer</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing tristique hendrerit laoreet. </p>
                            <div class="align-center">
                                <a class="btn btn-xs btn-slide btn-light" href="#">
                                    <i class="fab fa-facebook-f"></i>
                                    <span>Facebook</span>
                                </a>
                                <a class="btn btn-xs btn-slide btn-light" href="#" data-width="100">
                                    <i class="fab fa-twitter"></i>
                                    <span>Twitter</span>
                                </a>
                                <a class="btn btn-xs btn-slide btn-light" href="#" data-width="118">
                                    <i class="fab fa-instagram"></i>
                                    <span>Instagram</span>
                                </a>
                                <a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
                                    <i class="icon-mail"></i>
                                    <span>Mail</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="team-member">
                        <div class="team-image">
                            <img src="images/team/8.jpg">
                        </div>
                        <div class="team-desc">
                            <h3>Emma Ross</h3>
                            <span>Software Developer</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing tristique hendrerit laoreet. </p>
                            <div class="align-center">
                                <a class="btn btn-xs btn-slide btn-light" href="#">
                                    <i class="fab fa-facebook-f"></i>
                                    <span>Facebook</span>
                                </a>
                                <a class="btn btn-xs btn-slide btn-light" href="#" data-width="100">
                                    <i class="fab fa-twitter"></i>
                                    <span>Twitter</span>
                                </a>
                                <a class="btn btn-xs btn-slide btn-light" href="#" data-width="118">
                                    <i class="fab fa-instagram"></i>
                                    <span>Instagram</span>
                                </a>
                                <a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
                                    <i class="icon-mail"></i>
                                    <span>Mail</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="team-member">
                        <div class="team-image">
                            <img src="images/team/9.jpg">
                        </div>
                        <div class="team-desc">
                            <h3>Victor Loda</h3>
                            <span>Software Developer</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing tristique hendrerit laoreet. </p>
                            <div class="align-center">
                                <a class="btn btn-xs btn-slide btn-light" href="#">
                                    <i class="fab fa-facebook-f"></i>
                                    <span>Facebook</span>
                                </a>
                                <a class="btn btn-xs btn-slide btn-light" href="#" data-width="100">
                                    <i class="fab fa-twitter"></i>
                                    <span>Twitter</span>
                                </a>
                                <a class="btn btn-xs btn-slide btn-light" href="#" data-width="118">
                                    <i class="fab fa-instagram"></i>
                                    <span>Instagram</span>
                                </a>
                                <a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
                                    <i class="icon-mail"></i>
                                    <span>Mail</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: TEAM -->
@endsection
