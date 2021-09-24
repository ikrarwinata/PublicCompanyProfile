
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/User/create'),'Tambah Akun', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url($ref); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url($ref); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
			<table class="table" style="width: 100%; border-collapse: collapse;table-layout: auto;">
				<thead>
				<tr>
					<th>#</th>
                    <th>Perusahaan</th>
            		<th>Direktur</th>
            		<th>Level</th>
            		<th>Email</th>
            		<th>Telepon</th>
            		<th></th>
				</tr>
				</thead>
				<tbody><?php
				foreach ($user_data as $user)
				{
					?>
					<tr>
            			<td width="40px"><?php echo ++$start ?></td>
            			<td><?php echo $user->perusahaan ?></td>
            			<td><?php echo $user->nama ?></td>
            			<td><?php echo $user->level ?></td>
            			<td><?php echo $user->email ?></td>
            			<td><?php echo $user->telepon ?></td>
            			<td style="text-align:center" width="200px">
                            <a href="admin/User/read/<?php echo $user->username ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="admin/User/update/<?php echo $user->username ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                            <a href="admin/User/delete/<?php echo $user->username ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash"></i></a>
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
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                <a href="admin/User/excel" class="btn btn-sm btn-success">Export Excel</a>
        	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>