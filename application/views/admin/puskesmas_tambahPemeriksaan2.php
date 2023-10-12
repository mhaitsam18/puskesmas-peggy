        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                            </div>
                            <div>Tambah Data Pemeriksaan Ibu Hamil</div>
                        </div>
                    </div>
                </div>
                <form action="<?=site_url('admin/puskesmas/add_pemeriksaan/' . $pemeriksaan->id_reg)?>" enctype="multipart/form-data" method="POST">
                    <div class="card-body" id="formPemeriksaan">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="alert alert-info" role="alert">
                                        Silahkan masukan data pemeriksaan
                                    </div>
                                </div>
                            </div>
                            <div class="row"><hr>
                                <div class="col">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="jarak_kehamilan" class="col-sm-4 col-form-label">Id Pemeriksaan</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="id_pemeriksaan" value="<?=$last_pemeriksaan['id_pemeriksaan'] + 1?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="jarak_kehamilan" class="col-sm-4 col-form-label">Nama Pasien</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nama" value="<?=$pemeriksaan_ibuhamil['nama']?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <hr>
                                <div class="col">
                                    <!-- <input type="hidden" name="id_pasien" value="<?=$pemeriksaan->id_pasien?>"> -->
                                    <!-- <div class="form-group row">
                                <label for="id_pasien" class="col-sm-6 col-form-label">ID Pasien</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" id="id_pasien" name="id_pasien" >
                                </div>
                            </div> -->

                                    <!-- <div class="form-group row">
                                <label for="id_reg" class="col-sm-6 col-form-label">ID Reg</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" id="id_reg" name="id_reg">
                                </div>
                            </div> -->
                                    <div class="form-group row">
                                        <label for="id_petugas" class="col-sm-6 col-form-label">ID Petugas</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="id_petugas" name="id_petugas" value="<?=$pemeriksaan_ibuhamil['id_petugas']?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_periksa" class="col-sm-6 col-form-label">Tanggal Periksa</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control" id="tgl_periksa" name="tgl_periksa" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="gpa" class="col-sm-5 col-form-label">GPA (Gravida Partes Abortus)</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="gravida" name="gravida"
                                                placeholder="G" autofocus required>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="partes" name="partes"
                                                placeholder="P" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="abortus" name="abortus"
                                                placeholder="A" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jarak_kehamilan" class="col-sm-4 col-form-label">Jarak Kehamilan</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" id="jarak_kehamilan"
                                                name="jarak_kehamilan" placeholder="Jarak Kehamilan" required>
                                        </div>
                                        <label class="col-form-label">Bulan</label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="usia_kehamilan" class="col-sm-4 col-form-label">Usia Kehamilan</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" id="usia_kehamilan"
                                                name="usia_kehamilan" placeholder="Usia Kehamilan" required>
                                        </div>
                                        <label class="col-form-label">Bulan</label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tinggi_badan" class="col-sm-4 col-form-label">Tinggi Badan</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" id="tinggi_badan"
                                                name="tinggi_badan" placeholder="Tinggi Badan" required>
                                        </div>
                                        <label class="col-form-label">CM</label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lila" class="col-sm-4 col-form-label">LILA</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" id="lila" name="lila"
                                                placeholder="Lingkar Lengan Atas" required>
                                        </div>
                                        <label class="col-form-label">CM</label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tekanan_darah" class="col-sm-4 col-form-label">Tekanan Darah</label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control" id="sistol" name="sistol"
                                                placeholder="Sistol" required>
                                        </div>
                                        <label class="col-form-label">/</label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control" id="diastol" name="diastol"
                                                placeholder="Diastol" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tetanus_toksoid" class="col-sm-4 col-form-label">TT</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="tetanus_toksoid"
                                                name="tetanus_toksoid" placeholder="Tetanus Toksoid" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="fe" class="col-sm-4 col-form-label">Fe</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="fe" name="fe"
                                                placeholder="Zat Besi (Fe)" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tfu" class="col-sm-2 col-form-label">TFU</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" id="tfu" name="tfu"
                                                placeholder="Tinggi Fundus Uteri" required>
                                        </div>
                                        <label class="col-form-label">CM</label>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="letak_bayi">Letak Bayi</label>
                                        </div>
                                        <select class="custom-select" id="letak-bayi" name="letak_bayi" required>
                                            <option selected>Pilih letak bayi</option>
                                            <?php foreach ($letakBayi as $item): ?>

                                            <option value="<?=$item->letakBayi?>"><?=$item->letakBayi?></option>

                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="detak_jantung" class="col-sm-6 col-form-label">Detak Jantung</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="detak_jantung"
                                                name="detak_jantung" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hpht" class="col-sm-6 col-form-label">HPHT (Hari Pertama Haid Terakhir)</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control" id="hpht" name="hpht" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tp" class="col-sm-6 col-form-label">TP (Taksiran Persalinan)</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control" id="tp" name="tp" required>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="hb">HB (Hemoglobin)</label>
                                        </div>
                                        <select class="custom-select" id="hb" name="hb" required>
                                            <option selected>Pilih kondisi hb</option>
                                            <?php foreach ($hb as $item): ?>
                                            <option value="<?=$item->kondisiHb?>"><?=$item->kondisiHb?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <!-- <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="gol_dar">Gologan Darah</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="gol_dar">
                                            <option selected>Pilih golongan darah</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div> -->

                                    <div class="form-group row">
                                        <label for="namaobat" class="col-sm-6 col-form-label">Nama Obat</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="namaobat" name="namaobat"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tindakanmedis" class="col-sm-6 col-form-label">Tindakan Medis</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="tindakanmedis"
                                                name="tindakanmedis" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_pasien" value="<?=$this->uri->segment(4)?>">

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10"></div>
                                <div class="col-sm-2">
                                    <input type="submit" class="btn btn-success" value="Lanjut">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
        </div>
        <!-- Modal -->
        <!-- modal diagnosa -->
        <!-- Modal -->
        <script src="<?=base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
        </div>
