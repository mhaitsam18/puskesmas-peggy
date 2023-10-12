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
                <a href="<?php echo site_url('posyandu/Daftar') ?>"><i class="fas fa-arrow-left"></i>Kembali</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Input Pendaftaran</b></h4>
                </div>
            </div>
	<form action="<?php echo site_url('posyandu/Daftar/add') ?>" method="post" enctype="multipart/form-data">
    	<div class="card-body" style="background-color:#2980b9; color: white">
			<div class="container">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-info" role="alert">
                            Silahkan masukan data pendaftaran
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
                                    <input name="no_pasien" <?php echo form_error('no_pasien') ? 'is-invalid':'' ?> type="number" class="form-control" id="no_pasien" placeholder="No NIK/No BPJS/No KIS/No KMS">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group row">
                                    <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                                    <div class="col">
                                        <input name="nama_ibu" type="text" class="form-control" id="nama_ibu" placeholder="Masukan Nama Ibu">
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
                                    <input name="nama_anak" type="text" <?php echo form_error('nama_anak') ? 'is-invalid':'' ?> class="form-control" id="nama_anak" placeholder="Masukan Nama">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group row">
                                    <label for="p_ibu" class="col-sm-3 col-form-label">Pekerjaan Ibu</label>
                                    <div class="col">
                                        <input name="p_ibu" type="text" class="form-control" id="p_ibu" placeholder="Masukan Pekerjaan Ibu">
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
                                    <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" placeholder="Tempat">	
                                    </div>
                                    <div class="col-sm-5">
                                    <input name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control" placeholder="Last name">	
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group row">
                                    <label for="p_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
                                    <div class="col">
                                        <input name="nama_ayah" type="text" class="form-control" id="nama_ayah" placeholder="Masukan Nama Ayah">
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
								        <option value="Laki - Laki">Laki - Laki</option>
								        <option value="Perempuan">Perempuan</option>
								    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group row">
                                    <label for="p_ayah" class="col-sm-3 col-form-label">Pekerjaan Ayah</label>
                                    <div class="col">
                                        <input name="p_ayah" type="text" class="form-control" id="p_ayah" placeholder="Masukan Pekerjaan Ayah">
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
                                    <textarea name="alamat" class="form-control" id="alamat" rows="3" placeholder="Masukan Alamat"></textarea>
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
		</div>
	</form>

	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="notifSukses" tabindex="-1" role="dialog">
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
</div>
<!-- end moda; -->

<?php 

if ($this->session->flashdata('success')): ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#notifSukses').modal('show');

	});
</script>
<?php endif; ?>