
<div class="modal fade" id="modal-laporan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pilih Tahun</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="admin/Agenda/print_y" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <div class="col-4">
              Pilih Tahun
            </div>
            <div class="col-8">
              <select name="year" class="form-control">
                <?php for ($i=2015; $i < (date("Y")+1); $i++) { ?>
                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default modal-dismiss" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="row">

  <div class="col-12">
    <ul>
      <li><a href="admin/Agenda/print_all" target="_blank">Rekapitulasi Semua Agenda Kegiatan</a></li>
      <li><a href="admin/Agenda/print_mnt" target="_blank">Rekapitulasi Agenda Kegiatan Bulan Ini</a></li>
      <li><a href="#" data-toggle="modal" data-target="#modal-laporan" >Rekapitulasi per Tahun</a></li>
    </ul>
  </div>

</div>