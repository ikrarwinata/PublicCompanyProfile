<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PT. ISS Indonesia :: <?php echo $judul ?></title>
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

    <?php $this->load->view("_partials/header") ?>
    
    <?php $this->load->view($konten) ?>

    <?php $this->load->view("_partials/footer") ?>

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
  </body>
</html>