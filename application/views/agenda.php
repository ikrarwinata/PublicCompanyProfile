<section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
          	<?php
          	 $oristart = $start;
          	 $bulan = array('January', "February", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
          	?>

          		<?php foreach ($agenda_data as $key => $value): ?>
					<div class="cases-wrap d-md-flex align-items-center">
						<div class="img" style="background-image: url('<?php echo $value->gambar ?>');"></div>
						<div class="text pl-md-5">
							<span class="cat"><?php echo $value->tanggal." ".$bulan[$value->bulan]." ".$value->tahun ?></span>
							<h2><?php echo $value->judul ?></h2>
							<?php echo str_shortened($value->deskripsi, 280) ?>
							<p><a href="Welcome/detail_agenda/<?php echo $value->id ?>" class="btn btn-primary">Lihat</a></p>
						</div>
					</div>
          		<?php endforeach ?>

          		<hr>

				<div class="row mt-6">
		          <div class="col">
		            <div class="block-27">
		            	<button type="button" class="btn btn-primary">Menampilkan : <?php echo min(++$oristart, $total_rows)." Hingga ". min($total_rows, $oristart+10) .", Dari Total ".$total_rows." Agenda Kegiatan" ?></button>
		            </div>
		          </div>
		          <div class="col">
		            <div class="block-27">
		              <?php echo $pagination ?>
		            </div>
		          </div>
		        </div>

          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
            <div class="sidebar-box">
              <form action="Welcome/agenda" class="search-form" method="get">
                <div class="form-group">
                  <span class="fa fa-search"></span>
                  <input type="text" class="form-control" name="q" placeholder="Pencarian" value="<?php echo $q ?>">
                </div>
              </form>
            </div>

          </div>

        </div>
      </div>
    </section> <!-- .section -->