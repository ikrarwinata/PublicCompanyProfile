    <div class="row">
      <div class="col-lg-12 center text-center">
        <h6 class="text-danger"><?php echo $this->session->userdata("message") ?></h6>
      </div>
    </div>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">

              <div class="row">
                <div class="col-12">
                    <?php foreach ($profil_data as $key => $value): ?>
                        <h4><?php echo str_sentence($value->profil_name) ?></h4>
                        <div class="post">
                          <!-- /.user-block -->
                          <?php echo $value->profil_values ?>

                          <p>
                            <a href="admin/profil/update/<?php echo $value->profil_name ?>" class="link-black text-sm"><i class="fas fa-edit mr-1"></i> Ubah</a>
                          </p>
                        </div>
                    <?php endforeach ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->