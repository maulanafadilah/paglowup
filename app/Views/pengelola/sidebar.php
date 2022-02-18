<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu"><?= lang('Files.Menu') ?></li>

                <li>
                    <a href="<?=base_url()?>/pengelola/dashboard">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard"><?= lang('Files.Dashboard') ?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication"><?= lang('Files.User') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?=base_url()?>/pengelola/pengelola/list" data-key="t-user-grid">
                                <span data-key="t-authentication"><?= lang('Files.Pengelola') ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>/pengelola/cs/list" data-key="t-user-grid">
                                <span data-key="t-authentication"><?= lang('Files.Customerservice') ?></span>
                            </a>
                        </li>
        
                        <li>
                            <a href="<?=base_url()?>/pengelola/designer/list" data-key="t-user-grid">
                                <span data-key="t-authentication"><?= lang('Files.Designer') ?></span>
                            </a>
                        </li>  
                        <li>
                            <a href="<?=base_url()?>/pengelola/umkm/list" data-key="t-user-grid">
                                <span data-key="t-authentication"><?= lang('Files.Umkm') ?></span>
                            </a>
                        </li>   
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="dollar-sign"></i>
                        <span data-key="t-authentication">Report</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?=base_url()?>/pengelola/report" data-key="t-user-grid">
                                <span data-key="t-authentication">Summary</span>
                            </a>
                        </li>
                            <a href="<?=base_url()?>/pengelola/withdraw" data-key="t-user-grid">
                                <span data-key="t-authentication">Histori Withdraw</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>/pengelola/withdraw/requested" data-key="t-user-grid">
                                <span data-key="t-authentication">Permohonan Withdraw</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?=base_url()?>/pengelola/transaksi/list">
                        <i data-feather="file-text"></i>
                        <span data-key="t-pages">Transaksi</span>
                    </a>
                </li>

                <li>
                    <a href="<?=base_url()?>/pengelola/discount/list">
                        <i data-feather="percent"></i>
                        <span data-key="t-pages">Kelola Kode Diskon</span>
                    </a>
                </li>
                
                <li class="menu-title mt-2" data-key="t-menu"><?= lang('Files.Layout') ?></li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="layout"></i>
                        <span data-key="t-authentication"><?= lang('Files.Frontpage') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?=base_url()?>/pengelola/frontpage/home" data-key="t-user-grid">
                                <span data-key="t-authentication"><?= lang('Files.Home') ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>/pengelola/frontpage/contact" data-key="t-user-grid">
                                <span data-key="t-authentication"><?= lang('Files.Contact') ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->