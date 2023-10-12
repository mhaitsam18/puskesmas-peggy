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
                <a href="<?php echo site_url('posyandu/Daftar') ?>"><i class="fas fa-arrow-left"></i>Back</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Edit Pendaftaran</b></h4>
                </div>
            </div>
    <div class="card-body" style="background-color:#2980b9; color: white">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="container">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-info" role="alert">
                            Silahkan edit data pendaftaran
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <hr>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-sm-7">
                                <div class="form-group row">
                                    <label for="no_pasien" class="col-sm-2 col-form-label">No Pasien</label>
                                    <div class="col-sm-9">
                                    <input name="no_pasien" <?php echo form_error('no_pasien') ? 'is-invalid':'' ?> type="number" class="form-control" id="no_pasien" placeholder="No NIK/No BPJS/No KIS/No KMS" value="<?php echo $pendaftaran->no_pasien?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group row">
                                    <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                                    <div class="col">
                                        <input name="nama_ibu" type="text" class="form-control" id="nama_ibu" placeholder="Masukan Nama Ibu" value="<?php echo $pendaftaran->nama_ibu?>">
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
                                    <label for="nama_anak" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                    <input name="nama_anak" value="<?php echo $pendaftaran->nama_anak?>" type="text" <?php echo form_error('nama_anak') ? 'is-invalid':'' ?> class="form-control" id="nama_anak" placeholder="Masukan Nama">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group row">
                                    <label for="p_ibu" class="col-sm-3 col-form-label">Pekerjaan Ibu</label>
                                    <div class="col">
                                        <input name="p_ibu" type="text" class="form-control" id="p_ibu" placeholder="Masukan Pekerjaan Ibu" value="<?php echo $pendaftaran->p_ibu?>">
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
                                    <label for="ttl" class="col-sm-2 col-form-label">TTL</label>
                                    <div class="col-sm-4">
                                    <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" placeholder="Tempat" value="<?php echo $pendaftaran->tempat_lahir?>">	
                                    </div>
                                    <div class="col-sm-5">
                                    <input name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control" placeholder="Last name" value="<?php echo $pendaftaran->tanggal_lahir?>">	
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group row">
                                    <label for="p_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
                                    <div class="col">
                                        <input name="nama_ayah" type="text" class="form-control" id="nama_ayah" placeholder="Masukan Nama Ayah" value="<?php echo $pendaftaran->nama_ayah?>">
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
                                    <label for="ttl" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                    <select name="jk" id="inputState" class="form-control">
								        <option <?php 
							            	if ($pendaftaran->jk  == 'Laki - Laki') {
							            	echo "selected";
							            	} ?> value="Laki - Laki">Laki - Laki</option>
								        <option <?php 
							            	if ($pendaftaran->jk  == 'Perempuan') {
							            	echo "selected";
							            	} ?> value="Perempuan">Perempuan</option>
								      </select>
								    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group row">
                                    <label for="p_ayah" class="col-sm-3 col-form-label">Pekerjaan Ayah</label>
                                    <div class="col">
                                        <input name="p_ayah" type="text" class="form-control" id="p_ayah" placeholder="Masukan Pekerjaan Ayah" value="<?php echo $pendaftaran->p_ayah?>">
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
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                    <textarea name="alamat" class="form-control" id="alamat" rows="3" placeholder="Masukan Alamat"><?php echo $pendaftaran->alamat?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group row">
                                    <label for="tgl_daftar" class="col-sm-3 col-form-label">Tanggal Daftar</label>
                                    <div class="col">
                                        <input name="tgl_daftar" class="form-control" type="text" value="<?php echo gmdate("Y-m-d", time()+60*60*7) ;?>" readonly>
                                    </div>
                            	</div>
                            	<br><br>
                            	<div class="form-group row">
                                    <div class="col">
                                        <input type="submit" class="btn btn-success btn-user btn-block form-control-user" name="btn" value="Simpan">
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