<section class="content">
<div class="card card-light">
    <div class="card-header">
        <h2 class=""><?= $news->judul?> | <small class="text-red"><?= $news->slug?></small></h2>
        <span class="time"><i class="fas fa-user"></i> <?= $news->userName?></span>,
        <span class="time"><i class="fas fa-calendar-day"></i> <?= date("d-M-Y", $news->createdAt)?> </span>,
        <span class="time"><i class="fas fa-clock"></i> <?= date("H:i", $news->createdAt)?></span>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="container-fluid">
            <?= $news->isiBerita;?>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn btn-danger text-white" href="<?= site_url('1/berita')?>"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    </div>
</div>
</section>