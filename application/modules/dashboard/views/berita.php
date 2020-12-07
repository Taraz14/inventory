<style>
    a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
}

  .berita {
    width: 200px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    position: relative;
  }

  .berita:after{
    content: "...";
    position: bottom;
    right: 0;
    top: 0;
    background-color: white;
    padding: 0 5px;
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
        <button onclick="location.href='<?= site_url('0/input-berita');?>'" class="btn btn-outline-info btn-flat btn-sm" style="float:right"><i class="fa fa-plus"></i> Tambah</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered nowrap" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="2%">No.</th>
                        <th width="">Judul</th>
                        <th width="">Slug</th>
                        <th width="">Konten</th>
                        <th width="5%">Tanggal Upload</th>
                        <th width="">Aksi</th>
                    </tr>
                    </thead>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($berita as $val) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $val->judul?></td>
                            <td><?= $val->slug; ?></td>
                            <td><div class="berita"><?= $val->isiBerita?></berita></td>
                            <td><?= date("d-m-Y H:i:s", $val->createdAt); ?></td>
                            <td>
                                <button type="button" id="<?= $val->beritaId?>" class="btn btn-sm btn-default text-red deleteBtn"><i class="fa fa-trash"></i></button>
                                <a href="<?= site_url('0/update-alumni/'.$val->beritaId)?>" class="btn btn-sm btn-default text-yellow"><i class="fa fa-pen"></i></a>
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
                return deleteBerita(id);
            }
            toastr.error('Berita tidak ditemukan!');
        });

        deleteBerita = (id) => {
            Swal.fire({
                title : 'Apakah anda yakin menghapus berita ini?',
                text : 'Jika sudah Terhapus, data tidak dapat dikembalikan!',
                icon : 'warning',
                showCancelButton : true,
                confirmButtonColor : 'btn-info',
                cancelButtonColor : 'btn-danger',
                confirmButtonText : 'Hapus'
            }).then((result) => {
                if(result.isConfirmed){
                    $.ajax({
                        url : siteUrl+'0/delete-berita/' +id,
                        dataType: 'JSON',
                        method : 'GET',
                        success : function(callback){
                            Swal.fire(
                                'Dihapus!',
                                'Berita Berhasil Dihapus',
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