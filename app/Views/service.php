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
        
        <?= $this->include('partials-front/header-2') ?>

			<!-- 
			=============================================
				Theme Inner Banner 
			============================================== 
			-->
			<div class="inner-page-banner">
				<div class="opacity">
					<h1>Our Services</h1>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li>/</li>
						<li>Services</li>
					</ul>
				</div> <!-- /.opacity -->
			</div> <!-- /inner-page-banner -->



			<!-- 
			=============================================
				Our Service V2
			============================================== 
			-->
			<div class="service-version-two">
				<div class="container">
					<div class="single-service">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="image-box">
									<img src="<?= base_url()?>/assets/images/inner-page/2.jpg" alt="">
									<div class="opacity tran3s">
										<p class="one">Gullu went to the woods. He took a fun ride and never came back.</p>
										<p class="two">Gullu went to the woods. He took a fun ride and never came back.</p>
									</div>
								</div>
							</div> <!-- /.col-lg-6 -->
							<div class="col-md-6 col-xs-12 text">
								<p>Mobile App</p>
								<h2>Mobile Game Devlo.</h2>
								<a href="#" class="tran3s"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.single-service -->

					<div class="single-service">
						<div class="row">
							<div class="col-md-6 col-xs-12 float-right">
								<div class="image-box">
									<img src="<?= base_url()?>/assets/images/inner-page/3.jpg" alt="">
									<div class="opacity tran3s">
										<p class="one">Gullu went to the woods. He took a fun ride and never came back.</p>
										<p class="two">Gullu went to the woods. He took a fun ride and never came back.</p>
									</div>
								</div>
							</div> <!-- /.col-lg-6 -->
							<div class="col-md-6 col-xs-12 text">
								<p>Development</p>
								<h2>Be Wordpress Theme.</h2>
								<a href="#" class="tran3s"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.single-service -->

					<div class="single-service">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="image-box">
									<img src="<?= base_url()?>/assets/images/inner-page/4.jpg" alt="">
									<div class="opacity tran3s">
										<p class="one">Gullu went to the woods. He took a fun ride and never came back.</p>
										<p class="two">Gullu went to the woods. He took a fun ride and never came back.</p>
									</div>
								</div>
							</div> <!-- /.col-lg-6 -->
							<div class="col-md-6 col-xs-12 text">
								<p>Graphic Design</p>
								<h2>User Interface Desing.</h2>
								<a href="#" class="tran3s"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.single-service -->

					<div class="single-service">
						<div class="row">
							<div class="col-md-6 col-xs-12 float-right">
								<div class="image-box">
									<img src="<?= base_url()?>/assets/images/inner-page/5.jpg" alt="">
									<div class="opacity tran3s">
										<p class="one">Gullu went to the woods. He took a fun ride and never came back.</p>
										<p class="two">Gullu went to the woods. He took a fun ride and never came back.</p>
									</div>
								</div>
							</div> <!-- /.col-lg-6 -->
							<div class="col-md-6 col-xs-12 text">
								<p>Photography</p>
								<h2>Photography Model.</h2>
								<a href="#" class="tran3s"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.single-service -->
				</div> <!-- /.container -->
			</div> <!-- /.service-version-two -->

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
		<script type="text/javascript" src="<?= base_url()?>/assets/vendor/jquery.ripples-master/dist/jquery.ripples-min.js"></script>


		<!-- Theme js -->
		<script type="text/javascript" src="<?= base_url()?>/assets/js/theme.js"></script>

    </div>
</body>
</html>