<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>

    <!-- DataTables -->
    <link href="<?=base_url()?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?=base_url()?>/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    
    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('designer/menu') ?>

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
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>/designer/dashboard">PAGlowUP</a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>/designer/pesanan/list">List Pekerjaan</a></li>
                                    <li class="breadcrumb-item active">Detail Pekerjaan</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <?=session()->getFlashdata('notif')?>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link px-3 <?=(isset($_GET['t']))?'':'active'?>" data-bs-toggle="tab" href="#tabDetail" role="tab">Detail</a>
                                    </li>
                                    
                                    <?php if($l_detail->idstatus > 2 && $l_detail->idstatus < 8){?>
                                    <li class="nav-item">
                                        <a class="nav-link px-3 <?=(isset($_GET['t']))?($_GET['t'] == 2)?'active':'':''?>" data-bs-toggle="tab" href="#tabChat" role="tab">Komentar</a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane <?=(isset($_GET['t']))?'':'active'?>" id="tabDetail" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="invoice-title">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <div class="mb-4">
                                                        <img src="<?=base_url()?>/assets/images/logo-sm.svg" alt="" height="24"><span class="logo-txt">Minia</span>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="mb-4">
                                                        <h4 class="float-end font-size-16">Pesanan Nomor # <?=$l_detail->idprodcat.$l_detail->idgrouporder.$l_detail->idorder.$l_detail->idumkm?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="font-size-15 mb-3">Deskripsi Pesanan:</h5>
                                            <p><?=$l_detail->description?></p>

                                            <?php if (!is_null($l_detail->file1) || !is_null($l_detail->file2) || !is_null($l_detail->file3) || !is_null($l_detail->file4)) {?>
                                            <h5 class="font-size-15 mb-3">Attachment:</h5>
                                            <div class="row">
                                            <?php }?>
                                            
                                                <?php if (!is_null($l_detail->file1)) {?>
                                                <div class="col-sm-4 p-3">
                                                    <center class="img-thumbnail">
                                                        <a data-bs-toggle="modal" data-bs-target="#modalFile1">
                                                            <img src="<?= base_url(); ?>/webdata/uploads/images/cs/orders/<?=$l_detail->file1?>" class="img-fluid " style="max-height: 265px;" alt="Responsive image">
                                                        </a>
                                                    </center>
                                                </div>
                                                <?php }?>

                                                <?php if (!is_null($l_detail->file2)) {?>
                                                <div class="col-sm-4 p-3">
                                                    <center class="img-thumbnail">
                                                        <a data-bs-toggle="modal" data-bs-target="#modalFile2">
                                                            <img src="<?= base_url(); ?>/webdata/uploads/images/cs/orders/<?=$l_detail->file2?>" class="img-fluid " style="max-height: 265px;" alt="Responsive image">
                                                        </a>
                                                    </center>
                                                </div>
                                                <?php }?>

                                                <?php if (!is_null($l_detail->file3)) {?>
                                                <div class="col-sm-4 p-3">
                                                    <center class="img-thumbnail">
                                                        <a data-bs-toggle="modal" data-bs-target="#modalFile3">
                                                            <img src="<?= base_url(); ?>/webdata/uploads/images/cs/orders/<?=$l_detail->file3?>" class="img-fluid " style="max-height: 265px;" alt="Responsive image">
                                                        </a>
                                                    </center>
                                                </div>
                                                <?php }?>
                                                
                                                <?php if (!is_null($l_detail->file4)) {?>
                                                <div class="col-sm-4 p-3">
                                                    <center class="img-thumbnail">
                                                        <a data-bs-toggle="modal" data-bs-target="#modalFile4">
                                                            <img src="<?= base_url(); ?>/webdata/uploads/images/cs/orders/<?=$l_detail->file4?>" class="img-fluid " style="max-height: 265px;" alt="Responsive image">
                                                        </a>
                                                    </center>
                                                </div>
                                                <?php }?>
                                            <?php if (!is_null($l_detail->file1) || !is_null($l_detail->file2) || !is_null($l_detail->file3) || !is_null($l_detail->file4)) {?>
                                            </div>
                                            <?php }?> 
                                        </div>
                                        <hr class="my-4">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div>
                                                    <h5 class="font-size-15 mb-3">Status Pemesanan:</h5>
                                                    <div class="badge 
                                                        <?php if($l_detail->idstatus == 1 || $l_detail->idstatus == 3 || $l_detail->idstatus == 4 || $l_detail->idstatus == 5 || $l_detail->idstatus == 6){
                                                            echo 'badge-soft-primary';
                                                        }elseif($l_detail->idstatus == 2 || $l_detail->idstatus == 7){
                                                            echo 'badge-soft-success';
                                                        }elseif($l_detail->idstatus == 8){
                                                            echo 'badge-soft-secondary';
                                                        }elseif($l_detail->idstatus == 9){
                                                            echo 'badge-soft-danger';
                                                        }?>
                                                        font-size-16">
                                                        <?=$l_detail->statusdesc?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div>
                                                    <div>
                                                        <h5 class="font-size-15">Tanggal Pemesanan:</h5>
                                                        <p>
                                                            <?php $date = date_create($l_detail->orderdate); ?>
                                                            <?=date_format($date, 'd F Y h:i:s A')?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-print-none mt-3">
                                            <div class="float-end">
                                                <?php if ($l_detail->idstatus == 5){?>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#uploadPrev" class="btn btn-info">
                                                    <i class="fa fa-upload"></i> Kirim Preview
                                                </button>
                                                <?php }?>
                                                <?php if ($l_detail->idstatus == 6){?>
                                                <button type="button" class="btn btn-info" disabled>
                                                    <i class="fa fa-check"></i> Preview telah dikirim
                                                </button>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#uploadWork" class="btn btn-info">
                                                    <i class="fa fa-upload"></i> Upload File HD
                                                </button>
                                                <?php }?>
                                            </div>
                                        </div>

                                        <?php if($l_detail->idstatus == 8){?>
                                        <hr class="my-4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div>
                                                    <h5 class="font-size-15 mb-3">Rating desain:</h5>
                                                    <div id="rating-desain"></div><br><br>
                                                    <?php if(!is_null($l_detail->reviewdesigner)){?>
                                                    <div><?=$l_detail->reviewdesigner?></div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end tab panel -->

                    <?php if($l_detail->idstatus > 2 && $l_detail->idstatus < 8){?>
                    <div class="tab-pane <?=(isset($_GET['t']))?($_GET['t'] == 2)?'active':'':''?>" id="tabChat" role="tabpanel">
                        <?=$this->include('designer/pesanan/comment-csde')?>
                    </div>
                    <?php }?>
                    <!-- end tab panel -->

                </div> <!-- end tab content -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?php if($l_detail->idstatus > 2){?>
<!-- sample modal content -->
<div id="sendAttachmentCSDE" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Attachment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="konfirAdd" action="<?=base_url()?>/designer/pesanan/send_comment_csde/<?=$l_detail->idorder?>" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 1</label>
                        <input type="file" name="file1" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 2</label>
                        <input type="file" name="file2" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Komentar</label>
                        <input type="text" name="comment" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="konfirAdd" class="btn btn-primary">Kirim</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php }?>


<?php if($l_detail->idstatus == 4 && $l_detail->idstatus == 7){?>
<!-- sample modal content -->
<div id="reqStatusReviewCS" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Attachment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ingin Mengajukan Review ke CS?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <a href="<?=base_url()?>/designer/pesanan/req_review_cs/<?=$l_detail->idorder?>" class="btn btn-primary">Ya</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php }?>

<?php if($l_detail->idstatus == 5){ ?>
<!-- sample modal content -->
<div id="uploadPrev" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Upload Preview Untuk UMKM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="upPrevAcc" action="<?=base_url()?>/designer/pesanan/send_prev_umkm/<?=$l_detail->idorder?>" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 1</label>
                        <input type="file" name="prev1" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 2</label>
                        <input type="file" name="prev2" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="upPrevAcc" class="btn btn-primary">Kirim</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php }?>

<?php if($l_detail->idstatus == 6){ ?>
<!-- sample modal content -->
<div id="uploadWork" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Upload File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadFileWork" action="<?=base_url()?>/designer/pesanan/upload_work/<?=$l_detail->idorder?>" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 1</label>
                        <input type="file" name="orderedfile1" accept="image/jpg,image/jpeg,image/png,image/webp,application/vnd.rar,application/zip" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 1</label>
                        <input type="file" name="orderedfile2" accept="image/jpg,image/jpeg,image/png,image/webp,application/vnd.rar,application/zip" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="uploadFileWork" class="btn btn-primary">Upload</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php }?>

<?= $this->include('designer/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Required datatable js -->
<script src="<?=base_url()?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?=base_url()?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- rater js -->
<script src="<?=base_url()?>/assets/libs/rater-js/index.js"></script>
<script type="text/javascript">
function onload(event) {
    // rating-desain
    var basicRating = raterJs( {
        starSize:30,
        readOnly: true, 
        rating: <?php echo $l_detail->designerrating?>,
        element:document.querySelector("#rating-desain"), 
        rateCallback:function rateCallback(rating, done) {
            this.setRating(rating); 
            done(); 
        }
    });
}
window.addEventListener("load", onload, false); 
</script>

<script src="<?=base_url()?>/assets/js/app.js"></script>

</body>

</html>