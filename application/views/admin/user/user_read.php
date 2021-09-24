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
            <tr>
                <td colspan="2">
                    <button type="button" class="btn btn-md btn-default" onclick="window.history.go(-1)">Kembali</button>
                    <a href="admin/User/printexec/<?php echo $username ?>" target="_blank" class="btn btn-md btn-success"><i class="fa fa-print"></i>&nbsp;rint</a>
                </td>
            </tr>
        </table>
        
    </div>