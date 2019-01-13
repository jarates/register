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
                        
                            <h4 class="page-title m-0">พิมพ์ใบชำระเงิน</h4>
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
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input type="text" id="code" name="example-input1-group1" class="form-control input-custom-search" placeholder="เลขประจำตัวประชาชน 13 หลัก" maxlength="13">

                                            <span class="input-group-append">
                                                <button id="search" type="button" class="btn waves-effect waves-light btn-success"><i class="fi-search"></i> ค้นหา</button>
                                            </span>

                                        </div>

                                    </div>
                                    <div class="col-md-3"></div>
  
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        
                                        <div class="content-search">
                                            
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <thead>
                                                        <tr>
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
                                                        <!--
                                                        <tr>
                                                            <th>1</th>
                                                            <td>Table cell</td>
                                                            <td>Table cell</td>
                                                            <td>Table cell</td>
                                                            <td>Table cell</td>
                                                            <td>
                                                                <a href="#" target="_blank" class="btn btn-info">
                                                                    <i class="fi-printer"></i> พิมพ์ใบสมัคร
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        -->
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

            $("#search").click(function(){

                var code = $("#code");
                if(code.val() == ''){
                    code.focus();
                    return false;
                }

                $.ajax({
                    url: '<?=site_url('ajax/search_print_register')?>',
                    data: {code:code.val()},
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function(data){
                        $("#loading-msg").html('<div class="loading">Loading&#8230;</div>');
                    },
                    success: function(data){
                        $("#loading-msg").html('');
                        $("#tr-data").html('');
                        if(data.data.length > 0){
                            
                            console.log(data);

                            var tr = '';
                            $.each(data.data, function(key,val) {

                                tr += '<tr>';
                                    tr += '<td>'+val.code+'</td>';
                                    tr += '<td>'+val.fullname+'</td>';
                                    tr += '<td>'+val.learning_name+' ('+val.education_name+')</td>';
                                    tr += '<td>'+val.faculty_name+'/'+val.majoring_name+'</td>';
                                    tr += '<td>'+val.date_create+'</td>';
                                    tr += '<td>'+val.status+'</td>';
                                    tr += '<td><a href="'+val.url_print+'/print_payment/'+val.id+'" target="_blank" class="btn btn-info"><i class="fi-printer"></i> พิมพ์ใบชำระเงิน</a></td>';
                                tr += '</tr>';

                            });
                            $("#tr-data").html(tr);

                        }else{

                            var tr = '';
                            tr += '<tr>';
                                tr += '<td colspan="6" align="center"><h3>ไม่พบข้อมูล "'+code.val()+'"</h3></td>';
                            tr += '</tr>';
                            $("#tr-data").html(tr);

                        }
                    }
                });

            });

        </script>

    </body>
</html>