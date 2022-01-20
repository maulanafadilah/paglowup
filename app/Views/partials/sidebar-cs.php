<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu"><?= lang('Files.Menu') ?></li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-authentication"><?= lang('Files.Pemesanan') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="cs" data-key="t-user-grid">
                                <span data-key="t-authentication"><?= lang('Files.ListPemesanan') ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="cs-chat" data-key="t-user-grid">
                                <span data-key="t-authentication"><?= lang('Files.DiskusiTrx') ?></span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="cs-designer-list">
                        <i data-feather="users"></i>
                        <span data-key="t-pages"><?= lang('Files.Designer') ?></span>
                    </a>
                </li>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->