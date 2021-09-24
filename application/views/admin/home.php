<div class="row">

  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card card-primary card-outline">
          <div class="card-body">
            <h5 class="card-title">Selamat datang <?php echo $this->session->userdata("Nama") ?></h5>

            <p class="card-text">
              
            </p>
          </div>
        </div><!-- /.card -->
      </div>
    </div>
  </div>

  <div class="col-12">
    <div class="row">
      <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-gradient-info">
          <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Agenda Kegiatan</span>
            <span class="info-box-number"><?php echo $jumlah_agenda ?></span>

          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-gradient-success">
          <span class="info-box-icon"><i class="fa fa-check"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Agenda Sudah Lewat</span>
            <span class="info-box-number"><?php echo $jumlah_agenda_terlewati ?></span>

          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-gradient-warning">
          <span class="info-box-icon"><i class="fas fa-circle"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Agenda Akan Datang</span>
            <span class="info-box-number"><?php echo $jumlah_agenda_akandatang ?></span>

          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div>
  </div>

</div>

<div class="row">
  <!-- /.col -->
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-body p-0">
        <!-- THE CALENDAR -->
        <div id="calendar"></div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>