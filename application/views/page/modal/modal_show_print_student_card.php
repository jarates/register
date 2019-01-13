<!-- Modal -->
<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">
          ประกาศ
        </h4>
      </div>
      <div class="modal-body">
        
        <table class="table table-striped table-bordered" style="font-size: 16px;">
          <tbody>
            <tr>
              <td width="35%" align="right">สิ่งที่จะได้รับ</td>
              <td width="70%"><?=$what_has_been?></td>
            </tr>
            <tr>
              <td width="35%" align="right">วันที่เปิดเรียน</td>
              <td width="70%"><?=$opening_date?></td>
            </tr>
            <tr>
              <td width="35%" align="right">วันที่รายงานตัว</td>
              <td width="70%"><?=$report_date ?></td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <a href="<?=site_url('report/print_card_student/'.$reg_id)?>" target="_blank" class="btn btn-info btn-lg">
                  <i class="fa fa-print" aria-hidden="true"></i> พิมพ์บัตรยืนยัน นศ.
                </a>
              </td>
            </tr>
          </tbody>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>