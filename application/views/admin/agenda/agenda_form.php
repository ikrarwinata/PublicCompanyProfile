
        
        <?php echo(form_open_multipart($action)) ?>
            <div class="row">
                <div class="col-lg-10">
                    <div class="form-group">
                        <label for="varchar">Judul Agenda <?php echo form_error('judul') ?></label>
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Agenda Kegiatan" value="<?php echo $ajudul; ?>" required="true"/>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="varchar">Tampilkan Publik</label>
                        <input type="checkbox" id="tampilkan" name="tampilkan" value="tampilkan" class="form-control" checked>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="int">Tempat <?php echo form_error('tempat') ?></label>
                        <input type="text" maxlength="150" class="form-control" name="tempat" id="tempat" placeholder="Tempat kegiatan" value="<?php echo $tempat; ?>" required="true"/>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="int">Tanggal <?php echo form_error('tanggal') ?></label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?php echo $tanggal.'/'.$bulan.'/'.$tahun; ?>" required="true" />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="exampleInputFile">Gambar</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="hidden" name="oldgambar" value="<?php echo $gambar ?>">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label">Pilih Gambar</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
                        <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
                    </div>
                </div>
            </div>

    	    <div class="row">
                <div class="col-lg-12">
                    <fieldset style="background-color: #eeeeee;">
                        <legend style="background-color: gray; color: white; padding: 5px 10px;">Dokumentasi</legend>
                        <div>
                            <div class="row statis-gallery">
                                <div class="col-lg-6 col-md-6 col-sm-4 col-xs-6">
                                    <div class="form-group">
                                        <input type="text" maxlength="100" class="form-control" name="caption[]" placeholder="Caption gallery" value="" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="gallery[]">
                                                <label class="custom-file-label">Pilih Gambar Dokumentasi</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" >Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                </div>
                            </div>
                        </div>
                        <div id="dinamis-gallery-container">
                            <?php for ($i=0; $i < count($gallery); $i++) { ?>
                                <div class="row statis-gallery">
                                    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-6">
                                        <div class="form-group">
                                            <input type="text" maxlength="100" class="form-control" name="oldcaption[]" placeholder="Caption gallery" value="<?php echo $gallery[$i]->caption ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
                                        <div class="form-group">
                                            <div class="center text-center">
                                                <input type="hidden" class="custom-file-input" name="oldgallery[]" value="<?php echo $gallery[0]->gambar ?>">
                                                <img src="<?php echo $gallery[$i]->gambar ?>" style="width: auto; height: 150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <button type="button" class="btn btn-danger del-btn" onclick="return sub_me(this)" ><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-success" id="add-gallery"><i class="fa fa-plus"></i>&nbsp;Tambahkan Foto</button>
                        </div>
                    </fieldset> 
                </div>
            </div>
            <hr>
    	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary">Simpan</button> 
    	    <button type="button" class="btn btn-default" onclick="window.history.go(-1)">Batalkan</button> 
    	</form>