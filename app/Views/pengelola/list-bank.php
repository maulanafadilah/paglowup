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
                                    <li class="breadcrumb-item active">List Kode Diskon yang tersedia</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">Daftar Informasi Bank</p>
                            </div>
                            <div class="card-body">
                                <?=session()->getFlashdata('notif');?>
                                <div style="margin-bottom: 15px">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addDiscount">
                                        Tambah Info Bank Baru
                                    </button>
                                </div>
                                <table class="table dtable table-bordered dt-responsive table-sm nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th width="7%">No.</th>
                                            <th>Nama Bank</th>
                                            <th>Nama Pemegang</th>
                                            <th>Rekening</th>
                                            <th>status</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $c = 1;?>
                                        <?php foreach ($l_bank as $a) {?>
                                        <tr>
                                            <td><?=$c?></td>
                                            <td><?=$a->bankname?></td>
                                            <td><?=$a->bankaccname?></td>
                                            <td><?=$a->bankaccnumber?></td>
                                            <td>
                                            <?php if($a->flag == 1){?>
                                                Aktif
                                            <?php }else{?>
                                                Tidak Aktif    
                                            <?php }?>    
                                            </td>
                                            <td>
                                                <div class="d-grid gap-2">
                                                    <?php if($a->flag == 0){?>
                                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#switchBank<?=$a->idbank?>">
                                                        Aktifkan
                                                    </button>
                                                    <?php }else{?>
                                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#switchBank<?=$a->idbank?>">
                                                        Nonaktifkan
                                                    </button>
                                                    <?php }?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $c = $c+1; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- sample modal content -->
<div id="addDiscount" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Informasi Bank</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="konfirAddBank" action="<?=base_url()?>/pengelola/bank/add_proc" method="post">
                  <div class="mb-3">
                    <label>Nama Bank</label>
                    <input type="text" name="bankname" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label>Nama Pemegang Rekening</label>
                    <input type="text" name="bankaccname" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label>Nomor Rekening</label>
                    <input type="number" name="bankaccnumber" class="form-control" required>
                  </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="konfirAddBank" class="btn btn-primary">Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php foreach($l_bank as $b) {?>
<!-- sample modal content -->
<div id="switchBank<?=$b->idbank?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Peringatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if($b->flag == 0){?>
                Aktifkan informasi bank ini?
                <?php }else{?>
                Nonaktifkan informasi bank ini?
                <?php }?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <a href="<?=base_url()?>/pengelola/bank/flag_switch/<?=$b->idbank?>" class="btn btn-primary">
                <?php if($b->flag == 0){?> Aktifkan <?php }else{?> Nonaktifkan <?php }?>
                </a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php } ?>

<?= $this->include('pengelola/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Required datatable js -->
<script src="<?=base_url()?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?=base_url()?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script type="text/javascript">
    $('.dtable').DataTable();
</script>

<script src="<?=base_url()?>/assets/js/app.js"></script>

</body>

</html>