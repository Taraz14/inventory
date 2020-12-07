<?php
  $sesi = $this->uri->segment(2);
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark <?= ($this->session->roleName == "Admin") ? "navbar-cyan" : "navbar-gray-dark"; ?>">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <?php if($this->session->roleName == "Admin") {?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-sign-out-alt"></i> 
          Menu
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?= site_url('0/profile');?>" class="dropdown-item"><i class="fa fa-user-alt"></i> Profile</a>
          
          <div class="dropdown-divider"></div>
          
          <a href="<?= site_url('0/pengaturan');?>" class="dropdown-item"><i class="fa fa-cog"></i> Pengaturan</a>

          <div class="dropdown-divider"></div>
          
          <a href="<?= site_url('sign-out')?>" class="dropdown-item dropdown-footer" role="button"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> Keluar</a>
          
        </div>
      </li>
    </ul>

    <?php } if($this->session->roleName == "Alumni") {?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-sign-out-alt"></i> 
          Menu
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?= site_url('1/profile');?>" class="dropdown-item"><i class="fa fa-user-alt"></i> Profile</a>
          
          <div class="dropdown-divider"></div>
          
          <a href="<?= site_url('1/pengaturan');?>" class="dropdown-item"><i class="fa fa-cog"></i> Pengaturan</a>

          <div class="dropdown-divider"></div>
          
          <a href="<?= site_url('sign-out')?>" class="dropdown-item dropdown-footer" role="button"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> Keluar</a>
          
        </div>
      </li>
    </ul>

    <?php } ?>
  </nav>
  <!-- /.navbar -->