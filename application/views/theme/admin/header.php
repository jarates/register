<!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main navbar m-b-0 b-0">
                <div class="container-fluid">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="javascript:" class="logo logo-name">
                            System Management
                        </a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-right list-inline">
                            <li class="d-none d-sm-block list-inline-item">
                                <form role="search" class="app-search">
                                    
                                </form>
                            </li>

                            <li class="dropdown user-box list-inline-item">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?=base_url()?>/template/assets/images/users/avatar-1.jpg" alt="user-img" class="rounded-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <!--
                                    <li><a href="javascript:void(0)" class="dropdown-item">ข้อมูลส่วนตัว</a></li>
                                    <li><a href="javascript:void(0)" class="dropdown-item">เปลี่ยนรหัสผ่าน</a></li>
                                    <li class="dropdown-divider"></li>
                                -->
                                    <li><a href="<?=site_url('login/check_logout')?>" class="dropdown-item">ออกจากระบบ</a></li>
                                </ul>
                            </li>

                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>

                </div>
            </div>

            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="<?=site_url('admin/news')?>"><i class="fi-air-play"></i> <span> จัดการข่าวประชาสัมพันธ์ </span> </a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?=site_url('admin/check_register')?>"><i class="fi-air-play"></i> <span> ตรวจสอบรายชื่อสมัครเรียน </span> </a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?=site_url('admin/check_payment')?>"><i class="fi-air-play"></i> <span> ยืนยันการชำระเงิน </span> </a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?=site_url('admin/check_confirm')?>"><i class="fi-air-play"></i> <span> ยืนยันสิทธิ์การสมัครเรียน </span> </a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="fi-cog"></i> <span> ตั้งค่าระบบ </span> </a>
                                <ul class="submenu">
                                    <li><a href="<?=site_url('admin/setting_info_website')?>">
                                        ตั้งค่าทั่วไปเว็บไซต์
                                    </a></li>
                                    <li><a href="<?=site_url('admin/setting_form_register')?>">
                                        ตั้งค่าฟอร์มลงทะเบียนเรียน
                                    </a></li>
                                </ul>
                            </li>

                        </ul>
                        <!-- End navigation menu  -->
                    </div>
                </div>
            </div>
        </header>
        <!-- End Navigation Bar-->

        <div id="result-modal"></div>
        <div id="loading-msg"></div>