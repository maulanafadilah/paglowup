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
        
        <?= $this->include('partials-front/header-portofolio') ?>

			<!-- 
			=============================================
				Theme Inner Banner 
			============================================== 
			-->
			<div class="inner-page-banner">
				<div class="opacity">
					<h1>Single Portfolio</h1>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li>/</li>
						<li>Portfolio</li>
					</ul>
				</div> <!-- /.opacity -->
			</div> <!-- /inner-page-banner -->



			<!-- 
			=============================================
				Portfolio Details
			============================================== 
			-->
			<div class="portfolio-details">
				<div class="container">
					<div class="title">
						<h2>Improve your business cards &amp;<br> Enhance Your Sales</h2>
						<ul>
							<li>Share:</li>
							<li><a href="" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="" class="tran3s"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
							<li><a href="" class="tran3s"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						</ul>
					</div> <!-- /.title -->
					<img src="assets/images/portfolio/23.jpg" alt="">
					<div class="project-details-wrapper">
						<div class="row">
							<div class="col-sm-4">
								<div class="project-info-list">
									<ul>
										<li>
											<h6>Date</h6>
											<p>12 May 2016</p>
										</li>
										<li>
											<h6>Client Name</h6>
											<p>Jhone Doe, Mirpur-11</p>
										</li>
										<li>
											<h6>PRoject Type</h6>
											<p>Leminate, floor, hardwood</p>
										</li>
									</ul>
								</div> <!-- /.project-info-list -->
							</div>
							<div class="col-sm-8">
								<div class="text">
									<h6>Contrary to popular belief, Lorem Ipsu not simply random making it over 2000 years old. Richard MClintock.</h6>
									<p>On the other hand, we denounce with righteous indignation & dislike men who are so beguiled and demoralized by the charms pleasure of moment, so blinded by desire, that they cannot foresee the pain and trouble that arebound to ensue and equal blame belongs to those who fail their duty weakness which. is the same as saying through shrinking quality worker. </p>
								</div>
							</div> <!-- /.col- -->
						</div> <!-- /.row -->
					</div> <!-- /.project-details-wrapper -->
					<ul class="page-changer clearfix">
						<li class="float-left"><a href="#" class="tran3s"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Prev</a></li>
						<li class="float-right"><a href="#" class="tran3s">Next<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
					</ul> <!-- /.page-changer -->
				</div> <!-- /.container -->
			</div> <!-- /.portfolio-details -->


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