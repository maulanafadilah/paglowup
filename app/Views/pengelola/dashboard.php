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
                                </div>
                                <div class="text-nowrap">
                                    <span class="text-muted font-size-13">Pendapatan Hari ini </span>
                                    <span class="ms-1 badge bg-soft-success text-success">+Rp <?=number_format($t_pendapatan, 0, ',', '.')?></span>
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
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Potensi Pendapatan</span>
                                        <h4 class="mb-3">
                                            Rp <?=number_format($p_pendapatan, 0, ',', '.')?>
                                            <span class="text-muted font-size-11">(Dalam Pengerjaan)</span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <span class="text-muted font-size-13">Belum Ditransfer</span>
                                    <span class="ms-1 badge bg-soft-success text-secondary">
                                        Rp <?=number_format($p_pendapatan - $pendapatan, 0, ',', '.')?>
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
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-center mb-4">
                                    <h5 class="card-title me-2">Wallet Balance</h5>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-sm">
                                        <div id="wallet-balance" data-colors='["#5156be", "#4ba6ef"]' class="apex-charts"></div>
                                    </div>
                                    <div class="col-sm align-self-center">
                                        <div class="mt-4 mt-sm-0">
                                            <div>
                                                <p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-primary"></i> Pendapatan</p>
                                                <h6>Rp <?=number_format($pendapatan, 0, ',', '.')?></h6>
                                            </div>

                                            <div class="mt-4 pt-2">
                                                <p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-info"></i> Pengeluaran</p>
                                                <h6>Rp. <?=number_format($withdrawal, 0, ',', '.')?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>

                    <div class="col-xl-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-center mb-4">
                                    <h5 class="card-title me-2">Persentase Kinerja</h5>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-sm">
                                        <div id="invested-overview" data-colors='["#5156be", "#34c38f"]' class="apex-charts"></div>
                                    </div>
                                    <div class="col-sm align-self-center">
                                        <div class="mt-4 mt-sm-0">
                                            <p class="mb-1">Total Transaksi</p>
                                            <h4><?=$total_order?></h4>

                                            <div class="row g-0">
                                                <div class="col-6">
                                                    <div>
                                                        <p class="mb-2 text-muted text-uppercase font-size-11">Transaksi Berhasil</p>
                                                        <h5 class="fw-medium"><?=$closed_order?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div>
                                                        <p class="mb-2 text-muted text-uppercase font-size-11">Transaksi Batal</p>
                                                        <h5 class="fw-medium"><?=$canceled_order?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

<!-- apexcharts -->
<script src="<?=base_url()?>/assets/libs/apexcharts/apexcharts.min.js"></script>

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

// get colors array from the string
function getChartColorsArray(chartId) {
    var colors = $(chartId).attr('data-colors');
    var colors = JSON.parse(colors);
    return colors.map(function(value){
        var newValue = value.replace(' ', '');
        if(newValue.indexOf('--') != -1) {
            var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
            if(color) return color;
        } else {
            return newValue;
        }
    })
}

// 
// Wallet Balance
//
var piechartColors = getChartColorsArray("#wallet-balance");
var options = {
    series: [<?php echo $pendapatan.", ".$withdrawal?>],
    chart: {
        width: 250,
        height: 250,
        type: 'pie',
    },
    labels: ['Pendapatan', 'Pengeluaran'],
    colors: piechartColors,
    stroke: {
        width: 0,
    },
    legend: {
        show: false
    },
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },
        }
    }]
};

var chart = new ApexCharts(document.querySelector("#wallet-balance"), options);
chart.render();

//
// Invested Overview
//

var radialchartColors = getChartColorsArray("#invested-overview");
var options = {
    chart: {
        height: 270,
        type: 'radialBar',
        offsetY: -10
    },
    plotOptions: {
        radialBar: {
            startAngle: -130,
            endAngle: 130,
            dataLabels: {
                name: {
                    show: false
                },
                value: {
                    offsetY: 10,
                    fontSize: '18px',
                    color: undefined,
                    formatter: function (val) {
                        return val + "%";
                    }
                }
            }
        }
    },
    colors: [radialchartColors[0]],
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            type: 'horizontal',
            gradientToColors: [radialchartColors[1]],
            shadeIntensity: 0.15,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [20, 60]
        },
    },
    stroke: {
        dashArray: 0,
    },
    legend: {
        show: false
    },
    series: [
        <?php echo round((($total_order - $canceled_order) / $total_order)* 100, 2)?>,
        <?php echo round((($closed_order - $canceled_order) / $closed_order)* 100, 2)?>,  
        ],
    labels: ['Series A'],
}

var chart = new ApexCharts(
    document.querySelector("#invested-overview"),
    options
);

chart.render();

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