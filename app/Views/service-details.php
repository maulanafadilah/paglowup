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
					<h1>Our service</h1>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li>/</li>
						<li>Service Details</li>
					</ul>
				</div> <!-- /.opacity -->
			</div> <!-- /inner-page-banner -->



			<!-- 
			=============================================
				Our Service Details
			============================================== 
			-->
			<div class="service-details">
				<div class="container">
					<div class="box-wrapper">
						<img src="<?= base_url()?>/assets/images/home/13.jpg" alt="" class="feature-image">
						<div class="title clearfix">
							<h3 class="float-left">Complete Business solution</h3>
							<a href="#" class="loan float-right">Apply Now</a>
						</div> <!-- /.title -->
						<div class="top-text">
							<h4>There are numerous success stories you will hear about businesses making it goodes on the internet .The troubling thing is, there are maybe with tenfold or even a hundredfold of stories inconsistent to theirs.</h4>
							<div class="row">
								<div class="col-md-6 wow fadeInLeft"><p>Sometimes this is airony promoting  businesse product and services, because for fact that you want make ur business recognizable & earn sales of course you need with lot of effort.</p></div>
								<div class="col-md-6 wow fadeInRight"><p>Sometimes this is airony promoting  businesse product and services, because for fact that you want make ur business recognizable & earn sales of course you need with lot of effort.</p></div>
							</div>
						</div> <!-- /.top-text -->

						<div class="middle-text list-box-text wow fadeInUp">
							<h3>Included Featues</h3>
							<p>Achieve all your goals and aspirations; with the right kind of help, exactly when you need it.</p>
							<ul>
								<li>
									<h4>Mobile Game Devlo.</h4>
									<p>Sometimes this is airony promoting  businesse product and services, because for fact that you want make ur business recognizable & earn sales of course you need with lot of effort.</p>
								</li>
								<li>
									<h4>Be Wordpress Theme.</h4>
									<p>Sometimes this is airony promoting  businesse product and services, because for fact that you want make ur business recognizable & earn sales of course you need with lot of effort.</p>
								</li>
								<li>
									<h4>Graphic Design.</h4>
									<p>Sometimes this is airony promoting  businesse product and services, because for fact that you want make ur business recognizable & earn sales of course you need with lot of effort.</p>
								</li>
							</ul>
						</div> <!-- /.middle-text -->

						<div class="bottom-text list-box-text wow fadeInUp">
							<h3>Boost your website</h3>
							<p>Any salaried, self-employed or professional Public and Privat companies, Government sector employees including Public Sector is eligible for a personal loan.</p>
							<div class="row">
								<div class="col-md-6">
									<ul>
										<li>
											<h4>Design &amp; Devlopment</h4>
											<p>Sometimes this is airony promoting  businesse product and services, because for fact that you want make ur business</p>
										</li>
									</ul>
								</div>
								<div class="col-md-6">
									<ul>
										<li>
											<h4>Content Creation</h4>
											<p>Sometimes this is airony promoting  businesse product and services, because for fact that you want make ur business</p>
										</li>
									</ul>
								</div>
								<div class="col-md-6">
									<ul>
										<li>
											<h4>Technical Service</h4>
											<p>Sometimes this is airony promoting  businesse product and services, because for fact that you want make ur business</p>
										</li>
									</ul>
								</div>
								<div class="col-md-6">
									<ul>
										<li>
											<h4>Business Services</h4>
											<p>Sometimes this is airony promoting  businesse product and services, because for fact that you want make ur business</p>
										</li>
									</ul>
								</div>
							</div>
						</div> <!-- /.bottom-text -->
					</div> <!-- /.box-wrapper -->
				</div> <!-- /.container -->
			</div> <!-- /.service-details -->

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