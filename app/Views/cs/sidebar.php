<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu"><?= lang('Files.Menu') ?></li>

                <li>
                    <a href="<?=base_url()?>/cs/designer/list">
                        <i data-feather="pen-tool"></i>
                        <span data-key="t-pages">Designer</span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>/cs/pesanan/list">
                        <i data-feather="pen-tool"></i>
                        <span data-key="t-pages">Pesanan</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-authentication">Transaksi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?=base_url()?>/cs/pesanan/list" data-key="t-user-grid">
                                <span data-key="t-authentication">List Pemesanan</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>/cs/pesanan2/list" data-key="t-user-grid">
                                <span data-key="t-authentication">List Pesanan Batal</span>
                            </a>
                        </li>
                    </ul>
                </li>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->