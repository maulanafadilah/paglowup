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
					<h1>Detail Portfolio</h1>
					<ul>
						<li><a href="/">Home</a></li>
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
				<?php foreach ($detail as $item) {?>
					<div class="title">
						<h2 style="text-transform:uppercase"> <?=$item->orderdesc?> <?=$item->category?> <br> <?=$item->umkm_name?></h2>
						<ul>
							<li>Share:</li>
							<li><a href="" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="" class="tran3s"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
							<li><a href="" class="tran3s"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						</ul>
					</div> <!-- /.title -->
					<img src="<?= base_url()?>/webdata/uploads/prev_data/<?=$item->designpreview1?>" alt="">
					<div class="project-details-wrapper">
						<div class="row">
							<div class="col-sm-4">
								<div class="project-info-list">
									<ul>
										<li>
											<h6>Tanggal</h6>
											<p><?=$item->orderdate?></p>
										</li>
										<li>
											<h6>Client Name</h6>
											<p><?=$item->umkm_name?></p>
										</li>
										<li>
											<h6>Project Type</h6>
											<p><?=$item->orderdesc?></p>
										</li>
									</ul>
								</div> <!-- /.project-info-list -->
							</div>
							<div class="col-sm-8">
								<div class="text">
									<!-- <h6>Contrary to popular belief, Lorem Ipsu not simply random making it over 2000 years old. Richard MClintock.</h6> -->
									<?=$item->description?>
								</div>
							</div> <!-- /.col- -->
						</div> <!-- /.row -->
					</div> <!-- /.project-details-wrapper -->
				<?php } ?>
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
		<!-- mixitup -->
		<script type="text/javascript" src="<?= base_url()?>/assets/vendor/jquery.mixitup.min.js"></script>

		<!-- Theme js -->
		<script type="text/javascript" src="<?= base_url()?>/assets/js/theme.js"></script>

    </div>
</body>
</html>