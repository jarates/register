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
                        
                            <h4 class="page-title m-0">ข่าวประชาสัมพันธ์</h4>
                        </div>

                    </div>
                </div>
                <!-- end row -->
                
                <!-- Basic Form Wizard -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <?php if(count($news) > 0){ ?>

                                    <?php
                                    foreach($news as $k => $v){
                                    ?>

                                    <div class="p-content">
                                        <div class="p-title">
                                           >> <?=$v->news_topic?> <<
                                        </div>
                                        <div class="p-data">
                                            <div class="img">
                                                <img src="<?=base_url('uploadFile/news/'.$v->news_picture)?>" class="img-responsive" style="width: 80%;">
                                            </div>
                                            <div class="detail">
                                                <?=$v->news_detail?>
                                            </div>
                                            <div class="date">
                                                <b>เมื่อวันที่ :</b> <?=$v->news_date?>
                                                <b>โดย :</b> <?=$v->login_name?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php } ?>

                                <?php }else{ ?>

                                    ไม่มีข่าวล่าสุด 0

                                <?php } ?>

                                

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->

            </div>
            <!-- end container-fluid -->

            <?php $this->load->view('theme/frontend/footer'); ?>

        </div>
        <!-- end wrapper -->

        <?php $this->load->view('theme/frontend/js'); ?>

    </body>
</html>