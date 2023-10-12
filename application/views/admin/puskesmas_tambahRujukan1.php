<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Daftar Pemeriksaan Ibu hamil</div>
                </div>
            </div>
        </div>
        <a href="<?=base_url('admin/puskesmas/kelolaKategori')?>" class="mb-2 mr-2 btn btn-primary">Kelola
            Kategori</a>
        <div class="row">
            <div class="col-sm">

                <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->

                <?=$this->session->flashdata('pesan')?>

                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <a class="btn btn-success mb-1" href="<?php echo base_url(
    'admin/puskesmas/tambahPemeriksaan1/'); ?>"><i class="fas fa-plus"></i> Tambah</a>
                        <!-- <a href="<?=base_url('admin/puskesmas/kelolaKategori')?>"
                            class="mb-2 mr-2 btn btn-primary">Kelola Kategori</a> -->
                        <table class="display" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Pemeriksaan</th>
                                    <th>Nama</th>
                                    <th>Pekerjaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
foreach ($pemeriksaans as $value) {
    $no++;?>
                                <tr>
                                    <td><?=$no;?></td>
                                    <td><?php echo $value->id_pemeriksaan; ?></td>
                                    <td><?=$value->nama . " ( " . $value->umur . " Tahun )";?></td>
                                    <td><?php echo $value->pekerjaan; ?></td>
                                    <td><a onclick="detailConfirm('<?=$value->id_pemeriksaan?>','<?=$value->nama?>','<?=$value->id_pasien?>','<?=$value->id_petugas?>','<?=$value->tgl_periksa?>','<?=$value->gravida?>','<?=$value->partes?>','<?=$value->abortus?>','<?=$value->jarak_kehamilan?>','<?=$value->usia_kehamilan?>','<?=$value->tinggi_badan?>','<?=$value->lila?>','<?=$value->sistol?>','<?=$value->diastol?>','<?=$value->tetanus_toksoid?>','<?=$value->fe?>','<?=$value->tfu?>','<?=$value->letak_bayi?>','<?=$value->detak_jantung?>','<?=$value->hpht?>','<?=$value->tp?>','<?=$value->hb?>','<?=$value->gol_dar?>','<?=$value->namaobat?>','<?=$value->tindakanmedis?>','<?=$value->hbsag?>','<?=$value->hiv?>','<?=$value->sypilis?>','<?=$value->pembayaran?>')"
                                            href="#" data-toggle="modal" data-target="#modalDetail"
                                            class="btn btn-small text-primary">
                                            <i class="fas fa-eye"></i> Detail</a>

                                        <a href="<?=base_url('admin/puskesmas/tambahRujukan2/' . $value->id_pemeriksaan)?>"
                                            class="text-success"><i class="fas fa-info"></i> Rujuk</a>


                                    </td>


                                </tr>

                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
            </script>
        </div>
    </div>
</div>
</div>

<!-- modal -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailTitle">Detail Pemeriksaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <!-- DataTables -->
                    <div class="card mb-3">
                        <div class="card-body" style="color: black">
                            <div class="container">
                                <div class="row">
                                    <hr>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="jarak_kehamilan" class="col-sm-3 col-form-label">Id
                                                Pemeriksaan</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="id-pemeriksaan" value=""
                                                    readonly>
                                            </div>
                                            <label for="jarak_kehamilan" class="col-sm-2 col-form-label">Nama
                                                Pasien</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="nama-pasien" value=""
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <hr>
                                    <div class="col">
                                        <input type="hidden" name="id_pasien" value="">


                                        <div class="form-group row">
                                            <label for="id_pasien" class="col-sm-4 col-form-label">ID Pasien</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="id-pasien"
                                                    name="id_pasien" placeholder="ID Pasien" readonly>
                                            </div>
                                        </div>


                                        <!-- <div class="form-group row">
                                <label for="id_reg" class="col-sm-4 col-form-label">ID Reg</label>
                                <div class="col-sm-6">
                                <input type="number" class="form-control" id="id-reg" name="id_reg" placeholder="ID Reg" readonly>
                                </div>
                            </div> -->

                                        <div class="form-group row">
                                            <label for="id_petugas" class="col-sm-4 col-form-label">ID Petugas</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="id-petugas"
                                                    name="id_petugas" placeholder="ID Petugas" readonly>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="tgl_periksa" class="col-sm-4 col-form-label">Tanggal
                                                Periksa</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" id="tgl-periksa"
                                                    name="tgl_periksa" placeholder="Tanggal Periksa" readonly>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="gpa" class="col-sm-12 col-form-label">GPA (Gravida Partes
                                                Abortus)</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="gravida" name="gravida"
                                                    placeholder="Gravida" autofocus readonly>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="partes" name="partes"
                                                    placeholder="Partes" readonly>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="abortus" name="abortus"
                                                    placeholder="Abortus" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jarak_kehamilan" class="col-sm-4 col-form-label">Jarak
                                                Kehamilan</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="jarak-kehamilan"
                                                    name="jarak_kehamilan" placeholder="Jarak Kehamilan" readonly>
                                            </div>
                                            <label class="col-form-label">Bulan</label>
                                        </div>
                                        <div class="form-group row">
                                            <label for="usia_kehamilan" class="col-sm-4 col-form-label">Usia
                                                Kehamilan</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="usia-kehamilan"
                                                    name="usia_kehamilan" placeholder="Usia Kehamilan" readonly>
                                            </div>
                                            <label class="col-form-label">Bulan</label>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tinggi_badan" class="col-sm-4 col-form-label">Tinggi
                                                Badan</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="tinggi-badan"
                                                    name="tinggi_badan" placeholder="Tinggi Badan" readonly>
                                            </div>
                                            <label class="col-form-label">CM</label>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lila" class="col-sm-4 col-form-label">LILA</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="lila" name="lila"
                                                    placeholder="Lingkar Lengan Atas" readonly>
                                            </div>
                                            <label class="col-form-label">CM</label>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tekanan_darah" class="col-sm-4 col-form-label">Tekanan
                                                Darah</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="sistol" name="sistol"
                                                    placeholder="Sistol" readonly>
                                            </div>
                                            <label class="col-form-label">/</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="diastol" name="diastol"
                                                    placeholder="Diastol" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="tetanus_toksoid" class="col-sm-4 col-form-label">TT</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="tetanus-toksoid"
                                                    name="tetanus_toksoid" placeholder="Tetanus Toksoid" readonly>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col">
                                        <br>
                                        <div class="form-group row">
                                            <label for="fe" class="col-sm-2 col-form-label">Fe</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="fe" name="fe"
                                                    placeholder="Zat Besi (Fe)" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tfu" class="col-sm-2 col-form-label">TFU</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="tfu" name="tfu"
                                                    placeholder="Tinggi Fundus Uteri" readonly>
                                            </div>
                                            <label class="col-form-label">CM</label>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="letak_bayi">Letak Bayi</label>
                                            </div>
                                            <select class="custom-select" id="letak-bayi" name="letak_bayi" disabled>
                                                <option selected>Pilih letak bayi</option>
                                                <option value="Letak Kepala" id="letak-bayi-kepala">LKEP (Letak Kepala)
                                                </option>
                                                <option value="Letak Bokong" id="letak-bayi-bokong">LETBO (Letak Bokong)
                                                </option>
                                                <option value="Letak Lintang" id="letak-bayi-lintang">LETLI (Letak
                                                    Lintang)</option>
                                            </select>
                                        </div>

                                        <div class="form-group row">
                                            <label for="detak_jantung" class="col-sm-4 col-form-label">Detak
                                                Jantung</label>
                                            <div class="col-sm-8" style="text-align: right">
                                                <input type="text" class="form-control" id="detak-jantung"
                                                    name="detak_jantung" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="hpht" class="col-sm-4 col-form-label">HPHT (Hari Pertama Haid
                                                Terakhir)</label>
                                            <div class="col-sm-8" style="text-align: right">
                                                <input type="date" class="form-control" id="hpht" name="hpht" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tp" class="col-sm-4 col-form-label">TP (Taksiran
                                                Persalinan)</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" id="tp" name="tp" readonly>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="hb">HB (Hemoglobin)</label>
                                            </div>
                                            <select class="custom-select" id="hb" name="hb" disabled>
                                                <option selected>Pilih kondisi hb</option>
                                                <option value="Rendah" id="hb-rendah">Rendah ( &lt; 10 gram &percnt; )
                                                </option>
                                                <option value="Normal" id="hb-normal">Normal ( &gt; 11 gram &percnt; )
                                                </option>
                                            </select>
                                        </div>
                                        <!-- <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="gol_dar">Gologan Darah</label>
                                </div>

                            <fieldset disabled="disabled">
                                <select class="custom-select" id="gol-dar" name="gol_dar" disabled>
                                    <option >Pilih golongan darah</option>
                                    <option value="A" id="gol-dar-a">A</option>
                                    <option value="B" id="gol-dar-b">B</option>
                                    <option value="AB" id="gol-dar-ab">AB</option>
                                    <option value="O" id="gol-dar-o">O</option>
                                </select>
                            </fieldset>
                        </div> -->
                                        <div class="form-group row">
                                            <label for="namaobat" class="col-sm-4 col-form-label">Nama Obat Yang
                                                Diberikan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="namaobat" name="namaobat"
                                                    placeholder="Nama Obat Yang Diberikan" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="tindakanmedis" class="col-sm-4 col-form-label">Tindakan Medis
                                                Yang DIberikan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="tindakanmedis"
                                                    name="tindakanmedis" placeholder="Tindakan Medis Yang Diberikan"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="hbsag">HBSAG</label>
                                            </div>
                                            <select class="custom-select" id="hbsag" name="hbsag" disabled>
                                                <option value="Negatif" id="hbsag-negatif">Negatif</option>
                                                <option value="Positif" id="hbsag-positif">Positif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="hiv">HIV</label>
                                            </div>
                                            <select class="custom-select" id="hiv" name="hiv" disabled>
                                                <option value="Negatif" id="hiv-negatif">Negatif</option>
                                                <option value="Positif" id="hiv-positif">Positif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="sypilis">Sypilis</label>
                                            </div>
                                            <select class="custom-select" id="sypilis" name="sypilis" disabled>
                                                <option value="Negatif" id="sypilis-negatif">Negatif</option>
                                                <option value="Positif" id="sypilis-positif">Positif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="jenis_pembayaran">Jenis
                                                    Pembayaran</label>
                                            </div>
                                            <select class="custom-select" id="pembayaran" name="pembayaran" disabled>
                                                <option value="JAMSOSKES" id="pembayaran-jamsoskes">Jamsoskes</option>
                                                <option value="BPJS" id="pembayaran-bpjs">BPJS</option>
                                                <option value="Bayar" id="pembayaran-bayar">Bayar</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?=base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
