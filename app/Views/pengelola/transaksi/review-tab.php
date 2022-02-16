<div class="row">
  	<div class="col-lg-12">
      	<div class="card">
        	<div class="card-body">
				<?php if (!is_null($l_detail->designpreview1) || !is_null($l_detail->designpreview2)) {?>
  				<h5 class="font-size-15 mb-3">Preview Hasil Design:</h5>
				<div class="row">
				<?php }?>
                    <?php if (!is_null($l_detail->designpreview1)) {?>
                    <div class="col-sm-4 p-3">
                        <center class="img-thumbnail">
                            <a href="<?= base_url(); ?>/webdata/uploads/prev_data/<?=$l_detail->designpreview1?>" target="_blank">
                                <img src="<?= base_url(); ?>/webdata/uploads/prev_data/<?=$l_detail->designpreview1?>" class="img-fluid" style="max-height: 265px;" alt="Responsive image">
                            </a>
                        </center>
                    </div>
                    <?php }?>
                    <?php if (!is_null($l_detail->designpreview2)) {?>
                    <div class="col-sm-4 p-3">
                        <center class="img-thumbnail">
                            <a href="<?= base_url(); ?>/webdata/uploads/prev_data/<?=$l_detail->designpreview2?>" target="_blank">
                                <img src="<?= base_url(); ?>/webdata/uploads/prev_data/<?=$l_detail->designpreview2?>" class="img-fluid" style="max-height: 265px;" alt="Responsive image">
                            </a>
                        </center>
                    </div>
                    <?php }?>
                <?php if (!is_null($l_detail->designpreview1) || !is_null($l_detail->designpreview2)) {?>
                </div>
                <?php }?> 

                <?php if (!is_null($l_detail->orderedfile1) || !is_null($l_detail->orderedfile2)) {?>
  				<h5 class="font-size-15 mb-3">File Design HD:</h5>
                <?php if(!is_null($l_detail->orderedfile1)){?>
                    <p><a href="<?=base_url()?>/webdata/uploads/works/<?=$l_detail->orderedfile1?>"><?=$l_detail->orderedfile1?></a></p>
                <?php }?>
                <?php if(!is_null($l_detail->orderedfile2)){?>
                    <p><a href="<?=base_url()?>/webdata/uploads/works/<?=$l_detail->orderedfile2?>"><?=$l_detail->orderedfile2?></a></p>
                <?php }?>
                <?php }?>

        	</div>
       	</div>
    </div>
</div>