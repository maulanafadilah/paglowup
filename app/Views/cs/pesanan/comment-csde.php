    <div class="d-lg-flex" id="chat">
        <div class="chat-leftsidebar card">
            <div class="p-3 px-4 border-bottom">
                <div class="d-flex align-items-start ">
                    <div class="flex-shrink-0 me-3 align-self-center">
                        <img src="<?=base_url()?>/webdata/uploads/images/cs/<?=$l_detail->cs_pic?>" class="avatar-sm rounded-circle" alt="">
                    </div>

                    <div class="flex-grow-1">
                        <h5 class="font-size-16 mb-1"><a href="#" class="text-dark"><?=$detail_user->name?><i class="mdi mdi-circle text-success align-middle font-size-10 ms-1"></i></a></h5>
                        <p class="text-muted mb-0">Available</p>
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
                                                    <img src="<?=base_url()?>/webdata/uploads/images/designer/<?=$l_detail->designer_pic?>" class="rounded-circle avatar-sm" alt="">
                                                    <span class="user-status"></span>
                                                </div>

                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-size-14 mb-1"><?=$l_detail->designer_name?></h5>
                                                    <p class="text-truncate mb-0">Designer</p>
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
                                    <img src="<?=base_url()?>/webdata/uploads/images/designer/<?=$l_detail->designer_pic?>" alt="" class="img-fluid d-block rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="font-size-14 mb-1 text-truncate"><a href="#" class="text-dark"><?=$l_detail->designer_name?></a></h5>
                                    <p class="text-muted mb-0">Komentar Designer</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-5">
                            <ul class="list-inline user-chat-nav text-end mb-0">
                                <li class="list-inline-item">
                                    <div class="dropdown">
                                        <?php if($l_detail->idstatus == 5){?>
                                        <div class="btn-group">
                                            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#reqStatusRevisi">
                                                Tolak Review
                                            </button>
                                        </div>
                                        <?php }?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="chat-conversation p-3 px-2" data-simplebar>
                    <ul class="list-unstyled mb-0">
                        <li class="chat-day-title">
                            <span class="title">Awal dari komentar</span>
                        </li>

                        <?php foreach($l_comments_csde as $csde){
                            if (!is_null($csde->idcomment)){
                                if (!is_null($csde->idcs)){
                        ?>
                        <li class="right">
                            <div class="conversation-list">
                                <div class="ctext-wrap">
                                    <div class="ctext-wrap-content">
                                        <h5 class="conversation-name"><span class="user-name"><?=$csde->cs_name?></span> <span class="time"><?=$csde->commenttime?></span></h5>
                                        <p class="mb-0"><?=$csde->comment?></p>
                                        
                                        <?php if (!is_null($csde->file1) || !is_null($csde->file2)){?>
                                        <ul class="list-inline message-img mt-3  mb-0">
                                            
                                            <?php if(!is_null($csde->file1)){?>
                                            <li class="list-inline-item message-img-list">
                                                <a class="d-inline-block m-1" href="<?=base_url()?>/webdata/uploads/comment/<?=$csde->file1?>" target="_blank">
                                                    <img src="<?=base_url()?>/webdata/uploads/comment/<?=$csde->file1?>" alt="" class="rounded img-thumbnail">
                                                </a>
                                            </li>
                                            <?php } ?>

                                            <?php if(!is_null($csde->file2)){?>
                                            <li class="list-inline-item message-img-list">
                                                <a class="d-inline-block m-1" href="<?=base_url()?>/webdata/uploads/comment/<?=$csde->file2?>" target="_blank">
                                                    <img src="<?=base_url()?>/webdata/uploads/comment/<?=$csde->file2?>" alt="" class="rounded img-thumbnail">
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
                                        <h5 class="conversation-name"><span class="user-name"><?=$csde->designer_name?></span> <span class="time"><?=$csde->commenttime?></span></h5>
                                        <p class="mb-0"><?=$csde->comment?></p>
                                        
                                        <?php if (!is_null($csde->file1) || !is_null($csde->file2)){?>
                                        <ul class="list-inline message-img mt-3  mb-0">
                                            
                                            <?php if(!is_null($csde->file1)){?>
                                            <li class="list-inline-item message-img-list">
                                                <a class="d-inline-block m-1" href="<?=base_url()?>/webdata/uploads/comment/<?=$csde->file1?>" target="_blank">
                                                    <img src="<?=base_url()?>/webdata/uploads/comment/<?=$csde->file1?>" alt="" class="rounded img-thumbnail">
                                                </a>
                                            </li>
                                            <?php } ?>

                                            <?php if(!is_null($csde->file2)){?>
                                            <li class="list-inline-item message-img-list">
                                                <a class="d-inline-block m-1" href="<?=base_url()?>/webdata/uploads/comment/<?=$csde->file2?>" target="_blank">
                                                    <img src="<?=base_url()?>/webdata/uploads/comment/<?=$csde->file2?>" alt="" class="rounded img-thumbnail">
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

                <div class="p-3 border-top">
                    <form id="sendCommentCSDE" method="post" action="<?=base_url()?>/cs/pesanan/send_comment_csde/<?=$l_detail->idorder?>">
                        <div class="row">
                            <div class="col">
                                <div class="position-relative">
                                    <input type="text" autocomplete="off" name="comment" class="form-control border bg-soft-light" placeholder="Enter Message..." required>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-secondary w-md waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#sendAttachment">
                                    <span class="d-none d-sm-inline-block me-2">Attachment</span><i class="mdi mdi-paperclip float-end"></i>
                                </a>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2">Send</span> <i class="mdi mdi-send float-end"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end user chat -->
    </div>
    <!-- End d-lg-flex  -->