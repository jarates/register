<!-- Modal -->
<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">
          เพิ่มรูปแบบ/ระบบการเรียน
        </h4>
      </div>
      <div class="modal-body">
        
        <form class="frm" action="<?=site_url('admin/save_learning')?>" method="post">
          <input type="hidden" name="action" value="add">
          <input type="hidden" name="period_id" value="<?=$period_id?>">

          <div>
            <label>ชื่อรูปแบบ/ระบบการเรียน</label>
            <input required="" type="text" name="learning_name" class="form-control" placeholder="เช่น ภาคปกติ จ-ศ หรือ ภาคพิเศษ ส-อา">
          </div>

          <div>
            <label>ค่าสมัคร</label>
            <input required="" type="number" accept="any" name="learning_fee" class="form-control" placeholder="0.00">
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>