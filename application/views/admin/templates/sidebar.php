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
                        </ul>
                    </li>
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