<!-- Footer -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="copyright pull-none">

                                <?php
                                $info = $this->other->get_info_school();
                                ?>

                                <?=$info['website_footer']?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <ul class="float-right list-inline m-b-0 pull-none">
                                <li class="list-inline-item">
                                    <a href="<?=site_url('about')?>">เกี่ยวกับ</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="<?=site_url('help')?>">ช่วยเหลือ</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="<?=site_url('contact')?>">ติดต่อ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer -->