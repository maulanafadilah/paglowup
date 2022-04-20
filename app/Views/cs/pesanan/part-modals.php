
<?php if($l_detail->idstatus == 1){?>
<!-- sample modal content -->
<div id="cancelOrd" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Batalkan Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Batalkan pesanan ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <a href="<?=base_url()?>/cs/pesanan/cancel_order/<?=$l_detail->idorder?>" class="btn btn-danger">Batalkan</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php } ?>

<?php if($l_detail->idstatus == 6 && ($l_detail->orderedfile1 || $l_detail->orderedfile2)){?>
<!-- sample modal content -->
<div id="closeOrd" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tutup Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ingin Tutup pesanan ini?<br><br>
                <i class="text-danger">*HARAP KONFIRMASI BAHWA UMKM TIDAK MERESPON TRANSAKSI INI SEBELUM TUTUP PESANAN</i>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
                <a href="<?=base_url()?>/cs/pesanan/close_order/<?=$l_detail->idorder?>" class="btn btn-success">Konfirmasi Tutup Pesanan</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php } ?>

<?php if($l_detail->idstatus == 1 && is_null($l_detail->idcs)){?>
<!-- sample modal content -->
<div id="verifPayment" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Verifikasi Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Konfirmasi pembayaran untuk pemesanan ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <a href="<?=base_url()?>/cs/pesanan/verif_payment/<?=$l_detail->idorder?>" class="btn btn-primary">Konfirmasi</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php } ?>

<?php if($l_detail->idstatus == 2){?>
<!-- sample modal content -->
<div id="approveAg" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Verifikasi Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Approve Persetujuan?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <a href="<?=base_url()?>/cs/pesanan/approve_umkm/<?=$l_detail->idorder?>" class="btn btn-primary">Konfirmasi</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php }?>

<!-- sample modal content -->
<div id="setDesigner" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Set Designer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Pilih Designer untuk menyelesaikan pesanan ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <span class="konfirmasi-set-button"></span>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php if(!is_null($l_detail->iddesigner)){?>
<!-- sample modal content -->
<div id="sendAttachmentCSDE" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Attachment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="csdeSendForm" action="<?=base_url()?>/cs/pesanan/send_comment_csde_img/<?=$l_detail->idorder?>" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 1</label>
                        <input type="file" name="file1" class="form-control" accept=" image/jpg, image/jpeg">
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 2</label>
                        <input type="file" name="file2" class="form-control" accept=" image/jpg, image/jpeg">
                    </div>
                    <div class="mb-3">
                        <label>Komentar</label>
                        <input type="text" name="comment" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="csdeSendForm" class="btn btn-primary">Kirim</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php }?>

<?php if(!is_null($l_detail->idcs)){?>
<!-- sample modal content -->
<div id="sendAttachmentCSUM" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Attachment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="csumSendForm" action="<?=base_url()?>/cs/pesanan/send_comment_csum_img/<?=$l_detail->idorder?>" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 1</label>
                        <input type="file" name="file1" class="form-control" accept=" image/jpg, image/jpeg">
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 2</label>
                        <input type="file" name="file2" class="form-control" accept=" image/jpg, image/jpeg">
                    </div>
                    <div class="mb-3">
                        <label>Komentar</label>
                        <input type="text" name="comment" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="csumSendForm" class="btn btn-primary">Kirim</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php }?>

<?php if($l_detail->idstatus == 5){?>
<!-- sample modal content -->
<div id="reqStatusRevisi" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tolak Desain</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tolak desain dan ajukan revisi ke Designer?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <a href="<?=base_url()?>/cs/pesanan/tolak_review/<?=$l_detail->idorder?>" class="btn btn-primary">Ya</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- sample modal content -->
<div id="uploadPrev" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Upload Preview Untuk UMKM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="upPrevAcc" action="<?=base_url()?>/cs/pesanan/send_prev_umkm/<?=$l_detail->idorder?>" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 1 (max size 512kb)</label>
                        <input type="file" name="prev1" class="form-control" accept=" image/jpg, image/jpeg" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Attachment 2 (max size 512kb)</label>
                        <input type="file" name="prev2" class="form-control" accept=" image/jpg, image/jpeg" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="upPrevAcc" class="btn btn-primary">Kirim</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php }?>

<?php if ($l_detail->idstatus == 6){?>

<!-- sample modal content -->
<div id="showPreview" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Upload Preview Untuk UMKM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if (!is_null($l_detail->designpreview1)) {?>
                <div class="col-sm-6 p-3">
                    <a href="<?= base_url(); ?>/webdata/uploads/prev_data/<?=$l_detail->designpreview1?>" target="_blank">
                        <img src="<?= base_url(); ?>/webdata/uploads/prev_data/<?=$l_detail->designpreview1?>" class="img-fluid" alt="Responsive image">
                    </a>
                </div>
                <?php }?>
                <?php if (!is_null($l_detail->designpreview2)) {?>
                <div class="col-sm-6 p-3">
                    <a href="<?= base_url(); ?>/webdata/uploads/prev_data/<?=$l_detail->designpreview2?>" target="_blank">
                        <img src="<?= base_url(); ?>/webdata/uploads/prev_data/<?=$l_detail->designpreview2?>" class="img-fluid" alt="Responsive image">
                    </a>
                </div>
                <?php }?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php } ?>