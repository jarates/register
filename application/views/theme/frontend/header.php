<!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main navbar m-b-0 b-0">
                <div class="container-fluid">

                    <?php
                    $info = $this->other->get_info_school();
                    $period = $this->other->get_data_period_true();

                    $period_online = $this->period->get_period_Active();
                    $period_online = $period_online->result();
                    ?>

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="<?=site_url('home')?>" class="logo logo-name">
                            <i class="fa fa-home"></i> <?=$info['school_name']?>
                        </a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-right list-inline">
                            <li class="d-none d-sm-block list-inline-item">
                                
                            </li>
                            

                            <li class="dropdown user-box list-inline-item">

                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa fa-user-o"></i> ระบบสมัครเรียนออนไลน์
                                </a>

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
                                <a href="<?=site_url('news')?>"><i class="fa fa-bullhorn"></i> <span> ข่าวประชาสัมพันธ์ </span> </a>
                            </li>

                            <?php if($period_online[0]->period_status == 1){ ?>

                            <li class="has-submenu">
                                <a href="<?=site_url('register')?>"><i class="fi-paper"></i> <span> สมัครเรียน <?=($period_online[0]->period_year+543)?> </span> </a>
                            </li>

                            <?php } ?>

                            <li class="has-submenu">
                                <a href="<?=site_url('print_register')?>"><i class="fi-printer"></i> <span> ตรวจสอบ / พิมพ์ใบสมัคร </span> </a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?=site_url('print_payment')?>"><i class="fi-printer"></i> <span> พิมพ์ใบชำระเงิน </span> </a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?=site_url('result_register')?>"><i class="fa fa-bullhorn"></i> <span> แจ้งผลการสมัคร / พิมพ์บัตรยืนยัน นศ. </span> </a>
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