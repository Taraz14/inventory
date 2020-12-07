<?php
  $sessi = $this->uri->segment(2);
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-dark-red">
    <!-- Brand Logo -->
    <a href="<?= site_url('1/dashboard')?>" class="brand-link">
      <img src="<?= base_url()?>assets/dist/img/fav.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Alumni SD 1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url($this->session->userdata('photo')); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= site_url('1/dashboard')?>" class="d-block" data-toggle="tooltip" data-placement="right" title="Profil"><?= $this->session->userdata('username');?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Menu Utama</li>
          <li class="nav-item">
            <a href="<?= site_url('1/dashboard');?>" class="nav-link <?= $sessi == 'dashboard' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= site_url('1/alumni');?>" class="nav-link <?= ($sessi == 'alumni') || ($sessi == 'inputAlumni') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Alumni
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?= site_url('1/berita')?>" class="nav-link <?= ($sessi == 'berita') || ($sessi == 'berita-detail') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                berita
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('1/galeri')?>" class="nav-link <?= ($sessi == 'galeri') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Galeri
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  