<style>
  .print {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
</style>
<section class="content">
  <div class="card card-cyan">
    <div class="card-header">
      <h3 class="card-title"><i class="fa fa-users"></i> Ubah Data Alumni</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?= form_open_multipart(''); ?>
    <?php if (!empty($this->session->flashdata('message'))) { ?>
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>
    <input type="hidden" class="form-control" name="userId" value="<?= $this->uri->segment(3); ?>">
    <div class="card-body">
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="userName" id="userName" value="<?= $user->userName; ?>">
          <?= form_error('userName', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="userLastName" id="userLastName" value="<?= $user->userLastName; ?>">
          <?= form_error('userLastName', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>

      <div class="form-group row">
        <label for="ttl" class="col-sm-2 col-form-label">Tempat/Tanggal Lahir</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="userBP" id="userBP" value="<?= $user->userBirthPlace; ?>">
          <?= form_error('userBP', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="col-sm-5">
          <div class="input-group date" id="userDateB" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" name="userDateB" data-target="#userDateB" value="<?= $user->userBirthDate; ?>" ignorereadonly>
            <div class="input-group-append" data-target="#userDateB" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
          </div>
          <?= form_error('userDateB', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>

      <div class="form-group row">
        <label for="userGender" class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-5">
          <select class="form-control" name="userGender">
            <option value="" selected hidden>--Pilih Jenis Kelamin--</option>
            <?php foreach ($gender as $val) : ?>
              <option value="<?= $val->genderId ?>" <?= ($val->genderId == $user->genderId) ? 'selected' : ''; ?>><?= $val->genderName; ?></option>
            <?php endforeach; ?>
          </select>
          <?= form_error('userGender', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>

      <div class="form-group row">
        <label for="userAlamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="userAlamat" id="userAlamat" value="<?= $user->userAddress; ?>">
          <?= form_error('userAlamat', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>

      <div class="form-group row">
        <label for="userEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="userEmail" id="userEmail" placeholder="contoh@gmail.com" value="<?= $user->userEmail; ?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="userPhone" class="col-sm-2 col-form-label">No. Telp</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="userPhone" id="userPhone" value="<?= $user->userPhone; ?>">
          <?= form_error('userPhone', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>

      <div class="form-group row">
        <label for="year" class="col-sm-2 col-form-label">Tahun Lulus</label>
        <div class="col-sm-5">
          <div class="input-group date" id="year" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" name="year" data-target="#year" value="<?= $user->userYears; ?>" ignorereadonly>
            <div class="input-group-append" data-target="#year" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
          </div>
          <?= form_error('year', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <a href='<?= site_url('0/alumni') ?>' class="btn btn-outline-danger"><i class="fa fa-angle-left"></i> Kembali</a>
      <button type="submit" class="btn btn-outline-success float-right"><i class="fa fa-paper-plane"></i> Simpan</button>
    </div>
    <!-- /.card-footer -->
    <?= form_close(); ?>
  </div>
  <!-- /.card -->
</section>
<script>
  window.onload = () => {
    $(function() {
      //TTL  
      $('#userDateB').datetimepicker({
        format: 'DD-MM-YYYY'
      });
      $('#userDateB').datetimepicker({
        useCurrent: false
      });
    });

    $(function() {
      //tahun lulus
      $('#year').datetimepicker({
        viewMode: 'years',
        format: 'MMMM YYYY'
      });
      $('#year').datetimepicker({
        useCurrent: false
      });
    });

    $("#userNisn").inputFilter(function(value) {
      return /^\d*$/.test(value) && (value === "" || parseInt(value.length) <= 10);
    });
  }
</script>