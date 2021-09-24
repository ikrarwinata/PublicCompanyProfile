<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Agenda List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Judul</th>
		<th>Deskripsi</th>
		<th>Tanggal</th>
		<th>Bulan</th>
		<th>Tahun</th>
		<th>Gambar</th>
		<th>Gallery</th>
		<th>Kategori</th>
		<th>Kodetamu</th>
		<th>Userpost</th>
		<th>Tampilkan</th>
		
            </tr><?php
            foreach ($agenda_data as $agenda)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $agenda->judul ?></td>
		      <td><?php echo $agenda->deskripsi ?></td>
		      <td><?php echo $agenda->tanggal ?></td>
		      <td><?php echo $agenda->bulan ?></td>
		      <td><?php echo $agenda->tahun ?></td>
		      <td><?php echo $agenda->gambar ?></td>
		      <td><?php echo $agenda->gallery ?></td>
		      <td><?php echo $agenda->kategori ?></td>
		      <td><?php echo $agenda->kodetamu ?></td>
		      <td><?php echo $agenda->userpost ?></td>
		      <td><?php echo $agenda->tampilkan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>