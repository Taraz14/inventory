<style>
    .atur{
        color : black !important;
    }
</style>
<section class="content">
  <div class="card card-dark">
    <div class="card-header">
      <h3 class="card-title"><i class="fa fa-lock"></i> Password</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?= form_open_multipart(''); ?>
    <?php if(!empty($this->session->flashdata('message'))) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php } ?>

      <div class="card-body">
        <div class="form-group row">
            <label for="userPassword" class="col-sm-2 col-form-label">Password Baru</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="userPassword" id="userPassword">
                <?= form_error('pb', '<small class="text-danger">','</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
            <label for="confirmPassword" class="col-sm-2 col-form-label">Konfirmasi Password</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
                <?= form_error('confirmPassword', '<small class="text-danger">','</small>'); ?>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
      <a href='<?= site_url('1/pengaturan')?>' class="btn btn-outline-danger"><i class="fa fa-angle-left"></i> Kembali</a>
        <button type="submit" class="btn btn-outline-success float-right"><i class="fa fa-paper-plane"></i> Simpan</button>
      </div>
      <!-- /.card-footer -->
      <?= form_close();?>
  </div>
  <!-- /.card -->
</section>