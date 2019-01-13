
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
                            <h4 class="page-title m-0">ตั้งค่าฟอร์มการลงทะเบียน</h4>
                        </div>

                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <div class="h-top">
                                        <div class="pull-right">
                                            <a href="javascript:" onclick="return modal_add_period()" class="btn btn-info btn-xs">
                                               <i class="fa fa-plus"></i> เพิ่มปีการศึกษาเปิดรับสมัคร
                                            </a>
                                        </div>
                                        <h5>ตั้งค่าปีการศึกษาเปิดรับสมัคร</h5>
                                    </div>

                                    <div class="m-data">
                                        
                                        <table id="datatable-fixed-col" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>ปีการศึกษา</th>
                                                    <th>วันที่เปิดรับสมัคร</th>
                                                    <th>วันที่สิ้นสุดรับสมัคร</th>
                                                    <th>วันที่สิ้นสุดชำระเงิน</th>
                                                    <th>สำหรับผู้สมัคร</th>
                                                    <th>สถานะ</th>
                                                    <th>จัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach($periods as $k => $v){
                                                ?>
                                                <tr>
                                                    <td><?=($v->period_year+543)?></td>
                                                    <td>
                                                        <?=$v->period_date_begin?>
                                                    </td>
                                                    <td>
                                                        <?=$v->period_date_end?>
                                                    </td>
                                                    <td>
                                                        <?=$v->period_date_payment_end?>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <b>สิ่งที่ได้รับ : </b>
                                                            <?=$v->what_has_been?>
                                                        </div>
                                                        <div>
                                                            <b>วันที่เปิดเรียน : </b>
                                                            <?=$v->opening_date?>
                                                        </div>
                                                        <div>
                                                            <b>วันที่รายงานตัว : </b>
                                                            <?=$v->report_date?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if($v->period_status == 0){
                                                            echo '<span class="label label-danger">ออฟไลน์</span>';
                                                        }else if($v->period_status == 1){
                                                            echo '<span class="label label-info">ออนไลน์</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:" onclick="return modal_edit_period('<?=$v->period_id?>')" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> แก้ไข</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                    <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <div class="h-top">
                                        <div class="pull-right">
                                            <a href="javascript:" onclick="return modal_add_learning('<?=$period_id?>')" class="btn btn-info btn-xs">
                                               <i class="fa fa-plus"></i> เพิ่มระบบการเรียน
                                            </a>
                                        </div>
                                        <h5>ตั้งค่าระบบการเรียน</h5>
                                    </div>

                                    <div class="m-data">
                                        
                                        <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>ปีการศึกษา</th>
                                                    <th>ระบบการเรียน</th>
                                                    <th>ค่าสมัคร</th>
                                                    <th width="20%">จัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach($learnings as $k => $v){
                                                ?>
                                                <tr>
                                                    <td><?=($v->period_year+543)?></td>
                                                    <td>
                                                        <?=$v->learning_name?>
                                                    </td>
                                                    <td>
                                                        <?=number_format($v->learning_fee,2)?>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:" onclick="return modal_edit_learning('<?=$v->learning_id?>')" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> แก้ไข</a>
                                                        <a href="javascript:" onclick="return modal_management_education('<?=$v->learning_id?>')" class="btn btn-info btn-xs"><i class="fa fa-cog"></i> จัดการระดับการศึกษา</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end wrapper -->

        <?php $this->load->view('theme/admin/js'); ?>
        
        <script>

            function modal_add_period(){
                $.ajax({
                    url: '<?=site_url('admin/modal_add_period')?>',
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

            function modal_edit_period(period_id){
                $.ajax({
                    url: '<?=site_url('admin/modal_edit_period')?>',
                    data: {period_id:period_id},
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

            function modal_add_learning(period_id){
                $.ajax({
                    url: '<?=site_url('admin/modal_add_learning')?>',
                    data: {period_id:period_id},
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

            function modal_edit_learning(learning_id){
                $.ajax({
                    url: '<?=site_url('admin/modal_edit_learning')?>',
                    data: {learning_id:learning_id},
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

            function modal_management_education(learning_id){
                $.ajax({
                    url: '<?=site_url('admin/modal_management_education')?>',
                    data: {learning_id:learning_id},
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