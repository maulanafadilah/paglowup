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
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>/cs/dashboard">PAGlowUP</a></li>
                                    <li class="breadcrumb-item active">List Transaksi</li>
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
                                <p class="card-title-desc">Daftar semua transaksi yang berlangsung</p>
                            </div>
                            <div class="card-body">
                                <?=session()->getFlashdata('notif');?>
                                <div class="table-responsive">
                                    <table class="dtable table table-sm table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="7%">No.</th>
                                                <th>Status</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Rating CS</th>
                                                <th>Rating Designer</th>
                                                <th>Jenis Pesanan</th>
                                                <th>Total Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $c = 1;?>
                                            <?php foreach ($l_pesanan as $a) {?>
                                            <tr>
                                                <td><?=$c?></td>
                                                <td><?=$a->statusdesc?></td>
                                                <td><?=$a->orderdate?></td>
                                                <td><?=(!$a->csrating)?'-':$a->csrating?>/5</td>
                                                <td><?=(!$a->designerrating)?'-':$a->designerrating?>/5</td>
                                                <td><?=$a->category?></td>
                                                <td>Rp.<?=$a->totalpayment?></td>
                                                <td>
                                                    <div class="d-grid gap-2">
                                                        <div class="btn-group">
                                                            <a href="<?=base_url()?>/pengelola/transaksi/detail/<?=$a->idorder?>" class="btn btn-sm btn-outline-info">Detail</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $c = $c+1; ?>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Status</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
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

<?= $this->include('pengelola/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Required datatable js -->
<script src="<?=base_url()?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.dtable').DataTable({
      initComplete: function() {
        this.api().columns([1]).every( function() {
          var column = this;
          var select = $('<select class="col-12"><option value=""></option></select>').appendTo($(column.footer()).empty()).on('change', function(){
            var val = $.fn.dataTable.util.escapeRegex(
              $(this).val()
            );
            column.search( val ? '^'+val+'$' : '', true, false).draw();
          });
          column.data().unique().sort().each( function ( d, j ) {
            select.append( '<option value="'+d+'">'+d+'</option>' )
          });
        });
      }
    });
} );
</script>
<script src="<?=base_url()?>/assets/js/app.js"></script>

</body>

</html>