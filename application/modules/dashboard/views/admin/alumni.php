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
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php } ?>

  <div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">Data Alumni</h3>
        <button onclick="location.href='<?= site_url('0/inputAlumni');?>'" class="btn btn-outline-info btn-flat btn-sm" style="float:right"><i class="fa fa-plus"></i> Tambah</button>
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
                        <th width="">Aksi</th>
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
                            <td><?= $val->userYears == NULL ? "-" : date("M-Y", strtotime($val->userYears)); ?></td>
                            <td>
                                <button type="button" id="<?= $val->userId?>" class="btn btn-sm btn-default text-red deleteBtn"><i class="fa fa-trash"></i></button>
                                <a href="<?= site_url('0/update-alumni/'.$val->userId)?>" class="btn btn-sm btn-default text-yellow"><i class="fa fa-pen"></i></a>
                                <a href="https://wa.me/62<?= $val->userPhone?>?text=Username%20Anda%20:%20<?= $val->userNisn?>%0aPassword%20Anda%20:%20<?= $val->userNisn?>%0a%0aSD%201%20Kota%20Sorong%0ahttp://localhost/inventory/0/alumni" class="btn btn-sm btn-default text-success" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                <a href="<?= site_url('0/send-email')?>" class="btn btn-sm btn-default text-yellow"><i class="fa fa-envelope"></i></a>
                            </td>
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
        
        $(document).on('click', '.deleteBtn', function(e){
            e.preventDefault();
            var id = $(this).attr("id");
            if(id != ""){
                return deleteUser(id);
            }
            toastr.error('User tidak ditemukan!');
        });

        deleteUser = (id) => {
            Swal.fire({
                title : 'Apakah anda yakin menghapus alumni ini?',
                text : 'Jika sudah Terhapus, data tidak dapat dikembalikan!',
                icon : 'warning',
                showCancelButton : true,
                confirmButtonColor : 'btn-info',
                cancelButtonColor : 'btn-danger',
                confirmButtonText : 'Hapus'
            }).then((result) => {
                if(result.isConfirmed){
                    $.ajax({
                        url : siteUrl+'0/delete-alumni/' +id,
                        dataType: 'JSON',
                        method : 'GET',
                        success : function(callback){
                            Swal.fire(
                                'Dihapus!',
                                'Alumni Berhasil Dihapus',
                                'success'
                            ).then(function(){
                                location.reload();
                            });
                        }
                    })
                }
            })
        }

    }
</script>