<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('cs/menu') ?>

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
                                    <li class="breadcrumb-item active">Detail Designer</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <?=session()->getFlashdata('notif')?>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm order-2 order-sm-1">
                                        <div class="d-flex align-items-start mt-3 mt-sm-0">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xl me-3">
                                                    <img src="<?=base_url()?>/webdata/uploads/images/designer/<?=$detail_designer->designer_pic?>" alt="" class="img-fluid rounded-circle d-block">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="font-size-16 mb-1"><?=$detail_designer->name?></h5>
                                                    <p class="text-muted font-size-13">Designer</p>

                                                    <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?=$detail_designer->phone?></div>
                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?=$detail_designer->email?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link px-3 <?=(isset($_GET['t']))?'':'active'?>" data-bs-toggle="tab" href="#overview" role="tab">Detail Profil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-3 <?=(isset($_GET['t']))?($_GET['t'] == 2)?'active':'':''?>" data-bs-toggle="tab" href="#portf" role="tab">Portofolio</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="tab-content">
                            <div class="tab-pane <?=(isset($_GET['t']))?'':'active'?>" id="overview" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Overview</h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <div class="pb-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Nama Lengkap:</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_designer->name?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Email :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_designer->email?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Nomor Telp. :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_designer->phone?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="py-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Nomor WhatsApp. :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_designer->whatsapp?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Dribbble :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <a href="<?=$detail_designer->dribbble?>"><?=$detail_designer->dribbble?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Website :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <a href="<?=$detail_designer->web?>"><?=$detail_designer->web?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Nama Bank:</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_designer->bankname?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Nomor Rekening:</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_designer->bankaccount?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Nama Pemilik Rekening:</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_designer->bankaccname?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Deskripsi / Bio:</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_designer->description?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane <?=(isset($_GET['t']))?($_GET['t'] == 2)?'active':'':''?>" id="portf" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mt-4 mt-lg-0">
                                            <h5 class="font-size-14 mb-4">List Portfolio</h5>
                                            <?php if(!$l_portfolio && !$l_works){?>
                                            <div class="my-5 pt-5">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="text-center mb-5">
                                                                <h4 class="text-uppercase">Belum ada portofolio</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </div>
                                                <!-- end container -->
                                            </div>
                                            <!-- end content -->
                                            <?php }else{?>
                                            <div class="row">
                                                <?php foreach ($l_portfolio as $data) {?>
                                                <div class="col-sm-2 p-3">
                                                    <center class="img-thumbnail" style="height: 150px">
                                                        <div class="mb-1">
                                                            <a data-bs-toggle="modal" data-bs-target="#zoomImg" data-id="<?= $data->idportfolio; ?>">
                                                                <img src="<?= base_url(); ?>/webdata/uploads/images/designer/portfolio/<?= $data->img; ?>" class="img-fluid" alt="Responsive image">
                                                            </a>
                                                        </div>
                                                        <div class="mb-1">
                                                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delPortfolio" data-id="<?=$data->idportfolio?>">
                                                                Hapus Portfolio
                                                            </a>
                                                        </div>
                                                    </center>
                                                </div>
                                                <?php } ?>
                                                <?php foreach ($l_works as $b) {
                                                    if($b->work1 != null){?>
                                                <div class="col-sm-2 p-3">
                                                    <center class="img-thumbnail">
                                                        <div class="mb-1" style="height: 150px">
                                                            <a href="<?= base_url(); ?>/webdata/uploads/prev_data/<?=$b->work1?>">
                                                                <img src="<?= base_url(); ?>/webdata/uploads/prev_data/<?=$b->work1?>" target="_blank" class="img-fluid mh-100 d-inline-block" alt="Responsive image">
                                                            </a>
                                                        </div>
                                                    </center>
                                                </div>
                                                <?php }if($b->work2 != null){?>
                                                <div class="col-sm-2 p-3">
                                                    <center class="img-thumbnail">
                                                        <div class="mb-1" style="height: 150px">
                                                            <a href="<?= base_url(); ?>/webdata/uploads/prev_data/<?=$b->work2?>">
                                                                <img src="<?= base_url(); ?>/webdata/uploads/prev_data/<?=$b->work2?>" target="_blank" class="img-fluid mh-100 d-inline-block" alt="Responsive image">
                                                            </a>
                                                        </div>
                                                    </center>
                                                </div>
                                                <?php }}?>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end tab pane -->

                        </div>

                        <!-- end tab content -->
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

<!-- sample modal content -->
<div id="zoomImg" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- sample modal content -->
<div id="delPortfolio" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Hapus Portfolio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ingin menghapus portofolio ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <span class="konfirmasi-delete-button"></span>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?= $this->include('cs/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<script src="<?=base_url()?>/assets/js/app.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#zoomImg').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>/cs/portfolio/list_portfolio',
                data: 'rowid=' + rowid,
                success: function(data) {
                    $('.fetched-data').html(data); //menampilkan data ke dalam modal
                }
            });
        });
        $('#delPortfolio').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>/cs/portfolio/accDelPortfolio',
                data: 'rowid=' + rowid,
                success: function(data) {
                    $('.konfirmasi-delete-button').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
</script>

</body>

</html>