<div class="container-fluid">

    <?php $this->load->view('admin/_partials/breadcrumb');?>
    
    <?php if ($this->session->flashdata('success')){ ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php }else if ($this->session->flashdata('error')){ ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php }?>

    <!-- DataTables -->
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <a href="<?php echo site_url('puskesmas/laporan') ?>"><i class="fas fa-angle-left"></i> Kembali</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Data Ibu Hamil</b></h4>
                </div>
            </div>

            
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="nama">Nama *</label>
                        <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
                            type="text" name="nama" placeholder="Nama Lengkap" value="<?= $ibuhamil->nama; ?>" readonly/>
                        <div class="invalid-feedback">
                            <?php echo form_error('nama') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan *</label>
                        <input class="form-control <?php echo form_error('pekerjaan') ? 'is-invalid':'' ?>"
                            type="text" name="pekerjaan" placeholder="Pekerjaan" value="<?= $ibuhamil->pekerjaan; ?>" readonly />
                        <div class="invalid-feedback">
                            <?php echo form_error('pekerjaan') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_suami">Suami *</label>
                        <input class="form-control <?php echo form_error('nama_suami') ? 'is-invalid':'' ?>"
                            type="text" name="nama_suami" placeholder="Nama Suami" value="<?= $ibuhamil->nama_suami; ?>" readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('nama_suami') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan_suami">Pekerjaan Suami *</label>
                        <input class="form-control <?php echo form_error('pekerjaan_suami') ? 'is-invalid':'' ?>"
                            type="text" name="pekerjaan_suami" placeholder="Pekerjaan Suami" value="<?= $ibuhamil->pekerjaan_suami; ?>"readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('pekerjaan_suami') ?>
                        </div>
                    </div>
                    
                </div>
                
                <div class="col">
                <div class="form-group">
                        <label for="umur">Umur *</label>
                        <input class="form-control <?php echo form_error('umur') ? 'is-invalid':'' ?>"
                            type="number" name="umur" placeholder="Umur" value="<?= $ibuhamil->umur; ?>" readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('umur') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat *</label>
                        <textarea class="form-control <?php echo form_error('umur') ? 'is-invalid':'' ?>" id="alamat" name="alamat" placeholder="Alamat Lengkap" rows="3" readonly><?= $ibuhamil->alamat; ?></textarea>
                        <div class="invalid-feedback">
                            <?php echo form_error('umur') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="umur">No Telepon *</label>
                        <input class="form-control <?php echo form_error('notelp') ? 'is-invalid':'' ?>"
                            type="text" name="notelp" placeholder="Nomor Telepon" value="<?= $ibuhamil->notelp; ?>" readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('notelp') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- card laporan detail pemeriksaan -->
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Detail Pemeriksaan</b></h4>
                </div>
            </div>

            
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Id Pemeriksaan</th>
                            <th>Nama</th>
                            <th>Pekerjaan</th>
                            <th style="text-align : center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pemeriksaans as $obj): ?>
                        <tr>
                            <td ><?= $no++;?></td>
                            <td >
                                <?= $obj->id_pemeriksaan;?>
                            </td>
                            <td >
                                <?= $obj->nama." ( ".$obj->umur." Tahun )";?>
                            </td>
                            <td>
                                <?= $obj->pekerjaan;?>
                            </td>
                            <td width="300" align="center">
                                <a onclick="detailConfirm('<?= $obj->id_pemeriksaan?>','<?= $obj->nama?>','<?= $obj->id_pasien?>','<?= $obj->id_petugas?>','<?= $obj->tgl_periksa?>','<?= $obj->gravida?>','<?= $obj->partes?>','<?= $obj->abortus?>','<?= $obj->jarak_kehamilan?>','<?= $obj->usia_kehamilan?>','<?= $obj->tinggi_badan?>','<?= $obj->lila?>','<?= $obj->sistol?>','<?= $obj->diastol?>','<?= $obj->tetanus_toksoid?>','<?= $obj->fe?>','<?= $obj->tfu?>','<?= $obj->letak_bayi?>','<?= $obj->hpht?>','<?= $obj->tp?>','<?= $obj->hb?>','<?= $obj->gol_dar?>','<?= $obj->namaobat?>','<?= $obj->tindakanmedis?>','<?= $obj->hbsag?>','<?= $obj->hiv?>','<?= $obj->sypilis?>','<?= $obj->pembayaran?>')" href="#" data-toggle="modal" data-target="#modalDetail" class="btn btn-small text-primary">
                                    <i class="fas fa-info"></i> Detail</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    <!-- end of card -->

</div>

<!-- Modal -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetailTitle">Detail Pemeriksaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color:#2980b9;">
      <div class="container-fluid">
