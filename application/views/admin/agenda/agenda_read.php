
        <table class="table">
		    <tr><td>Judul Kegiatan</td><td><?php echo $ajudul; ?></td></tr>
		    <tr><td>Tempat</td><td><?php echo $tempat; ?></td></tr>
		    <tr><td>Tanggal</td><td><?php echo (get_day($tanggal."-".$bulan."-".$tahun).", ".$tanggal."-".get_str_month($bulan)."-".$tahun); ?></td></tr>
		    <tr><td colspan="2" class="center text-center"><img src="<?php echo $gambar; ?>" style="width: 50%; height: auto"></td></tr>
		    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
		    <tr><td><button type="button" class="btn btn-default" onclick="window.history.go(-1)">Kembali</button></td><td><a href="admin/Agenda/printexec/<?php echo $id ?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;Print</a></td></tr>
		</table>