
    <section class="hero-wrap hero-wrap-2" style="background-image: url('assets/public_home/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="Welcome/index">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Tentang Kami <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Tentang Kami</h1>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section ftco-no-pt bg-light">
      <div class="container">
        <div class="row d-flex no-gutters">
          <div class="col-md-6 d-flex">
            <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(assets/public_home/images/logo.png);">
            </div>
          </div>
          <div class="col-md-6 pl-md-5 py-md-5">
            <div class="heading-section pl-md-4 pt-md-5">
              <span class="subheading">Selamat Datang Di ISS Indonesia</span>
              <h2 class="mb-4">Tentang Kami</h2>
              <?php echo $this->db->select("profil_values")->where("profil_name", "tentang")->get("profil")->row()->profil_values ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-counter bg-light ftco-no-pt" id="section-counter">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-6 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="<?php echo $total_agenda ?>">0</strong>
              </div>
              <div class="text">
                <span>Agenda Kegiatan</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="<?php echo $total_anggota ?>">0</strong>
              </div>
              <div class="text">
                <span>Anggota Terdaftar</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt bg-light ftco-faqs">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="img-faqs w-100">
              <div class="img mb-4 mb-sm-0" style="background-image:url(assets/public_home/images/banner1.jpeg);">
              </div>
              <div class="img img-2 mb-4 mb-sm-0" style="background-image:url(assets/public_home/images/banner.jpeg);">
              </div>
            </div>
          </div>
          <div class="col-lg-6 pl-lg-5">
            <div class="heading-section mb-5 mt-5 mt-lg-0">
              <span class="subheading"></span>
              <h2 class="mb-3">ISS Indonesia</h2>
              
            </div>
            <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
              <div class="card">
                <div class="card-header p-0" id="headingOne">
                  <h2 class="mb-0">
                    <button href="#collapseOne" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                      <p class="mb-0">Sejarah</p>
                      <i class="fa" aria-hidden="true"></i>
                    </button>
                  </h2>
                </div>
                <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
                  <div class="card-body py-3 px-0">
                    <?php echo $this->db->select("profil_values")->where("profil_name", "sejarah")->get("profil")->row()->profil_values ?>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header p-0" id="headingTwo" role="tab">
                  <h2 class="mb-0">
                    <button href="#collapseTwo" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                      <p class="mb-0">Visi</p>
                      <i class="fa" aria-hidden="true"></i>
                    </button>
                  </h2>
                </div>
                <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="card-body py-3 px-0">
                    <?php echo $this->db->select("profil_values")->where("profil_name", "visi")->get("profil")->row()->profil_values ?>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header p-0" id="headingThree" role="tab">
                  <h2 class="mb-0">
                    <button href="#collapseThree" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                      <p class="mb-0">Misi</p>
                      <i class="fa" aria-hidden="true"></i>
                    </button>
                  </h2>
                </div>
                <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="card-body py-3 px-0">
                    <?php echo $this->db->select("profil_values")->where("profil_name", "misi")->get("profil")->row()->profil_values ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>