<!-- DataTables -->
<div class="card mb-3">
    <div class="card-body" style="color: black">
        <div class="container">
            <div class="row">
                <hr>
                <div class="col">
                    <div class="form-group row">
                        <label for="jarak_kehamilan" class="col-sm-3 col-form-label">Id Pemeriksaan</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" id="id-pemeriksaan" value=""readonly>
                        </div>
                        <label for="jarak_kehamilan" class="col-sm-2 col-form-label">Nama Pasien</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" id="nama-pasien" value=""readonly>
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
                            <input type="number" class="form-control" id="id-pasien" name="id_pasien" placeholder="ID Pasien" readonly>
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
                            <input type="number" class="form-control" id="id-petugas" name="id_petugas" placeholder="ID Petugas" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tgl_periksa" class="col-sm-4 col-form-label">Tanggal Periksa</label>
                            <div class="col-sm-6">
                            <input type="date" class="form-control" id="tgl-periksa" name="tgl_periksa" placeholder="Tanggal Periksa" readonly>
                            </div>
                        </div>

                

                        <div class="form-group row">
                            <label for="gpa" class="col-sm-12 col-form-label">GPA (Gravida Partes Abortus)</label>
                            <div class="col-sm-4">
                            <input type="number" class="form-control" id="gravida" name="gravida" placeholder="Gravida" autofocus readonly>
                            </div>
                            <div class="col-sm-4">
                            <input type="number" class="form-control" id="partes" name="partes" placeholder="Partes" readonly>
                            </div>
                            <div class="col-sm-4">
                            <input type="number" class="form-control" id="abortus" name="abortus" placeholder="Abortus" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jarak_kehamilan" class="col-sm-4 col-form-label">Jarak Kehamilan</label>
                            <div class="col-sm-6">
                            <input type="number" class="form-control" id="jarak-kehamilan" name="jarak_kehamilan" placeholder="Jarak Kehamilan" readonly>
                            </div>
                            <label class="col-form-label">Bulan</label>
                        </div>
                        <div class="form-group row">
                            <label for="usia_kehamilan" class="col-sm-4 col-form-label">Usia Kehamilan</label>
                            <div class="col-sm-6">
                            <input type="number" class="form-control" id="usia-kehamilan" name="usia_kehamilan" placeholder="Usia Kehamilan" readonly>
                            </div>
                            <label class="col-form-label">Bulan</label>
                        </div>
                        <div class="form-group row">
                            <label for="tinggi_badan" class="col-sm-4 col-form-label">Tinggi Badan</label>
                            <div class="col-sm-6">
                            <input type="number" class="form-control" id="tinggi-badan" name="tinggi_badan" placeholder="Tinggi Badan" readonly>
                            </div>
                            <label class="col-form-label">CM</label>
                        </div>
                        <div class="form-group row">
                            <label for="lila" class="col-sm-4 col-form-label">LILA</label>
                            <div class="col-sm-6">
                            <input type="number" class="form-control" id="lila" name="lila" placeholder="Lingkar Lengan Atas" readonly>
                            </div>
                            <label class="col-form-label">CM</label>
                        </div>
                        <div class="form-group row">
                            <label for="tekanan_darah" class="col-sm-4 col-form-label">Tekanan Darah</label>
                            <div class="col-sm-3">
                            <input type="number" class="form-control" id="sistol" name="sistol" placeholder="Sistol" readonly> 
                            </div>
                            <label class="col-form-label">/</label>
                            <div class="col-sm-3">
                            <input type="number" class="form-control" id="diastol" name="diastol" placeholder="Diastol" readonly> 
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="tetanus_toksoid" class="col-sm-4 col-form-label">TT</label>
                            <div class="col-sm-8">
                            <input type="number" class="form-control" id="tetanus-toksoid" name="tetanus_toksoid" placeholder="Tetanus Toksoid" readonly>
                            </div>
                        </div>
                        
                        
                </div>
                <div class="col">
                        <br>
                        <div class="form-group row">
                            <label for="fe" class="col-sm-2 col-form-label">Fe</label>
                            <div class="col-sm-6">
                            <input type="number" class="form-control" id="fe" name="fe" placeholder="Zat Besi (Fe)" readonly>
                            </div>
                        </div>        
                        <div class="form-group row">
                            <label for="tfu" class="col-sm-2 col-form-label">TFU</label>
                            <div class="col-sm-6">
                            <input type="number" class="form-control" id="tfu" name="tfu" placeholder="Tinggi Fundus Uteri" readonly>
                            </div>
                            <label class="col-form-label">CM</label>
                        </div>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="letak_bayi">Letak Bayi</label>
                                </div>
                                <select class="custom-select" id="letak-bayi" name="letak_bayi" disabled>
                                    <option selected>Pilih letak bayi</option>
                                    <option value="Letak Kepala" id="letak-bayi-kepala">LKEP (Letak Kepala)</option>
                                    <option value="Letak Bokong" id="letak-bayi-bokong">LETBO (Letak Bokong)</option>
                                    <option value="Letak Lintang" id="letak-bayi-lintang">LETLI (Letak Lintang)</option>
                                </select>
                            </div>
                        <div class="form-group row">
                            <label for="hpht" class="col-sm-4 col-form-label">HPHT (Hari Pertama Haid Terakhir)</label>
                            <div class="col-sm-8" style="text-align: right">
                            <input type="date" class="form-control" id="hpht" name="hpht" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tp" class="col-sm-4 col-form-label">TP (Taksiran Persalinan)</label>
                            <div class="col-sm-8">
                            <input type="date" class="form-control" id="tp" name="tp" readonly>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="hb">HB </label>
                            </div>
                            <select class="custom-select" id="hb" name="hb" disabled>
                                <option selected>Pilih kondisi hb</option>
                                <option value="Rendah" id="hb-rendah">Rendah ( &lt; 10 gram &percnt; )</option>
                                <option value="Normal" id="hb-normal">Normal ( &gt; 11 gram &percnt; )</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="gol_dar">Gol. Darah</label>
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
                        </div>
                        <div class="form-group row">
                            <label for="namaobat" class="col-sm-4 col-form-label">Nama Obat</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="namaobat" name="namaobat" placeholder="Nama Obat" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tindakanmedis" class="col-sm-4 col-form-label">Tindakan Medis</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="tindakanmedis" name="tindakanmedis" placeholder="Tindakan Medis" readonly>
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
                                <label class="input-group-text" for="jenis_pembayaran">Jenis Pembayaran</label>
                            </div>
                            <select class="custom-select" id="pembayaran" name="pembayaran" disabled>
                                <option value="JAMSOSKES" id="pembayaran-jamsoskes">Jamsoskes</option>
                                <option value="BPJS" id="pembayaran-bpjs">BPJS</option>
                                <option value="Bayar"id="pembayaran-bayar">Bayar</option>
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


