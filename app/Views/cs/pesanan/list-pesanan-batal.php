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
                                    <li class="breadcrumb-item active">List Pesanan yang dibatalkan</li>
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
                                <p class="card-title-desc">List Pesanan yang belum membayar</p>
                            </div>
                            <div class="card-body">
                                <?=session()->getFlashdata('notif');?>
                                <div class="table-responsive">
                                    <table class="table dtable align-middle table-check nowrap">
                                        <thead>
                                            <tr>
                                                <th width="7%">No.</th>
                                                <th>Pemesan</th>
                                                <th>Tipe Pesanan</th>
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
                                                <td>
                                                <?php if($a->idgrouporder == 1){?>
                                                    Desain Logo
                                                <?php }elseif($a->idgrouporder == 2){?>
                                                    Desain Kemasan
                                                <?php }elseif($a->idgrouporder == 3){?>
                                                    Desain Logo & Kemasan
                                                <?php }?>
                                                </td>                                                
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
                                                            <?php if($a->idstatus < 8){?>
                                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#cancelOrder" data-id="<?= $a->idorder ?>">
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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">Riwayat Pemesanan yang telah dibatalkan</p>
                            </div>
                            <div class="card-body">
                                <?=session()->getFlashdata('notif');?>
                                <div class="table-responsive">
                                    <table class="table dtable align-middle table-check nowrap">
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
                                            <?php foreach ($l_pesanan_batal as $b) {
                                                if ($b->idcs == $detail_user->idcs || is_null($b->idcs)) {
                                            ?>
                                            <tr>
                                                <td><?=$c?></td>
                                                <td><?=$b->umkm_name?></td>
                                                <td><?=$b->orderdate?></td>
                                                <td>
                                                    <?php 
                                                    $trimmed = explode("</p><p>", $b->description);
                                                    $countDesc = count(explode(" ", $trimmed[0]));
                                                    if ($countDesc > 12) {
                                                      $slice = array_slice(explode(" ", $trimmed[0]), 0, 12);
                                                      echo implode(" ", $slice)."....";
                                                    } else {
                                                      echo $trimmed[0];
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <span class="badge 
                                                    <?php if($b->idstatus == 1 || $b->idstatus == 3 || $b->idstatus == 4 || $b->idstatus == 5 || $b->idstatus == 6){
                                                        echo 'badge-soft-danger';
                                                    }elseif($b->idstatus == 2 || $b->idstatus == 7){
                                                        echo 'badge-soft-success';
                                                    }elseif($b->idstatus == 8){
                                                        echo 'badge-soft-secondary';
                                                    }elseif($b->idstatus == 9){
                                                        echo 'badge-soft-danger';
                                                    }?> font-size-12">
                                                        <?=$b->statusdesc?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-grid gap-2">
                                                        <div class="btn-group">
                                                            <a href="<?=base_url()?>/cs/pesanan/detail/<?=$b->idorder?>" class="btn btn-sm btn-outline-info">Detail</a>
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

<!-- sample modal content -->
<div id="cancelOrder" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="fetched-data"></div>
        </div>
    </div>
</div><!-- /.modal -->

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
    $(document).ready(function() {
        $('.dtable').DataTable();
        $('#cancelOrder').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>/cs/pesanan2/list_ord_cancel',
                data: 'rowid=' + rowid,
                success: function(data) {
                    $('.fetched-data').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
</script>

<script src="<?=base_url()?>/assets/js/app.js"></script>

</body>

</html>