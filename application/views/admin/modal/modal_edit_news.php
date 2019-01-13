<script>


</script>
<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">
          แก้ไขข่าวประชาสัมพันธ์
          </a>
        </h4>
      </div>
      <div class="modal-body">
        
        <form class="frm" method="post" action="<?=site_url('admin/save_news')?>" enctype="multipart/form-data">
          <input type="hidden" name="action" value="edit">
          <input type="hidden" name="news_id" value="<?=$rs[0]->news_id?>">
          <?php if($rs[0]->news_picture != ''){ ?>
            <div>
              <label>รูปภาพเดิม</label>
              <img src="<?=base_url('uploadFile/news/'.$rs[0]->news_picture)?>" style="width: 200px; display: block;">
            </div>
          <?php } ?>
          <div>
            <label>รูปภาพ</label>
            <input type="file" name="news_picture" class="form-control" accept="image/*">
            <input type="hidden" name="old_news_picture" value="<?=$rs[0]->news_picture?>">
          </div>
          <div>
            <label>หัวข้อข่าว*</label>
            <input type="text" name="news_topic" class="form-control" required="" value="<?=$rs[0]->news_topic?>">
          </div>
          <div>
            <label>รายละเอียดข่าว*</label>
            <textarea name="news_detail" class="form-control" rows="7" required=""><?=$rs[0]->news_detail?></textarea>
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