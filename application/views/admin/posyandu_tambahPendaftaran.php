<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Data Pendaftaran Posyandu</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <a href="<?=base_url('admin/posyandu/daftarPasien')?>" class="btn btn-danger mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Pendaftaran</h5>
                        <form class="" action="<?=base_url('admin/posyandu/add_data_pendaftar')?>" method="post">
                            <div class="card-body" style="background-color:#00b300; color: white">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="alert alert-info" role="alert">
                                                Silahkan masukan data pendaftaran
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row"> <hr>
                                        <div class="col">
                                            <div class="form-group row">
                                                <div class="col-sm-7">
                                                    <div class="form-group row">
                                                        <label for="no_pasien" class="col-sm-2 col-form-label">No Pasien</label>
                                                        <div class="col-sm-9">
                                                            <input name="no_pasien" <?php echo form_error('no_pasien') ? 'is-invalid' : '' ?> type="number" class="form-control" id="no_pasien" placeholder="No NIK/No BPJS/No KIS/No KMS" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group row">
                                                        <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                                                        <div class="col">
                                                            <input name="nama_ibu" type="text" class="form-control" id="nama_ibu" placeholder="Masukan Nama Ibu" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"><hr>
                                        <div class="col">
                                            <div class="form-group row">
                                                <div class="col-sm-7">
                                                    <div class="form-group row">
                                                        <label for="nama_anak" class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-9">
                                                            <input name="nama_anak" type="text" <?php echo form_error('nama_anak') ? 'is-invalid' : '' ?> class="form-control" id="nama_anak" placeholder="Masukan Nama" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group row">
                                                        <label for="p_ibu" class="col-sm-3 col-form-label">Pekerjaan Ibu</label>
                                                        <div class="col">
                                                            <input name="p_ibu" type="text" class="form-control" id="p_ibu" placeholder="Masukan Pekerjaan Ibu" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"><hr>
                                        <div class="col">
                                            <div class="form-group row">
                                                <div class="col-sm-7">
                                                    <div class="form-group row">
                                                        <label for="ttl" class="col-sm-2 col-form-label">TTL</label>
                                                        <div class="col-sm-4">
                                                            <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" placeholder="Tempat" required>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <input name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control" placeholder="Last name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group row">
                                                        <label for="p_ayah" class="col-sm-3 col-form-label" required>Nama Ayah</label>
                                                        <div class="col">
                                                            <input name="nama_ayah" type="text" class="form-control" id="nama_ayah" placeholder="Masukan Nama Ayah" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"><hr>
                                        <div class="col">
                                            <div class="form-group row">
                                                <div class="col-sm-7">
                                                    <div class="form-group row">
                                                        <label for="ttl" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                        <div class="col-sm-9">
                                                            <select name="jk" id="inputState" class="form-control">
                                                                <option value="Laki - Laki">Laki - Laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group row">
                                                        <label for="p_ayah" class="col-sm-3 col-form-label" required>Pekerjaan Ayah</label>
                                                        <div class="col">
                                                            <input name="p_ayah" type="text" class="form-control" id="p_ayah" placeholder="Masukan Pekerjaan Ayah" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"><hr>
                                        <div class="col">
                                            <div class="form-group row">
                                                <div class="col-sm-7">
                                                    <div class="form-group row">
                                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="alamat" class="form-control" id="alamat" rows="3" placeholder="Masukan Alamat" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group row">
                                                        <label for="tgl_daftar" class="col-sm-3 col-form-label">Tanggal Daftar</label>
                                                        <div class="col">
                                                            <input name="tgl_daftar" class="form-control" type="text" value="<?php echo gmdate("Y-m-d", time() + 60 * 60 * 7); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <hr>
                                        <div class="col">
                                            <div class="form-group row">
                                                <div class="col-sm-7">
                                                    <div class="form-group row">
                                                        <label for="alamat" class="col-sm-2 col-form-label">Wilayah</label>
                                                        <div class="col-sm-9">
                                                            <select class="custom-select" id="inputGroupSelect01" name="id_wilayah">
                                                                <option selected>Choose...</option>
                                                                <?php foreach ($wilayah as $w): ?>
                                                                <option value="<?=$w->id_wilayah?>"><?=$w->nama_wilayah?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <input type="submit" class="btn btn-info btn-user btn-block form-control-user" name="btn" value="Simpan">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>
