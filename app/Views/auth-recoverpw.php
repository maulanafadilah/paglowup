<?= $this->include('partials/head-main') ?>
    <head>

        <meta charset="utf-8" />
        <title><?=$title?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=base_url()?>/assets/images/favicon.ico">

            <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

    <!-- <body data-layout="horizontal"> -->
        <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xxl-3 col-lg-4 col-md-5">
                        <div class="auth-full-page-content d-flex p-sm-5 p-4">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5 text-center">
                                        <a href="/" class="d-block auth-logo">
                                            <img src="<?=base_url()?>/assets/images/logo/logox.png" alt="" height="52"> <span class="logo-txt"></span>
                                        </a>
                                    </div>
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Reset Password</h5>
                                            <p class="text-muted mt-2">Reset Password</p>
                                        </div>
                                        <div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
                                            Masukkan Email dan Username anda untuk mencocokkan data!
                                        </div>
                                        <?= session()->getFlashdata('notif_login')?>
                                        <form class="custom-form mt-4" action="<?=base_url()?>/login/recov_proc" method="POST">
                                            <div class="mb-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control" value="<?=session()->getFlashdata('s_username')?>" name="username" placeholder="Masukkan username">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" value="<?=session()->getFlashdata('s_email')?>" name="email" placeholder="Masukkan email">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Password Baru</label>
                                                <input type="password" class="form-control" name="pass1" pattern=".{8,}" title="min. 8 characters" placeholder="Masukkan password baru" required>
                                                <div class="invalid-feedback">
                                                    Minimum 8 Characters
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Ulang Password Baru</label>
                                                <input type="password" class="form-control" name="pass2" placeholder="Masukkan ulang password" required>
                                            </div>
                                            <div class="mb-3 mt-4">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Reset</button>
                                            </div>
                                        </form>

                                        <div class="mt-5 text-center">
                                            <p class="text-muted mb-0">Ingat Password nya ?  <a href="<?=base_url()?>/login"
                                                    class="text-primary fw-semibold"> Sign In </a> </p>
                                        </div>
                                    </div>
                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> PAGlowUP   . Crafted with <i class="mdi mdi-heart text-danger"></i> by StartUpHub</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                    <!-- end col -->
                    <div class="col-xxl-9 col-lg-8 col-md-7">
                        <div class="auth-bg pt-md-5 p-4 d-flex">
                            <div class="bg-overlay bg-primary"></div>
                            <ul class="bg-bubbles">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <!-- end bubble effect -->
                            <div class="row justify-content-center align-items-center">
                                <div class="col-xl-7">
                                    <div class="p-0 p-sm-4 px-xl-0">
                                        <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <!-- end carouselIndicators -->
                                            <div class="carousel-inner">
                                            <?php foreach ($l_rtesti2 as $item) {?>
                                                <div class="carousel-item <?php echo ($item->idumkm == '1') ? 'active' : ''; ?>">
                                                    <div class="testi-contain text-white">
                                                        <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                        <h4 class="mt-4 fw-medium lh-base text-white">“<?=$item->reviewdesigner?>”
                                                        </h4>
                                                        <div class="mt-4 pt-3 pb-5">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-shrink-0">
                                                                    <img src="<?=base_url()?>/webdata/uploads/images/umkm/<?=$item->umkm_pic?>" class="avatar-md img-fluid rounded-circle" alt="...">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3 mb-4">
                                                                    <h5 class="font-size-18 text-white"><?=$item->umkm_name?>
                                                                    </h5>
                                                                    <p class="mb-0 text-white-50"><?=$item->address?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            </div>
                                            <!-- end carousel-inner -->
                                        </div>
                                        <!-- end review carousel -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>


        <!-- JAVASCRIPT -->
       <?= $this->include('partials/vendor-scripts') ?>
        <!-- password addon init -->
        <script src="<?=base_url()?>/assets/js/pages/pass-addon.init.js"></script>

    </body>

</html>