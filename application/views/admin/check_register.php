
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
                            <h4 class="page-title m-0">ตรวจสอบรายชื่อสมัครเรียน</h4>
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
                                                            <th>สถานะ</th>
                                                            <th>PDF</th>
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
                                                                <?=$status?>
                                                            </td>
                                                            <td>
                                                                <a href="<?=base_url('report/print_register/'.$v->reg_id)?>" target="_blank" class="btn btn-info">
                                                                    <i class="fi-printer"></i> ข้อมูลสมัคร
                                                                </a>
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