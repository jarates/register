<script>
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

             $(function(){

              load_ajax_management_education('<?=$learning_id?>');

            });

</script>
<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">
          ระดับการศึกษา : <?=$learning[0]->learning_name?>
          <a href="javascript:" onclick="return create_form_add_education('<?=$learning[0]->learning_id?>',null,null)">
            คลิกเพิ่มระดับการศึกษา
          </a>
          <span id="create-form-add-education"></span>
        </h4>
      </div>
      <div class="modal-body">
        
        <div class="ajax-result"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>