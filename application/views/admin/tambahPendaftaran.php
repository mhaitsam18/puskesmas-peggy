<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Data Pendaftaran Posyandu</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Pendaftaran</h5>
                        <form class="" action="<?= base_url('admin/posyandu/') ?>" method="post">
                        <div class="form-group">
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
            <script>
                $(document).ready(function() {
                    $('#myTable').DataTable();
                });
            </script>
        </div>
    </div>
</div>