<!DOCTYPE html>
<html>
<head>
    <?php 
    if($this->session->userdata(session_key())!=1){
        redirect("login");
    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ISS Indonesia :: Adminsitrator :: <?php echo str_sentence($judul) ?></title>
    <base href="<?php echo base_url() ?>">

    <?php 
    $defaultbootstrap = array(
      'assets/plugins/fontawesome-free/css/all.min.css',
      'assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
      'assets/css/adminlte.min.css',
      '',
    );
     ?>

     <?php foreach ($defaultbootstrap as $key => $ds): ?>
        <link rel="stylesheet" href="<?php echo $ds ?>"> 
     <?php endforeach ?>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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
<body class="">
<div class="wrapper">
  
    <div class="container">
        
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
                        <h3>Anggota Terdaftar</h3>
                    </div>
                </div>
                <div class="row" style="padding-top: 30px">
                    <div class="col-lg-8">
                        
                    </div>
                    <div class="col-lg-4 right text-right">
                        Tanggal Cetak : <strong> <?php echo (get_day(date("d-m-Y")).", ".date("d")."-".get_str_month(date("m"))."-".date("Y")) ?></strong>
                    </div>
                </div>


            <div class="container-fluid">
                <table class="table">
                    <tr>
                        <td colspan="2" class="center text-center"><h3><?php echo $perusahaan ?></h3></td>
                    </tr>
                    <tr>
                        <td colspan="2" ><h5><strong><?php echo str_sentence($level) ?></strong></h5></td>
                    </tr>
                    <tr><td>No. Anggota</td><td><?php echo $nomor; ?></td></tr>
                    <tr><td>Nama Direktur</td><td><?php echo $nama; ?></td></tr>
                    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
                    <tr><td>Alamat Domisili</td><td><?php echo $alamat; ?></td></tr>
                    <tr><td>Wilayah</td><td><?php echo $wilayah; ?></td></tr>
                    <tr><td>No. Telepon</td><td><?php echo $telepon; ?></td></tr>
                    <tr><td>No. Fax</td><td><?php echo $fax; ?></td></tr>
                    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
                    <tr><td>Website Perusahaan</td><td><a href="<?php echo $website; ?>"><?php echo $website; ?></a></td></tr>
                    <tr>
                        <td colspan="2" class="center text-center"><img src="<?php echo $foto ?>" style="width: auto; height: 220px"></td>
                    </tr>
                </table>

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

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    </div>

</div>
<!-- ./wrapper -->

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <?php 
    $defaultjs = array(
      'assets/plugins/jquery/jquery.min.js',
      'assets/plugins/bootstrap/js/bootstrap.bundle.min.js',
      'assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
      'assets/js/adminlte.js',
      'assets/plugins/jquery-mousewheel/jquery.mousewheel.js',
      'assets/plugins/raphael/raphael.min.js',
      'assets/plugins/jquery-mapael/jquery.mapael.min.js',
      'assets/plugins/jquery-mapael/maps/usa_states.min.js',
      'assets/js/pages/dashboard2.js',
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

    <?php 
    if (isset($inline_script)) {
      $this->load->view($inline_script.".php");
    }
     ?>
    <!-- OPTIONAL SCRIPTS -->
    <script src="assets/js/demo.js"></script>
    <script type="text/javascript">window.print()</script>
</body>
</html>