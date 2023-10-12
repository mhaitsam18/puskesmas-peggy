<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Petugas Posyandu</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <a href="<?=base_url('admin/puskesmas/dataPetugas')?>" class="btn btn-danger mb-2"><i
                        class="fas fa-arrow-left"></i> Kembali</a>
                <div class="main-card mb-3 card">
                    <div class="card-body"> <?=$this->session->userdata('pesan')?>
                        <h5 class="card-title">Ubah Data Petugas</h5>
                        <form class="" action="<?=base_url('admin/puskesmas/ubahPetugas')?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="id_petugas" value="<?=$petugas->id_petugas;?>">
                                <div class="form-group">
                                    <label for="id_petugas">ID Petugas *</label>
                                    <input class="form-control <?php echo form_error('id_petugas') ? 'is-invalid' : '' ?>" type="number" name="id_petugas" placeholder="ID Petugas" value="<?=$petugas->id_petugas;?>" readonly />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nip') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username *</label>
                                    <input class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>" type="email" name="username" placeholder="Username" value="<?=$petugas->username;?>" readonly />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('username') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama *</label>
                                    <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="nama" value="<?=$petugas->nama;?>" required>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto *</label>
                                        <!-- <textarea class="form-control <?php echo form_error('foto') ? 'is-invalid' : '' ?>"
                                            id="foto" name="foto"><?=$petugas->foto;?></textarea> -->
                                        <!-- <img src="" class="rounded-circle" alt="..."> -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="foto_lama" value="<?=$petugas->foto;?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('foto') ?>
                                    </div>
                                </div>
                                    <!-- <div class="form-group">
                                        <label for="password">Password *</label>
                                        <input
                                            class="form-control <?php echo form_error('nopasien') ? 'is-invalid' : '' ?>"
                                            type="password" name="password" placeholder="Password"
                                            value="<?=$petugas->password;?>">
                                        <div class="invalid-feedback">
                                            <?php echo form_error('password') ?>
                                        </div>
                                    </div> -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="pekerjaan_suami">Status Tempat</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="status">
                                        <option selected>Pilih Status</option>
                                        <option value="puskesmas" <?=$petugas->status == 'puskesmas' ? 'selected' : ''?>> Puskesmas </option>
                                        <option value="posyandu" <?=$petugas->status == 'posyandu' ? 'selected' : ''?>> Posyandu
                                        </option>
                                    </select>
                                </div>
                                <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                        </form>
                    </div>
                    <div class="card-footer small text-muted">
                        * required fields
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>