<script src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
<script>
function detailConfirm(id_pemeriksaan, nama,id_pasien,id_petugas, tgl_periksa, gravida, partes, abortus, jarak_kehamilan, usia_kehamilan, tinggi_badan, lila, sistol, diastol, tetanus_toksoid, fe, tfu, letak_bayi,  hpht, tp, hb, gol_dar, namaobat, tindakanmedis, hbsag,hiv,sypilis)
{

    $('#id-pemeriksaan').attr('value',id_pemeriksaan);
    $('#nama-pasien').attr('value',nama);
    $('#id-pasien').attr('value',id_pasien);
    // $('#id-reg').attr('value',id_reg);
    $('#id-petugas').attr('value',id_petugas);
    $('#tgl-periksa').attr('value',tgl_periksa);
    $('#gravida').attr('value',gravida);
    $('#partes').attr('value',partes);
    $('#abortus').attr('value',abortus);
    $('#jarak-kehamilan').attr('value',jarak_kehamilan);
    $('#usia-kehamilan').attr('value',usia_kehamilan);
    $('#tinggi-badan').attr('value',tinggi_badan);
    $('#lila').attr('value',lila);
    $('#sistol').attr('value',sistol);
    $('#diastol').attr('value',diastol);
    $('#tetanus-toksoid').attr('value',tetanus_toksoid);
    $('#fe').attr('value',fe);
    $('#tfu').attr('value',tfu);
    $('#namaobat').attr('value',namaobat);
    $('#tindakanmedis').attr('value',tindakanmedis);
    
    if(letak_bayi == 'Letak Kepala'){
        $('#letak-bayi-kepala').attr('selected','true');
    }else if(letak_bayi == 'Letak Bokong'){
        $('#letak-bayi-bokong').attr('selected','true');
    }else{
        $('#letak-bayi-lintang').attr('selected','true');
    }
    
    $('#hpht').attr('value',hpht);
    $('#tp').attr('value',tp);

    if(hb == 'Rendah'){
        $('#hb-rendah').attr('selected','true');    
    }else{
        $('#hb-normal').attr('selected','true');
    }
    
    if(gol_dar=='AB'){
        $('#gol-dar-ab').attr('selected','true');
    }else if(gol_dar=='A'){
        $('#gol-dar-a').attr('selected','true');
    }else if(gol_dar=='B'){
        $('#gol-dar-b').attr('selected','true');
    }else{
        $('#gol-dar-o').attr('selected','true');
    }
    
    if(hbsag=='Negatif'){
        $('#hbsag-negatif').attr('selected','true');
    }else{
        $('#hbsag-positif').attr('selected','true');
    }

    if(hiv=='Negatif'){
        $('#hiv-negatif').attr('selected','true');
    }else{
        $('#hiv-positif').attr('selected','true');
    }

    if(sypilis=='Negatif'){
        $('#sypilis-negatif').attr('selected','true');
    }else{
        $('#sypilis-positif').attr('selected','true');
    }

    if(pembayaran=='Jamsostek'){
        $('#pembayaran-jamsostek').attr('selected','true');
    }else if(pembayaran=='BPJS'){
        $('#pembayaran-bpjs').attr('selected','true');
    }else{
        $('#pembayaran-bayar').attr('selected','true');
    }

    $('#detailModal').modal();
}
</script>

<center>
<a class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Print</a>
</center>