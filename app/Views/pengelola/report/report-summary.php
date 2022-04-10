<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>
    <!-- DataTables -->
    <link href="<?=base_url()?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="<?=base_url()?>/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <link href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

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
                                    <li class="breadcrumb-item active">Review & Rating</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Pendapatan</span>
                                        <h4 class="mb-3">
                                            Rp <?=number_format($pendapatan, 0, ',', '.')?>
                                        </h4>
                                    </div>

                                    <div class="col-6">
                                        <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <!-- <span class="badge bg-soft-success text-success">+$20.9k</span> -->
                                    <!-- <span class="ms-1 text-muted font-size-13">Since last week</span> -->
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Transaksi</span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?=$total_order?>">0</span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <!-- <span class="badge bg-soft-danger text-danger">-29 Trades</span> -->
                                    <!-- <span class="ms-1 text-muted font-size-13">Since last week</span> -->
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col-->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Rating Customer Service</span>
                                        <h4><div id="rating-cs"></div></h4>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <!-- <span class="badge bg-soft-success text-success">+ $2.8k</span> -->
                                    <span class="ms-1 text-muted font-size-13">
                                        <span class="counter-value" data-target="<?=$cs_rate?>">0</span>/5
                                    </span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Rating Designer</span>
                                        <h4><div id="rating-desain"></div></h4>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <!-- <span class="badge bg-soft-success text-success">+2.95%</span> -->
                                    <span class="ms-1 text-muted font-size-13">
                                        <span class="counter-value" data-target="<?=$des_rate?>">0</span>/5
                                    </span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row-->
                <div class="row">

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Top 10 Customer Service</h4>
                                <div class="flex-shrink-0">
                                    <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">

                                    </ul>
                                    <!-- end nav tabs -->
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body px-0">
                                <div class="table-responsive px-3" data-simplebar style="max-height: 352px;">
                                    <table class="table align-middle table-nowrap table-striped">
                                        <thead>
                                            <th></th>
                                            <th>Nama</th>
                                            <th class="text-end">Rating</th>
                                            <th class="text-end">Total Transaksi</th>
                                        </thead>

                                        <tbody>
                                            <?php foreach($top_cs as $a){?>
                                            <tr>
                                                <td style="width: 50px;">
                                                <a href="<?=base_url()?>/pengelola/cs/detail/<?=$a->iduser?>">
                                                    <div class="font-size-22 text-success">
                                                        <img class="rounded-circle header-profile-user" src="<?= base_url()?>/webdata/uploads/images/cs/<?=$a->cs_pic?>">
                                                    </div>
                                                </a>
                                                </td>
                                                <td><h5 class="font-size-14 mb-1"><?=$a->cs_name?></h5></td>
                                                <td>
                                                    <div class="text-end">
                                                        <h5 class="font-size-14 mb-0"><?=$a->rating?></h5>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-end">
                                                        <h5 class="font-size-14 text-muted mb-0"><?=$a->total_transaksi?></h5>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Top 10 Designer</h4>

                            </div><!-- end card header -->

                            <div class="card-body px-0">
                                <div class="table-responsive px-3" data-simplebar style="max-height: 352px;">
                                    <table class="table align-middle table-nowrap table-striped">
                                        <thead>
                                            <th></th>
                                            <th>Nama</th>
                                            <th class="text-end">Rating</th>
                                            <th class="text-end">Total Transaksi</th>
                                        </thead>

                                        <tbody>
                                            <?php foreach($top_designer as $b){?>
                                            <tr>
                                                <td style="width: 50px;">
                                                <a href="<?=base_url()?>/pengelola/designer/detail/<?=$b->iduser?>">
                                                    <div class="font-size-22 text-success">
                                                        <img class="rounded-circle header-profile-user" src="<?= base_url()?>/webdata/uploads/images/designer/<?=$b->designer_pic?>">
                                                    </div>
                                                </a>
                                                </td>
                                                <td><h5 class="font-size-14 mb-1"><?=$b->designer_name?></h5></td>
                                                <td>
                                                    <div class="text-end">
                                                        <h5 class="font-size-14 mb-0"><?=$b->rating?></h5>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-end">
                                                        <h5 class="font-size-14 text-muted mb-0"><?=$b->total_transaksi?></h5>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Laporan Pendapatan</h4>
                                <div class="flex-shrink-0">
                                    <select class="form-select form-select-sm mb-0 my-n1">
                                        <option value="Today" selected="">hari Ini</option>
                                        <option value="Yesterday">Yesterday</option>
                                        <option value="Week">Last Week</option>
                                        <option value="Month">Last Month</option>
                                    </select>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                Filter data dari <input type="text" name="min" id="min"> s/d <input type="text" name="max" id="max">
                                <div class="table-responsive">
                                    <table class="dtable table table-sm table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="7%">No.</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Pendapatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;?>
                                            <?php foreach($all_income as $c){?>
                                            <tr>
                                                <td><?=$count?></td>
                                            
                                                <td><?=$c->orderdate?></td>
                                                <td>Rp <?=number_format($c->price, 0, ',', '.')?></td>
                                            </tr>
                                            <?php $count++; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?= $this->include('pengelola/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>

<!-- Required datatable js -->
<script src="<?=base_url()?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- App js -->
<script src="<?=base_url()?>/assets/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>

<!-- rater js -->
<script src="<?=base_url()?>/assets/libs/rater-js/index.js"></script>

<!-- Datatable init js -->
<script type="text/javascript">
var minDate, maxDate;
 
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[1] );
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);

// rating-desain
var basicRating = raterJs( {
    starSize:30,
    readOnly: true, 
    rating: <?php echo $des_rate?>,
    element:document.querySelector("#rating-desain"), 
    rateCallback:function rateCallback(rating, done) {
        this.setRating(rating); 
        done(); 
    }
});
// rating-cs
var basicRating = raterJs( {
    starSize:30,
    readOnly: true, 
    rating: <?php echo $cs_rate?>,
    element:document.querySelector("#rating-cs"), 
    rateCallback:function rateCallback(rating, done) {
        this.setRating(rating); 
        done(); 
    }
});
 
$(document).ready(function() {
    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'YYYY-MM-DD'
    });
    maxDate = new DateTime($('#max'), {
        format: 'YYYY-MM-DD'
    });
 
    // DataTables initialisation
    var table = $('.dtable').DataTable();
 
    // Refilter the table
    $('#min, #max').on('change', function () {
        table.draw();
    });
});
</script>

</body>

</html>