<div class="modal-header">
    <h5 class="modal-title" id="myModalLabel">Konfirmasi Pembatalan Order</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="mb-3">
        Batalkan pesanan ini?
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
    <a href="<?=base_url()?>/cs/pesanan2/cancel_order/<?=$ord->idorder?>" class="btn btn-danger">Batalkan</a>
</div>
