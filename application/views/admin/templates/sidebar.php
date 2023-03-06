        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li>
                        <a class="ai-icon" href="<?= base_url('admin/dashboard') ?>">
                            <i class="flaticon-144-layout"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-028-user-1"></i>
                            <span class="nav-text">Master Users</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('admin/employee') ?>">Employee</a></li>
                            <li><a href="<?= base_url('admin/student') ?>">Student</a></li>
                            <li><a href="<?= base_url('admin/studentaccount') ?>">Student Account</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="ai-icon" href="<?= base_url('admin/grade') ?>">
                            <i class="flaticon-149-diagram"></i>
                            <span class="nav-text">Grade</span>
                        </a>
                    </li>
                    <li>
                        <a class="ai-icon" href="<?= base_url('admin/spp') ?>">
                            <i class="flaticon-092-money"></i>
                            <span class="nav-text">SPP</span>
                        </a>
                    </li>
                    <li>
                        <a class="ai-icon" href="<?= base_url('admin/transaction') ?>">
                            <i class="flaticon-008-credit-card"></i>
                            <span class="nav-text">Transaction</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a class="ai-icon" href="<?= base_url('admin/report') ?>">
                            <i class="flaticon-098-megaphone"></i>
                            <span class="nav-text">Report</span>
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">