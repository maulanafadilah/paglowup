<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu></li>

                <li>
                    <a href="<?=base_url()?>/designer/portfolio/list">
                        <i data-feather="image"></i>
                        <span data-key="t-pages">Portofolio</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="pen-tool"></i>
                        <span data-key="t-authentication"><?= lang('Files.Pekerjaan') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?=base_url()?>/designer/pesanan/list" data-key="t-user-grid">
                                <span data-key="t-authentication">List Pekerjaan</span>
                            </a>
                        </li>
                        <li>
                            <a href="designer-chat" data-key="t-user-grid">
                                <span data-key="t-authentication"><?= lang('Files.DiskusiCS') ?></span>
                            </a>
                        </li>

                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="dollar-sign"></i>
                        <span data-key="t-authentication">Withdrawal</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?=base_url()?>/designer/withdraw" data-key="t-user-grid">
                                <span data-key="t-authentication">Daftar Withdraw</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>/designer/withdraw/requested" data-key="t-user-grid">
                                <span data-key="t-authentication">Sedang Diproses</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="<?=base_url()?>/designer/reputation">
                        <i data-feather="star"></i>
                        <span data-key="t-pages">Rating & Testimoni</span>
                    </a>
                </li>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->