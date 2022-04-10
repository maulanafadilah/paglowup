<hr>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h3 class="page-title mb-0">CHAT</h3>
            </div>
        </div>
    </div>
    <div class="d-lg-flex" id="chat">
        <div class="chat-leftsidebar card">
            <div class="p-3 px-4 border-bottom">
                <div class="d-flex align-items-start ">
                    <div class="flex-grow-1">
                        <h5 class="font-size-16 mb-1">Riwayat Chat CS - UMKM</h5>
                    </div>

                </div>
            </div>

            <div class="chat-leftsidebar-nav">
                <ul class="nav nav-pills nav-justified bg-soft-light p-1">
                    <li class="nav-item">
                        <a href="#chat" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                            <i class="bx bx-chat font-size-20 d-sm-none"></i>
                            <span class="d-none d-sm-block">User Dalam Komentar</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="chat">
                        <div class="chat-message-list" data-simplebar>
                            <div class="pt-3">
                                <ul class="list-unstyled chat-list">
                                    <li>
                                        <a href="#">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-shrink-0 align-self-center me-3">
                                                    <img src="<?=base_url()?>/webdata/uploads/images/umkm/<?=$l_detail->umkm_pic?>" class="rounded-circle avatar-sm" alt="">
                                                    <span class="user-status"></span>
                                                </div>

                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-size-14 mb-1"><?=$l_detail->umkm_name?></h5>
                                                    <p class="text-truncate mb-0">UMKM</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php if(!is_null($l_detail->idcs)){?>
                                    <li>
                                        <a href="#">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-shrink-0 align-self-center me-3">
                                                    <img src="<?=base_url()?>/webdata/uploads/images/cs/<?=$l_detail->cs_pic?>" class="rounded-circle avatar-sm" alt="">
                                                    <span class="user-status"></span>
                                                </div>

                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-size-14 mb-1"><?=$l_detail->cs_name?></h5>
                                                    <p class="text-truncate mb-0">CS</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end chat-leftsidebar -->

        <div class="w-100 user-chat mt-4 mt-sm-0 ms-lg-1">
            <div class="card">
                <div class="p-3 px-lg-4 border-bottom">
                    <div class="row">
                        <div class="col-xl-4 col-7">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-sm me-3 d-sm-block d-none">
                                    <img src="<?=base_url()?>/webdata/uploads/images/umkm/<?=$l_detail->umkm_pic?>" alt="" class="img-fluid d-block rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="font-size-14 mb-1 text-truncate"><a href="#" class="text-dark">Pesanan Nomor #<?=$l_detail->idprodcat.$l_detail->idgrouporder.$l_detail->idorder.$l_detail->idumkm?></a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="chat-conversation p-3 px-2" data-simplebar>
                    <ul class="list-unstyled mb-0">
                        <li class="chat-day-title">
                            <span class="title">Awal dari komentar</span>
                        </li>

                        <?php foreach($l_comments_csum as $csum){
                            if (!is_null($csum->idcomment)){
                                if (!is_null($csum->idcs)){
                        ?>
                        <li class="right">
                            <div class="conversation-list">
                                <div class="ctext-wrap">
                                    <div class="ctext-wrap-content">
                                        <h5 class="conversation-name"><span class="user-name"><?=$csum->cs_name?></span> <span class="time"><?=$csum->commenttime?></span></h5>
                                        <p class="mb-0"><?=$csum->comment?></p>
                                        
                                        <?php if (!is_null($csum->file1) || !is_null($csum->file2)){?>
                                        <ul class="list-inline message-img mt-3  mb-0">
                                            
                                            <?php if(!is_null($csum->file1)){?>
                                            <li class="list-inline-item message-img-list">
                                                <a class="d-inline-block m-1" href="<?=base_url()?>/webdata/uploads/comment/<?=$csum->file1?>" target="_blank">
                                                    <img src="<?=base_url()?>/webdata/uploads/comment/<?=$csum->file1?>" alt="" class="rounded img-thumbnail">
                                                </a>
                                            </li>
                                            <?php } ?>

                                            <?php if(!is_null($csum->file2)){?>
                                            <li class="list-inline-item message-img-list">
                                                <a class="d-inline-block m-1" href="<?=base_url()?>/webdata/uploads/comment/<?=$csum->file2?>" target="_blank">
                                                    <img src="<?=base_url()?>/webdata/uploads/comment/<?=$csum->file2?>" alt="" class="rounded img-thumbnail">
                                                </a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                        <?php }?>

                                    </div>
                                </div>
                            </div>

                        </li>
                        <?php }else{?>
                        <li>
                            <div class="conversation-list">
                                <div class="ctext-wrap">
                                    <div class="ctext-wrap-content">
                                        <h5 class="conversation-name"><span class="user-name"><?=$csum->umkm_name?></span> <span class="time"><?=$csum->commenttime?></span></h5>
                                        <p class="mb-0"><?=$csum->comment?></p>
                                        
                                        <?php if (!is_null($csum->file1) || !is_null($csum->file2)){?>
                                        <ul class="list-inline message-img mt-3  mb-0">
                                            
                                            <?php if(!is_null($csum->file1)){?>
                                            <li class="list-inline-item message-img-list">
                                                <a class="d-inline-block m-1" href="<?=base_url()?>/webdata/uploads/comment/<?=$csum->file1?>" target="_blank">
                                                    <img src="<?=base_url()?>/webdata/uploads/comment/<?=$csum->file1?>" alt="" class="rounded img-thumbnail">
                                                </a>
                                            </li>
                                            <?php } ?>

                                            <?php if(!is_null($csum->file2)){?>
                                            <li class="list-inline-item message-img-list">
                                                <a class="d-inline-block m-1" href="<?=base_url()?>/webdata/uploads/comment/<?=$csum->file2?>" target="_blank">
                                                    <img src="<?=base_url()?>/webdata/uploads/comment/<?=$csum->file2?>" alt="" class="rounded img-thumbnail">
                                                </a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                        <?php }?>

                                    </div>
                                </div>
                            </div>

                        </li>
                        <?php }}}?>

                    </ul>
                </div>
            </div>
        </div>
        <!-- end user chat -->
    </div>
    <!-- End d-lg-flex  -->