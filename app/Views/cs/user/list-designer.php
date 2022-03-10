<?php 
    use App\Models\M_designer;
    $this->m_designer = new M_designer();
    
?>
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
                                    <li class="breadcrumb-item active">List Designer</li>
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
                                <p class="card-title-desc">Designer yang terdaftar pada PAGlowUP</p>
                            </div>
                            <div class="card-body">
                                <?=session()->getFlashdata('notif');?>
                                <table class="table dtable table-bordered dt-responsive table-sm nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th width="7%">No.</th>
                                            <th>Nama</th>
                                            <th>Rating</th>
                                            <th>Total Transaksi</th>
                                            <th>Total Transaksi Ongoing</th>
                                            <th>Total Transaksi Selesai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $c = 1;?>
                                        <?php foreach ($l_designer as $a) {?>
                                        <tr>
                                            <td><?=$c?></td>
                                            <td><?=$a->designer_name?></td>
                                            <td><?=(!$a->rating)?'-':$a->rating?>/5</td>
                                            <td><?=$a->total_transaksi?></td>
                                            <td>
                                                <?= $this->m_designer->countStatusOngoing($a->iddesigner)[0]->hitung?>
                                            </td>
                                            <td>
                                                <?= $this->m_designer->countStatusDone($a->iddesigner)[0]->hitung?>
                                            </td>
                                            <td>
                                                <div class="d-grid gap-2">
                                                    <?php if($a->iduser != session()->get('iduser')){?>
                                                    <a href="<?=base_url()?>/cs/designer/detail/<?=$a->iduser?>" class="btn btn-sm btn-outline-info">Detail</a> 
                                                    <?php }else{ ?>
                                                    <a href="<?=base_url()?>/cs/profile" class="btn btn-sm btn-outline-info">detail</a> 
                                                    <?php } ?>
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