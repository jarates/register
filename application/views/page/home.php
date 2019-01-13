<!DOCTYPE html>
<html lang="en">

    <head>
        <?php $this->load->view('theme/frontend/css'); ?>
    </head>
    <body>

        <?php $this->load->view('theme/frontend/header'); ?>

        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title m-0">Starter Page</h4>
                        </div>

                    </div>
                </div>
                <!-- end row -->
                

            </div>
            <!-- end container-fluid -->

            <?php $this->load->view('theme/frontend/footer'); ?>

        </div>
        <!-- end wrapper -->

        <?php $this->load->view('theme/frontend/js'); ?>

    </body>
</html>