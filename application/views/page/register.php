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
                        
                            <h4 class="page-title m-0">กรอกข้อมูลการสมัครเรียน</h4>
                        </div>

                    </div>
                </div>
                <!-- end row -->
                
                <!-- Basic Form Wizard -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <div id="result-register"></div>

                                <form id="frm-register" class="frm-register">
                                    <div>
                                        <h3>ข้อมูลผู้สมัคร</h3>
                                        <section>

                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-2">

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            เลขบัตรประจำตัวประชาชน*
                                                         </label>
                                                        <div class="col-lg-8">
                                                            
                                                            <input required="" id="reg_code" name="reg_code" type="text" data-mask="9-9999-99999-99-9" class="form-control">
                                                            <span class="font-14 text-muted">ตัวอย่าง : 9-9999-99999-99-9</span>

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            คำนำหน้า*
                                                         </label>
                                                        <div class="col-lg-8">
                                                            <select required="" name="reg_name_prefix" class="form-control">
                                                                <option value="">--เลือกคำนำหน้า*--</option>
                                                                <?php foreach(form_name_prefix() as $v){ ?>
                                                                    <option value="<?=$v?>"><?=$v?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            ชื่อจริง*
                                                         </label>
                                                        <div class="col-lg-8">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input required="" type="text" class="form-control" name="reg_fname" placeholder="ชื่อ*">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input required="" type="text" class="form-control" name="reg_lname" placeholder="นามสกุล*">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            เพศ*
                                                         </label>
                                                        <div class="col-lg-8">
                                                            <select required="" name="reg_gender" class="form-control">
                                                                <option value="">--เลือกเพศ*--</option>
                                                                <?php foreach(form_name_gender() as $v){ ?>
                                                                    <option value="<?=$v?>"><?=$v?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            เชื้อชาติ*
                                                         </label>
                                                        <div class="col-lg-8">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <select required="" name="reg_race" class="form-control">
                                                                        <option value="">
                                                                            --เลือกเชื้อชาติ*--
                                                                        </option>
                                                                        <?php foreach(form_name_race() as $v){ ?>
                                                                            <option value="<?=$v?>">
                                                                                <?=$v?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <select required="" name="reg_nationality" class="form-control">
                                                                        <option value="">
                                                                            --เลือกสัญชาติ*--
                                                                        </option>
                                                                        <?php foreach(form_name_nationality() as $v){ ?>
                                                                            <option value="<?=$v?>">
                                                                                <?=$v?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <select required="" name="reg_religion" class="form-control">
                                                                        <option value="">
                                                                            --เลือกศาสนา*--
                                                                        </option>
                                                                        <?php foreach(form_name_religion() as $v){ ?>
                                                                            <option value="<?=$v?>">
                                                                                <?=$v?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            วัน/เดือน/ปีเกิด*
                                                         </label>
                                                        <div class="col-lg-8">
                                                            <div>
                                                                <div class="input-group">
                                                                    <input required="" name="reg_birthday" type="text" class="form-control" placeholder="วัน/เดือน/ปี" id="datepicker-birthday">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text bg-custom text-white b-0"><i class="mdi mdi-calendar"></i></span>
                                                                    </div>
                                                                </div><!-- input-group -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                        </section>
                                        <h3>ที่อยู่</h3>
                                        <section>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-2">

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            ที่อยู่ปัจจุบัน*
                                                         </label>
                                                        <div class="col-lg-8">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    
                                                                    <input type="text" name="reg_addr_number" id="reg_addr_number" required="" class="form-control" placeholder="บ้านเลขที่*">
                                                                    
                                                                </div>
                                                                <div class="col-md-4">
                                                                    
                                                                    <input type="text" name="reg_addr_village" id="reg_addr_village" required="" class="form-control" placeholder="ชื่อหมู่บ้าน*">

                                                                </div>
                                                                <div class="col-md-4">
                                                                    
                                                                    <input type="text" name="reg_addr_moo" id="reg_addr_moo" class="form-control" placeholder="หมู่ที่">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            จังหวัด*
                                                         </label>
                                                        <div class="col-lg-8">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    
                                                                    <select id="reg_addr_province" name="reg_addr_province" required="" class="form-control">
                                                                        <option value="">--เลือกจังหวัด*--</option>

                                                                        <?php foreach($pro as $p){ ?>
                                                                            <option value="<?=$p->id?>"><?=$p->name_th?></option>
                                                                        <?php } ?>

                                                                    </select>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    
                                                                    <select required="" id="reg_addr_district" name="reg_addr_district" disabled="" class="form-control">
                                                                        <option value="">--โปรดเลือกจังหวัด--</option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            ตำบล*
                                                         </label>
                                                        <div class="col-lg-8">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    
                                                                    <select id="reg_addr_tumbon" name="reg_addr_tumbon" required="" disabled="" class="form-control">
                                                                        <option value="">--โปรดเลือกอำเภอ--</option>
                                                                    </select>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    
                                                                    <input type="number" name="reg_addr_zipcode" id=reg_addr_zipcode placeholder="รหัสไปรษณีย์*" class="form-control" required="">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            เบอร์ติดต่อ*
                                                         </label>
                                                        <div class="col-lg-8">
                                                            
                                                            <input type="text" name="reg_tel" id="reg_tel" required="" class="form-control" placeholder="เบอร์ติดต่อ*">

                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                        </section>
                                        <h3>ข้อมูลบิดา-มารดา</h3>
                                        <section>
                                            
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-2">

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            ชื่อ-สกุล บิดา
                                                         </label>
                                                        <div class="col-lg-8">
                                                            
                                                            <input type="text" name="reg_name_father" id="reg_name_father" class="form-control" placeholder="ชื่อ-สกุล บิดา">

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            อายุ
                                                         </label>
                                                        <div class="col-lg-8">
                                                            
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <input type="number" name="reg_age_father" id="reg_age_father" class="form-control" placeholder="อายุ">
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <input type="text" name="reg_tel_father" id="reg_tel_father" class="form-control" placeholder="เบอร์ติดต่อ">
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <select name="reg_career_father" id="reg_career_father" class="form-control">
                                                                        <option value="">--เลือกอาชีพ--</option>
                                                                        <?php
                                                                        foreach(form_name_career() as $v){
                                                                        ?>
                                                                        <option value="<?=$v?>"><?=$v?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            สถานที่ทำงาน
                                                         </label>
                                                        <div class="col-lg-8">
                                                            
                                                            <input type="text" name="reg_office_father" id="reg_office_father" class="form-control" placeholder="สถานที่ทำงาน">

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            ชื่อ-สกุล มารดา
                                                         </label>
                                                        <div class="col-lg-8">
                                                            
                                                            <input type="text" name="reg_name_mother" id="reg_name_mother" class="form-control" placeholder="ชื่อ-สกุล มารดา">

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            อายุ
                                                         </label>
                                                        <div class="col-lg-8">
                                                            
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <input type="number" name="reg_age_mother" id="reg_age_mother" class="form-control" placeholder="อายุ">
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <input type="text" name="reg_tel_mother" id="reg_tel_mother" class="form-control" placeholder="เบอร์ติดต่อ">
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <select name="reg_career_mother" id="reg_career_mother" class="form-control">
                                                                        <option value="">--เลือกอาชีพ--</option>
                                                                        <?php
                                                                        foreach(form_name_career() as $v){
                                                                        ?>
                                                                        <option value="<?=$v?>"><?=$v?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            สถานที่ทำงาน
                                                         </label>
                                                        <div class="col-lg-8">
                                                            
                                                            <input type="text" name="reg_office_mother" id="reg_office_mother" class="form-control" placeholder="สถานที่ทำงาน">

                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                        </section>
                                        <h3>การศึกษา / สาขาวิชาที่จบมา</h3>
                                        <section>
                                            
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-2">

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            ข้าพเจ้าจบ ม.6 จาก
                                                         </label>
                                                        <div class="col-lg-8">
                                                            
                                                            <input required="" type="text" name="reg_from_school" class="form-control" id="reg_from_school">

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            จังหวัด*
                                                         </label>
                                                        <div class="col-lg-8">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    
                                                                    <select name="reg_from_school_province" required="" id="reg_from_school_province" class="form-control">
                                                                        <option value="">--เลือกจังหวัด*--</option>

                                                                        <?php foreach($pro as $p){ ?>
                                                                            <option value="<?=$p->id?>"><?=$p->name_th?></option>
                                                                        <?php } ?>

                                                                    </select>

                                                                </div>
                                                                <div class="col-md-5">
                                                                    
                                                                    <select name="reg_from_school_district" required="" id="reg_from_school_district" disabled="" class="form-control">
                                                                        <option value="">--โปรดเลือกจังหวัด--</option>
                                                                    </select>

                                                                </div>

                                                                <div class="col-md-3">
                                                                    <input type="number" name="reg_from_grade" id="reg_from_grade" required="" step="any" class="form-control" placeholder="เกรดเฉลี่ย*">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            สาขาวิชาที่จบมา*
                                                         </label>
                                                        <div class="col-lg-8">
                                                            
                                                            <select name="reg_programe" id="reg_programe" required="" class="form-control">
                                                                <option value="">--สาขาวิชา--</option>
                                                                <?php
                                                                foreach($programe as $v){
                                                                ?>
                                                                <option value="<?=$v->programe_id?>">
                                                                    <?=$v->programe_name?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </section>

                                        <h3>มีความประสงค์จะสมัครเรียน</h3>
                                        <section>
                                            
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-2">

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            ระบบการเรียน*
                                                         </label>
                                                        <div class="col-lg-8">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    
                                                                    <select name="learning_id" required="" id="learning_id" class="form-control">
                                                                        <option value="">--เลือกระบบการเรียน*--</option>

                                                                        <?php foreach($learnings as $p){ ?>
                                                                            <option value="<?=$p->learning_id?>"><?=$p->learning_name?></option>
                                                                        <?php } ?>

                                                                    </select>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    
                                                                    <select name="education_id" required="" id="education_id" disabled="" class="form-control">
                                                                        <option value="">--เลือกระดับการศึกษา--</option>
                                                                    </select>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            สังกัดคณะ*
                                                         </label>
                                                        <div class="col-lg-8">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    
                                                                    <select name="faculty_id" required="" id="faculty_id" disabled="" class="form-control">
                                                                        <option value="">--เลือกสังกัดคณะ--</option>
                                                                    </select>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    
                                                                    <select name="majoring_id" required="" id="majoring_id" disabled="" class="form-control">
                                                                        <option value="">--เลือกสาขาวิชา--</option>
                                                                    </select>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label text-right" for="userName">
                                                            ทราบข่าวการรับสมัครจากที่ไหน*
                                                         </label>
                                                        <div class="col-lg-8">
                                                            
                                                            <input type="text" name="recruitment" class="form-control" required="">

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </section>
                                       
                                        <h3 class="confirm">ยืนยันการสมัคร</h3>
                                        <section>
                                            <div class="form-group row">
                                                <div class="col-lg-12 text-center">
                                                    <div class="checkbox-custom">
                                                        <label class="label-confirm">
                                                            
                                                            <input name="ac" id="ac" type="checkbox" value="true" required="">
                                                            จะไม่สามารถแก้ไขข้อมูลได้ กรุณาตรวจสอบให้แน่ใจ หากแน่ใจแล้ว ยอมรับการสมัคร
                                                        
                                                        </label>
                                                    </div>

                                                    <button type="submit" class="btn btn-success btn-lg">
                                                        <i class="fi-check"></i> สมัคร
                                                    </button>

                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </form>

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

            $("a[role=menuitem]").on('click', function(event){
                event.preventDefault();
                //$(this).val('');
                //$(this).slice(0, 1).focus();
                alert('dsdsd');
                return false;
            });

            $('#datepicker-birthday').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: "dd/mm/yyyy",
            });

            $("#reg_addr_province").on('change', function(){
                var province_id = this.value;

                $.ajax({
                    url: '<?=site_url('ajax/ajax_select_amphures')?>',
                    data: {province_id:province_id},
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function(data){
                        $('#reg_addr_district').attr('disabled');
                    },
                    success: function(data){
                        if(data.data.length > 0){
                            $('#reg_addr_district').html('');
                            $('#reg_addr_district').removeAttr('disabled');
                            $('#reg_addr_district').append('<option value="">--เลือกอำเภอ--</option>');
                            $.each(data.data, function(key,val) {
                                $('#reg_addr_district').append('<option value="'+val.amphure_id+'">'+val.name_th+'</option>');
                            });
                            
                            
                        }
                    }
                });
            
            });

            $("#reg_addr_district").on('change', function(){
                var amphure_id = this.value;

                $.ajax({
                    url: '<?=site_url('ajax/ajax_select_district')?>',
                    data: {amphure_id:amphure_id},
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function(data){
                        $('#reg_addr_tumbon').attr('disabled');
                    },
                    success: function(data){
                        if(data.data.length > 0){
                            $('#reg_addr_tumbon').html('');
                            $('#reg_addr_tumbon').removeAttr('disabled');
                            $('#reg_addr_tumbon').append('<option value="">--เลือกตำบล--</option>');
                            $.each(data.data, function(key,val) {
                                $('#reg_addr_tumbon').append('<option value="'+val.districts_id+'">'+val.name_th+'</option>');
                            });
                            $("#reg_addr_zipcode").val(data.data[0].zip_code);
                            
                        }
                    }
                });

            });

            $("#reg_from_school_province").on('change', function(){
                var province_id = this.value;

                $.ajax({
                    url: '<?=site_url('ajax/ajax_select_amphures')?>',
                    data: {province_id:province_id},
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function(data){
                        $('#reg_from_school_district').attr('disabled');
                    },
                    success: function(data){
                        if(data.data.length > 0){
                            $('#reg_from_school_district').html('');
                            $('#reg_from_school_district').removeAttr('disabled');
                            $('#reg_from_school_district').append('<option value="">--เลือกอำเภอ--</option>');
                            $.each(data.data, function(key,val) {
                                $('#reg_from_school_district').append('<option value="'+val.amphure_id+'">'+val.name_th+'</option>');
                            });
                            
                            
                        }
                    }
                });
            
            });

            $("#frm-register").submit(function(){

                $.ajax({
                    url: '<?=site_url('ajax/save_register')?>',
                    data: $("#frm-register").serialize(),
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function(data){
                        $("#loading-msg").html('<div class="loading">Loading&#8230;</div>');
                    },
                    success: function(data){

                        $("html, body").animate({ scrollTop: 0 }, "slow");
                        $("#loading-msg").html('');
                        $("#result-register").html('<div class="alert alert-danger text-center register-alert">'+data.msg+'</div>');
                        if(data.status == 'success'){
                            $("#frm-register")[0].reset();
                        }
                        
                    }
                });return false;

            });


            $("#learning_id").on('change', function(){
                var learning_id = this.value;
                $.ajax({
                    url: '<?=site_url('ajax/ajax_select_education')?>',
                    data: {learning_id:learning_id},
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function(data){
                        $('#education_id').attr('disabled');
                    },
                    success: function(data){
                        if(data.data.length > 0){
                            $('#education_id').html('');
                            $('#education_id').removeAttr('disabled');
                            $('#education_id').append('<option value="">--เลือกระดับการศึกษา--</option>');

                            $.each(data.data, function(key,val) {
                                $('#education_id').append('<option value="'+val.education_id+'">'+val.education_name+'</option>');
                            });
                            
                        }
                    }
                });
            
            });

            $("#education_id").on('change', function(){
                var education_id = this.value;

                $.ajax({
                    url: '<?=site_url('ajax/ajax_select_faculty')?>',
                    data: {education_id:education_id},
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function(data){
                        $('#faculty_id').attr('disabled');
                    },
                    success: function(data){
                        if(data.data.length > 0){
                            $('#faculty_id').html('');
                            $('#faculty_id').removeAttr('disabled');
                            $('#faculty_id').append('<option value="">--เลือกสังกัดคณะ--</option>');

                            $.each(data.data, function(key,val) {
                                $('#faculty_id').append('<option value="'+val.faculty_id+'">'+val.faculty_name+'</option>');
                            });
                            
                        }
                    }
                });
            
            });

            $("#faculty_id").on('change', function(){
                var faculty_id = this.value;

                $.ajax({
                    url: '<?=site_url('ajax/ajax_select_majoring')?>',
                    data: {faculty_id:faculty_id},
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function(data){
                        $('#majoring_id').attr('disabled');
                    },
                    success: function(data){
                        if(data.data.length > 0){
                            $('#majoring_id').html('');
                            $('#majoring_id').removeAttr('disabled');
                            $('#majoring_id').append('<option value="">--เลือกสาขาวิชา--</option>');

                            $.each(data.data, function(key,val) {
                                $('#majoring_id').append('<option value="'+val.majoring_id+'">'+val.majoring_name+'</option>');
                            });
                            
                        }
                    }
                });
            
            });

        </script>

    </body>
</html>