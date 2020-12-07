<section class="content">
    <div class="container-fluid">
        <h5 class="mb-2">Data Alumni berdasarkan tahun</h5>
        <div class="row">
            <?php foreach($years as $val) :?>
            <div class="col-md-3 col-sm-6 col-12">
                <a href="<?= site_url('0/detail-rekap/'.$val->userYears)?>" class="link-black">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="far fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Alumni Tahun</span>
                            <span class="info-box-number"><?= $val->userYears?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
            </div>
            <!-- /.info-box -->
            <?php endforeach;?>
        </div>
    </div>
</section>
