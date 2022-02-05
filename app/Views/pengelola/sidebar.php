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
                    <a href="<?=base_url()?>/pengelola/discount/list">
                        <i data-feather="file-text"></i>
                        <span data-key="t-pages">Kelola Kode Diskon</span>
                    </a>
                </li>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->