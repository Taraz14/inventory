<section class="content">
    <!-- galeri -->
    <div class="col-12">
        <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title">Foto-foto Alumni</h4>
        </div>
        <div class="card-body">
            <div id="reloadGaleri">
            
            <div class="mb-2">
                <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Tampilkan Acak </a>
            </div>
            </div>
            <div>
            <div class="filter-container p-0 row">
                <?php foreach($gambar as $val) :?>
                <div class="filtr-item col-sm-2" data-category="<?= $val->categoryId?>" data-sort="white sample">
                    <a href="<?= site_url('assets/img/galeri/'.$val->foto)?>" data-toggle="lightbox" data-footer="" data-gallery="galeri" data-max-width="600" data-type="image">
                        <img src="<?= base_url('assets/img/galeri/'.$val->foto)?>" class="img-fluid mb-2" style="max-width:80%" alt="white sample"/>
                    </a>
                </div>
                <?php endforeach;?>
                
            </div>
            </div>

        </div>
        </div>
    </div>
</section>
<script>
    window.onload = () => {
        $(function () {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                alwaysShowClose: false,
                onShown: function(elem) {
                    console.log('Checking our the events huh?');
                },
                onNavigate: function(direction, itemIndex){
                    console.log('Navigating '+direction+'. Current item: '+itemIndex);
                }
                });
            });

            $('.filter-container').filterizr({gutterPixels: 3});
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        });
    }
</script>