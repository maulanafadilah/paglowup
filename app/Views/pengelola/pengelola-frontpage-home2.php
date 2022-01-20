<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>
    <!-- dropzone css -->
    <link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

    <?= $this->include('partials/head-css') ?>

    

</head>

<?= $this->include('partials/body') ?>

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <?= $page_title ?>
                <!-- end page title -->
                
                <!-- HERO -->
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5 class="card-title">Hero<span class="text-muted fw-normal ms-2">(834)</span></h5>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                            <div>
                                <a href="#" class="btn btn-light"><i class="bx bx-edit-alt"></i> Edit</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                    <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">Image Banner</p>
                            </div>
                            <div class="card-body">

                                <div>
                                    <form action="#" class="dropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple="multiple">
                                        </div>
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted bx bx-cloud-upload"></i>
                                            </div>

                                            <h5>Drop files here or click to upload.</h5>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">Headline Text</p>
                            </div>
                            <div class="card-body p-4">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div>
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Headline</label>
                                                <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Subheadline</label>
                                                <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Button</label>
                                                <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                <!-- end col -->

                <!-- Description -->
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h5 class="card-title">Description<span class="text-muted fw-normal ms-2">(834)</span></h5>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                <div>
                                    <a href="#" class="btn btn-light"><i class="bx bx-edit-alt"></i> Edit</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <p class="card-title-desc">Description Text</p>
                                </div>
                                <div class="card-body">
                                    <div id="ckeditor-classic"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <p class="card-title-desc">Paragraph</p>
                                    
                                </div>
                                <div class="card-body">
                                <input class="form-control" type="text" value="How do I shoot web" id="example-search-input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                <!-- OUR SERVICES -->
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5 class="card-title">Our Services<span class="text-muted fw-normal ms-2">(834)</span></h5>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                            <div>
                                <a href="#" class="btn btn-light"><i class="bx bx-edit-alt"></i> Edit</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                    <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">Image Banner</p>
                            </div>
                            <div class="card-body">

                                <div>
                                    <form action="#" class="dropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple="multiple">
                                        </div>
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted bx bx-cloud-upload"></i>
                                            </div>

                                            <h5>Drop files here or click to upload.</h5>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">Headline Text</p>
                            </div>
                            <div class="card-body p-4">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div>
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Headline</label>
                                                <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Subheadline</label>
                                                <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                <!-- end col -->

                 <!-- OUR SERVICES -->
                 <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5 class="card-title">Testiomonials<span class="text-muted fw-normal ms-2">(834)</span></h5>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                            <div>
                                <a href="#" class="btn btn-light"><i class="bx bx-edit-alt"></i> Edit</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                    <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">Image Banner</p>
                            </div>
                            <div class="card-body">

                                <div>
                                    <form action="#" class="dropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple="multiple">
                                        </div>
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted bx bx-cloud-upload"></i>
                                            </div>

                                            <h5>Drop files here or click to upload.</h5>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- end col -->


            </div>
                <!-- end row -->

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

<!-- dropzone js -->
<script src="assets/libs/dropzone/min/dropzone.min.js"></script>

<!-- ckeditor -->
<script src="assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

<!-- init js -->
<script src="assets/js/pages/form-editor.init.js"></script>

<script src="assets/js/app.js"></script>

</body>

</html>