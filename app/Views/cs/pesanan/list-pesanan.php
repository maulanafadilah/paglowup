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
                                    <li class="breadcrumb-item active">List Pemesanan</li>
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
                                <p class="card-title-desc">List Pemesanan</p>
                            </div>
                            <div class="card-body">
                                <?=session()->getFlashdata('notif');?>
                                <div class="table-responsive">
                                    <table class="table dtable align-middle dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th width="7%">No.</th>
                                                <th>Pemesan</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Deskripsi</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $c = 1;?>
                                            <?php foreach ($l_pesanan as $a) {
                                                if ($a->idcs == $detail_user->idcs || is_null($a->idcs)) {
                                            ?>
                                            <tr>
                                                <td><?=$c?></td>
                                                <td><?=$a->umkm_name?></td>
                                                <td><?=$a->orderdate?></td>
                                                <td>
                                                    <?php $countDesc = count(explode(" ", $a->description));
                                                    if ($countDesc > 12) {
                                                      $slice = array_slice(explode(" ", $a->description), 0, 12);
                                                      echo implode(" ", $slice)."....";
                                                    } else {
                                                      echo $a->description;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <span class="badge 
                                                    <?php if($a->idstatus == 1 || $a->idstatus == 3 || $a->idstatus == 4 || $a->idstatus == 5 || $a->idstatus == 6){
                                                        echo 'badge-soft-danger';
                                                    }elseif($a->idstatus == 2 || $a->idstatus == 7){
                                                        echo 'badge-soft-success';
                                                    }elseif($a->idstatus == 8){
                                                        echo 'badge-soft-secondary';
                                                    }elseif($a->idstatus == 9){
                                                        echo 'badge-soft-danger';
                                                    }?> font-size-12">
                                                        <?=$a->statusdesc?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-grid gap-2">
                                                        <div class="btn-group">
                                                            <a href="<?=base_url()?>/cs/pesanan/detail/<?=$a->idorder?>" class="btn btn-sm btn-outline-info">Detail</a>
                                                            <?php if($a->idstatus != 9){?>
                                                            <button class="btn btn-sm btn-outline-danger">
                                                                Batalkan
                                                            </button>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $c = $c+1; ?>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
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

<?= $this->include('cs/right-sidebar') ?>

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