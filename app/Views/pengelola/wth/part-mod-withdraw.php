<div class="modal-header">
    <h5 class="modal-title" id="myModalLabel">Detail Withdraw</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="mb-3">
        <table>
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
            <?php if(!is_null($with->idpengelola)){?>
            <tr>
                <td>Telah diproses oleh</td>
                <td>:</td>
                <td><?=$with->pengelola_name?></td>
            </tr>
            <tr>
                <td>Bukti transfer</td>
                <td>:</td>
                <td><img src="<?=base_url()?>/webdata/uploads/images/pengelola/withdrawproof/<?=$with->transferproof?>"></td>
            </tr>
            <?php }else{?>
            <tr>
                <td>Transfer Ke</td>
            </tr>
            <tr>
                <td>Bank</td>
                <td>:</td>
                <td><?=$with->bankname?></td>
            </tr>
            <tr>
                <td>Atas Nama</td>
                <td>:</td>
                <td><?=$with->bankaccname?></td>
            </tr>
            <tr>
                <td>Nomor Rekening</td>
                <td>:</td>
                <td><?=$with->bankaccount?></td>
            </tr>
            <?php }?>
        </table>
    </div>
    <?php if($with->status == 'Requested'){?>
    <div class="mb-3">
        <form id="upProof" action="<?=base_url()?>/pengelola/withdraw/bayar/<?=$with->idwithdraw?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Upload Bukti Transfer</label>
                <input type="file" name="transferproof" id="fileupload1" class="form-control">
            </div>
        </form>
    </div>
    <?php }?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
    <?php if($with->status == 'Requested'){?>
    <button type="submit" form="upProof" class="btn btn-primary">Upload Bukti Transfer</button>
    <?php }?>
</div>
