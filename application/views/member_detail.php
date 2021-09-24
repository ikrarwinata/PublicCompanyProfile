    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('assets/public_home/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="Welcome/index">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Anggota Terdaftar <i class="ion-ios-arrow-forward"></i></span> <span>Detail Anggota <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Detail Anggota</h1>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row d-flex no-gutters">
          <div class="col-md-12 d-flex">
            <table class="table">
              <tr>
                  <td colspan="2" class="center text-center"><h3><strong><?php echo $perusahaan ?></strong></h3></td>
              </tr>
              <tr>
                  <td colspan="2" class="center text-center"><img src="<?php echo $foto ?>" style="width: auto; height: 220px"></td>
              </tr>
              <tr>
                  <td colspan="2" ><h6><strong>Info Profil Perusahaan</strong></h6></td>
              </tr>
              <tr><td>No. Anggota</td><td><?php echo $nomor; ?></td></tr>
              <tr><td>Nama Direktur</td><td><?php echo $nama; ?></td></tr>
              <tr><td>Alamat Domisili</td><td><?php echo $alamat; ?></td></tr>
              <tr><td>Wilayah</td><td><?php echo $wilayah; ?></td></tr>
              <tr><td>No. Telepon</td><td><?php echo $telepon; ?></td></tr>
              <tr><td>No. Fax</td><td><?php echo $fax; ?></td></tr>
              <tr><td>Email</td><td><?php echo $email; ?></td></tr>
              <tr><td>Website Perusahaan</td><td><a href="<?php echo $website; ?>"><?php echo $website; ?></a></td></tr>
              <tr><td colspan="2" class="center text-center"><button type="button" class="btn btn-md btn-success" onclick="window.history.go(-1)">Kembali</button></td></tr>
          </table>
          </div>
        </div>
      </div>
    </section>