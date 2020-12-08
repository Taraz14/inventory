<section class="content">
    <div class="container-fluid">


        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Foto-foto Alumni</h4>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="row">

                <?php foreach ($gambar as $val) : ?>
                    <div class="col-lg-6 mb-5">

                        <img class="img-fluid pad" src="<?= base_url($val->foto); ?>" alt="Photo" style="max-width:30%">
                        <p><?= $val->deskripsi ?></p>
                    </div>

                <?php endforeach; ?>
            </div>

        </div>

</section>

<script>
    window.onload = () => {
        var siteUrl = "<?= site_url() ?>";
        $('#dataTable').DataTable({
            "scrollX": true
        });

        $(document).on('click', '.deleteBtn', function(e) {
            e.preventDefault();
            var id = $(this).attr("id");
            if (id != "") {
                return deleteUser(id);
            }
            toastr.error('Foto tidak ditemukan!');
        });

        deleteUser = (id) => {
            Swal.fire({
                title: 'Apakah anda yakin menghapus foto ini?',
                text: 'Jika sudah Terhapus, data tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'btn-info',
                cancelButtonColor: 'btn-danger',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: siteUrl + '0/delete-foto/' + id,
                        dataType: 'JSON',
                        method: 'GET',
                        success: function(callback) {
                            Swal.fire(
                                'Dihapus!',
                                'Foto Berhasil Dihapus',
                                'success'
                            ).then(function() {
                                location.reload();
                            });
                        }
                    })
                }
            })
        }
    }
</script>