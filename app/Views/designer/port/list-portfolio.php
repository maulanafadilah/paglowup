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
                                    <li class="breadcrumb-item active">List Portfolio</li>
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
                                <p class="card-title-desc">Daftar Portofolio (klik gambar untuk menampilkan detail)</p>
                            </div>
                            <div class="card-body">
                                <?=session()->getFlashdata('notif');?>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPortfolio">
                                    Tambah Portofolio
                                </button>
                                <?php if(!$dataset){?>
                                <div class="my-5 pt-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center mb-5">
                                                    <h4 class="text-uppercase">Belum ada portofolio</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                    <!-- end container -->
                                </div>
                                <!-- end content -->
                                <?php }else{
                                foreach ($dataset as $data) {?>
                                <div class="col-sm-4 p-3">
                                    <center class="img-thumbnail">
                                        <a data-bs-toggle="modal" data-bs-target="#myModal" data-id="<?= $data->idportfolio; ?>">
                                            <img src="<?= base_url(); ?>/webdata/uploads/images/designer/portfolio/<?= $data->img; ?>" class="img-fluid " style="max-height: 265px;" alt="Responsive image">
                                        </a>
                                        <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delConfirm" data-id="<?=$data->idportfolio?>">
                                            Hapus Portfolio
                                        </a>
                                    </center>
                                </div>
                                <?php }} ?>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Portfolio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- sample modal content -->
<div id="delConfirm" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Hapus Portfolio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ingin menghapus portofolio ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <span class="konfirmasi-delete-button"></span>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- sample modal content -->
<div id="addPortfolio" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Portfolio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="konfirAdd" action="<?=base_url()?>/designer/portfolio/add_proc" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Foto / Gambar Portofolio</label>
                        <input type="file" name="foto" id="fileupload1" class="form-control" accept="image/png, image/jpg, image/jpeg" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi <span class="text-danger">*</span></label>
                        <input type="text" name="description" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>URL</label>
                        <input type="text" name="url" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="konfirAdd" class="btn btn-primary">Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?= $this->include('designer/right-sidebar') ?>

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
        $('#myModal').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>/designer/portfolio/list_img',
                data: 'rowid=' + rowid,
                success: function(data) {
                    $('.fetched-data').html(data); //menampilkan data ke dalam modal
                }
            });
        });
        $('#delConfirm').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>/designer/portfolio/konfirDel',
                data: 'rowid=' + rowid,
                success: function(data) {
                    $('.konfirmasi-delete-button').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
</script>

<script src="<?=base_url()?>/assets/js/app.js"></script>
</body>

</html>