    <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                <small>Ubah <?php echo $profil_name ?> Perusahaan</small>
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
                <form action="<?php echo $action; ?>" method="post">                    
                    <div class="mb-3">
                        <textarea class="textarea" name="profil_values" placeholder="Ketik teks disini" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" cols="5"> <?php echo $profil_values ?></textarea>
                    </div>
                    <input type="hidden" name="profil_name" value="<?php echo $profil_name; ?>" /> 
                    <button type="submit" class="btn btn-primary">Simpan</button> 
                    <a href="<?php echo site_url('admin/Profil') ?>" class="btn btn-default">Batal</a>
                </form>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>