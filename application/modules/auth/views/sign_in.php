<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventory | Log in</title>
  <link rel="icon" 
      type="image/png" 
      href="/inventory/favicon_ori.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-purple">
    
    <div class="card-header text-center">
      <a href="<?= site_url();?>" class="h1"><img src="<?= base_url('assets/dist/img/logo.png')?>" style="width:35%"></a>
    </div>
    <div class="card-body">
      <!-- <p class="login-box-msg">SD 1 Kota Sorong</p> -->
      <?php if(!empty($this->session->flashdata('message'))) { ?>
      <div class="text-sm text-center" style="color:red">
        <?= $this->session->flashdata('message'); ?>
      </div>
      <?php } ?>
      <?= form_open((!empty($r_dr)) ? 'auth?r_dr='.rawurlencode($r_dr) : ''); ?>
      <?= form_error('username', '<small class="text-danger">','</small>'); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <?= form_error('password', '<small class="text-danger">','</small>'); ?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-outline-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
        <br/>
      <?= form_close();?>
      <p class="mb-0">
        <a href="register.html" class="text-center">Daftar akun alumni</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url()?>assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/dist/js/adminlte.min.js"></script>
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.toastrDefaultError').click(function() {
      toastr.error('')
    });
  });
</script>
</body>
</html>
