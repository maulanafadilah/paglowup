<?= $this->include('partials-front/main') ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <?= $title_meta ?>

    <?= $this->include('partials-front/head-css') ?>
    
</head>
<body>
    <div class="main-page-wrapper">
        <!-- ===================================================
				Loading Transition
			==================================================== -->
        <div id="loader-wrapper">
				<div id="loader">
					<ul>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
					</ul>
				</div>
		</div>

        <!-- 
			=============================================
				Theme Header
			============================================== 
			-->
        
        <?= $this->include('partials-front/header') ?>

        <!-- 
			=============================================
				Theme Main Banner
			============================================== 
			-->
			<div id="theme-main-banner" class="banner-one">
				<div data-src="<?= base_url()?>/assets/images/home/slide-1.jpg">
					<div class="camera_caption">
						<div class="container">
							<h5 class="wow fadeInUp animated"><?=$hero1->content?></h5>
							<h1 class="wow fadeInUp animated" data-wow-delay="0.2s">
							<?=$hero1->title?>
							</h1>
							<a href="login" class="tran3s hvr-trim wow fadeInUp animated p-bg-color button-one" data-wow-delay="0.3s">Ayo Daftar</a>
							<div class="wow fadeInRight animated image-shape-one" data-wow-delay="0.33s">
								<svg  version="1.1" class="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="778" height="576">
									<clipPath class="clip1">
										<use xlink:href="#shape-one" />
									</clipPath>
									<g clip-path="url(#shape-one)">
										<image width="778" height="576" href="<?= base_url()?>/webdata/uploads/images/frontpage/<?=$hero1->img1?>" class="banner-img-one">
										</image>
									</g>
								</svg>
							</div>
							<div class="wow fadeInRight animated image-shape-two" data-wow-delay="0.39s"><div class="theme-shape-two"></div></div>
						</div> <!-- /.container -->
					</div> <!-- /.camera_caption -->
				</div>
				<div data-src="<?= base_url()?>/assets/images/home/slide-1.jpg">
					<div class="camera_caption">
						<div class="container">
							<h5 class="wow fadeInUp animated"><?=$hero2->content?></h5>
							<h1 class="wow fadeInUp animated" data-wow-delay="0.2s">
							<?=$hero2->title?>
							</h1>
							<a href="login" class="tran3s hvr-trim wow fadeInUp animated p-bg-color button-one" data-wow-delay="0.3s">Ayo Daftar</a>
							<div class="wow fadeInRight animated image-shape-one" data-wow-delay="0.33s">
								<svg  version="1.1" class="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="778" height="576">
									<clipPath class="clip1">
										<use xlink:href="#shape-one" />
									</clipPath>
									<g clip-path="url(#shape-one)">
										<image width="778" height="576" href="<?= base_url()?>/webdata/uploads/images/frontpage/<?=$hero2->img1?>" class="banner-img-one">
										</image>
									</g>
								</svg>
							</div>
							<div class="wow fadeInRight animated image-shape-two" data-wow-delay="0.39s"><div class="theme-shape-two"></div></div>
						</div> <!-- /.container -->
					</div> <!-- /.camera_caption -->
				</div>
			</div> <!-- /#theme-main-banner -->



			<!-- 
			=============================================
				What We Do
			============================================== 
			-->
			<div class="what-we-do">
				<div class="container">
					<h3><?=$l_do->title?></h3>
					<h6><?=$l_do->content?></h6>

					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInLeft">
							<div class="single-block">
								<div class="icon color-one"><i class="flaticon-drawing"></i></div>
								<h6><?=$l_dc1->title?></h6>
								<h5><?=$l_dc1->content?></h5>
							</div> <!-- /.single-block -->
						</div> <!-- /.col- -->
						<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp">
							<div class="single-block">
								<div class="icon color-two middle-block"><i class="flaticon-diamond"></i></div>
								<h6><?=$l_dc2->title?></h6>
								<h5><?=$l_dc2->content?></h5>
							</div> <!-- /.single-block -->
						</div> <!-- /.col- -->
						<div class="col-md-4 hidden-sm col-xs-12 wow fadeInRight">
							<div class="single-block">
								<div class="icon color-three"><i class="flaticon-user"></i></div>
								<h6><?=$l_dc3->title?></h6>
								<h5><?=$l_dc3->content?></h5>
							</div> <!-- /.single-block -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.what-we-do -->
			

			
			<!-- 
			=============================================
				More About Us
			============================================== 
			-->
			<section id="about">
			<div class="more-about-us" id="#about">
				<div class="image-box">
					<svg  version="1.1" class="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="854" height="632">
						<clipPath class="clip1">
							<use xlink:href="#shape-one" />
						</clipPath>
						<g clip-path="url(#shape-one)">
							<image width="854" height="632" href="<?= base_url()?>/webdata/uploads/images/frontpage/<?=$l_about->img1?>" class="image-shape">
							</image>
						</g>
					</svg>
				</div>
				<div class="theme-shape-three"></div>
				<div class="container">
					<div class="row">
						<div class="col-lg-7 col-md-offset-5">
							<div class="main-content">
								<h2><?=$l_about->title?></h2>
								<div class="main-wrapper">
									<h4><?=$l_about2->title?></h4>
									<p><?=$l_about->content?></p>									
									<img src="<?= base_url()?>/webdata/uploads/images/frontpage/<?=$l_about->img2?>" alt="sign">
									<div class="button-wrapper p-bg-color">
										<span>Learn More</span>
										<a href="#pricing" class="hvr-icon-wobble-horizontal">See Our Pricing <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
									</div> <!-- /.button-wrapper -->
								</div> <!-- /.main-wrapper -->
							</div> <!-- /.main-content -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.more-about-us -->
			</section>


			
			<!-- 
			=============================================
				Our Portfolio
			============================================== 
			-->
			<section id="portofolio">
			<div class="our-portfolio mt-5">
				<div class="container">
					<div class="theme-title">
						<h6>Recent work</h6>
						<h2><?=$l_work->title?></h2>
						<!-- <a href="portfolio-v1.html" class="tran3s">See All projects</a> -->
					</div> <!-- /.theme-title -->
				</div> <!-- /.container -->

				<div class="wrapper">
					<div class="row">
						<div class="portfolio-slider">
						<?php foreach ($l_rwork as $item) {?>
							<div class="item">
								<div class="image" style="border-style: solid; border-color: #f2f2f2;">
									<img src="<?= base_url()?>/webdata/uploads/prev_data/<?=$item->designpreview1?>" alt="">
									<div class="opacity tran4s"><a data-fancybox="project" href="<?= base_url()?>/webdata/uploads/prev_data/<?=$item->designpreview1?>" class="tran3s" title="Beberapa design yang sudah diselesaikan PaGlowUp"></a></div>
								</div>
							</div>
						<?php } ?>
						</div> <!-- /.portfolio-slider -->
					</div> <!-- /.row -->
				</div> <!-- /.wrapper -->
				<div class="more-about-us">
					<div class="main-content">
						<div class="main-wrapper">
						<div class="button-wrapper p-bg-color">
							<span>Learn More</span>
							<a href="/portofolio" class="hvr-icon-wobble-horizontal">See Our Gallery <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
						</div>
					</div>
					</div>
				</div>
				
			</div> <!-- /.our-portfolio -->
			</section>

			<!-- 
			=============================================
				Home Service Section
			============================================== 
			-->
			<section id="service">
			<div class="home-service-section">
				<div class="container">
					<div class="col-md-9 col-md-offset-3 main-container">
						<div class="theme-title">
							<h6>Our Services</h6>
							<h2><?=$l_services->title?></h2>
							<p><?=$l_services->content?></p>
						</div> <!-- /.theme-title -->
						<ul class="clearfix row">
							<?php foreach ($l_sc as $b) {?>
							<li class="col-md-6">
								<div>
									<i class="<?=$b->img1?>"></i>
									<h5><a href="service" class="tran3s"><?=$b->title?></a></h5>
									<p><?=$b->content?></p>
								</div>
							</li>
							<?php } ?>
						</ul>
					</div> <!-- /.main-container -->
					<img src="<?= base_url()?>/webdata/uploads/images/frontpage/<?=$l_services->img1?>" alt="Image" class="wow fadeInLeft">
				</div> <!-- /.container -->
			</div> <!-- /.home-service-section -->
			</section>


			<!-- ==================== TWO SECTION WRAPPER ====================== -->
			<div class="two-section-wrapper">
				<!-- 
				=============================================
					Pricing Plan Style One
				============================================== 
				-->
				<section id="pricing">
				<div class="pricing-plan-one">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-xs-12 wow fadeInLeft">
								<div class="theme-title">
									<h6>Our pricing</h6>
									<h2><?=$l_pricing->title?></h2>
									<p><?=$l_pricing->content?></p>
								</div> <!-- /.theme-title -->
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#monthly">Logo</a></li>
									<li><a data-toggle="tab" href="#yearly">Kemasan</a></li>
									<li><a data-toggle="tab" href="#both">Logo & Kemasan</a></li>
								</ul>
							</div> <!-- /.col- -->

							<div class="col-md-6 col-xs-12 wow fadeInRight">
								<div class="tab-content">
									<div id="monthly" class="tab-pane fade in active">
								    	<div class="clearfix">
								    		<div class="float-left left-side">
								    			<span><sub>Rp</sub><?=$l_popt1->content?></span>
								    			<h6><?=$l_popt1->title?></h6>
								    			<a href="login">+</a>
								    		</div> <!-- /.left-side -->
								    		
								    	</div>
									</div> <!-- /#monthly -->
								  	<div id="yearly" class="tab-pane fade">
								    	<div class="clearfix">
								    		<div class="float-left left-side">
								    			<span><sub>Rp</sub><?=$l_popt2->content?></span>
								    			<h6><?=$l_popt2->title?></h6>
								    			<a href="login">+</a>
								    		</div> <!-- /.left-side -->
								    		
								    	</div>
								  	</div> <!-- /#yearly -->
									  <div id="both" class="tab-pane fade">
								    	<div class="clearfix">
								    		<div class="float-left left-side">
								    			<span><sub>Rp</sub><?=$l_popt3->content?></span>
								    			<h6><?=$l_popt3->title?></h6>
								    			<a href="login">+</a>
								    		</div> <!-- /.left-side -->
								    		
								    	</div>
								  	</div> <!-- /#yearly -->
								</div>
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.pricing-plan-one -->
				</section>

				<!-- 
				=============================================
					Testimonial
				============================================== 
				-->
				<div class="testimonial-section">
					<div class="image-box wow fadeInLeft">
						<svg  version="1.1" class="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="854" height="630">
							<clipPath class="clip1">
								<use xlink:href="#shape-one" />
							</clipPath>
							<g clip-path="url(#shape-one)">
								<image width="854" height="630" href="<?= base_url()?>/webdata/uploads/images/frontpage/<?=$l_testi->img1?>" class="image-shape">
								</image>
							</g>
						</svg>
					</div>
					<div class="theme-shape-four wow fadeInLeft"></div>
					<div class="container">
						<div class="main-container col-md-6 col-md-offset-6">
							<div class="theme-title">
								<h6>Testimonials</h6>
								<h2><?=$l_testi->title?></h2>
							</div> <!-- /.theme-title -->
							<div class="testimonial-slider">
								<?php foreach ($l_rtesti as $item) {?>
								<div class="item">
									<div class="wrapper">
										<?=$item->reviewdesigner?>
										<div class="name clearfix">
											<img src="<?= base_url()?>/webdata/uploads/images/umkm/<?=$item->umkm_pic?>" alt="">
											<h5><?=$item->umkm_name?></h5>
											<p><?=$item->address?></p>
										</div>
									</div> <!-- /.wrapper -->
								</div> <!-- /.item -->
								<?php } ?>
							</div> <!-- /.testimonial-slider -->
						</div> <!-- /.main-container -->
					</div> <!-- /.container -->
				</div> <!-- /.testimonial-section -->
			</div> <!-- /.two-section-wrapper -->
			

            <!-- 
			=============================================
				Footer
			============================================== 
			-->
            <?= $this->include('partials-front/footer') ?>


            <!-- Js File_________________________________ -->

		<!-- j Query -->
		<script type="text/javascript" src="<?= base_url()?>/assets/vendor/jquery.2.2.3.min.js"></script>
		<!-- Bootstrap Select JS -->
		<script type="text/javascript" src="<?= base_url()?>/assets/vendor/bootstrap-select/dist/js/bootstrap-select.js"></script>

		<!-- Bootstrap JS -->
		<script type="text/javascript" src="<?= base_url()?>/assets/vendor/bootstrap/bootstrap.min.js"></script>

		<!-- assets/Vendor js _________ -->
		<!-- Camera Slider -->
		<script type='text/javascript' src='assets/vendor/Camera-master/scripts/jquery.mobile.customized.min.js'></script>
	    <script type='text/javascript' src='assets/vendor/Camera-master/scripts/jquery.easing.1.3.js'></script> 
	    <script type='text/javascript' src='assets/vendor/Camera-master/scripts/camera.min.js'></script>
	    <!-- Mega menu  -->
		<script type="text/javascript" src="<?= base_url()?>/assets/vendor/bootstrap-mega-menu/js/menu.js"></script>
		
		<!-- WOW js -->
		<script type="text/javascript" src="<?= base_url()?>/assets/vendor/WOW-master/dist/wow.min.js"></script>
		<!-- owl.carousel -->
		<script type="text/javascript" src="<?= base_url()?>/assets/vendor/owl-carousel/owl.carousel.min.js"></script>
		<!-- js count to -->
		<script type="text/javascript" src="<?= base_url()?>/assets/vendor/jquery.appear.js"></script>
		<script type="text/javascript" src="<?= base_url()?>/assets/vendor/jquery.countTo.js"></script>
		<!-- Fancybox -->
		<script type="text/javascript" src="<?= base_url()?>/assets/vendor/fancybox/dist/jquery.fancybox.min.js"></script>

		<!-- Theme js -->
		<script type="text/javascript" src="<?= base_url()?>/assets/js/theme.js"></script>

    </div>
</body>
</html>