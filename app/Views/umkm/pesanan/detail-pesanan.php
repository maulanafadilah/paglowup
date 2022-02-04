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

    <?= $this->include('umkm/menu') ?>

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
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>/umkm/dashboard">PAGlowUP</a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>/umkm/pesanan/list">List Pesanan</a></li>
                                    <li class="breadcrumb-item active">Detail Pemesanan</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <?=session()->getFlashdata('notif')?>
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
                                    <?=$l_detail->description?>

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
                                                            <?=$l_detail->totalpayment?>
                                                        </h4>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-print-none mt-3">
                                    <div class="float-end">
                                        <?php if (is_null($l_detail->paymentproof)){?>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#uploadPayment" class="btn btn-success">
                                            <i class="fa fa-upload"></i> Upload Bukti Pembayaran
                                        </button>
                                        <?php }else{ ?>
                                        <button href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1" disabled>
                                            <i class="fa fa-check"></i>
                                        </button>   
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
<div id="uploadPayment" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Upload Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="konfirPayment" action="<?=base_url()?>/umkm/pesanan/upload_payment/<?=$l_detail->idorder?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">Bukti Pembayaran</label>
                        <input type="file" name="paymentproof" class="form-control" accept="image/png, image/jpg, image/jpeg" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="konfirPayment" class="btn btn-primary">Upload</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?= $this->include('umkm/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Required datatable js -->
<script src="<?=base_url()?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?=base_url()?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<script src="<?=base_url()?>/assets/js/app.js"></script>

</body>

</html>