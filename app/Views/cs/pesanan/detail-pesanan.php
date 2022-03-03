<?php 
    use App\Models\M_designer;
    $this->m_designer = new M_designer();
    
?>
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
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>/cs/dashboard">PAGlowUP</a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>/cs/pesanan/list">List Pesanan</a></li>
                                    <li class="breadcrumb-item active">Detail Pemesanan</li>
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
                                        <a class="nav-link px-3 <?=(isset($_GET['t']))?'':'active'?>" data-bs-toggle="tab" href="#tabUmkm" role="tab">UMKM</a>
                                    </li>
                                    
                                    <?php if($l_detail->idstatus > 2 && $l_detail->idstatus < 8 ){?>
                                    <li class="nav-item">
                                        <a class="nav-link px-3 <?=(isset($_GET['t']))?($_GET['t'] == 2)?'active':'':''?>" data-bs-toggle="tab" href="#tabDesigner" role="tab">Designer</a>
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
                    <div class="tab-pane <?=(isset($_GET['t']))?'':'active'?>" id="tabUmkm" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="invoice-title">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <div class="mb-4">
                                                        <img src="<?=base_url()?>/assets/images/logo-sm.svg" alt="" height="30">
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="mb-4">
                                                        <h4 class="float-end font-size-16">Pesanan Nomor # <?=$l_detail->idprodcat.$l_detail->idgrouporder.$l_detail->idorder.$l_detail->idumkm?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="font-size-15 mb-3">Pemesan:</h5>
                                            <p><?=$l_detail->umkm_name?></p>
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
                                                            <img src="<?= base_url(); ?>/webdata/uploads/images/umkm/orders/<?=$l_detail->file1?>" class="img-fluid " style="max-height: 265px;" alt="Responsive image">
                                                        </a>
                                                    </center>
                                                </div>
                                                <?php }?>

                                                <?php if (!is_null($l_detail->file2)) {?>
                                                <div class="col-sm-4 p-3">
                                                    <center class="img-thumbnail">
                                                        <a data-bs-toggle="modal" data-bs-target="#modalFile2">
                                                            <img src="<?= base_url(); ?>/webdata/uploads/images/umkm/orders/<?=$l_detail->file2?>" class="img-fluid " style="max-height: 265px;" alt="Responsive image">
                                                        </a>
                                                    </center>
                                                </div>
                                                <?php }?>

                                                <?php if (!is_null($l_detail->file3)) {?>
                                                <div class="col-sm-4 p-3">
                                                    <center class="img-thumbnail">
                                                        <a data-bs-toggle="modal" data-bs-target="#modalFile3">
                                                            <img src="<?= base_url(); ?>/webdata/uploads/images/umkm/orders/<?=$l_detail->file3?>" class="img-fluid " style="max-height: 265px;" alt="Responsive image">
                                                        </a>
                                                    </center>
                                                </div>
                                                <?php }?>
                                                
                                                <?php if (!is_null($l_detail->file4)) {?>
                                                <div class="col-sm-4 p-3">
                                                    <center class="img-thumbnail">
                                                        <a data-bs-toggle="modal" data-bs-target="#modalFile4">
                                                            <img src="<?= base_url(); ?>/webdata/uploads/images/umkm/orders/<?=$l_detail->file4?>" class="img-fluid " style="max-height: 265px;" alt="Responsive image">
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
                                                    <?php if (!is_null($l_detail->paymentproof)){?>
                                                    <br>
                                                    <br>
                                                    <a href="<?=base_url()?>/webdata/uploads/images/umkm/paypr/<?=$l_detail->paymentproof?>" target="_blank">
                                                        Bukti Pembayaran <i class="fa fa-external-link-alt"></i>
                                                    </a>
                                                    <?php }?>
                                                    <br>
                                                    <br>
                                                    <?php if($l_detail->idstatus == 1 && is_null($l_detail->idcs)){?>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#verifPayment" class="btn btn-sm btn-success">
                                                        <i class="fa fa-check"></i> Verifikasi Pembayaran
                                                    </button>
                                                    <?php }else{ ?>
                                                    <button type="button" class="btn btn-sm btn-success" disabled>
                                                        <i class="fa fa-check"></i> Telah diverifikasi oleh <?=$l_detail->cs_name?>
                                                    </button>
                                                    <?php } ?>
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

                                                    <div class="mt-4">
                                                        <h5 class="font-size-15">Metode Pembayaran:</h5>
                                                        <p class="mb-1">Transfer & Upload Bukti Bayar</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="py-2 mt-3">
                                            <h5 class="font-size-15">Ringkasan Pesanan</h5>
                                        </div>
                                        <div class="p-4 border rounded">
                                            <div class="table-responsive">
                                                <table class="table table-nowrap align-middle mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Item</th>
                                                            <th class="text-end" style="width: 120px;">Harga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h5 class="font-size-15 mb-1">Kategori: <?=$l_detail->category?></h5>
                                                                <p class="font-size-13 text-muted mb-0">Jenis Pesanan: <?=$l_detail->orderdesc?></p>
                                                            </td>
                                                            <td class="text-end">Rp.<?=$l_detail->price?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" colspan="1" class="text-end">Diskon</th>
                                                            <td class="text-end">
                                                                <?=(!is_null($l_detail->iddiscount))?'Rp. '.($l_detail->price*($l_detail->discountamount/100)):'Rp. 0'?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" colspan="1" class="border-0 text-end">Total</th>
                                                            <td class="border-0 text-end">
                                                                <h4 class="m-0">
                                                                    Rp.<?=$l_detail->totalpayment?>
                                                                </h4>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="d-print-none mt-3">
                                            <div class="float-end">
                                                <?php if ($l_detail->idstatus == 2){?>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#approveAg" class="btn btn-success">
                                                    <i class="fa fa-check"></i> Approve Persetujuan
                                                </button>
                                                <?php }?>
                                                <?php if ($l_detail->idstatus == 5){?>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#uploadPrev" class="btn btn-info">
                                                    <i class="fa fa-upload"></i> Kirim Preview
                                                </button>
                                                <?php }?>
                                                <?php if ($l_detail->idstatus == 6){?>
                                                <button type="button" class="btn btn-info" disabled>
                                                    <i class="fa fa-check"></i> Preview telah dikirim
                                                </button>
                                                <?php }?>
                                            </div>
                                        </div>
                                        <?php if($l_detail->idstatus == 8){?>
                                        <hr class="my-4">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div>
                                                    <h5 class="font-size-15 mb-3">Rating CS:</h5>
                                                    <div id="rating-cs"></div><br><br>
                                                    <?php if(!is_null($l_detail->reviewcs)){?>
                                                    <div><?=$l_detail->reviewcs?></div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <?php if($l_detail->idstatus > 1 && $l_detail->idstatus < 8 ){
                               echo $this->include('cs/pesanan/comment-csum');
                            }?>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end tab panel -->

                    <?php if($l_detail->idstatus > 1 && $l_detail->idstatus < 8 ){?>
                    <div class="tab-pane <?=(isset($_GET['t']))?($_GET['t'] == 2)?'active':'':''?>" id="tabDesigner" role="tabpanel">
                    <?php if($l_detail->idstatus > 2){?>
                        <?php if(is_null($l_detail->iddesigner)){?>
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">Designer belum diset untuk pemesanan ini, pilih designer terlebih dahulu</p>
                            </div>
                            <div class="card-body">
                                <table class="table dtable table-bordered dt-responsive table-sm nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th width="7%">No.</th>
                                            <th>Nama</th>
                                            <th>Rating</th>
                                            <th>Total Transaksi</th>
                                            <th>Total Transaksi Ongoing</th>
                                            <th>Total Transaksi Selesai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $c = 1;?>
                                        <?php foreach ($l_designer as $a) {?>
                                        <tr>
                                            <td><?=$c?></td>
                                            <td><?=$a->designer_name?></td>
                                            <td><?=$a->rating?>/5</td>
                                            <td><?=$a->total_transaksi?></td>
                                            <td>
                                                <?= $this->m_designer->countStatusOngoing($a->iddesigner)[0]->hitung?>
                                            </td>
                                            <td>
                                                <?= $this->m_designer->countStatusDone($a->iddesigner)[0]->hitung?>
                                            </td>
                                            <td>
                                                <div class="d-grid gap-2">
                                                    <a class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#setDesigner" data-id="<?=$a->iddesigner?>">
                                                        Pilih
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $c = $c+1; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php }else{
                            echo $this->include('cs/pesanan/comment-csde');
                        }?>
                    <?php }?>
                    </div>
                    <!-- end tab panel -->
                    <?php }?>

                </div> <!-- end tab content -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?php if($l_detail->idstatus == 1 && is_null($l_detail->idcs)){?>
<!-- sample modal content -->
<div id="verifPayment" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Verifikasi Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Konfirmasi pembayaran untuk pemesanan ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <a href="<?=base_url()?>/cs/pesanan/verif_payment/<?=$l_detail->idorder?>" class="btn btn-primary">Konfirmasi</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php } ?>

<?php if($l_detail->idstatus == 2){?>
<!-- sample modal content -->
<div id="approveAg" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Verifikasi Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Approve Persetujuan?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <a href="<?=base_url()?>/cs/pesanan/approve_umkm/<?=$l_detail->idorder?>" class="btn btn-primary">Konfirmasi</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php }?>

<!-- sample modal content -->
<div id="setDesigner" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Set Designer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Pilih Designer untuk menyelesaikan pesanan ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <span class="konfirmasi-set-button"></span>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php if(!is_null($l_detail->iddesigner)){?>
<!-- sample modal content -->
<div id="sendAttachmentCSDE" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Attachment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="csdeSendForm" action="<?=base_url()?>/cs/pesanan/send_comment_csde_img/<?=$l_detail->idorder?>" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 1</label>
                        <input type="file" name="file1" class="form-control" accept="image/png, image/jpg, image/jpeg">
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 2</label>
                        <input type="file" name="file2" class="form-control" accept="image/png, image/jpg, image/jpeg">
                    </div>
                    <div class="mb-3">
                        <label>Komentar</label>
                        <input type="text" name="comment" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="csdeSendForm" class="btn btn-primary">Kirim</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php }?>

<?php if(!is_null($l_detail->idcs)){?>
<!-- sample modal content -->
<div id="sendAttachmentCSUM" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Attachment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="csumSendForm" action="<?=base_url()?>/cs/pesanan/send_comment_csum_img/<?=$l_detail->idorder?>" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 1</label>
                        <input type="file" name="file1" class="form-control" accept="image/png, image/jpg, image/jpeg">
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 2</label>
                        <input type="file" name="file2" class="form-control" accept="image/png, image/jpg, image/jpeg">
                    </div>
                    <div class="mb-3">
                        <label>Komentar</label>
                        <input type="text" name="comment" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="csumSendForm" class="btn btn-primary">Kirim</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php }?>

<?php if($l_detail->idstatus == 5){?>
<!-- sample modal content -->
<div id="reqStatusRevisi" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tolak Desain</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tolak desain dan ajukan revisi ke Designer?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <a href="<?=base_url()?>/cs/pesanan/tolak_review/<?=$l_detail->idorder?>" class="btn btn-primary">Ya</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- sample modal content -->
<div id="uploadPrev" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Upload Preview Untuk UMKM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="upPrevAcc" action="<?=base_url()?>/cs/pesanan/send_prev_umkm/<?=$l_detail->idorder?>" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 1</label>
                        <input type="file" name="prev1" class="form-control" accept="image/png, image/jpg, image/jpeg" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 2</label>
                        <input type="file" name="prev2" class="form-control" accept="image/png, image/jpg, image/jpeg" required>
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

<?= $this->include('cs/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Required datatable js -->
<script src="<?=base_url()?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?=base_url()?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<?php if(!is_null($l_detail->designerrating)){ ?>
<!-- rater js -->
<script src="<?=base_url()?>/assets/libs/rater-js/index.js"></script>
<script type="text/javascript">
function onload(event) {
    // rating-cs
    var basicRating = raterJs( {
        starSize:30,
        readOnly: true, 
        rating: <?php echo $l_detail->csrating?>,
        element:document.querySelector("#rating-cs"), 
        rateCallback:function rateCallback(rating, done) {
            this.setRating(rating); 
            done(); 
        }
    });
}
window.addEventListener("load", onload, false); 
</script>
<?php }?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#setDesigner').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>/cs/pesanan/konfirSet/<?=$l_detail->idorder?>',
                data: 'rowid=' + rowid,
                success: function(data) {
                    $('.konfirmasi-set-button').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
</script>

<script src="<?=base_url()?>/assets/js/app.js"></script>

</body>

</html>