<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <a href="<?= site_url('0/alumni')?>" class="btn btn-danger btn-block mb-3"><i class="fa fa-arrow-alt-circle-left"></i> Batal</a>

                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data <?= $userId->userName?></h3>
                </div>
                <div class="card-body p-3">

                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/dist/img/'.$userId->userImage)?>" alt="User profile picture" >
                </div>

                <h3 class="profile-username text-center"><?= $userId->userName?></h3>
                <p class="text-muted text-center">Alumni tahun : <?= $userId->userYears?></p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <?php echo form_open('0/send-email', ['method'=>'post', 'enctype'=>'multipart/form-data']) ?>
            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Email ke Alumni</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <input class="form-control" placeholder="To:" value="<?= $userId->userEmail?>" readonly>
                </div>
                <div class="form-group">
                  <input class="form-control" name="subject" placeholder="Subject:">
                </div>
                <div class="form-group">
                    <textarea id="pesan" name="pesan" class="form-control" style="height: 300px">
                      <h1><u>Halo, <?= $userId->userName?></u></h1>
                      <h4>Kami dari admin <?= $subheading;?></h4>
                      <ul>
                        <li>username anda : <?= $userId->userUsername?></li>
                        <li>Password anda : <?= $userId->userUsername?></li>
                      </ul>
                      <p>Silakan Login : <a href="http://localhost/inventory">http://localhost/inventory</a></p>
                      <p>Terimakasih,</p>
                      <p><?= $subheading;?></p>
                    </textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Lampiran
                    <input type="file" name="attachment">
                  </div>
                  <p class="help-block">Max. 32MB</p>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="submit" class="btn btn-success"><i class="far fa-envelope"></i> Kirim</button>
                </div>
                <!-- <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button> -->
              </div>
              <!-- /.card-footer -->
            </div>
            <?php echo form_close() ?>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<script>
    window.onload = () => {
        $(function () {
            //Add text editor
            $('#pesan').summernote()
        });


    }
</script>