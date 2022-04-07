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

    <?= $this->include('designer/menu') ?>

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
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>/designer/dashboard">PAGlowUP</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Saldo Saat Ini</span>
                                        <h4 class="mb-3">
                                            Rp <?=number_format($pendapatan-$pengeluaran, 0, ',', '.')?>
                                        </h4>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-4 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Saldo telah diambil</span>
                                        <h4 class="mb-3">
                                            Rp <?=number_format($pengeluaran, 0, ',', '.')?>
                                        </h4>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-4 col-md-6">
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
                                                <p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-primary"></i> Saldo</p>
                                                <h6>Rp <?=number_format($pendapatan-$pengeluaran, 0, ',', '.')?></h6>
                                            </div>

                                            <div class="mt-4 pt-2">
                                                <p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-info"></i> Withdraw</p>
                                                <h6>Rp. <?=number_format($pengeluaran, 0, ',', '.')?></h6>
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
                                                        <p class="mb-2 text-muted text-uppercase font-size-11">Transaksi Dalam Proses</p>
                                                        <h5 class="fw-medium"><?=$inwork_order?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div>
                                                        <p class="mb-2 text-muted text-uppercase font-size-11">Transaksi Batal</p>
                                                        <h5 class="fw-medium"><?=$canceled_order?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div>
                                                        <p class="mb-2 text-muted text-uppercase font-size-11">Transaksi Selesai</p>
                                                        <h5 class="fw-medium"><?=$closed_order?></h5>
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
                                <h4 class="card-title mb-0 flex-grow-1">Testimoni Terbaru</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table dtable align-middle dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th width="7%">No.</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Testimoni</th>
                                                <th>Rating</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $c = 1;?>
                                            <?php foreach ($l_testimoni as $a) {?>
                                            <tr>
                                                <td><?=$c?></td>
                                                <td><?=$a->orderdate?></td>
                                                <td>
                                                    <?php 
                                                    $trimmed = explode("</p><p>", $a->reviewdesigner);
                                                    $countDesc = count(explode(" ", $trimmed[0]));
                                                    if ($countDesc > 12) {
                                                      $slice = array_slice(explode(" ", $trimmed[0]), 0, 12);
                                                      echo implode(" ", $slice)."....";
                                                    } else {
                                                      echo $trimmed[0];
                                                    }
                                                    ?>
                                                </td>
                                                <td><?=$a->designerrating?></td>
                                                <td>
                                                    <div class="d-grid gap-2">
                                                        <a href="<?=base_url()?>/designer/pesanan/detail/<?=$a->idorder?>" class="btn btn-outline-info">Detail</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $c = $c+1; ?>
                                            <?php } ?>
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

<?= $this->include('designer/right-sidebar') ?>

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
    series: [<?php echo ($pendapatan || $pengeluaran)?$pendapatan-$pengeluaran.", ".$pengeluaran:"0, 0"?>],
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
        <?php echo ($total_order == 0)?0:round((($total_order - $canceled_order) / $total_order)* 100, 2)?>,
        <?php echo ($closed_order == 0)?0:round((($closed_order - $canceled_order) / $closed_order)* 100, 2)?>,  
        ],
    labels: ['Series A'],
}

var chart = new ApexCharts(
    document.querySelector("#invested-overview"),
    options
);

chart.render();
 
// rating-desain
var basicRating = raterJs( {
    starSize:30,
    readOnly: true, 
    rating: <?php echo ($des_rate)?$des_rate:0?>,
    element:document.querySelector("#rating-desain"), 
    rateCallback:function rateCallback(rating, done) {
        this.setRating(rating); 
        done(); 
    }
});
</script>

</body>

</html>