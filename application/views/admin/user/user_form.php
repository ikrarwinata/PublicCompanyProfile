    <hr>    
    <div class="container">
        <?php echo(form_open_multipart($action, 'onsubmit="return validateform()"')) ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="varchar">Perusahaan <span class="text-danger"><small>*&nbsp;Diperlukan</small></span> <?php echo form_error('nama') ?></label>
                        <input type="text" class="form-control" name="perusahaan" id="perusahaan" maxlength="50" placeholder="Nama Perusahaan" value="<?php echo $perusahaan; ?>" required="true" />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="varchar">Direktur <span class="text-danger"><small>*&nbsp;Diperlukan</small></span> <?php echo form_error('nama') ?></label>
                        <input type="text" class="form-control" name="nama" id="nama" maxlength="50" placeholder="Nama Anggota" value="<?php echo $nama; ?>" required="true" />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="varchar">Username <span class="text-danger"><small>*&nbsp;Diperlukan</small></span> <?php echo form_error('username') ?></label>
                        <input type="text" class="form-control" maxlength="50" name="username" id="username" placeholder="Username Anggota" value="<?php echo $username; ?>" required="true" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                        <textarea class="form-control" name="alamat" rows="3"><?php echo $alamat ?></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="varchar">Foto</label>
                        <?php if (isset($foto) && $foto != NULL): ?>
                        <img src="<?php echo $foto ?>" class="form-control" style="width: auto; height: 50px" align="center">
                        <?php endif; ?>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="varchar">Wilayah <span class="text-danger"><small>*&nbsp;Diperlukan</small></span> <?php echo form_error('wilayah') ?></label>
                        <input type="text" maxlength="100" class="form-control" name="wilayah" required="true" id="wilayah" placeholder="Wilayah Perusahaan" value="<?php echo $wilayah; ?>" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="varchar">Password <span class="text-danger"><small>*&nbsp;Diperlukan</small></span> <?php echo form_error('password') ?></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" required="true" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="varchar">Konfirmasi Password <span class="text-danger"><small>*&nbsp;Diperlukan</small></span> <?php echo form_error('password') ?></label>
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Password" value="<?php echo $password; ?>" required="true" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="varchar">Email <?php echo form_error('email') ?></label>
                        <input type="mail" class="form-control" name="email" id="email" placeholder="Email Perusahaan" value="<?php echo $email; ?>" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="varchar">Fax <?php echo form_error('fax') ?></label>
                        <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax Perusahaan" value="<?php echo $fax; ?>" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="varchar">Telepon <?php echo form_error('telepon') ?></label>
                        <input type="tel" class="form-control" name="telepon" id="telepon" placeholder="Telepon Perusahaan" value="<?php echo $telepon; ?>" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="varchar">Website <?php echo form_error('website') ?></label>
                        <input type="text" class="form-control" name="website" id="website" placeholder="Website Perusahaan" value="<?php echo $website; ?>" />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="enum">Level <span class="text-danger"><small>*&nbsp;Diperlukan</small></span> <?php echo form_error('level') ?></label>
                <select name="level" class="form-control" required="true">
                    <option value="Anggota" <?php echo ($level=="Anggota"?"selected='true'":NULL) ?>>Anggota</option>
                    <option value="Admin" <?php echo ($level=="Admin"?"selected='true'":NULL) ?>>Admin</option>
                </select>
            </div>

            <input type="hidden" name="oldusername" value="<?php echo $username; ?>" /> 
            <input type="hidden"name="nomor" value="<?php echo $nomor; ?>" />
            <button type="submit" class="btn btn-primary" onclick="return validateform()"><?php echo $button ?></button>
            <button type="button" class="btn btn-default" onclick="window.history.go(-1)">Batalkan</button>
        </form>
    </div>