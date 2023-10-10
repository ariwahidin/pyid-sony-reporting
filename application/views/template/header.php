<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Projects | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('jar/html/default/') ?>assets/images/favicon.ico">

    <!-- gridjs css -->
    <link rel="stylesheet" href="<?= base_url('jar/html/default/') ?>assets/libs/gridjs/theme/mermaid.min.css">
    <!-- Layout config Js -->
    <script src="<?= base_url('jar/html/default/') ?>assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url('jar/html/default/') ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('jar/html/default/') ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('jar/html/default/') ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= base_url('jar/html/default/') ?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= base_url('jar/html/default/') ?>assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('jar/html/default/') ?>assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= base_url('jar/html/default/') ?>assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('jar/html/default/') ?>assets/images/logo-light.png" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- App Search-->

                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="<?= base_url('jar/html/default/') ?>assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Anna Adame</span>
                                        <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">Founder</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome Anna!</h6>
                                <a id="logoutLink" class="dropdown-item" href="#"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url('jar/html/default/') ?>assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('jar/html/default/') ?>assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url('jar/html/default/') ?>assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('jar/html/default/') ?>assets/images/logo-light.png" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link menu-link <?= $this->uri->segment(1) == 'master' ? 'active' : '' ?>" href="#sidebarMaster" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Master</span>
                            </a>
                            <div class="collapse menu-dropdown <?= $this->uri->segment(1) == 'master' ? 'collapse show' : '' ?> " id="sidebarMaster">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('master/subdist') ?>" class="nav-link <?= $this->uri->segment(2) == 'subdist' ? 'active' : '' ?>"> Sub Distributor </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('master/top') ?>" class="nav-link <?= $this->uri->segment(2) == 'top' ? 'active' : '' ?>"> TOP </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('master/customer') ?>" class="nav-link <?= $this->uri->segment(2) == 'customer' ? 'active' : '' ?>"> Customer </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('master/item') ?>" class="nav-link <?= $this->uri->segment(2) == 'item' ? 'active' : '' ?>">Item SKU</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                                <i class="ri-layout-3-line"></i> <span>Sales Order</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                                <i class="ri-layout-3-line"></i> <span>Delivery Order</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                                <i class="ri-layout-3-line"></i> <span>Goods Receipt</span>
                            </a>
                        </li>
                        <!-- end Dashboard Menu -->
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">