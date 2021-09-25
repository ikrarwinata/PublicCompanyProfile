<section class="hero-wrap hero-wrap-2" style="background-image: url('assets/public_home/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end">
			<div class="col-md-9 ftco-animate pb-5">
				<p class="breadcrumbs mb-2"><span class="mr-2"><a href="Welcome/index">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Kontak Kami <i class="ion-ios-arrow-forward"></i></span></p>
				<h1 class="mb-0 bread">Kontak Kami</h1>
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
					<span class="subheading">
						<h2>kontak yang dapat anda hubungi</h2>
					</span>
					<?php echo $this->db->select("profil_values")->where("profil_name", "kontak")->get("profil")->row()->profil_values ?>
					<i class="fa fa-envelope fa-lg text-primary"></i>&nbsp;<?php echo $this->db->select("profil_values")->where("profil_name", "email")->get("profil")->row()->profil_values ?>
					<br>
					<i class="fa fa-map-marker fa-lg text-primary"></i>&nbsp;<?php echo $this->db->select("profil_values")->where("profil_name", "alamat")->get("profil")->row()->profil_values ?>
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
						<span>Instansi Terdaftar</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>