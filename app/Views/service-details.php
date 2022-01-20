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
        
        <?= $this->include('partials-front/header-service') ?>

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
						<img src="assets/images/home/13.jpg" alt="" class="feature-image">
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

        
		<!-- Js File_________________________________ -->

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


		<!-- Theme js -->
		<script type="text/javascript" src="assets/js/theme.js"></script>

    </div>
</body>
</html>