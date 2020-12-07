<section class="content">
  <div class="card card-light">
    <div class="card-header">
      <h3 class="card-title"><i class="fa fa-newspaper"></i> Buat Berita Baru</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?= form_open_multipart(''); ?>
    <?php if(!empty($this->session->flashdata('message'))) { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php } ?>

      <div class="card-body">
        <div class="form-group row">
          <label for="judul" class="col-sm-2 col-form-label">Judul Berita</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Berita">
            <?= form_error('judul', '<small class="text-danger">','</small>'); ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="slug" class="col-sm-2 col-form-label">Slug</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug">
            <?= form_error('slug', '<small class="text-danger">','</small>'); ?>
          </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
          <div class="col-sm-10">
            <textarea class="form-control" name="berita" id="berita" style="height: 500px"></textarea>
            <?= form_error('berita', '<small class="text-danger">','</small>'); ?>
          </div>
        </div>

      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-dark float-right"><i class="fa fa-paper-plane"></i> Upload</button>
      </div>
      <!-- /.card-footer -->
    <?= form_close();?>
  </div>
  <!-- /.card -->
</section>
<script>
  window.onload = () => {
    $(function () {
        //Add text editor
        $('#berita').summernote()
    });
  }
</script>