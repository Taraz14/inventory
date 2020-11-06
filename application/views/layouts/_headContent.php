<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $head;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php
                if($this->session->roleName == "Admin"){
                  $link = site_url('0/dashboard');
                }else{
                  $link = site_url('1/dashboard');
                }
              ?>
              <li class="breadcrumb-item"><a href="<?= $link; ?>">Dashboard</a></li>
              <?php if($this->uri->segment(2) == 'dashboard') { 
                echo '';
               }else{ ?>
                  <li class="breadcrumb-item active"><?= $breadcrumb;?></li>
                <?php } ?>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->