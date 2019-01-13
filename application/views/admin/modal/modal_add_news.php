<script>


</script>
<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">
          เพิ่มข่าวประชาสัมพันธ์
          </a>
        </h4>
      </div>
      <div class="modal-body">
        
        <form class="frm" method="post" action="<?=site_url('admin/save_news')?>" enctype="multipart/form-data">
          <input type="hidden" name="action" value="add">
          <div>
            <label>รูปภาพ</label>
            <input type="file" name="news_picture" class="form-control" accept="image/*">
          </div>
          <div>
            <label>หัวข้อข่าว*</label>
            <input type="text" name="news_topic" class="form-control" required="">
          </div>
          <div>
            <label>รายละเอียดข่าว*</label>
            <textarea name="news_detail" class="form-control" rows="7" required=""></textarea>
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