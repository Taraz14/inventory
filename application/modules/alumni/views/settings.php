<style>
    .atur{
        color : black !important;
    }
</style>
<section class="content">
  <div class="card card-dark">
    <div class="card-header">
      <h3 class="card-title"><i class="fa fa-cog"></i> Pengaturan</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php if(!empty($this->session->flashdata('message'))) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php } ?>

      <div class="card-body">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <a href="<?= site_url('1/pengaturan/password');?>" class="atur">
                    <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-user-lock"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Ubah Password</span>
                    </div>
                    </div>
                </a>
            </div>

          </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        
      </div>
      <!-- /.card-footer -->
  </div>
  <!-- /.card -->
</section>