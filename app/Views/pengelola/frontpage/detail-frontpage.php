<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('pengelola/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

       

        <div class="page-content">
            <div class="container-fluid">
            
            <?=session()->getFlashdata('notif')?>

            <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="page-title mb-0 font-size-18"><?= $title ?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>/pengelola/dashboard">PAGlowUP</a></li>
                                    <li class="breadcrumb-item active">Detail Frontpage</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Detail Frontpage</h4>
                                <a href="<?=base_url()?>/pengelola/frontpage/edit/<?=$detail_frontpage->idstatic?>" class="btn btn-warning mt-4" type="submit">Edit</a>
                            </div>
                            <div class="card-body p-4">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div>
                                            <form>
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input class="form-control" type="text" value="<?=$detail_frontpage->title?>" name="title" id="title" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="content" class="form-label">Content</label>
                                                    <textarea class="form-control" rows="5" name="title" id="title" disabled><?=$detail_frontpage->content?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tag" class="form-label">Tag</label>
                                                    <input class="form-control" type="text" value="<?=$detail_frontpage->tag?>" name="tag" id="tag" disabled>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Image 1</h4>
                                            </div><!-- end card header -->

                                            <div class="card-body">
                                                <div>
                                                    <img src="<?=base_url()?>/webdata/uploads/images/frontpage/<?=$detail_frontpage->img1?>" class="img-fluid" alt="This is an image">
                                                </div>
                                            </div><!-- end card-body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Image 2</h4>
                                                </div><!-- end card header -->

                                                <div class="card-body">
                                                    <div>
                                                        <img src="<?=base_url()?>/webdata/uploads/images/frontpage/<?=$detail_frontpage->img2?>" class="img-fluid" alt="This is an image">
                                                    </div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                    </div><!-- end col -->
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Image 3</h4>
                                            </div><!-- end card header -->

                                            <div class="card-body">
                                                <div>
                                                    <img src="<?=base_url()?>/webdata/uploads/images/frontpage/<?=$detail_frontpage->img3?>" class="img-fluid" alt="This is an image">
                                                </div>
                                            </div><!-- end card-body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Image 4</h4>
                                            </div><!-- end card header -->

                                            <div class="card-body">
                                                <div>
                                                    <img src="<?=base_url()?>/webdata/uploads/images/frontpage/<?=$detail_frontpage->img4?>" class="img-fluid" alt="This is an image">
                                                </div>
                                            </div><!-- end card-body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->



<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<script src="<?=base_url()?>/assets/js/app.js"></script>

</body>

</html>