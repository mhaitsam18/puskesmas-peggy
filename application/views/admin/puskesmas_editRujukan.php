<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Data Pasien Rujukan</div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <a href="<?php echo site_url('admin/puskesmas/pasienRujukan') ?>"><i class="fas fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="card-body" style="background-color:#fff; color: black">
            <form action="<?php echo site_url('admin/puskesmas/rujukan_edit_save/' . $pasienrujukan->id_rujukan) ?>"
                method="post">
                <input type="hidden" name="id_rujukan" value="<?=$pasienrujukan->id_rujukan;?>">
                <!-- <div class="form-group">
								<label for="id_rujukan">ID Rujukan *</label>
								<input class="form-control <?php echo form_error('id_rujukan') ? 'is-invalid' : '' ?>"
								 type="number" name="id_rujukan" placeholder="ID Rujukan" value="<?=$pasienrujukan->id_rujukan;?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nip') ?>
								</div>
							</div> -->

                <div class="form-group">
                    <label for="no_rujukan">Nomor Rujukan Pasien *</label>
                    <input class="form-control <?php echo form_error('no_rujukan') ? 'is-invalid' : '' ?>" type="text" name="no_rujukan" placeholder="Nomor Rujukan Pasien" value="<?=$pasienrujukan->no_rujukan;?>" required />
                    <div class="invalid-feedback">
                        <?php echo form_error('no_rujukan') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="puskesmas">Puskesmas *</label>
                    <input class="form-control <?php echo form_error('puskesmas') ? 'is-invalid' : '' ?>" type="text" name="puskesmas" placeholder="Nama Puskesmas" value="<?=$pasienrujukan->puskesmas;?>" required />
                    <div class="invalid-feedback">
                        <?php echo form_error('puskesmas') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="rumahsakit">Rumah Sakit Yang Dituju *</label>
                    <input class="form-control <?php echo form_error('rumahsakit') ? 'is-invalid' : '' ?>" type="text" name="rumahsakit" placeholder="Rumah Sakit Yang Dituju" value="<?=$pasienrujukan->rumahsakit;?>" required>
                    <div class="invalid-feedback">
                        <?php echo form_error('rumahsakit') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="kab_kota">Kabupaten/Kota *</label>
                    <input class="form-control <?php echo form_error('kab_kota') ? 'is-invalid' : '' ?>" type="text" name="kab_kota" placeholder="Kabupaten/Kota" value="<?=$pasienrujukan->kab_kota;?>" required>
                    <div class="invalid-feedback">
                        <?php echo form_error('kab_kota') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="poli">Poli Yang Dituju *</label>
                    <input class="form-control <?php echo form_error('poli') ? 'is-invalid' : '' ?>" type="text" name="poli" placeholder="Poli Yang Dituju" value="<?=$pasienrujukan->poli;?>" required>
                    <div class="invalid-feedback">
                        <?php echo form_error('poli') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="namapasien">Nama Pasien *</label>
                    <input class="form-control <?php echo form_error('namapasien') ? 'is-invalid' : '' ?>" type="text" name="namapasien" placeholder="Nama Pasien" value="<?=$pasienrujukan->namapasien;?>" required />
                    <div class="invalid-feedback">
                        <?php echo form_error('namapasien') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="umur">Umur *</label>
                    <input class="form-control <?php echo form_error('umur') ? 'is-invalid' : '' ?>" type="text" name="umur" placeholder="Umur" value="<?=$pasienrujukan->umur;?>" required>
                    <div class="invalid-feedback">
                        <?php echo form_error('umur') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat *</label>
                    <textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat" name="alamat" placeholder="Alamat" rows="3" required><?=$pasienrujukan->alamat;?></textarea>
                    <div class="invalid-feedback">
                        <?php echo form_error('alamat') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nopasien">No Pasien *</label>
                    <input class="form-control <?php echo form_error('nopasien') ? 'is-invalid' : '' ?>" type="text" name="nopasien" placeholder="No Pasien" value="<?=$pasienrujukan->nopasien;?>" required>
                    <div class="invalid-feedback">
                        <?php echo form_error('nopasien') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="diagnosa">Diagnosa Sementara *</label>
                    <input class="form-control <?php echo form_error('diagnosa') ? 'is-invalid' : '' ?>" type="text" name="diagnosa" placeholder="Diagnosa Sementara" value="<?=$pasienrujukan->diagnosa;?>" required>
                    <div class="invalid-feedback">
                        <?php echo form_error('diagnosa') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tgl_pembuatan">Tanggal Pembuatan Surat *</label>
                    <input class="form-control <?php echo form_error('tgl_pembuatan') ? 'is-invalid' : '' ?>" type="date" name="tgl_pembuatan" placeholder="Tanggal Pembuatan Surat" value="<?=$pasienrujukan->tgl_pembuatan;?>" required>
                    <div class="invalid-feedback">
                        <?php echo form_error('tgl_pembuatan') ?>
                    </div>
                </div>
                <input type="hidden" name="rujukan_dari" value="Puskesmas">
                <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
            </form>
        </div>

        <div c lass="card-footer small text-muted">
            *required fields
        </div>
    </div>
</div>
