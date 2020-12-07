<style>
    a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
}

  .timeline-body {
    text-overflow: ellipsis;
    overflow: hidden; 
    width: 700px; 
    height: 3.2em; 
    white-space: nowrap;
  }

  .timeline-body:before {
  /* content: ''; */
    display: inline-block;
    }

  /* .berita:after{
    content: "...";
    position: bottom;
    right: 0;
    top: 0;
    background-color: white;
    padding: 0 5px;
  } */
</style>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->

              <?php foreach($news as $val) :?>
              
              <div class="time-label">
                <span class="bg-red"><?= date("d-M-Y", $val->createdAt)?></span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> <?= date("H:i", $val->createdAt)?></span>
                  <h3 class="timeline-header"><a href="#"><?= $val->judul?></a> | <small><?= $val->slug?></small></h3>
                  

                  <div class="timeline-body">
                   <?= $val->isiBerita?>
                  </div>
                  <div class="timeline-footer">
                    <a href="<?= site_url('1/berita-detail/'.$val->beritaId)?>" class="btn btn-warning btn-sm">Selengkapnya</a>
                  </div>
                </div>

              </div>
            <?php endforeach; ?>
              <!-- END timeline item -->
              <!-- timeline item -->
              
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->

    </section>
    <!-- /.content -->