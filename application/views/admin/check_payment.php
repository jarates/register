
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
                            <h4 class="page-title m-0">ยืนยันการชำระเงิน</h4>
                        </div>

                    </div>
                </div>
                <!-- end row -->


                <!-- Basic Form Wizard -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-12">
                                        
                                        <div class="content-search">
                                            
                                            <div class="table-responsive">
                                                <table id="datatableRR" class="table m-0" style="border-collapse: collapse; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>ลำดับ</th>
                                                            <th>เลขบัตรประชาชน</th>
                                                            <th>ชื่อ-สกุล</th>
                                                            <th>ระบบการเรียน</th>
                                                            <th>คณะ/สาขา</th>
                                                            <th>สมัครเมื่อวันที่</th>
                                                            <th>ยืนยันชำระเงิน</th>
                                                            <th>สถานะ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tr-data">
                                                        
                                                        <?php
                                                        foreach($register as $k => $v){
                                                            $status = status_register($v->reg_status);
                                                        ?>
                                                        <tr>
                                                            <td><?=($k+1)?></td>
                                                            <td>
                                                                <?=$v->reg_code?>
                                                            </td>
                                                            <td>
                                                                <?=$v->reg_name_prefix?>
                                                                <?=$v->reg_fname?>
                                                                <?=$v->reg_lname?>
                                                            </td>
                                                            <td>
                                                                <?=$v->learning_name?>
                                                                (<?=$v->education_name?>)
                                                            </td>
                                                            <td>
                                                                <?=$v->faculty_name?> / <?=$v->majoring_name?>
                                                            </td>
                                                            <td>
                                                                <?=date("d/m/Y", strtotime($v->reg_datetime))?>
                                                            </td>
                                                            <td>

                                                                <?php if($v->reg_status == 0 || $v->reg_status == 1){ ?>

                                                                <select data-id="<?=$v->reg_id?>" id="reg_status" name="reg_status" class="form-control reg_status" style="width: 140px;">
                                                                    <option value="">---โปรดเลือก---</option>
                                                                    <option value="1" <?php if($v->reg_status == 1){echo 'selected';} ?>>ชำระเงินแล้ว</option>
                                                                </select>
                                                                <?php }else{ echo 'ไม่มีการกระทำ'; } ?>
                                                            </td>
                                                            <td>
                                                                
                                                                <?=$status?>

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
                </div>
                <!-- End row -->


            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end wrapper -->

        <?php $this->load->view('theme/admin/js'); ?>
        
        <script>

            $('.reg_status').on('change', function(){
                var reg_id = $(this).attr('data-id');
                var reg_status = this.value;
                if(confirm('ยืนยันการชำระเงินรายการนี้ใช่หรือไม่ ID = '+reg_id)){

                    if(reg_status != ''){
                        $.ajax({
                            url: '<?=site_url('admin/change_status_register')?>',
                            data: {reg_id:reg_id,reg_status:reg_status},
                            type: 'POST',
                            dataType: 'json',
                            beforeSend: function(data){
                                $("#loading-msg").html('<div class="loading">Loading&#8230;</div>');
                            },
                            success: function(data){
                                $("#loading-msg").html('');
                                if(data.status == 'success'){
                                    alert('ทำรายการสำเร็จ');
                                    window.location.reload();
                                }
                            }
                        });return false;
                    }else{
                        alert('error');
                    }

                }return false;
                
            });

            $('#datatableRR').DataTable({
                    order: [[ 5, "desc" ]],
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
            });

        </script>
    

    </body>
</html>