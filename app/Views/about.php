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
        
        <?= $this->include('partials-front/header-about') ?>

			<!-- 
			=============================================
				Theme Inner Banner 
			============================================== 
			-->
			<div class="inner-page-banner">
				<div class="opacity">
					<h1>Company Story</h1>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li>/</li>
						<li>About us</li>
					</ul>
				</div> <!-- /.opacity -->
			</div> <!-- /inner-page-banner -->



			<!-- 
			=============================================
				About Text
			============================================== 
			-->
			<div class="about-text">
				<div class="container">
					<div class="title">
						<h6>WELCOME TO GULL.LY</h6>
						<h2>We’r a dynamic team of creatives people <br>innovation &amp; Marketing Expert.</h2>
					</div>
					<img src="assets/images/inner-page/1.jpg" alt="">
					<div class="about-tab-wrapper clearfix">
						<ul class="nav nav-tabs float-left">
							<li class="active"><a data-toggle="tab" href="#history">Our History</a></li>
							<li><a data-toggle="tab" href="#vision">Vision</a></li>
							<li><a data-toggle="tab" href="#contact">Contact Us</a></li>
							<li><a data-toggle="tab" href="#news">News</a></li>
						</ul>
						<div class="tab-content float-left">
							<div id="history" class="tab-pane fade in active">
						    	<p>We provide marketing services to startups and small businesses to looking for a partner of their digital media, design &amp; dev, lead generation, and communications requirents. We work with you, not for you. Although we have great resources.</p>
						    	<img src="assets/images/home/sign.png" alt="">
							</div> <!-- /#history -->
						  	<div id="vision" class="tab-pane fade">
						    	<p>We provide marketing services to startups and small businesses to looking for a partner of their digital media, design &amp; dev, lead generation, and communications requirents. We work with you, not for you. Although we have great resources.</p>
						  	</div> <!-- /#vision -->
						  	<div id="contact" class="tab-pane fade">
						    	<p>We provide marketing services to startups and small businesses to looking for a partner of their digital media, design &amp; dev, lead generation, and communications requirents. We work with you, not for you. Although we have great resources.</p>
						  	</div> <!-- /#contact -->
						  	<div id="news" class="tab-pane fade">
						    	<p>We provide marketing services to startups and small businesses to looking for a partner of their digital media, design &amp; dev, lead generation, and communications requirents. We work with you, not for you. Although we have great resources.</p>
						  	</div> <!-- /#news -->
						</div>
					</div> <!-- /.about-tab-wrapper -->
				</div> <!-- /.container -->
			</div> <!-- /.about-text -->

			<!-- 
			=============================================
				Theme Counter
			============================================== 
			-->
			<div class="theme-counter no-border fix">
				<div class="container">
					<div class="row">
		        		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
		        			<div class="single-box">
		        				<h2 class="number"><span class="timer" data-from="0" data-to="2730" data-speed="1000" data-refresh-interval="5">0</span>+</h2>
		        				<p>Completed Projects</p>
		        			</div> <!-- /.single-box -->
		        		</div>
		        		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
		        			<div class="single-box">
		        				<h2 class="number"><span class="timer" data-from="0" data-to="39" data-speed="1000" data-refresh-interval="5">0</span></h2>
		        				<p>Availble Country</p>
		        			</div> <!-- /.single-box -->
		        		</div>
		        		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
		        			<div class="single-box">
		        				<h2 class="number"><span class="timer" data-from="0" data-to="125" data-speed="1000" data-refresh-interval="5">0</span>M</h2>
		        				<p>User Worldwide</p>
		        			</div> <!-- /.single-box -->
		        		</div>
		        		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
		        			<div class="single-box border-fix">
		        				<h2 class="number"><span class="timer" data-from="0" data-to="12" data-speed="1000" data-refresh-interval="5">0</span></h2>
		        				<p>Award Winner</p>
		        			</div> <!-- /.single-box -->
		        		</div>
		        	</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.theme-counter -->
			


			<!-- 
			=============================================
				Testimonial
			============================================== 
			-->
			<div class="testimonial-section bg-image">
				<div class="container">
					<div class="main-container col-md-6 col-md-offset-6">
						<div class="theme-title">
							<h6>Testimonials</h6>
							<h2>Check what’s our client <br>Say about us</h2>
						</div> <!-- /.theme-title -->
						<div class="testimonial-slider">
							<div class="item">
								<div class="wrapper">
									<p>Their testimonial videos aren't production quality, but they get the message across, cover useful &amp; relevant information which goes to show you don't need to invest thousands in production get some testimonial videos up with quality. </p>
									<div class="name clearfix">
										<img src="assets/images/home/3.jpg" alt="">
										<h5>Rashed Kabir</h5>
										<span>Gazipur</span>
									</div>
								</div> <!-- /.wrapper -->
							</div> <!-- /.item -->
							<div class="item">
								<div class="wrapper">
									<p>Their testimonial videos aren't production quality, but they get the message across, cover useful &amp; relevant information which goes to show you don't need to invest thousands in production get some testimonial videos up with quality. </p>
									<div class="name clearfix">
										<img src="assets/images/home/4.jpg" alt="">
										<h5>Zubayer Hasan</h5>
										<span>Uttara</span>
									</div>
								</div> <!-- /.wrapper -->
							</div> <!-- /.item -->
						</div> <!-- /.testimonial-slider -->
					</div> <!-- /.main-container -->
				</div> <!-- /.container -->
			</div> <!-- /.testimonial-section -->
			


			<!-- 
			=============================================
				Our Team Style One 
			============================================== 
			-->
			<div class="our-team-styleOne">
				<div class="container">
					<div class="title">
						<h2>Our team member will ready <br>for your service</h2>
						<a href="team-v1.html" class="tran3s">See all</a>
					</div> <!-- /.title -->
					<div class="row">
						<div class="col-md-4 col-xs-6">
							<div class="single-team-member">
								<div class="image">
									<img src="assets/images/team/1.jpg" alt="">
									<div class="opacity tran3s">
										<ul class="tran3s">
											<li><a href="" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="" class="tran3s"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
											<li><a href="" class="tran3s"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
										</ul>
									</div>
								</div> <!-- /.image -->
								<h6>Rashed Kabir</h6>
								<p>CO-Founder &amp; Designer</p>
							</div> <!-- /.single-team-member -->
						</div> <!-- /.col- -->
						<div class="col-md-4 col-xs-6">
							<div class="single-team-member">
								<div class="image">
									<img src="assets/images/team/2.jpg" alt="">
									<div class="opacity tran3s">
										<ul class="tran3s">
											<li><a href="" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="" class="tran3s"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
											<li><a href="" class="tran3s"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
										</ul>
									</div>
								</div> <!-- /.image -->
								<h6>Mahfuz Riad</h6>
								<p>CO-Founder &amp; Designer</p>
							</div> <!-- /.single-team-member -->
						</div> <!-- /.col- -->
						<div class="col-md-4 col-xs-6 hidden-sm">
							<div class="single-team-member">
								<div class="image">
									<img src="assets/images/team/3.jpg" alt="">
									<div class="opacity tran3s">
										<ul class="tran3s">
											<li><a href="" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="" class="tran3s"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
											<li><a href="" class="tran3s"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
										</ul>
									</div>
								</div> <!-- /.image -->
								<h6>Foqrul Islam</h6>
								<p>CO-Founder &amp; Designer</p>
							</div> <!-- /.single-team-member -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.our-team-styleOne -->


			<!-- 
			=============================================
				Trusted Client
			============================================== 
			-->
			<div class="trusted-client">
				<div class="container">
					<div class="title">
						<h2>Our trusted client</h2>
						<p>We have show that some of our best partners ho all beside us</p>
					</div>
					<div class="row">
						<div class="col-md-4 col-xs-6">
							<div class="client-img"><img src="assets/images/logo/p-5.png" alt=""></div>
						</div>
						<div class="col-md-4 col-xs-6">
							<div class="client-img"><img src="assets/images/logo/p-6.png" alt=""></div>
						</div>
						<div class="col-md-4 col-xs-6">
							<div class="client-img"><img src="assets/images/logo/p-7.png" alt=""></div>
						</div>
						<div class="col-md-4 col-xs-6">
							<div class="client-img"><img src="assets/images/logo/p-8.png" alt=""></div>
						</div>
						<div class="col-md-4 col-xs-6">
							<div class="client-img"><img src="assets/images/logo/p-9.png" alt=""></div>
						</div>
						<div class="col-md-4 col-xs-6">
							<div class="client-img"><img src="assets/images/logo/p-10.png" alt=""></div>
						</div>
					</div>
				</div> <!-- /.container -->
			</div> <!-- /.trusted-client -->

            <!-- 
			=============================================
				Footer
			============================================== 
			-->
            <?= $this->include('partials-front/footer') ?>

            
			<!-- Sign-Up Modal -->
			<div class="modal fade signUpModal theme-modal-box" role="dialog">
				<div class="modal-dialog">
				    <!-- Modal content-->
				    <div class="modal-content">
					    <div class="modal-body">
					        <h3>Login with Social Networks</h3>
					        <ul class="clearfix">
					        	<li class="float-left"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> facebook</a></li>
					        	<li class="float-left"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i> Google</a></li>
					        	<li class="float-left"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
					        	<li class="float-left"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i> Linkedin</a></li>
					        </ul>
					        <form action="#">
					        	<h6><span>or</span></h6>
					        	<div class="wrapper">
					        		<input type="text" placeholder="Username or Email">
					        		<input type="password" placeholder="Password">
					        		<ul class="clearfix">
										<li class="float-left">
											<input type="checkbox" id="remember">
											<label for="remember">Remember Me</label>
										</li>
										<li class="float-right"><a href="#" class="p-color">Lost Your Password?</a></li>
									</ul>
									<button class="p-bg-color hvr-trim-two">Login</button>
					        	</div>
					        </form>
					    </div> <!-- /.modal-body -->
				    </div> <!-- /.modal-content -->
				</div> <!-- /.modal-dialog -->
			</div> <!-- /.signUpModal -->

	        

	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>

			<div id="svag-shape">
				<svg height="0" width="0">
					<defs>
					    <clipPath id="shape-one">
					     	<path fill-rule="evenodd"  fill="rgb(168, 168, 168)"
					 d="M343.000,25.000 C343.000,25.000 100.467,106.465 25.948,237.034 C-30.603,336.119 15.124,465.228 74.674,495.331 C134.224,525.434 212.210,447.071 227.280,432.549 C242.349,418.028 338.889,359.517 460.676,506.542 C582.737,653.896 725.650,527.546 751.000,478.000 C789.282,403.178 862.636,-118.314 343.000,25.000 Z"/>
					    </clipPath>
					</defs>
				</svg>
			</div>

        
		<!-- j Query -->
		<script type="text/javascript" src="assets/vendor/jquery.2.2.3.min.js"></script>
		<!-- Bootstrap Select JS -->
		<script type="text/javascript" src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.js"></script>

		<!-- Bootstrap JS -->
		<script type="text/javascript" src="assets/vendor/bootstrap/bootstrap.min.js"></script>

		<!-- assets/Vendor js _________ -->
	    <!-- Mega menu  -->
		<script type="text/javascript" src="assets/vendor/bootstrap-mega-menu/js/menu.js"></script>
		
		<!-- WOW js -->
		<script type="text/javascript" src="assets/vendor/WOW-master/dist/wow.min.js"></script>
		<!-- owl.carousel -->
		<script type="text/javascript" src="assets/vendor/owl-carousel/owl.carousel.min.js"></script>
		<!-- js count to -->
		<script type="text/javascript" src="assets/vendor/jquery.appear.js"></script>
		<script type="text/javascript" src="assets/vendor/jquery.countTo.js"></script>
		<!-- Fancybox -->
		<script type="text/javascript" src="assets/vendor/fancybox/dist/jquery.fancybox.min.js"></script>
		<script type="text/javascript" src="assets/vendor/jquery.ripples-master/dist/jquery.ripples-min.js"></script>
		<!-- mixitup -->
		<script type="text/javascript" src="assets/vendor/jquery.mixitup.min.js"></script>

		<!-- Theme js -->
		<script type="text/javascript" src="assets/js/theme.js"></script>

    </div>
</body>
</html>