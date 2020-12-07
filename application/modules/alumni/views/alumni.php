<style>
    a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
}

</style>

<section class="content">
    <?php if(!empty($this->session->flashdata('message'))) { ?>
      <div class="alert alert-light alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php } ?>

  <div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">Data Alumni Se - Angkatan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered nowrap" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="2%">No.</th>
                        <th width="">Nama</th>
                        <th width="">NISN</th>
                        <th width="">TTL</th>
                        <th width="5%">Gender</th>
                        <th width="20%">Alamat</th>
                        <th width="">No.Hp</th>
                        <th width="">Email</th>
                        <th width="">Tahun Lulus</th>
                        <!-- <th width="">Aksi</th> -->
                    </tr>
                    </thead>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($alumni as $val) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $val->userName.' '.$val->userLastName; ?></td>
                            <td><?= $val->userNisn; ?></td>
                            <td><?= $val->userBirthPlace.', '.date("d-m-Y", strtotime($val->userBirthDate)); ?></td>
                            <td><?= $val->genderName; ?></td>
                            <td><?= $val->userAddress; ?></td>
                            <td><?= $val->userPhone; ?></td>
                            <td><?= $val->userEmail; ?></td>
                            <td><?= $val->userYears == NULL ? "-" : $val->userYears; ?></td>
                           
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
  <!-- /.card -->
</section>
<script>
    window.onload = () => {
        var siteUrl = "<?= site_url() ?>";
        $('#dataTable').DataTable({
            "scrollX" : true
        });
    }
</script>