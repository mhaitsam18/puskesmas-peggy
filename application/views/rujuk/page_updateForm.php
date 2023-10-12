
    <form action="<?php echo base_url('pasienrujukan/updatemk')?>" method="POST">
<input type="hidden" name="id_rujukan" value="<?php echo $data->id_rujukan?>">
<table>
 <!-- DataTables -->
 <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
				<a href="<?php echo site_url('pasienrujukan') ?>"><i class="fas fa-arrow-left"></i>Back</a>
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
                    Silahkan masukan data Rujukan
                </div>
            </div>
        </div><br>
        <div class="row">
            <hr>
            <div class="col">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="id_rujukan" class="col-sm-3 col-form-label">Id Rujukan</label>
                            <div class="col-md-8">
                            <input type="number" class="form-control" name="id_rujukan" value="<?php echo $data->id_rujukan?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group row">
                            <label for="namapasien" class="col-sm-3 col-form-label">Nama Pasien</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="namapasien" id="formGroupExampleInput" placeholder="Nama Pasien" value="<?php echo $data->namapasien?>">
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
                            <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                            <div class="col">
                            <input type="number" class="form-control" name="umur" id="formGroupExampleInput" placeholder="Masukan Umur" value="<?php echo $data->umur ?>">
                            </div>
                            <label for="umur" class="col-sm-2 col-form-label">Bulan</label>
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
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-md-12">
                            	<input type="text" class="form-control" name="alamat" id="formGroupExampleInput" placeholder="Masukan Alamat" value="<?php echo $data->alamat ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
            <hr>
            <div class="col">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label for="nopasien" class="col-sm-2 col-form-label">No pasien</label>
                            <div class="col-md-12">
                            	<input type="text" class="form-control" name="nopasien" id="formGroupExampleInput" placeholder="Masukan Nomor pasien" value="<?php echo $data->nopasien ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
            <hr>
            <div class="col">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa</label>
                            <div class="col-md-12">
                            	<input type="text" class="form-control" name="diagnosa" id="formGroupExampleInput" placeholder="Masukan Diagnosa" value="<?php echo $data->alamat ?>">
                            </div>
                        </div>
                    </div>

                   

            <div class="col">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label for="nama_bidan" class="col-sm-2 col-form-label">Nama Puskesmas</label>
                            <div class="col">
                            	<input type="text" class="form-control" name="rumahsakit" id="formGroupExampleInput" placeholder="Masukan Nama Puskesmas" value="<?php echo $data->rumahsakit ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<tr>
    <td><input type="submit" value="simpan"></td>
</tr>
</table>
</form>