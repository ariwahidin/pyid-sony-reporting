<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="<?= $this->uri->segment(1) == 'dashboard' ? 'sm' : 'lg' ?>" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Yusen Logistics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- jsvectormap css -->
    <link href="<?= base_url('jar/html/default/') ?>assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('jar/html/default/') ?>assets/images/yusen-kotak.jpg">

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


    <!-- Sweet Alert css-->
    <link href="<?= base_url('jar/html/default/') ?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="<?= base_url() ?>myassets/js/jquery-3.7.0.js"></script>
    <script src="<?= base_url() ?>myassets/js/moment.js"></script>
    <script src="<?= base_url() ?>myassets/js/moment-time-zone.js"></script>



</head>

<style>

</style>

<style>
    body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    #containerFrame {
        width: 100%;
        height: 100%;
    }

    iframe {
        width: 100%;
        margin-left: 0px !important;
        min-height: 651.297px;
    }

    /* CSS untuk latar belakang hitam transparan */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        /* Warna hitam dengan opasitas 0.7 */
        z-index: 9999;
        /* Menempatkan latar belakang di atas konten */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Kode CSS untuk animasi spinner yang Anda sebutkan sebelumnya */
    .lds-roller {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }

    .lds-roller div {
        animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        transform-origin: 40px 40px;
    }

    .lds-roller div:after {
        content: " ";
        display: block;
        position: absolute;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #fff;
        margin: -4px 0 0 -4px;
    }

    .lds-roller div:nth-child(1) {
        animation-delay: -0.036s;
    }

    .lds-roller div:nth-child(1):after {
        top: 63px;
        left: 63px;
    }

    .lds-roller div:nth-child(2) {
        animation-delay: -0.072s;
    }

    .lds-roller div:nth-child(2):after {
        top: 68px;
        left: 56px;
    }

    .lds-roller div:nth-child(3) {
        animation-delay: -0.108s;
    }

    .lds-roller div:nth-child(3):after {
        top: 71px;
        left: 48px;
    }

    .lds-roller div:nth-child(4) {
        animation-delay: -0.144s;
    }

    .lds-roller div:nth-child(4):after {
        top: 72px;
        left: 40px;
    }

    .lds-roller div:nth-child(5) {
        animation-delay: -0.18s;
    }

    .lds-roller div:nth-child(5):after {
        top: 71px;
        left: 32px;
    }

    .lds-roller div:nth-child(6) {
        animation-delay: -0.216s;
    }

    .lds-roller div:nth-child(6):after {
        top: 68px;
        left: 24px;
    }

    .lds-roller div:nth-child(7) {
        animation-delay: -0.252s;
    }

    .lds-roller div:nth-child(7):after {
        top: 63px;
        left: 17px;
    }

    .lds-roller div:nth-child(8) {
        animation-delay: -0.288s;
    }

    .lds-roller div:nth-child(8):after {
        top: 56px;
        left: 12px;
    }

    /* Sisipkan sisa kode CSS untuk animasi spinner di sini */

    @keyframes lds-roller {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>



<div class="pLoading" style="display: none;">
    <div class="overlay">
        <div class="lds-roller">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<script>
    function formatTime(timeString) {
        var timeComponents = timeString.split(':');

        if (timeComponents.length !== 3) {
            return 'Invalid time format';
        }

        var hours = parseInt(timeComponents[0]);
        var minutes = parseInt(timeComponents[1]);
        var seconds = parseInt(timeComponents[2]);

        if (isNaN(hours) || isNaN(minutes) || isNaN(seconds)) {
            return 'Invalid time format';
        }

        hours = (hours < 10) ? '0' + hours : hours;
        minutes = (minutes < 10) ? '0' + minutes : minutes;
        seconds = (seconds < 10) ? '0' + seconds : seconds;

        var formattedTime = hours + ':' + minutes + ':' + seconds;

        return formattedTime;
    }

    function stopLoading() {
        var divLoading = document.querySelector(".pLoading");
        divLoading.style.display = "none";
    }

    function startLoading() {
        var divLoading = document.querySelector(".pLoading");
        divLoading.style.display = "block";
    }
    startLoading();
</script>


<body>
    <!-- Sweet Alerts js -->
    <script src="<?= base_url('jar/html/default/') ?>assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="<?= base_url('jar/html/default/') ?>assets/js/pages/sweetalerts.init.js"></script>



    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= base_url('jar/html/default/') ?>assets/images/yusen-logo.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('jar/html/default/') ?>assets/images/yusen-logo.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= base_url('jar/html/default/') ?>assets/images/yusen-logo.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('jar/html/default/') ?>assets/images/yusen-logo.png" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <!-- <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button> -->

                        <div class="d-block p-2" id="tabOpenBadge">
                            <!-- <button class="badge badge-label bg-secondary"> <i class="mdi mdi-circle-medium"></i> <span class="">Test</span> &nbsp; <span class="badge bg-danger"><strong>X</strong></span></button> -->
                        </div>
                    </div>



                    <div class="d-flex align-items-center">

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <!-- <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div> -->

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="<?= base_url('jar/html/default/') ?>assets/images/users/user-dummy-img.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-block d-xl-inline-block ms-1 fw-medium user-name-text"><?= $this->session->userdata('piaggio_auth')['username'] ?></span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <h6 class="dropdown-header">Welcome <?= $this->session->userdata('piaggio_auth')['username'] ?></h6>
                                <a id="logoutLink" class="dropdown-item" href="#"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </header>

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="#" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url('jar/html/default/') ?>assets/images/pandurasa_kharisma_pt.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('jar/html/default/') ?>assets/images/yusen-logo.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <img style="border-radius: 10%;" src="<?= base_url('jar/html/default/') ?>assets/images/yusen-kotak.jpg" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img style="border-radius: 10%; margin-top: -5px;" src="<?= base_url('jar/html/default/') ?>assets/images/yusen-kotak.jpg" alt="" height="40">
                        &nbsp;<span style="color: white; font-size: 16px;"><strong>Demo</strong></span>
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
                            <a class="nav-link menu-link" href="<?= base_url('dashboard/index') ?>">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboard">Dashboards</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url('#') ?>">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboard">Waranty</span>
                            </a>
                            <div class="collapse menu-dropdown show" id="">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>" class="nav-link menuNav" data-id="pwg001" data-url="<?= base_url('waranty') ?>" data-tab-name="Regular Waranty">Regular</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <?php
                        foreach (parentMenu()->result() as $parent) {
                        ?>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#<?= $parent->name; ?>" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="<?= $parent->name ?>">
                                    <i class="ri-pages-line"></i> <span data-key="t-pages"><?= $parent->name; ?></span>
                                </a>
                                <div class="collapse menu-dropdown show" id="<?= $parent->name ?>">
                                    <ul class="nav nav-sm flex-column">
                                        <?php
                                        foreach (child_menu($parent->id)->result() as $child) {
                                        ?>
                                            <li class="nav-item">
                                                <a href="<?= base_url() ?>" class="nav-link menuNav" data-id="<?= $child->id ?>" data-url="<?= base_url($child->url) ?>" data-tab-name="<?= $child->menu_name ?>" data-key="t-starter"> <?= $child->menu_name ?> </a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </li>

                        <?php
                        }
                        ?>
                    </ul>
                </div>
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

            <div class="">
                <div style="padding:inherit; padding-top: 65px;" class="container-fluid" id="containerFrame">