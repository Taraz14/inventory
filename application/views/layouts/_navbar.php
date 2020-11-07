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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url('0/profile');?>" class="nav-link <?= ($sesi == 'profile') || ($sesi == 'update-profile')  ? 'active' : ''?>">Profile</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('sign-out')?>" role="button">
          <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->