        <div class="modal fade" id="modal-overlay">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="overlay d-flex justify-content-center align-items-center">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
              <h4 class="modal-title" id="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5 class="modal-title" id="modal-title2"></h5>
              <div id="modal-body"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/komentar/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/komentar'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
			<table class="table table-bordered" style="width: 100%; border-collapse: collapse;table-layout: auto;">
				<thead>
				<tr>
					<th align="center" style="text-align: center">#</th>
            		<th>Nama</th>
            		<th>Email</th>
            		<th>Subject</th>
            		<th>Pesan</th>
            		<th>Action</th>
				</tr>
				</thead>
				<tbody><?php
				foreach ($komentar_data as $komentar)
				{
					?>
					<tr>
            			<td align="center" style="text-align: center" width="40px"><?php echo ++$start ?></td>
            			<td><?php echo $komentar->nama ?></td>
            			<td><?php echo $komentar->email ?></td>
            			<td><?php echo $komentar->subject ?></td>
            			<td><?php echo str_shortened($komentar->pesan, 25) ?></td>
            			<td style="text-align:center" width="150px">
                            <button class="btn btn-sm btn-success modal-btn" title="Lihat" data-toggle="modal" data-target="#modal-overlay" aria-id="<?php echo $komentar->id ?>"><i class="fa fa-eye text-white"></i></button>
                            &nbsp;
                            <a href="admin/komentar/delete/<?php echo $komentar->id ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Anda yakin akan menghapus pesan ini ?')"><i class="fa fa-trash text-white"></i></a>
            			</td>
            		</tr>
					<?php
				}
				?>
				</tbody>
			</table>
		</div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total pesan masuk : <?php echo $total_rows ?></a>
        	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>