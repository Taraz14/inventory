<section class="content">
    <div class="container-fluid">

        <?php if (!empty($this->session->flashdata('message'))) { ?>
            <div class="alert alert-light alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <?= form_open_multipart('0/upload'); ?>
        <div class="card-body">
            <div class="form-group row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="foto">
                </div>
                <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="deskripsi" style="height: 100px"></textarea>
                </div>
                <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>

            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-dark float-right"><i class="fa fa-paper-plane"></i> Upload</button>
        </div>
        <!-- /.card-footer -->
        <?= form_close(); ?>
    </div>
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
                    <button type="button" id="<?= $val->galeriId ?>" class="btn btn-sm btn-default text-red deleteBtn"><i class="fa fa-trash"></i> Hapus</button>
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