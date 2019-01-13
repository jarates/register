
<!DOCTYPE html>
<html lang="en">

    <head>
        
        <?php $this->load->view('theme/admin/css'); ?>

    </head>
    <body>

        <?php $this->load->view('theme/admin/header'); ?>


        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="pull-right">
                                <a href="javascript:" onclick="return modal_add_news()" class="btn btn-primary">เพิ่มข่าว</a>
                            </div>
                            <h4 class="page-title m-0">จัดการข่าวประชาสัมพันธ์</h4>
                        </div>

                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="card-body table-responsive">

                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รูปภาพ</th>
                                            <th>หัวข้อข่าว</th>
                                            <th>วันที่</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        foreach($news as $k => $v){
                                        ?>
                                        <tr>
                                            <td>
                                               <?=($k+1)?> 
                                            </td>
                                            <td>
                                                <?php if($v->news_picture != ''){ ?>

                                                    <img src="<?=base_url('uploadFile/news/'.$v->news_picture)?>" style="width: 120px;">

                                                <?php } ?>
                                            </td>
                                            <td><?=$v->news_topic?></td>
                                            <td><?=date("Y-m-d H:i", strtotime($v->news_date))?></td>
                                            <td>
                                                <a href="javascript:" onclick="return modal_edit_news('<?=$v->news_id?>')">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="<?=site_url('admin/delete_news?news_id='.$v->news_id)?>" onclick="return confirm('ยืนยันลบข้อมูล?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                


            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end wrapper -->

        <?php $this->load->view('theme/admin/js'); ?>
        
        <script>

            function modal_add_news(){
                $.ajax({
                    url: '<?=site_url('admin/modal_add_news')?>',
                    type: 'GET',
                    beforeSend: function() {

                        //$("#loading-msg").html('<div class="loading">Loading&#8230;</div>');

                    },
                    success: function(data){
                        //$("#loading-msg").html('');
                        $("#result-modal").html(data);
                        $("#modal").modal('show');
                    }
                }); return false;
            }

            function modal_edit_news(news_id){
                $.ajax({
                    url: '<?=site_url('admin/modal_edit_news')?>',
                    data: {news_id:news_id},
                    type: 'POST',
                    beforeSend: function() {

                        //$("#loading-msg").html('<div class="loading">Loading&#8230;</div>');

                    },
                    success: function(data){
                        //$("#loading-msg").html('');
                        $("#result-modal").html(data);
                        $("#modal").modal('show');
                    }
                }); return false;
            }

        </script>
    

    </body>
</html>