<div class="modal-header">
    <h5 class="modal-title" id="myModalLabel">Detail Withdraw</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="mb-3">
        <form id="cancelWithdraw" action="<?=base_url()?>/pengelola/withdraw/cancel/<?=$with->idwithdraw?>" method="post">
            <div class="mb-3">
                <label>Batalkan permohonan withdraw ini? Alasan Dibatalkan:</label>
                <input type="text" name="cancelledreason" class="form-control">
            </div>
        </form>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
    <button type="submit" form="cancelWithdraw" class="btn btn-danger">Batalkan</button>
</div>
