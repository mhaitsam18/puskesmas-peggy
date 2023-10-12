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
				<a href="<?php echo site_url('posyandu/Daftar/createPencatatan') ?>"><i class="fas fa-arrow-left"></i>Back</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Edit Pencatatan</b></h4>
                </div>
            </div>
<div class="card-body" style="background-color:#2980b9; color: white">
	<form action="<?php echo site_url('posyandu/Pencatatan/add') ?>" method="post" enctype="multipart/form-data">
		<div class="row">
            <div class="col">
                <div class="alert alert-info" role="alert">
                    Silahkan masukan data pencatatan
                </div>
            </div>
        </div><br>
		<div class="row">
            <hr>
            <div class="col">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="no_pasien" class="col-sm-3 col-form-label">Id Pencatatan</label>
                            <div class="col-md-8">
                            <input type="text" class="form-control" name="no_pasien" value="<?php echo $pencatatan->id_pencatatan?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Pasien</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Pasien" value="<?php echo $pencatatan->nama_anak ?>">
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
                            <label for="nama_bidan" class="col-sm-2 col-form-label">Nama Bidan</label>
                            <div class="col">
                            <input type="text" class="form-control" name="nama_bidan" id="nama_bidan" placeholder="Masukan Nama Bidan" value="<?php echo $pencatatan->nama_bidan ?>">
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
                            <label for="nama_bidan" class="col-sm-2 col-form-label">Umur</label>
                            <div class="col">
                            <input type="number" class="form-control" name="umur" id="formGroupExampleInput" placeholder="Masukan Umur" value="<?php echo $pencatatan->umur ?>">
                            </div>
                            <label for="nama_bidan" class="col-sm-2 col-form-label">Bulan</label>
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
                            <label for="nama_bidan" class="col-sm-2 col-form-label">Kategori Usia</label>
                            <div class="col">
                            	<select id="inputState" class="form-control" name="kategori">
							        <option <?php 
						            	if ($pencatatan->kategori  == 'Bayi (0-12 bln)') {
						            	echo "selected";
						            	} ?> value="Bayi (0-12 bln)">Bayi (0-12 bln)</option>
							        <option <?php 
						            	if ($pencatatan->kategori  == 'Batita (16-19 bln)') {
						            	echo "selected";
						            	} ?> value="Batita (16-19 bln)">Batita (16-19 bln)</option>
							        <option <?php 
						            	if ($pencatatan->kategori  == 'Balita (16-60 bln)') {
						            	echo "selected";
						            	} ?> value="Balita (16-60 bln)">Balita (16-60 bln)</option>
							      </select>
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
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="nama_bidan" class="col-sm-3 col-form-label">Tinggi Badan</label>
                            <div class="col-md-6">
                            	<input type="number" class="form-control" name="tinggi" id="formGroupExampleInput" placeholder="Masukan Tinggi Badan" value="<?php echo $pencatatan->tinggi ?>">
                            </div>
                            <label for="nama_bidan" class="col-sm-2 col-form-label">CM</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="nama_bidan" class="col-sm-3 col-form-label">Berat Badan</label>
                            <div class="col-md-6">
                            	<input type="number" class="form-control" name="bb" id="formGroupExampleInput" placeholder="Masukan Berat Badan" value="<?php echo $pencatatan->bb ?>">
                            </div>
                            <label for="nama_bidan" class="col-sm-2 col-form-label">KG</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
            <hr>
            <div class="col">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="nama_bidan" class="col-sm-3 col-form-label">Temperatur</label>
                            <div class="col-md-6">
                            	<input type="number" class="form-control" name="temperatur" id="formGroupExampleInput" placeholder="Masukan Temperatur" value="<?php echo $pencatatan->temperatur ?>"> 
                            </div>
                            <label for="nama_bidan" class="col-sm-2 col-form-label">&deg;C</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="nama_bidan" class="col-sm-3 col-form-label">Lingkar Kepala</label>
                            <div class="col-sm-6">
                            	<input type="number" class="form-control" name="lingkar" id="formGroupExampleInput" placeholder="Masukan Lingkar Kepala" value="<?php echo $pencatatan->lingkar ?>">
                            </div>
                            <label for="nama_bidan" class="col-sm-2 col-form-label">CM</label>
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
                            <label for="nama_bidan" class="col-sm-2 col-form-label">Jenis Imunisasi</label>
                            <div class="col">
                            	<select id="inputState" class="form-control" name="jenis_imunisasi">
							      	<option <?php 
						            	if ($pencatatan->jenis_imunisasi  == '0 - 7 hari (HBO)') {
						            	echo "selected";
						            	} ?> value="0 - 7 hari (HBO)">0 - 7 hari (HBO)</option>
							      	<option <?php 
						            	if ($pencatatan->jenis_imunisasi  == '1 bulan (BCG + Volio 1)') {
						            	echo "selected";
						            	} ?> value="1 bulan (BCG + Volio 1)">1 bulan (BCG + Volio 1)</option>
							      	<option <?php 
						            	if ($pencatatan->jenis_imunisasi  == '2 bulan (BPT1 +Volio2)') {
						            	echo "selected";
						            	} ?> value="2 bulan (BPT1 +Volio2)">2 bulan (BPT1 +Volio2)</option>
							      	<option <?php 
						            	if ($pencatatan->jenis_imunisasi  == '3 bulan (BPT2 +Volio3)') {
						            	echo "selected";
						            	} ?> value="3 bulan (BPT2 +Volio3)">3 bulan (BPT2 +Volio3)</option>
							      	<option <?php 
						            	if ($pencatatan->jenis_imunisasi  == '4 bulan (BPT3 +Volio4)') {
						            	echo "selected";
						            	} ?> value="4 bulan (BPT3 +Volio4)">4 bulan (BPT3 +Volio4)</option>
							      	<option <?php 
						            	if ($pencatatan->jenis_imunisasi  == '9 bulan (Campak)') {
						            	echo "selected";
						            	} ?> value="9 bulan (Campak)">9 bulan (Campak)</option>
							      	<option <?php 
						            	if ($pencatatan->jenis_imunisasi  == '18 bulan (Bostor BPT)') {
						            	echo "selected";
						            	} ?> value="18 bulan (Bostor BPT)">18 bulan (Bostor BPT)</option>
							      	<option <?php 
						            	if ($pencatatan->jenis_imunisasi  == '2 tahun (Bostor Campak)') {
						            	echo "selected";
						            	} ?> value="2 tahun (Bostor Campak)">2 tahun (Bostor Campak)</option>
							      	<option <?php 
						            	if ($pencatatan->jenis_imunisasi  == '5 tahun (DT)') {
						            	echo "selected";
						            	} ?> value="5 tahun (DT)">5 tahun (DT)</option>
							    </select>
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
                            <label for="nama_bidan" class="col-sm-2 col-form-label">Diagnosa</label>
                            <div class="col">
                            	<input type="text" name="diagnosa" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukan Diagnosa" value="<?php echo $pencatatan->diagnosa ?>">
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
                            <label for="nama_bidan" class="col-sm-2 col-form-label">Penyuluhan</label>
                            <div class="col">
                            	<input type="text" name="penyuluhan" class="form-control" id="formGroupExampleInput" placeholder="Masukan Penyuluhan" value="<?php echo $pencatatan->penyuluhan ?>">
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
							      	<option>-- PILIH --</option>
							      	<option <?php 
						            	if ($pencatatan->vitamin  == 'Vitamin A (umur 6 bulan - 1 tahun ) warna biru') {
						            	echo "selected";
						            	} ?> value="Vitamin A (umur 6 bulan - 1 tahun ) warna biru">Vitamin A (umur 6 bulan - 1 tahun ) warna biru</option>
							      	<option <?php 
						            	if ($pencatatan->vitamin  == 'Vitamin A (umur 1 tahun - 5 tahun ) warna merah') {
						            	echo "selected";
						            	} ?> value="Vitamin A (umur 1 tahun - 5 tahun ) warna merah">Vitamin A (umur 1 tahun - 5 tahun ) warna merah</option>
							    </select>
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
                            <label for="nama_bidan" class="col-sm-2 col-form-label">Obat Cacing</label>
                            <div class="col">
                            	<select id="inputState" class="form-control" name="obat">
							      	<option>-- PILIH --</option>
							      	<option <?php 
						            	if ($pencatatan->obat  == '&#189; pil (umur 1 - 2 tahun)') {
						            	echo "selected";
						            	} ?> value="&#189; pil (umur 1 - 2 tahun)">&#189; pil (umur 1 - 2 tahun)</option>
							      	<option <?php 
						            	if ($pencatatan->obat  == '1 pil (umur 2 - 5 tahun)') {
						            	echo "selected";
						            	} ?> value="1 pil (umur 2 - 5 tahun)">1 pil (umur 2 - 5 tahun)</option>
							    </select>
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
                            <label for="nama_bidan" class="col-sm-2 col-form-label">No Telpon Orang Tua</label>
                            <div class="col">
                            	<input type="number" class="form-control" name="notelp" id="formGroupExampleInput" placeholder="Masukan No Telpon" value="<?php echo $pencatatan->notelp ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<input name="tgl_pencatatan" type="hidden" value="<?php echo gmdate("Y-m-d", time()+60*60*7) ;?>">

		<div class="form-group row mb-4 mb-sm-4">
	      <div class="col-sm-3 mb-3 mb-sm-0">
	      	<input type="submit" class="btn btn-success btn-user btn-block form-control-user" name="btn" value="Simpan">
	      </div>
	    </div>
	</form>
</div>
</div>
</div>

</div>
