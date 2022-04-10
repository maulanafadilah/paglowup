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
					<h1>Portfolio</h1>
					<ul>
						<li><a href="/">Home</a></li>
						<li>/</li>
						<li>Portfolio</li>
					</ul>
				</div> <!-- /.opacity -->
			</div> <!-- /inner-page-banner -->



			<!-- 
			=============================================
				Our Portfolio V1
			============================================== 
			-->
			<div class="gullu-portfolio portfolio-grid">
				<div class="container">
					<div class="mixitUp-menu">
						<h2>Beberapa design yang sudah <br> diselesaikan PaGlowUp, <br> cek di bawah ini.</h2>
	        			<ul>
	        				<li class="filter active tran3s" data-filter="all">Semua</li>
							<li class="filter tran3s" data-filter=".1">Logo</li>
							<li class="filter tran3s" data-filter=".2">Kemasan</li>
							<li class="filter tran3s" data-filter=".3">Logo & Kemasan</li>
	        			</ul>
	        		</div> <!-- End of .mixitUp-menu -->

	        		<div class="row" id="mixitUp-item">
						<?php foreach ($porto as $item) {?>
						<div class="col-xs-6 mix <?=$item->idgrouporder?>">
							<div class="single-item" style="border-style: solid; border-color: #f2f2f2;">
								<img src="<?= base_url()?>/webdata/uploads/prev_data/<?=$item->designpreview1?>" alt="">
								<div class="opacity tran3s">
									<a href="portofolio/<?=$item->idorder?>" class="view-more tran3s"><i class="flaticon-plus"></i></a>
								</div>
							</div> <!-- /.single-item -->
						</div> <!-- /.col-md-6 -->
						<?php } ?>
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.gullu-portfolio -->

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