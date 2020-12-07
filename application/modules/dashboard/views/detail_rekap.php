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
  <div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">Rekap Data Alumni</h3>
        <a href="<?= site_url('0/rekap')?>" class="btn btn-danger float-right text-white"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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
            "scrollX" : true,
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
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