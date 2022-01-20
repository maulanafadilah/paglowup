<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu-designer') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <?= $page_title ?>
                <!-- end page title -->

                <div class="table-responsive mb-4">
                    <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 50px;">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tags</th>
                                <th style="width: 80px; min-width: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                        <label class="form-check-label" for="contacusercheck1"></label>
                                    </div>
                                </th>
                                <td>
                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-sm rounded-circle me-2">
                                    <a href="designer-testimonial-details" class="text-body">Phyllis Gatlin</a>
                                </td>
                                <td>UI/UX Designer</td>
                                <td>phyllisgatlin@minia.com</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="badge badge-soft-primary">Photoshop</a>
                                        <a href="#" class="badge badge-soft-primary">illustrator</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="contacusercheck2">
                                        <label class="form-check-label" for="contacusercheck2"></label>
                                    </div>
                                </th>
                                <td>
                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-sm rounded-circle me-2">
                                    <a href="designer-testimonial-details" class="text-body">James Nix</a>
                                </td>
                                <td>Frontend Developer</td>
                                <td>jamesnix@minia.com</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="badge badge-soft-primary font-size-11">Html</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">Css</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">2 + more</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="contacusercheck3">
                                        <label class="form-check-label" for="contacusercheck3"></label>
                                    </div>
                                </th>
                                <td>
                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-sm rounded-circle me-2">
                                    <a href="designer-testimonial-details" class="text-body">Darlene Smith</a>
                                </td>
                                <td>Backend Developer</td>
                                <td>darlenesmith@minia.com</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="badge badge-soft-primary font-size-11">Php</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">Java</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">Python</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="contacusercheck4">
                                        <label class="form-check-label" for="contacusercheck4"></label>
                                    </div>
                                </th>
                                <td>
                                    <div class="avatar-sm d-inline-block align-middle me-2">
                                        <div class="avatar-title bg-soft-light text-light font-size-24 m-0 rounded-circle">
                                            <i class="bx bxs-user-circle"></i>
                                        </div>
                                    </div>
                                    <a href="#" class="text-body">William Swift</a>
                                </td>
                                <td>Full Stack Developer</td>
                                <td>williamswift@minia.com</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="badge badge-soft-primary font-size-11">Ruby</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">Php</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">2 + more</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="contacusercheck5">
                                        <label class="form-check-label" for="contacusercheck5"></label>
                                    </div>
                                </th>
                                <td>
                                    <div class="avatar-sm d-inline-block align-middle me-2">
                                        <div class="avatar-title bg-soft-light text-light font-size-24 m-0 rounded-circle">
                                            <i class="bx bxs-user-circle"></i>
                                        </div>
                                    </div>
                                    <a href="#" class="text-body">Kevin West</a>
                                </td>
                                <td>Frontend Developer</td>
                                <td>kevinwest@minia.com</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="badge badge-soft-primary font-size-11">Html</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">Css</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">2 + more</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="contacusercheck6">
                                        <label class="form-check-label" for="contacusercheck6"></label>
                                    </div>
                                </th>
                                <td>
                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-sm rounded-circle me-2">
                                    <a href="designer-testimonial-details" class="text-body">Tommy Hayes</a>
                                </td>
                                <td>UI/UX Designer</td>
                                <td>tommyhayes@minia.com</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="badge badge-soft-primary font-size-11">Photoshop</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">illustrator</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="contacusercheck7">
                                        <label class="form-check-label" for="contacusercheck7"></label>
                                    </div>
                                </th>
                                <td>
                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-sm rounded-circle me-2">
                                    <a href="designer-testimonial-details" class="text-body">Diana Owens</a>
                                </td>
                                <td>Graphic Designer</td>
                                <td>dianaowens@minia.com</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="badge badge-soft-primary font-size-11">Photoshop</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">illustrator</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="contacusercheck8">
                                        <label class="form-check-label" for="contacusercheck8"></label>
                                    </div>
                                </th>
                                <td>
                                    <img src="assets/images/users/avatar-9.jpg" alt="" class="avatar-sm rounded-circle me-2">
                                    <a href="designer-testimonial-details" class="text-body">Paul Sanchez</a>
                                </td>
                                <td>Angular Developer</td>
                                <td>paulsanchez@minia.com</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="badge badge-soft-primary font-size-11">Php</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">Javascript</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="contacusercheck9">
                                        <label class="form-check-label" for="contacusercheck9"></label>
                                    </div>
                                </th>
                                <td>
                                    <img src="assets/images/users/avatar-9.jpg" alt="" class="avatar-sm rounded-circle me-2">
                                    <a href="designer-testimonial-details" class="text-body">Peter Dryer</a>
                                </td>
                                <td>Web Designer</td>
                                <td>peterdryer@minia.com</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="badge badge-soft-primary font-size-11">Html</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">Css</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">2 + more</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="contacusercheck10">
                                        <label class="form-check-label" for="contacusercheck10"></label>
                                    </div>
                                </th>
                                <td>
                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-sm rounded-circle me-2">
                                    <a href="designer-testimonial-details" class="text-body">Gerald Moyer</a>
                                </td>
                                <td>Backend Developer</td>
                                <td>geraldmoyer@minia.com</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="badge badge-soft-primary font-size-11">Php</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">Javascript</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="contacusercheck11">
                                        <label class="form-check-label" for="contacusercheck11"></label>
                                    </div>
                                </th>
                                <td>
                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-sm rounded-circle me-2">
                                    <a href="designer-testimonial-details" class="text-body">Gail McGuire</a>
                                </td>
                                <td>Backend Developer</td>
                                <td>gailmcGuire@minia.com</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="badge badge-soft-primary font-size-11">Php</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">Javascript</a>
                                        <a href="#" class="badge badge-soft-primary font-size-11">2+ more</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
                <!-- end table responsive -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- init js -->
<script src="assets/js/pages/datatable-pages.init.js"></script>

<script src="assets/js/app.js"></script>

</body>

</html>