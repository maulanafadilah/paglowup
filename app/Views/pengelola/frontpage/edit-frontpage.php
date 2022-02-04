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
                                <h4 class="card-title">Edit Frontpage</h4>
                                <p class="card-title-desc">
                            </div>
                            <div class="card-body p-4">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div>
                                            <form action="<?=base_url()?>/pengelola/frontpage/update_proc/<?=$detail_frontpage->idstatic?>" method="post" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input class="form-control" type="text" value="<?=$detail_frontpage->title?>" name="title" id="title">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="content" class="form-label">Content</label>
                                                    <textarea class="form-control" rows="5" name="content" id="content" ><?=$detail_frontpage->content?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tag" class="form-label">Tag</label>
                                                    <input class="form-control" type="text" value="<?=$detail_frontpage->tag?>" name="tag" id="tag">
                                                </div>
                                                <div class="my-4">
                                                    <label class="form-label" for="img1">Image 1</label>
                                                    <p>File Sebelumnya: <strong><?=$detail_frontpage->img1?></strong></p>
                                                    <input type="file" class="form-control"  name="img10" id="img10"> 
                                                </div>
                                                <div class="my-4">
                                                    <div class="custom-file">
                                                        <label class="form-label" for="img1">Image 2</label>
                                                        <p>File Sebelumnya: <strong><?=$detail_frontpage->img2?></strong></p>
                                                        <input type="file" class="form-control" name="img2" id="img2">
                                                    </div>
                                                </div>
                                                <div class="my-4">
                                                    <div class="custom-file">
                                                        <label class="form-label" for="img1">Image 3</label>
                                                        <p>File Sebelumnya: <strong><?=$detail_frontpage->img3?></strong></p>
                                                        <input type="file" class="form-control" name="img3" id="img3">
                                                    </div>
                                                </div>
                                                <div class="my-4">
                                                    <div class="custom-file">
                                                        <label class="form-label" for="img1">Image 4</label>
                                                        <p>File Sebelumnya: <strong><?=$detail_frontpage->img4?></strong></p>
                                                        <input type="file" class="form-control" name="img4" id="img4">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-4" type="submit">Save</button>
                                            </form>
                                        </div>
                                    </div>
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