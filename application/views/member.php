    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('assets/public_home/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="Welcome/index">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Anggota Terdaftar <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Anggota</h1>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section bg-light">
      <div class="container">

            <div class="row" style="margin-bottom: 10px">
              <div class="col-md-4">
              </div>
              <div class="col-md-4 text-center">
              </div>
              <div class="col-md-1 text-right">
              </div>
              <div class="col-md-3 text-right">
                  <form action="<?php echo site_url('Welcome/anggota'); ?>" class="form-inline" method="get">
                      <div class="input-group">
                          <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                          <span class="input-group-btn">
                              <?php 
                                  if ($q <> '')
                                  {
                                      ?>
                                      <a href="<?php echo site_url('Welcome/anggota'); ?>" class="btn btn-default">Reset</a>
                                      <?php
                                  }
                              ?>
                            <button class="btn btn-primary form-control" type="submit">Cari</button>
                          </span>
                      </div>
                  </form>
              </div>
          </div>

        <div class="row d-flex no-gutters">
          <div class="col-md-12 d-flex">
            <div class="table">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Anggota</th>
                      <th>No. Anggota</th>
                      <th>Wilayah</th>
                    </tr>
                    <tbody>
                      <?php $oristart = $start; ?>
                      <?php foreach ($user_data as $key => $value): ?>
                      <tr>
                        <td><?php echo ++$start ?></td>
                        <td><a href="Welcome/member/<?php echo $value->username ?>"><?php echo $value->perusahaan ?></a></td>
                        <td><?php echo $value->nomor ?></td>
                        <td><?php echo $value->wilayah ?></td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                  <button type="button" class="btn btn-primary">Menampilkan : <?php echo min(++$oristart, $total_rows)." Hingga ". min($total_rows, $oristart+10) .", Dari Total ".$total_rows." Anggota" ?></button>
              </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>

      </div>
    </section>