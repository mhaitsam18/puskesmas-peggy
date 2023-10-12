<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Data Pencatatan Medis Posyandu</div>
                </div>
            </div>
        </div>
        <a href="<?=base_url('admin/posyandu/tambahPencatatan1')?>" class="btn btn-danger mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card-body" style="background-color:#2980b9; color: white">
            <form action="<?php echo site_url('admin/posyandu/addPencatatan_medis/') ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-info" role="alert">
                            Silahkan masukan data pencatatan
                        </div>
                    </div>
                </div><br>
                <div class="row"><hr>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="nama_bidan" class="col-sm-2 col-form-label">Wilayah</label>
                                    <div class="col">
                                        <select id="inputState" class="form-control" name="idWilayah">
                                            <?php foreach ($wilayah as $item): ?>
                                            <option value="<?=$item->id_wilayah?>"><?=$item->nama_wilayah?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"><hr>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="no_pasien" class="col-sm-3 col-form-label">No Pasien</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="no_pasien" value="<?=$pasien['no_pasien']?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Pasien</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Pasien" readonly value="<?=$pasien['nama_anak']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"><hr>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="nama_bidan" class="col-sm-2 col-form-label">Nama Bidan</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="nama_bidan" id="nama_bidan" placeholder="Masukan Nama Bidan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"><hr>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="nama_bidan" class="col-sm-2 col-form-label">Umur</label>
                                    <div class="col">
                                        <input type="number" class="form-control" name="umur" id="formGroupExampleInput" placeholder="Masukan Umur">
                                    </div>
                                    <label for="nama_bidan" class="col-sm-2 col-form-label">Bulan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"><hr>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="nama_bidan" class="col-sm-2 col-form-label">Kategori Usia</label>
                                    <div class="col">
                                        <select id="inputState" class="form-control" name="kategori">
                                            <?php foreach ($kat_usia as $item): ?>
                                            <option value="<?=$item->usia?>"><?=$item->usia?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"><hr>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="nama_bidan" class="col-sm-3 col-form-label">Tinggi Badan</label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="tinggi" id="formGroupExampleInput" placeholder="Masukan Tinggi Badan">
                                    </div>
                                    <label for="nama_bidan" class="col-sm-2 col-form-label">CM</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="nama_bidan" class="col-sm-3 col-form-label">Berat Badan</label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="bb" id="formGroupExampleInput" placeholder="Masukan Berat Badan">
                                    </div>
                                    <label for="nama_bidan" class="col-sm-2 col-form-label">KG</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"><hr>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="nama_bidan" class="col-sm-3 col-form-label">Temperatur</label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="temperatur" id="formGroupExampleInput" placeholder="Masukan Temperatur">
                                    </div>
                                    <label for="nama_bidan" class="col-sm-2 col-form-label">&deg;C</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="nama_bidan" class="col-sm-3 col-form-label">Lingkar Kepala</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="lingkar" id="formGroupExampleInput" placeholder="Masukan Lingkar Kepala">
                                    </div>
                                    <label for="nama_bidan" class="col-sm-2 col-form-label">CM</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"><hr>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="nama_bidan" class="col-sm-2 col-form-label">Jenis Imunisasi</label>
                                    <div class="col">
                                        <select id="inputState" class="form-control" name="jenis_imunisasi">
                                            <?php foreach ($imunisasi as $i): ?>
                                            <option value="<?=$i->imunisasi?>"><?=$i->imunisasi?></option>
                                            <?php endforeach?>
                                            <!-- <option value="5 tahun (DT)">5 tahun (DT)</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"><hr>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="nama_bidan" class="col-sm-2 col-form-label">Diagnosa</label>
                                    <div class="col">
                                        <input type="text" name="diagnosa" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukan Diagnosa">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"><hr>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="nama_bidan" class="col-sm-2 col-form-label">Penyuluhan</label>
                                    <div class="col">
                                        <input type="text" name="penyuluhan" class="form-control" id="formGroupExampleInput" placeholder="Masukan Penyuluhan">
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
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="nama_bidan" class="col-sm-2 col-form-label">Vitamin</label>
                                    <div class="col">
                                        <select id="inputState" name="vitamin" class="form-control">
                                            <?php foreach ($vitamin as $v): ?>
                                            <option value="<?=$v->vitamin?>"><?=$v->vitamin?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"><hr>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="nama_bidan" class="col-sm-2 col-form-label">Obat Cacing</label>
                                    <div class="col">
                                        <select id="inputState" class="form-control" name="obat"><?php foreach ($obat_cacing as $o): ?>
                                            <option value="<?=$o->obatCacing?>"> <?=$o->obatCacing?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"><hr>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="nama_bidan" class="col-sm-2 col-form-label">No Telpon Orang Tua</label>
                                    <div class="col">
                                        <input type="number" class="form-control" name="notelp" id="formGroupExampleInput" placeholder="Masukan No Telpon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input name="tgl_pencatatan" type="hidden" value="<?php echo gmdate("Y-m-d", time() + 60 * 60 * 7); ?>">
                <div class="form-group row mb-4 mb-sm-4">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="submit" class="btn btn-success btn-user btn-block form-control-user" name="btn" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>