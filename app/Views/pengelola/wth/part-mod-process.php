<div class="modal-header">
    <h5 class="modal-title" id="myModalLabel">Detail Withdraw</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="mb-3">
        Proses permohonan withdrawal ini?
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
    <a href="<?=base_url()?>/pengelola/withdraw/processing/<?=$with->idwithdraw?>" class="btn btn-success">Iya</a>
</div>
