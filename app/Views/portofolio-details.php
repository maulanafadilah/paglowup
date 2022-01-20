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