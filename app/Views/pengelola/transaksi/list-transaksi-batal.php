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
                                <p class="card-title-desc">histori Pemesanan yang telah dibatalkan</p>
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
                                            <?php foreach ($l_pesanan_batal as $b) {?>
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
                                                            <a href="<?=base_url()?>/pengelola/transaksi/detail/<?=$b->idorder?>" class="btn btn-sm btn-outline-info">Detail</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $c = $c+1; ?>
                                            <?php } ?>
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
    $(document).ready(function() {
        $('.dtable').DataTable();
        $('#cancelOrder').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>/pengelola/pesanan2/list_ord_cancel',
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