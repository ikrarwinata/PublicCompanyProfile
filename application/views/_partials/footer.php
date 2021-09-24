
    <footer class="footer">
			<div class="container-fluid px-lg-5">
				<div class="row">
					<div class="col-md-9 py-5">
						<div class="row">
							<div class="col-md-12 mb-md-0 mb-12">
								<h2 class="footer-heading">Tentang Kami</h2>
								<p><?php echo $this->db->select("profil_values")->where("profil_name", "tentang")->get("profil")->row()->profil_values ?></p>
								<ul class="ftco-footer-social p-0">
		              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
		              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
		              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
		            </ul>
							</div>
						</div>
						<div class="row mt-md-5">
							<div class="col-md-12">
								<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					  Copyright &copy;ISS Indonesia <script>document.write(new Date().getFullYear());</script> All rights reserved.
							</div>
						</div>
					</div>
					<div class="col-md-3 py-md-5 py-4 aside-stretch-right pl-lg-5">
						<h2 class="footer-heading">Hubungi Kami</h2>
						<form action="Welcome/komentar" class="form-consultation" method="post">
			              <div class="form-group">
			                <input type="text" class="form-control" placeholder="Nama Anda" required="true" name="nama">
			              </div>
			              <div class="form-group">
			                <input type="text" class="form-control" placeholder="Email" required="true" name="email">
			              </div>
			              <div class="form-group">
			                <input type="text" class="form-control" placeholder="Subject" required="true" name="subject">
			              </div>
			              <div class="form-group">
			                <textarea id="" cols="30" rows="3" class="form-control" placeholder="Message" required="true" name="pesan"></textarea>
			              </div>
			              <div class="form-group">
			              	<button type="submit" class="form-control submit px-3">Kirim</button>
			              </div>
			            </form>
					</div>
				</div>
			</div>
		</footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>