<div class="modal-header">
    <h5 class="modal-title" id="myModalLabel">Detail Withdraw</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="mb-3">
        <table width="100%">
            <tr>
                <td>Nama Pemohon</td>
                <td>:</td>
                <td><?=$with->designer_name?></td>
            </tr>
            <tr>
                <td>Tanggal Pengajuan</td>
                <td>:</td>
                <td><?=$with->timerequest?></td>
            </tr>
            <tr>
                <td>Besar Withdraw</td>
                <td>:</td>
                <td>Rp <?=number_format($with->amount, 0, ',', '.')?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><?=$with->status?></td>
            </tr>
            <?php if($with->status == 'Confirmed'){?>
            <tr>
                <td>Telah diproses oleh</td>
                <td>:</td>
                <td><?=$with->pengelola_name?></td>
            </tr>
            <tr>
                <td>Bukti transfer</td>
                <td>:</td>
                <td>
                    <img src="<?=base_url()?>/webdata/uploads/images/pengelola/withdrawproof/<?=$with->transferproof?>" style="max-width: 450px">
                </td>
            </tr>
            <?php }elseif($with->status == 'Cancelled'){?>
            <tr>
                <td>Alasan Ditolak</td>
                <td>:</td>
                <td><?=$with->cancelledreason?></td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
</div>
