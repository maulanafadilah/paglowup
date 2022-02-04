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
                    <a href="designer-testimonials">
                        <i data-feather="star"></i>
                        <span data-key="t-pages"><?= lang('Files.Testimoni') ?></span>
                    </a>
                </li>
                <li>
                    <a href="designer-withdrawal">
                        <i data-feather="dollar-sign"></i>
                        <span data-key="t-pages"><?= lang('Files.Withdrawal') ?></span>
                    </a>
                </li>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->