<script>
function detailConfirm(id_pemeriksaan, nama, id_pasien, id_petugas, tgl_periksa, gravida, partes, abortus,
    jarak_kehamilan, usia_kehamilan, tinggi_badan, lila, sistol, diastol, tetanus_toksoid, fe, tfu, letak_bayi,
    detak_jantung, hpht, tp, hb, gol_dar, namaobat, tindakanmedis, hbsag, hiv, sypilis, pembayaran) {
    // ,id_reg, id_petugas

    $('#id-pemeriksaan').attr('value', id_pemeriksaan);
    $('#nama-pasien').attr('value', nama);
    $('#id-pasien').attr('value', id_pasien);
    // $('#id-reg').attr('value',id_reg);
    $('#id-petugas').attr('value', id_petugas);
    $('#tgl-periksa').attr('value', tgl_periksa);
    $('#gravida').attr('value', gravida);
    $('#partes').attr('value', partes);
    $('#abortus').attr('value', abortus);
    $('#jarak-kehamilan').attr('value', jarak_kehamilan);
    $('#usia-kehamilan').attr('value', usia_kehamilan);
    $('#tinggi-badan').attr('value', tinggi_badan);
    $('#lila').attr('value', lila);
    $('#sistol').attr('value', sistol);
    $('#diastol').attr('value', diastol);
    $('#tetanus-toksoid').attr('value', tetanus_toksoid);
    $('#fe').attr('value', fe);
    $('#tfu').attr('value', tfu);
    $('#namaobat').attr('value', namaobat);
    $('#tindakanmedis').attr('value', tindakanmedis);

    if (letak_bayi == 'Letak Kepala') {
        $('#letak-bayi-kepala').attr('selected', 'true');
    } else if (letak_bayi == 'Letak Bokong') {
        $('#letak-bayi-bokong').attr('selected', 'true');
    } else {
        $('#letak-bayi-lintang').attr('selected', 'true');
    }
    $('#detak-jantung').attr('value', detak_jantung);
    $('#hpht').attr('value', hpht);
    $('#tp').attr('value', tp);

    if (hb == 'Rendah') {
        $('#hb-rendah').attr('selected', 'true');
    } else {
        $('#hb-normal').attr('selected', 'true');
    }

    if (gol_dar == 'AB') {
        $('#gol-dar-ab').attr('selected', 'true');
    } else if (gol_dar == 'A') {
        $('#gol-dar-a').attr('selected', 'true');
    } else if (gol_dar == 'B') {
        $('#gol-dar-b').attr('selected', 'true');
    } else {
        $('#gol-dar-o').attr('selected', 'true');
    }
    if (hbsag == 'Negatif') {
        $('#hbsag-negatif').attr('selected', 'true');
    } else {
        $('#hbsag-positif').attr('selected', 'true');
    }

    if (hiv == 'Negatif') {
        $('#hiv-negatif').attr('selected', 'true');
    } else {
        $('#hiv-positif').attr('selected', 'true');
    }

    if (sypilis == 'Negatif') {
        $('#sypilis-negatif').attr('selected', 'true');
    } else {
        $('#sypilis-positif').attr('selected', 'true');
    }

    if (pembayaran == 'Jamsoskes') {
        $('#pembayaran-jamsoskes').attr('selected', 'true');
    } else if (pembayaran == 'BPJS') {
        $('#pembayaran-bpjs').attr('selected', 'true');
    } else {
        $('#pembayaran-bayar').attr('selected', 'true');
    }

    $('#detailModal').modal();
}
</script>
