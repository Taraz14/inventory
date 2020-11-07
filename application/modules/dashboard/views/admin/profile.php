    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('assets/dist/img/'.$userData['photo'])?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $userData['name']?></h3>

                <p class="text-muted text-center"><?= $userData['roleName']?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Username</b> <a class="float-right"><?= $userData['username']?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?= $userData['email']?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Alamat</b> <a class="float-right"><?= $userData['address']?></a>
                  </li>
                </ul>

                <a href="<?= site_url('0/update-profile')?>" class="btn btn-outline-warning btn-block"><b>Ubah Data</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
    </section>