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
                                <p class="card-title-desc">Riwayat Pemesanan yang telah dibatalkan</p>
                            </div>
                            <div class="card-body">
                                <?=session()->getFlashdata('notif');?>
                                <div class="category-filter">
                                  <select id="categoryFilter" style="display: inline; margin: 10px">
                                    <option value="">Filter Status</option>
                                    <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                                    <option value="Pembayaran Diterima">Pembayaran Diterima</option>
                                    <option value="Pesanan Diproses">Pesanan Diproses</option>
                                    <option value="Pengerjaan Desain">Pengerjaan Desain</option>
                                    <option value="Review CS">Review CS</option>
                                    <option value="Revisi">Revisi</option>
                                    <option value="Closed">Closed</option>
                                    <option value="Dibatalkan">Dibatalkan</option>
                                  </select>
                                </div>

                                <div class="table-responsive">
                                    <table class="table align-middle table-check nowrap" id="filterTable">
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
                                            <?php foreach ($l_pesanan_batal as $b) {?>
                                            <tr>
                                                <td><?=$c?></td>
                                                <td><?=$b->umkm_name?></td>
                                                <td>
                                                <?php if($b->idgrouporder == 1){?>
                                                    Desain Logo
                                                <?php }elseif($b->idgrouporder == 2){?>
                                                    Desain Kemasan
                                                <?php }elseif($b->idgrouporder == 3){?>
                                                    Desain Logo & Kemasan
                                                <?php }?>
                                                </td>
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

    $("document").ready(function () {

      $("#filterTable").dataTable({
        "searching": true
      });

      //Get a reference to the new datatable
      var table = $('#filterTable').DataTable();

      //Take the category filter drop down and append it to the datatables_filter div. 
      //You can use this same idea to move the filter anywhere withing the datatable that you want.
      $("#filterTable_filter.dataTables_filter").append($("#categoryFilter"));
      
      //Get the column index for the Category column to be used in the method below ($.fn.dataTable.ext.search.push)
      //This tells datatables what column to filter on when a user selects a value from the dropdown.
      //It's important that the text used here (Category) is the same for used in the header of the column to filter
      var categoryIndex = 0;
      $("#filterTable th").each(function (i) {
        if ($($(this)).html() == "Status") {
          categoryIndex = i; return false;
        }
      });

      //Use the built in datatables API to filter the existing rows by the Category column
      $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
          var selectedItem = $('#categoryFilter').val()
          var category = data[categoryIndex];
          if (selectedItem === "" || category.includes(selectedItem)) {
            return true;
          }
          return false;
        }
      );

      //Set the change event for the Category Filter dropdown to redraw the datatable each time
      //a user selects a new filter.
      $("#categoryFilter").change(function (e) {
        table.draw();
      });

      table.draw();
    });

</script>

<script src="<?=base_url()?>/assets/js/app.js"></script>

</body>

</html>