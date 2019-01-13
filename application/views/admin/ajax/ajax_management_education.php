
          <script>
            function create_form_add_education(learning_id,education_id,education_name){

              $('#modal').animate({ scrollTop: 0 }, 'slow');

              if(education_name == null){
                education_name = '';
              }

              var html = '';
              html += '<input type="text" class="custom-input1" name="education_name" value="'+education_name+'">';
              html += '<a href="javascript:" class="btn-save-education btn btn-info btn-xs" data-id="'+learning_id+'"><i class="fi-check"></i> บันทึก</a>';
              $('#create-form-add-education').html(html);

              $(".btn-save-education").click(function(){
                var education_name = $('input[name=education_name]');
                var learning_id = $(this).attr('data-id');

                if(education_name.val() != '' && education_name.val() != 'null'){
                  $.ajax({
                    url: '<?=site_url('admin/save_education')?>',
                    data: {learning_id:learning_id,education_name:education_name.val(),education_id:education_id},
                    type: 'POST',
                    dataType: 'json',
                    success: function(data){
                      if(data.status == 'success'){
                        $('#create-form-add-education').html('');
                        load_ajax_management_education(learning_id);
                      }
                    }
                  }); return false;
                }else{
                  education_name.focus();
                  return false;
                }
                
              });

            }

            $(".btn-edit-education").click(function(){
              var education_id = $(this).attr('data-id');
              var education_name = $(this).attr('data-name');
              var learning_id = $(this).attr('data-learning-id');
              create_form_add_education(learning_id,education_id,education_name);
            });

            function load_ajax_management_education(learning_id){
              $.ajax({
                url: '<?=site_url('admin/ajax_management_education')?>',
                data: {learning_id:learning_id},
                type: 'POST',
                success: function(data){
                  $('.ajax-result').html(data);
                }
              }); return false;
            }

            $(".btn-add-faculty").on('click', function(data){
              var data_tr_id = $(this).attr('data-tr-id');
              var html = '';
              html += '<tr>';
                html += '<td><input name="faculty_code_'+data_tr_id+'[]" type="text" class="custom-input2" placeholder="รหัสคณะ"><input name="faculty_name_'+data_tr_id+'[]" type="text" class="custom-input2" placeholder="ชื่อคณะ"></td>';
                html += '<td><div class="text-center"><a href="javascript:" class="btn-add-majoring-'+data_tr_id+'"><i class="fa fa-plus"></i></a></div><div class="data-majoring-'+data_tr_id+'"></div></td>';
              html += '</tr>';
              $("#body-tr-"+data_tr_id).append(html);

              cal_key_majoring(data_tr_id);

              if($('.custom-input2').length > 0){
                $('#btn-save').show();
              }else{
                $('#btn-save').hide();
              }

            });

            function cal_key_majoring(data_tr_id){

              $('.data-majoring-'+data_tr_id).each(function(i, obj) {
                  $(this).addClass('sub-data-content-'+data_tr_id+'-'+i);
              });

              $('.btn-add-majoring-'+data_tr_id).each(function(i, obj) {
                  $(this).attr('sub-row-id',i);
                  $(this).attr('onclick','add_majoring('+data_tr_id+','+i+')');
              });

            }

            function add_majoring(data_tr_id,sub_row_id){
              
              var form_html = '';
              form_html += '<input name="majoring_code_'+data_tr_id+'_'+sub_row_id+'[]" type="text" class="custom-input2" placeholder="รหัสสาขาวิชา"><input name="majoring_name_'+data_tr_id+'_'+sub_row_id+'[]" type="text" class="custom-input2" placeholder="ชื่อสาขาวิชา">';
              $('.sub-data-content-'+data_tr_id+'-'+sub_row_id).append(form_html);

            }

            function chk_form(){
              var l = $('.custom-input2').length;
              if(l == 0){
                return false;
              }else{
                return true;
              }
            }

            if($('.custom-input2').length <= 0){
              $('#btn-save').hide();
            }

          </script>

          <form onsubmit="return chk_form()" id="frm-pm" method="post" action="<?=site_url('admin/save_setting_form_register')?>">

            <?php
            foreach($education as $k => $v){

              $facultys = $this->faculty->get_faculty_byEducation($v->education_id);

            ?>
            <table class="custom-table">
              <thead>
                <tr>
                  <th colspan="2">
                    <a href="javascript:" class="btn-edit-education" data-name="<?=$v->education_name?>" data-id="<?=$v->education_id?>" data-learning-id="<?=$v->learning_id?>">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <?=$v->education_name?>
                    <input type="hidden" name="education_id[]" value="<?=$v->education_id?>">
                    <input type="hidden" name="education_name[]" value="<?=$v->education_name?>">
                  </th>
                </tr>
              </thead>
              <tbody id="body-tr-<?=$k?>">
                <tr class="top">
                  <td width="50%">
                    <a href="javascript:" class="pull-right btn-add-faculty" data-tr-id="<?=$k?>">+</a>
                    คณะ
                  </td>
                  <td width="50%">
                    สาขา
                  </td>
                </tr>

                <?php
                foreach($facultys->result() as $i => $f){

                  $majorings = $this->majoring->get_majoring_byFaculty($f->faculty_id);

                ?>

                <tr>
                  <td>
                    <input name="faculty_code_<?=$k?>[]" type="text" class="custom-input2" placeholder="รหัสคณะ" value="<?=$f->faculty_code?>">
                    <input name="faculty_name_<?=$k?>[]" type="text" class="custom-input2" placeholder="ชื่อคณะ" value="<?=$f->faculty_name?>">
                  </td>
                  <td>

                    <div class="text-center">
                      <a href="javascript:" class="btn-add-majoring-<?=$k?>" sub-row-id="<?=$k?>" onclick="add_majoring(<?=$k?>,<?=$i?>)">
                        <i class="fa fa-plus"></i>
                      </a>
                    </div>
                    <div class="data-majoring-<?=$k?> sub-data-content-<?=$k?>-<?=$i?>">
                      
                      <?php
                      foreach($majorings->result() as $c => $m){
                      ?>

                      <input name="majoring_code_<?=$k?>_<?=$i?>[]" type="text" class="custom-input2" placeholder="รหัสสาขาวิชา" value="<?=$m->majoring_code?>">
                      <input name="majoring_name_<?=$k?>_<?=$i?>[]" type="text" class="custom-input2" placeholder="ชื่อสาขาวิชา" value="<?=$m->majoring_name?>">

                      <?php } ?>

                    </div>
                    
                  </td>
                </tr>

                <?php } ?>

              </tbody>
            </table>
            <?php } ?>

            <div class="text-center">
              <button type="submit" id="btn-save" class="btn btn-success">บันทึก</button>
            </div>

          </form>
