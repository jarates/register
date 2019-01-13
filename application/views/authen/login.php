<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- App css -->
        <link href="<?=base_url('template/assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('template/assets/css/icons.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('template/assets/css/style.css')?>" rel="stylesheet" type="text/css" />

        <script src="<?=base_url('template/assets/js/modernizr.min.js')?>"></script>

    </head>


    <body class="bg-transparent">

    <!-- HOME -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="m-t-40 account-pages">
                            <div class="text-center account-logo-box">
                                <h2 class="text-uppercase">
                                    <a href="<?=site_url('home')?>" class="text-success">
                                        <span>
                                            <?=$info['school_name']?>
                                        </span>
                                    </a>
                                </h2>
                                <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" method="post" action="<?=site_url('login/check_login')?>">

                                    <div class="form-group m-b-25">
                                        <div class="col-12">
                                            <label for="emailaddress">Username</label>
                                            <input name="user" class="form-control input-lg" type="text" id="emailaddress" required="" placeholder="Username">
                                        </div>
                                    </div>

                                    <div class="form-group m-b-25">
                                        <div class="col-12">
                                            <label for="password">Password</label>
                                            <input name="pass" class="form-control input-lg" type="password" required="" id="password" placeholder="Enter your password">
                                        </div>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <div class="col-12">
                                            <div class="checkbox checkbox-custom">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-12">
                                            <button class="btn w-lg btn-rounded btn-lg btn-primary waves-effect waves-light" type="submit">Login</button>
                                        </div>
                                    </div>

                                </form>

                                <div class="clearfix"></div>

                            </div>
                        </div>
                        <!-- end card-box-->

                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
        </section>
        <!-- END HOME -->
    
        <!-- jQuery  -->
        <script src="<?=base_url('template/assets/js/jquery.min.js')?>"></script>
        <script src="<?=base_url('template/assets/js/bootstrap.bundle.min.js')?>"></script>
        <script src="<?=base_url('template/assets/js/waves.js')?>"></script>
        <script src="<?=base_url('template/assets/js/jquery.slimscroll.js')?>"></script>

        <!-- App js -->
        <script src="<?=base_url('template/assets/js/jquery.core.js')?>"></script>
        <script src="<?=base_url('template/assets/js/jquery.app.js')?>"></script>

    </body>
</html>