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
					<h1>Contact US</h1>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li>/</li>
						<li>Contact</li>
					</ul>
				</div> <!-- /.opacity -->
			</div> <!-- /inner-page-banner -->



			<!-- 
			=============================================
				Contact Us
			============================================== 
			-->
			<div class="contact-us">
				<div class="container">
					<div class="row">
						<div class="col-lg-7 col-md-6 col-xs-12">
							<div class="contact-us-form">
								<form action="inc/sendemail.php" class="form-validation" autocomplete="off">
									<input type="email" placeholder="Email Address*" name="email">
									<input type="text" placeholder="Subject*" name="sub">
									<textarea placeholder="Your Message*" name="message"></textarea>
									<button class="p-bg-color hvr-trim-two">SEND MESSAGE</button>
								</form>
							</div> <!-- /.contact-us-form -->
						</div> <!-- /.col- -->
						<div class="col-lg-5 col-md-6 col-xs-12">
							<div class="contact-address">
								<h2>Don’t Hesitate to contact with us for any kind of information</h2>
								<p>Call us for imiditate support this number</p>
								<a href="#" class="tran3s">880 876 65 455</a>
								<ul>
									<li><a href="" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="" class="tran3s"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
									<li><a href="" class="tran3s"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								</ul>
							</div> <!-- /.contact-address -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.conatiner -->

				<!--Contact Form Validation Markup -->
				<!-- Contact alert -->
				<div class="alert-wrapper" id="alert-success">
					<div id="success">
						<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
						<div class="wrapper">
			               	<p>Your message was sent successfully.</p>
			             </div>
			        </div>
			    </div> <!-- End of .alert_wrapper -->
			    <div class="alert-wrapper" id="alert-error">
			        <div id="error">
			           	<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
			           	<div class="wrapper">
			               	<p>Sorry!Something Went Wrong.</p>
			            </div>
			        </div>
			    </div> <!-- End of .alert_wrapper -->
			</div> <!-- /.contact-us -->


			<!-- Google Map _______________________ -->
			<div id="google-map-area">
				<div class="google-map" id="contact-google-map" data-map-lat="40.925372" data-map-lng="-74.276544" data-map-title="Find Map" data-map-zoom="12"></div>
	   		 </div>

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
		<!-- js ripels -->
		<script type="text/javascript" src="<?= base_url()?>/assets/vendor/jquery.ripples-master/dist/jquery.ripples-min.js"></script>
		<!-- Validation -->
		<script type="text/javascript" src="<?= base_url()?>/assets/vendor/contact-form/validate.js"></script>
		<script type="text/javascript" src="<?= base_url()?>/assets/vendor/contact-form/jquery.form.js"></script>
		<!-- Google map js -->
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZ8VrXgGZ3QSC-0XubNhuB2uKKCwqVaD0&callback=googleMap" type="text/javascript"></script> <!-- Gmap Helper -->
		<script src="<?= base_url()?>/assets/vendor/gmaps.min.js"></script>


		<!-- Theme js -->
		<script type="text/javascript" src="<?= base_url()?>/assets/js/theme.js"></script>
		<script type="text/javascript" src="<?= base_url()?>/assets/js/map-script.js"></script>

    </div>
</body>
</html>