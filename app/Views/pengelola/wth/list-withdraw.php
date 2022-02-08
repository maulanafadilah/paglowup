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
                                    <li class="breadcrumb-item active">List Permintaan Withdraw dari Designer</li>
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
                                <p class="card-title-desc">Customer Service yang terdaftar pada PAGlowUP</p>
                            </div>
                            <div class="card-body">
                                <?=session()->getFlashdata('notif');?>
                                <table class="table dtable table-bordered table-striped dt-responsive table-sm nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th width="7%">No.</th>
                                            <th>Status</th>
                                            <th>Tanggal Request</th>
                                            <th>Designer</th>
                                            <th>Besaran</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $c = 1;?>
                                        <?php foreach ($l_withdraw as $a) {?>
                                        <tr>
                                            <td><?=$c?></td>
                                            <td><?=$a->status?></td>
                                            <td><?=$a->timerequest?></td>
                                            <td><?=$a->designer_name?></td>
                                            <td>Rp <?=number_format($a->amount, 0, ',', '.')?></td>
                                            <td>
                                                <div class="d-grid gap-2">
                                                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#myModal" data-id="<?= $a->idwithdraw ?>">
                                                        Detail
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $c++; ?>
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
<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
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
        $('#myModal').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>/pengelola/withdraw/list_wth',
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