<section class="content">

<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $countAlumni;?> Orang</h3>

                <p>Data Alumni</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="<?= site_url('0/alumni');?>" class="small-box-footer">
                Lebih Lanjut <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $countGambar?> Foto</h3>

                <p>Total Foto Galeri</p>
              </div>
              <div class="icon">
                <i class="fas fa-image"></i>
              </div>
              <a href="<?= site_url('0/galeri')?>" class="small-box-footer">
                Lebih Lanjut <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $countBerita?> Berita</h3>

                <p>Total Berita</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="<?= site_url('0/berita')?>" class="small-box-footer">
                Lebih Lanjut <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        
    <div class="col-md-12">
        <div class="card card-light">
            <marquee><h1 class="text-center">SELAMAT DATANG DI WEB ALUMNI SD NEGERI 1 KOTA SORONG</h1></marquee>
        </div>
    </div>

    

    <div class="card-header text-center">
      <a href="<?= site_url();?>" class="h1"><img src="<?= base_url('assets/dist/img/logo.svg')?>" style="width:25%"></a>
    </div>
  
</section>