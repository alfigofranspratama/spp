        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <div class="main-profile">
                    <div class="image-bx">
                        <img src="<?= base_url('assets/') ?>images/Untitled-1.jpg" alt="">
                        <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    </div>
                    <h5 class="name"><span class="font-w400">Hello,</span> Marquez</h5>
                    <p class="email">marquezzzz@mail.com</p>
                </div>
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
            <!-- <div class="form-head" style="background-image:url('images/background/bg3.jpg');background-position: bottom; ">
				<div class="container max d-flex align-items-center mt-0">
					<h2 class="font-w600 title text-white mb-2 mr-auto ">Dashboard</h2>
					<div class="weather-btn mb-2">
						<span class="mr-3 font-w600 text-black"><i class="fa fa-cloud mr-2"></i>21</span>
						<select class="form-control style-1 default-select  mr-3 ">
							<option>Medan, IDN</option>
							<option>Jakarta, IDN</option>
							<option>Surabaya, IDN</option>
						</select>
					</div>
					<a href="javascript:void(0);" class="btn white-transparent mb-2"><i class="las la-calendar scale5 mr-3"></i>Filter Periode</a>
				</div>
			</div> -->
            <div class="container-fluid">
                <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
                    <h2 class="font-w600 title mb-2 mr-auto ">Dashboard</h2>
                    <div class="weather-btn mb-2">
                        <span class="mr-3 font-w600 text-black"><i class="fa fa-cloud mr-2"></i>21</span>
                        <select class="form-control style-1 default-select  mr-3 ">
                            <option>Medan, IDN</option>
                            <option>Jakarta, IDN</option>
                            <option>Surabaya, IDN</option>
                        </select>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-secondary mb-2"><i class="las la-calendar scale5 mr-3"></i>Filter Periode</a>
                </div>