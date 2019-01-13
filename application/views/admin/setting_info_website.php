
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
                            <h4 class="page-title m-0">ตั้งค่าทั่วไปเว็บไซต์</h4>
                        </div>

                    </div>
                </div>
                <!-- end row -->

                <form action="<?=site_url('admin/save_setting_info_website')?>" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="form-group row">
                                                <label class="col-md-2 control-label p-left">ชื่อสถาบัน</label>
                                                <div class="col-md-10 p-right">
                                                    <input name="school_name" type="text" class="form-control" required="" value="<?=$info['school_name']?>">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-group row">
                                                <label class="col-md-3 control-label">
                                                    <img src="<?=base_url('uploadFile/info-school/'.$info['logo_pdf'])?>" class="logo-report"> Logo Report
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="file" class="form-control" name="logo_pdf">
                                                    <input type="hidden" name="old_logo_pdf" value="<?=$info['logo_pdf']?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 control-label" for="example-email">
                                                    ชื่อเว็บไซต์
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" name="website_name" required="" class="form-control" value="<?=$info['website_name']?>">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-group row">
                                                <label class="col-md-3 control-label">Title เว็บไซต์</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="website_title" required="" class="form-control" value="<?=$info['website_title']?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 control-label">Footer เว็บไซต์</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="website_footer" required="" class="form-control" value="<?=$info['website_footer']?>">
                                                </div>
                                            </div>

                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="m-b-30 m-t-0 header-title">Page เกี่ยวกับ</h4>
                                    <textarea id="about" name="about"><?=$page['about']?></textarea>
                                    <hr />
                                    <h4 class="m-b-30 m-t-0 header-title">Page ช่วยเหลือ</h4>
                                    <textarea id="help" name="help"><?=$page['help']?></textarea>
                                    <hr />
                                    <h4 class="m-b-30 m-t-0 header-title">Page ติดต่อ</h4>
                                    <textarea id="contact" name="contact"><?=$page['contact']?></textarea>
                                    <hr />

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-lg">บันทึก</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->

                </form>


            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end wrapper -->

        <?php $this->load->view('theme/admin/js'); ?>
        
        <script>


            $(document).ready(function () {
                if($("#about").length > 0){
                    tinymce.init({
                        selector: "textarea#about",
                        theme: "modern",
                        height:300,
                        style_formats: [
                            {title: 'Bold text', inline: 'b'},
                            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                            {title: 'Example 1', inline: 'span', classes: 'example1'},
                            {title: 'Example 2', inline: 'span', classes: 'example2'},
                            {title: 'Table styles'},
                            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                        ]
                    });
                }
                if($("#contact").length > 0){
                    tinymce.init({
                        selector: "textarea#contact",
                        theme: "modern",
                        height:300,
                        style_formats: [
                            {title: 'Bold text', inline: 'b'},
                            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                            {title: 'Example 1', inline: 'span', classes: 'example1'},
                            {title: 'Example 2', inline: 'span', classes: 'example2'},
                            {title: 'Table styles'},
                            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                        ]
                    });
                }
                if($("#help").length > 0){
                    tinymce.init({
                        selector: "textarea#help",
                        theme: "modern",
                        height:300,
                        style_formats: [
                            {title: 'Bold text', inline: 'b'},
                            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                            {title: 'Example 1', inline: 'span', classes: 'example1'},
                            {title: 'Example 2', inline: 'span', classes: 'example2'},
                            {title: 'Table styles'},
                            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                        ]
                    });
                }
            });

        </script>
    

    </body>
</html>