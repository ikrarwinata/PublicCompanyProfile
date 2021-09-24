
    <section class="hero-wrap hero-wrap-2" style="background-image: url('assets/public_home/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="Welcome/index">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Agenda Kegiatan <i class="ion-ios-arrow-forward"></i></span> <span>Detail Agenda <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread"><?php echo $ajudul ?></h1>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row d-flex no-gutters">
          <div class="col-md-6 d-flex">
            <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url('<?php echo $gambar ?>');">
            </div>
          </div>
          <div class="col-md-6 pl-md-5 py-md-5">
            <div class="heading-section pl-md-4 pt-md-5">
              <?php $sbulan = array('0', 'January', "February", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"); ?>
              <span class="subheading"><?php echo get_day($tanggal."-".$bulan."-".$tahun).", ".$tanggal." ".$sbulan[$bulan]." ".$tahun ?></span>
              <h2 class="mb-4"><?php echo $ajudul ?></h2>
              <?php echo $deskripsi ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row d-flex">
          <?php if (isset($gallery[0])): ?>
            
            <div class="heading-section">
              <h2 class="mb-3">Dokumentasi</h2>
            </div>
            <hr>
            <br>

            <div class="row">
            <?php $c = 1; ?>
            <?php foreach ($gallery as $key => $value): ?>
              <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                  <a href="<?php echo $value->gambar ?>" class="block-20 rounded" style="background-image: url('<?php echo $value->gambar ?>');">
                  </a>
                  <div class="text p-4">
                    <h3 class="heading"><?php echo isset($value->caption)?str_shortened($value->caption, 35):"Dokumentasi ".$c++ ?></h3>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
            </div>

          <?php endif ?>
        </div>
      </div>
    </section>