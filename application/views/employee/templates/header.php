<?php
$users = $this->session->userdata('users');
$users = $this->Data_model->getwhere('id_users', $users['id_users'], 'tb_users');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:title" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:description" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <title>SPP SMK Negeri 4 Payakumbuh </title>
    <!-- Datatable -->
    <link href="<?= base_url('assets/') ?>vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/') ?>images/icon.png">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/chartist/css/chartist.min.css">
    <link href="<?= base_url('assets/') ?>vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/custom.css" rel="stylesheet">

</head>

<body <?= $this->session->flashdata('message'); ?>>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="<?= base_url('employee/dashboard') ?>" class="brand-logo p-2">
                <img src="<?= base_url('assets/images/icon-navbar.png') ?>" height="100%" class="" alt="">
                <h4 class="judul biru ml-2 mt-1">SMKn 4 <br> Payakumbuh</h4>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <!-- search  -->
                        <div class="header-left">
                            <div class="input-group search-area right d-lg-inline-flex d-none">
                                <input type="text" class="form-control" placeholder="Find something here...">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <a href="javascript:void(0)">
                                            <i class="flaticon-381-search-2"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- notification -->
                        <ul class="navbar-nav header-right main-notification">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode" href="#">
                                    <i id="icon-light" class="fa fa-sun-o"></i>
                                    <i id="icon-dark" class="fa fa-moon-o"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-fullscreen" href="#">
                                    <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                        <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path>
                                    </svg>
                                    <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize">
                                        <path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path>
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="<?= base_url('assets/') ?>images/icon-navbar.png" width="20" alt="" />
                                    <div class="header-info">
                                        <span><?= $users['name'] ?></span>
                                        <small><?= $users['level'] ?></small>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button type="button" class="dropdown-item ai-icon" data-toggle="modal" data-target="#changepassword">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Change Password</span>
                                    </button>
                                    <a href="<?= base_url('auth/logout') ?>" class="dropdown-item ai-icon logout">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="sub-header">
                    <div class="d-flex align-items-center flex-wrap mr-auto">
                        <h5 class="dashboard_bar"><?= $title ?></h5>
                    </div>
                    <div class="d-flex align-items-center">
                        <?php
                        if ($this->uri->segment('2') == 'student' && $this->uri->segment('3') == NULL) echo '<a href=" ' . base_url('employee/student/add') . '" class="mr-1">+ Add New Student</a>';
                        if ($this->uri->segment('2') == 'student' && $this->uri->segment('3') != NULL) echo '<a href=" ' . base_url('employee/student') . '" class="mr-1"><- Back to Student data</a>';
                        if ($this->uri->segment('2') == 'employee' && $this->uri->segment('3') == NULL) echo '<a href=" ' . base_url('employee/employee/add') . '" class="mr-1">+ Add New Employee</a>';
                        if ($this->uri->segment('2') == 'employee' && $this->uri->segment('3') != NULL) echo '<a href=" ' . base_url('employee/employee') . '" class="mr-1"><- Back to Employee data</a>';
                        if ($this->uri->segment('2') == 'grade' && $this->uri->segment('3') == NULL) echo '<a href=" ' . base_url('employee/grade/add') . '" class="mr-1">+ Add New Grade</a>';
                        if ($this->uri->segment('2') == 'grade' && $this->uri->segment('3') != NULL) echo '<a href=" ' . base_url('employee/grade') . '" class="mr-1"><- Back to Grade data</a>';
                        if ($this->uri->segment('2') == 'spp' && $this->uri->segment('3') == NULL) echo '<a href=" ' . base_url('employee/spp/add') . '" class="mr-1">+ Add New SPP</a>';
                        if ($this->uri->segment('2') == 'spp' && $this->uri->segment('3') != NULL) echo '<a href=" ' . base_url('employee/spp') . '" class="mr-1"><- Back to SPP data</a>';
                        if ($this->uri->segment('2') == 'transaction' && $this->uri->segment('3') != NULL) echo '<a href=" ' . base_url('employee/transaction') . '" class="mr-1"><- Back to Transaction data</a>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
        <div class="modal fade" id="changepassword">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('auth/changepassword') ?>" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="">Current Password</label>
                                <input type="password" name="current_password" id="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">New Password</label>
                                <input type="password" name="new_password" id="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirm_password" id="" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>