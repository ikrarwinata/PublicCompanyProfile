<!doctype html>
<html>
    <head>
        <title>5H0UT5</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Gallery List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('gallery/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('gallery/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('gallery'); ?>" class="btn btn-default">Reset</a>
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
			<table class="table" style="width: 100%; border-collapse: collapse;table-layout: auto;">
				<thead>
				<tr>
					<th>No</th>
		<th>Idagenda</th>
		<th>Gambar</th>
		<th>Caption</th>
		<th>Action</th>
				</tr>
				</thead>
				<tbody><?php
				foreach ($gallery_data as $gallery)
				{
					?>
					<tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $gallery->idagenda ?></td>
			<td><?php echo $gallery->gambar ?></td>
			<td><?php echo $gallery->caption ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('gallery/read/'.$gallery->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('gallery/update/'.$gallery->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('gallery/delete/'.$gallery->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
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
		<?php echo anchor(site_url('gallery/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('gallery/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>