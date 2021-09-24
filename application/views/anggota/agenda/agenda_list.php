
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
                <form action="<?php echo $ref; ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo $ref; ?>" class="btn btn-default">Reset</a>
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
		<th class="center text-center">Judul</th>
		<th class="center text-center">Deskripsi</th>
		<th class="center text-center">Tanggal</th>
		<th class="center text-center">Tampilkan di publik</th>
		<th class="center text-center"></th>
				</tr>
				</thead>
				<?php $oristart = $start; ?>
				<tbody>
					<?php
				foreach ($agenda_data as $agenda)
				{
					?>
					<tr>
						<td width="80px"><?php echo ++$start ?></td>
						<td><?php echo $agenda->judul ?></td>
						<td><?php echo str_shortened($agenda->deskripsi, 50) ?></td>
						<td><?php echo date("d-m-Y", $agenda->timestamps) ?></td>
						<td class="center text-center"><?php echo ($agenda->tampilkan?"Y":"T") ?></td>
						<td style="text-align:center" width="200px">
							<a href="anggota/Agenda/read/<?php echo $agenda->id ?>" class="btn btn-sm btn-default" title="Lihat detail agenda"><i class="fa fa-search"></i></a>
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
            	<button type="button" class="btn btn-primary">Menampilkan : <?php echo min(++$oristart, $total_rows)." Hingga ". min($total_rows, $oristart+10) .", Dari Total ".$total_rows." Agenda Kegiatan" ?></button>
	    	</div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>