<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Gallery <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idagenda <?php echo form_error('idagenda') ?></label>
            <input type="text" class="form-control" name="idagenda" id="idagenda" placeholder="Idagenda" value="<?php echo $idagenda; ?>" />
        </div>
	    <div class="form-group">
            <label for="gambar">Gambar <?php echo form_error('gambar') ?></label>
            <textarea class="form-control" rows="3" name="gambar" id="gambar" placeholder="Gambar"><?php echo $gambar; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Caption <?php echo form_error('caption') ?></label>
            <input type="text" class="form-control" name="caption" id="caption" placeholder="Caption" value="<?php echo $caption; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('gallery') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>