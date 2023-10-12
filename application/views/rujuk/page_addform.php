<!-- <div class="container-fluid">
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
                <a href="<?php echo site_url('pasienrujukan') ?>"><i class="fas fa-arrow-left"></i>Kembali</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Input Rujukan</b></h4>
                </div>
            </div>
	<form action="<?php echo site_url('pasienrujukan/addForm') ?>" method="post" enctype="multipart/form-data">
    	<div class="card-body" style="background-color:#2980b9; color: white">
			<div class="container">
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
                            <div class="col-sm-9">
                                <div class="form-group row">
                                    <label for="id_rujukan" class="col-sm-2 col-form-label">ID Rujukan</label>
                                    <div class="col-sm-10">
                                    <input name="id_rujukan" <?php echo form_error('id_rujukan') ? 'is-invalid':'' ?> type="number" class="form-control" id="id_rujukan" placeholder="ID Rujukan">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group row">
                                    <label for="namapasien" class="col-sm-2 col-form-label">Nama Pasien</label>
                                    <div class="col-sm-10">
                                        <input name="namapasien" type="text" class="form-control" id="namapasien" placeholder="Masukan Nama Pasien">
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
                            <div class="col-sm-9">
                                <div class="form-group row">
                                    <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                                    <div class="col-sm-10">
                                    <input name="umur" type="text" <?php echo form_error('umur') ? 'is-invalid':'' ?> class="form-control" id="umur" placeholder="Masukan Umur">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input name="alamat" type="text" class="form-control" id="alamat" placeholder="Masukan Alamat">
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
                            <div class="col-sm-9">
                                <div class="form-group row">
                                    <label for="nopasien" class="col-sm-2 col-form-label">No.Pasien</label>
                                    <div class="col-sm-10">
                                    <input name="nopasien" type="text" <?php echo form_error('nopasienmur') ? 'is-invalid':'' ?> class="form-control" id="nopasien" placeholder="Masukan Nomor Pasien">
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
                                    <div class="col-sm-10">
                                    <input name="diagnosa" type="text" <?php echo form_error('diagnosa') ? 'is-invalid':'' ?> class="form-control" id="diagnosa" placeholder="Masukan Diagnosa Pasien">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="rumahsakit" class="col-sm-2 col-form-label">Nama Puskesmas</label>
                                    <div class="col-sm-10">
                                        <input name="rumahsakit" type="text" class="form-control" id="rumahsakit" placeholder="Masukan Nama Puskesmas">
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                            	<br><br>
                                <div class="col-sm-12">
                            	<div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="submit" class="btn btn-success btn-user btn-block form-control-user" name="btn" value="Simpan">
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

<!-- Modal -->
<!-- <div class="modal fade" id="notifSukses" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Berhasil Disimpan!</h5>
      </div>
      <div class="modal-body">
      	<p>Lanjut Ke Pencatatan ?</p>
      </div>
      <div class="modal-footer">
        <a href="<?php echo site_url('posyandu/Daftar') ?>"><button type="button" class="btn btn-danger">Tidak</button></a>
        <a href="<?php echo site_url('posyandu/Daftar/createPencatatan2/'.$noPasien);?>" class="btn btn-primary">Lanjut</a>
      </div>
    </div>
  </div>
</div> -->
<!-- end moda; -->

