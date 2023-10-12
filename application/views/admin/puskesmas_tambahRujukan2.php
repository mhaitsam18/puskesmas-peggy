<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Data Pasien Rujukan</div>
                </div>
            </div>
        </div>
        <a href="<?=base_url('admin/puskesmas/tambahRujukan1')?>" class="btn btn-danger mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card-body" style="background-color:#2980b9; color: white">
            <form action="<?php echo site_url('admin/puskesmas/addRujukan/') ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col"></div>
                </div>
                <div class="card-body">
                    <div class="alert alert-info" role="alert">
                        Silahkan masukan data pasien rujukan
                    </div>


                    <!-- <div class="form-group">
                    <label for="id_rujukan">ID Rujukan*</label>
                    <input class="form-control <?php echo form_error('id_rujukan') ? 'is-invalid' : '' ?>"
                    type="number" name="id_rujukan" placeholder="ID Rujukan" required/>
                    <div class="invalid-feedback">
                        ID Rujukan harus di isi
                        <?php echo form_error('nip') ?>
                    </div>
                    <div class="valid-feedback">
                        Looks Good
                    </div>
                    </div> -->

                    <input name="rujukan_dari" type="hidden" value="Puskesmas">
                    <div class="form-group">
                        <label for="no_rujukan">Nomor Rujukan *</label>
                        <input class="form-control <?php echo form_error('no_rujukan') ? 'is-invalid' : '' ?>" type="number" name="no_rujukan" placeholder="no_rujukan" required>
                        <div class="invalid-feedback">
                            <?php echo form_error('no_rujukan') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="puskesmas">Puskesmas *</label>
                        <input class="form-control <?php echo form_error('puskesmas') ? 'is-invalid' : '' ?>" type="text" name="puskesmas" placeholder="Puskesmas" required>
                        <div class="invalid-feedback">
                            <?php echo form_error('puskesmas') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rumahsakit">Rumah Sakit *</label>
                            <input class="form-control <?php echo form_error('rumahsakit') ? 'is-invalid' : '' ?>" type="text" name="rumahsakit" placeholder="Rumah Sakit"></textarea>
                            <div class="invalid-feedback">
                                <?php echo form_error('rumahsakit') ?>
                            </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="kab_kota">KAB/KOTA *</label>
                        <input class="form-control <?php echo form_error('kab_kota') ? 'is-invalid' : '' ?>" type="text" name="kab_kota" placeholder="KAB/KOTA" required>
                        <div class="invalid-feedback">
                            <?php echo form_error('kab_kota') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="no_rujukan">POLI *</label>
                        <input class="form-control <?php echo form_error('poli') ? 'is-invalid' : '' ?>" type="text" name="poli" placeholder="Poli" required>
                        <div class="invalid-feedback">
                            <?php echo form_error('poli') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="namapasien">Nama Pasien *</label>
                        <input class="form-control <?php echo form_error('namapasien') ? 'is-invalid' : '' ?>" type="text" name="namapasien" placeholder="Nama Pasien" value="<?=$pencatatan['nama']?>" readonly />
                        <div class="invalid-feedback">
                            <?php echo form_error('namapasien') ?>
                        </div>
                        <div class="valid-feedback">
                            Looks Good
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="umur">Umur *</label>
                        <input class="form-control <?php echo form_error('umur') ? 'is-invalid' : '' ?>" type="text" name="umur" placeholder="Umur" value="<?=$pencatatan['umur']?> Bulan" readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('umur') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat *</label>
                        <textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat" name="alamat" placeholder="Alamat Lengkap" rows="3" readonly><?=$pencatatan['alamat']?></textarea>
                        <div class="invalid-feedback">
                            <?php echo form_error('alamat') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nopasien">ID Pasien *</label>
                        <input class="form-control <?php echo form_error('nopasien') ? 'is-invalid' : '' ?>" type="text" name="nopasien" placeholder="No Pasien" value="<?=$pencatatan['id_pasien']?>" readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('nopasien') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="diagnosa">Diagnosa *</label>
                        <input class="form-control <?php echo form_error('diagnosa') ? 'is-invalid' : '' ?>" type="text"
                            name="diagnosa" placeholder="Diagnosa" value="">
                        <div class="invalid-feedback">
                            <?php echo form_error('diagnosa') ?>
                        </div>
                    </div>
                    <input name="tgl_pembuatan" type="hidden"
                        value="<?php echo gmdate("Y-m-d", time() + 60 * 60 * 7); ?>">
                    <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
            </form>
        </div>
        <div c lass="card-footer small text-muted">
            *required fields
        </div>
    </div>
</div>
