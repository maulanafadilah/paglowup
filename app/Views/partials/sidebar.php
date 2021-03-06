<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu"><?= lang('Files.Menu') ?></li>

                <li>
                    <a href="pengelola">
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
                            <a href="pengelola-user-pengelola" data-key="t-user-grid">
                                <span data-key="t-authentication"><?= lang('Files.Pengelola') ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="pengelola-user-customerservice" data-key="t-user-grid">
                                <span data-key="t-authentication"><?= lang('Files.Customerservice') ?></span>
                            </a>
                        </li>
        
                        <li>
                            <a href="pengelola-user-designer" data-key="t-user-grid">
                                <span data-key="t-authentication"><?= lang('Files.Designer') ?></span>
                            </a>
                        </li>  
                        <li>
                            <a href="pengelola-user-umkm" data-key="t-user-grid">
                                <span data-key="t-authentication"><?= lang('Files.Umkm') ?></span>
                            </a>
                        </li>   
                    </ul>
                </li>

                <li>
                    <a href="pengelola-transaction">
                        <i data-feather="file-text"></i>
                        <span data-key="t-pages"><?= lang('Files.Transaction') ?></span>
                    </a>
                </li>

                <li>
                    <a href="pengelola-portofolio-designer">
                        <i data-feather="image"></i>
                        <span data-key="t-pages"><?= lang('Files.Portofolio_designer') ?></span>
                    </a>
                </li>

                <li>
                    <a href="pengelola-withdrawal">
                        <i data-feather="dollar-sign"></i>
                        <span data-key="t-pages"><?= lang('Files.Withdrawal') ?></span>
                    </a>
                </li>


                <li class="menu-title mt-2" data-key="t-menu"><?= lang('Files.Layout') ?></li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="layout"></i>
                        <span data-key="t-frontpage"><?= lang('Files.Frontpage') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="home" data-key="t-user-grid">
                                <span data-key="t-home"><?= lang('Files.Home') ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="about" data-key="t-user-grid">
                                <span data-key="t-about"><?= lang('Files.About') ?></span>
                            </a>
                        </li>
        
                        <li>
                            <a href="pengelola-frontpage-contact" data-key="t-user-grid">
                                <span data-key="t-contact"><?= lang('Files.Contact') ?></span>
                            </a>
                        </li>   
                    </ul>
                </li>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->