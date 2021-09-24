    <div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="bg-wrap">
							<div class="row">
								<div class="col-md-6 d-flex align-items-center">
									<p class="mb-0 phone pl-md-2">
										<a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> <?php echo $this->db->select("profil_values")->where("profil_name", "telepon")->get("profil")->row()->profil_values ?></a> 
										<a href="#"><span class="fa fa-paper-plane mr-1"></span> <?php echo $this->db->select("profil_values")->where("profil_name", "email")->get("profil")->row()->profil_values ?></a>
									</p>
								</div>
								<div class="col-md-6 d-flex justify-content-md-end">
									<div class="social-media">
						    		<p class="mb-0 d-flex">
						    			
                      <a href="Welcome/login" class="d-flex align-items-center justify-content-center"><span class="fa fa-sign-in"><i class="sr-only">Login</i></span></a>
						    		</p>
					        </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="index.html">ISS Indonesia</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav m-auto">
	        	<li class="nav-item"><a href="Welcome/index" class="nav-link">Beranda</a></li>
	        	<li class="nav-item"><a href="Welcome/tentang" class="nav-link">Tentang</a></li>
	        	<li class="nav-item"><a href="Welcome/agenda" class="nav-link">Agenda Kegiatan</a></li>
		        <li class="nav-item"><a href="Welcome/anggota" class="nav-link">Anggota</a></li>
		        <li class="nav-item dropdown">
		        	<a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Persyaratan Anggota</a>
		        	<span class="caret"></span></button>
					  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
					    <li class="dropdown-item"><a href="Welcome/syarat_anggota" style="margin: 10px;color: black">Syarat Menjadi Anggota</a></li>
					    <li class="dropdown-item"><a href="Welcome/hak" style="margin: 10px;color: black">Hak & Kewajiban Anggota</a></li>
					    <li class="dropdown-item"><a href="Welcome/pembayaran" style="margin: 10px;color: black">Pembayaran Registrasi Anggota</a></li>
					  </ul>
		        </li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->