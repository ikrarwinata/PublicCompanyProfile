<!DOCTYPE html>
<html>
<head>
	<title>Detail Agenda</title>
    <base href="<?php echo base_url() ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    
    <?php 
    $defaultbootstrap = array(
      'assets/public_home/font-awesome/4.5.0/css/font-awesome.min.css',
      'assets/public_home/css/animate.css',
      'assets/public_home/css/magnific-popup.css',
      'assets/public_home/css/flaticon.css',
      'assets/public_home/css/style.css',
    );
     ?>

     <?php foreach ($defaultbootstrap as $key => $ds): ?>
        <link rel="stylesheet" href="<?php echo $ds ?>"> 
     <?php endforeach ?>

    <?php if (isset($bootstrap)): ?>
      <?php if (count($bootstrap)>=1): ?>
        <?php foreach ($bootstrap as $key => $value): ?>
          <?php if (array_search($value, $defaultbootstrap)===FALSE): ?>
            <link rel="stylesheet" href="<?php echo $value ?>"> 
          <?php endif ?>
        <?php endforeach ?>
      <?php endif ?>
    <?php endif ?>
</head>
<body>
	<div class="container">
		<div class="row" style="padding-top: 30px">
			<div class="col-lg-12 center text-center">
				<img src="assets/img/logo.png" style="top: 40px; left: 100px; position: fixed; width: 110px; height: auto">
				<h1>ISS Indonesia</h1>
				<small>Jln. Untung Suropati, Kecamatan Jelutung, Kota Jambi</small>
				<hr>
			</div>
		</div>
		<div class="row" style="padding-top: 30px">
			<div class="col-lg-12 center text-center">
				<h3>Agenda Kegiatan</h3>
			</div>
		</div>
		<div class="row" style="padding-top: 30px">
			<div class="col-lg-8">
				
			</div>
			<div class="col-lg-4 right text-right">
				Tanggal Cetak : <strong> <?php echo (get_day(date("d-m-Y")).", ".date("d")."-".get_str_month(date("m"))."-".date("Y")) ?></strong>
			</div>
		</div>
		<div class="row" style="padding-top: 30px">
			<div class="col-lg-12">
				<table class="table">
				    <tr><td>Judul Kegiatan</td><td><?php echo $ajudul; ?></td></tr>
				    <tr><td>Tempat</td><td><?php echo $tempat; ?></td></tr>
				    <tr><td>Tanggal</td><td><?php echo (get_day($tanggal."-".$bulan."-".$tahun).", ".$tanggal."-".get_str_month($bulan)."-".$tahun); ?></td></tr>
				    <tr><td colspan="2" class="center text-center"><img src="<?php echo $gambar; ?>" style="width: 50%; height: auto"></td></tr>
				    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
				</table>
			</div>
		</div>

    <div class="row" style="margin-top: 120px">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 center text-center">
        <hr style="border: 1px solid black;margin-top: 120px">
        Ketua
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        
      </div>
    </div>
	</div>
    <?php 
    $defaultjs = array(
      'assets/public_home/js/jquery.min.js',
      'assets/public_home/js/jquery-migrate-3.0.1.min.js',
      'assets/public_home/js/popper.min.js',
      'assets/public_home/js/bootstrap.min.js',
      'assets/public_home/js/jquery.easing.1.3.js',
      'assets/public_home/js/jquery.waypoints.min.js',
      'assets/public_home/js/jquery.stellar.min.js',
      'assets/public_home/js/jquery.animateNumber.min.js',
      'assets/public_home/js/owl.carousel.min.js',
      'assets/public_home/js/jquery.magnific-popup.min.js',
      'assets/public_home/js/scrollax.min.js',
      'assets/public_home/js/google-map.js',
      'assets/public_home/js/main.js',
    );
     ?>

     <?php foreach ($defaultjs as $key => $js): ?>
       <script src="<?php echo $js ?>"></script>
     <?php endforeach ?>
    
    <?php if (isset($script)): ?>
      <?php if (count($script)>=1): ?>
        <?php foreach ($script as $key => $s): ?>
          <?php if (array_search($s, $defaultjs)===FALSE): ?>
            <script src="<?php echo $s ?>"></script>
          <?php endif ?>
        <?php endforeach ?>
      <?php endif ?>
    <?php endif ?>

    <script type="text/javascript">window.print()</script>
</body>
</html>