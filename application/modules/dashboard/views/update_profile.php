    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
            <?= form_open_multipart(''); ?>

              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= (empty($this->session->photo)) ? base_url('assets/dist/img/nophoto.png') : base_url($this->session->userdata('photo')); ?>"
                       alt="User profile picture" alt="User profile picture" onClick="triggerClick()" style="cursor:pointer" id="profileDisplay">

                       <input type="file" name="userImage" onChange="displayImage(this)" id="userImage" class="form-control" style="display: none;" value="<?= $userData['photo']; ?>" accept="image/*">
                </div>

                <h3 class="profile-username text-center"><?= $userData['name']?></h3>

                <p class="text-muted text-center"><?= $userData['roleName']?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nama</b> <input type="text" class="form-control col-sm-6 float-right" name="userName" value="<?= $userData['name']?>">
                    <?= form_error('userName', '<small class="text-danger">','</small>'); ?>
                  </li>
                  <li class="list-group-item">
                    <b>Username</b> <input type="text" class="form-control col-sm-6 float-right" name="userUsername" value="<?= $userData['username']?>">
                  <?= form_error('userUsername', '<small class="text-danger">','</small>'); ?>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <input type="email" class="form-control col-sm-6 float-right" name="userEmail" value="<?= $userData['email']?>">
                    <?= form_error('userEmail', '<small class="text-danger">','</small>'); ?>

                  </li>
                  <li class="list-group-item">
                    <b>Alamat</b> <input type="text" class="form-control col-sm-6 float-right" name="userAddress" value="<?= $userData['address']?>">
                    <?= form_error('userAddress', '<small class="text-danger">','</small>'); ?>

                  </li>

                  <!-- <li class="list-group-item">
                        <b>Ubah Password</b> 
                        <div class="col-sm-3 float-right">
                            <input type="password" class="form-control" placeholder="password baru" value="">
                        </div>
                        <div class="col-sm-3 float-right">
                            <input type="password" class="form-control" placeholder="password lama" value="">
                        </div>
                    </li> -->
                </ul>

                <button class="btn btn-warning btn-block"><b>Simpan Perubahan</b></button>
              </div>
              <!-- /.card-body -->
            </div>
            <?= form_close();?>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
    </section>

<script type="text/javascript">
    function triggerClick(e) {
        document.querySelector('#userImage').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>

