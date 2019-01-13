<!-- Modal -->
<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">
          แก้ไขปีการศึกษาเปิดรับสมัคร <?=$rs[0]->period_year+543?>
        </h4>
      </div>
      <div class="modal-body">
        
        <form class="frm" action="<?=site_url('admin/save_period')?>" method="post">
          <input type="hidden" name="period_id" value="<?=$rs[0]->period_id?>">
          <input type="hidden" name="action" value="edit">
          <div>
            <label>ระบุปี (ค.ศ.)</label>
            <input required="" value="<?=$rs[0]->period_year?>" type="number" name="period_year" class="form-control" placeholder="<?=date("Y")?>">
          </div>
          <div>
            <label>วันที่เปิดรับสมัคร</label>
            <input required="" value="<?=$rs[0]->period_date_begin?>" type="text" name="period_date_begin" class="form-control" placeholder="<?=date("Y-m-d")?> 00:00">
          </div>
          <div>
            <label>วันที่สิ้นสุดรับสมัคร</label>
            <input required="" type="text" value="<?=$rs[0]->period_date_end?>" name="period_date_end" class="form-control" placeholder="<?=date("Y-m-d")?> 23:59">
          </div>
          <div>
            <label>วันที่สิ้นสุดการชำระเงิน</label>
            <input type="text" name="period_date_payment_end" class="form-control" placeholder="Y-m-d" value="<?=$rs[0]->period_date_payment_end?>">
          </div>
           <div class="alert alert-danger">
            <div>
              <label>สิ่งที่ได้รับ</label>
              <input type="text" name="what_has_been" class="form-control" value="<?=$rs[0]->what_has_been?>">
            </div>
            <div>
              <label>วันที่เปิดเรียน</label>
              <input type="text" name="opening_date" class="form-control" value="<?=$rs[0]->opening_date?>">
            </div>
            <div>
              <label>วันที่รายงานตัว</label>
              <input type="text" name="report_date" class="form-control" value="<?=$rs[0]->report_date?>">
            </div>
          </div>
          <div>
            <label>สถานะ</label>
            <select name="period_status" required="" class="form-control">
              <option value="0" <?php if($rs[0]->period_status == 0){echo 'selected';} ?>>ออฟไลน์</option>
              <option value="1" <?php if($rs[0]->period_status == 1){echo 'selected';} ?>>ออนไลน์</option>
            </select>
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