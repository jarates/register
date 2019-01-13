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
                        
                            <h4 class="page-title m-0">
                                แจ้งผลการสมัคร / พิมพ์บัตรยืนยัน นศ.
                            </h4>
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
                                                <table id="datatable" class="table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>ลำดับ</th>
                                                            <th>เลขบัตรประชาชน</th>
                                                            <th>ชื่อ-สกุล</th>
                                                            <th>ข้อมูลการสมัคร</th>
                                                            <th>สถานะ</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tr-data">
                                                        
                                                        <?php
                                                        foreach($register as $k => $v){ if($v->reg_status == 2){

                                                            $status = status_register($v->reg_status);
                                                        ?>
                                                        <tr>
                                                            <th><?=($k+1)?></th>
                                                            <td><?=$v->reg_code?></td>
                                                            <td>
                                                                <?=$v->reg_name_prefix?>
                                                                <?=$v->reg_fname?>
                                                                <?=$v->reg_lname?>
                                                            </td>
                                                            <td>
                                                                
                                                                <div>
                                                                    <?=$v->learning_name?>
                                                                    (<?=$v->education_name?>)
                                                                </div>
                                                                <div>
                                                                    <?=$v->majoring_name?>
                                                                    (<?=$v->faculty_name?>)
                                                                </div>

                                                            </td>
                                                            <td>
                                                                <?=$status?>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:" onclick="return modal_show_print_student_card('<?=$v->reg_id?>')" class="btn btn-info">
                                                                    <i class="fa fa-check"></i> พิมพ์บัตรยืนยัน นศ.
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php } } ?>
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

            <?php $this->load->view('theme/frontend/footer'); ?>

        </div>
        <!-- end wrapper -->

        <?php $this->load->view('theme/frontend/js'); ?>
        <script>

            function modal_show_print_student_card(reg_id){
                $.ajax({
                    url: '<?=site_url('page/modal_show_print_student_card')?>',
                    data: {reg_id:reg_id},
                    type: 'POST',
                    success: function(data){
                        $("#result-modal").html(data);
                        $("#modal").modal('show');
                    }
                });return false;
            }

            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "plugins/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();

        </script>

    </body>
</html>