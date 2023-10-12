<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
				
				<div class="card mb-3">
					<div class="card-header">
						
						<a href="<?php echo site_url('puskesmas/ibuhamil/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('puskesmas/ibuhamil/add') ?>" method="post" class="needs-validation" novalidate>
							<div class="form-group">
								<label for="nama">Nama Lengkap*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Nama Lengkap" required/>
								<div class="invalid-feedback">
									Nama harus di isi
									<?php echo form_error('nama') ?>
								</div>
								<div class="valid-feedback">
									Looks Good
								</div>
							</div>

							<div class="form-group">
								<label for="pekerjaan">Pekerjaan *</label>
								<input class="form-control <?php echo form_error('pekerjaan') ? 'is-invalid':'' ?>"
								 type="text" name="pekerjaan" placeholder="Pekerjaan" />
								<div class="invalid-feedback">
									<?php echo form_error('pekerjaan') ?>
								</div>
								<div class="valid-feedback">
									Looks Good
								</div>
							</div>
							<div class="form-group">
								<label for="nama_suami">Nama Suami *</label>
								<input class="form-control <?php echo form_error('nama_suami') ? 'is-invalid':'' ?>"
								 type="text" name="nama_suami" placeholder="Nama Suami"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('nama_suami') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="pekerjaan_suami">Pekerjaan Suami *</label>
								<input class="form-control <?php echo form_error('pekerjaan_suami') ? 'is-invalid':'' ?>"
								 type="text" name="pekerjaan_suami" placeholder="Pekerjaan Suami"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('pekerjaan_suami') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="umur">Umur *</label>
								<input class="form-control <?php echo form_error('umur') ? 'is-invalid':'' ?>"
								 type="number" name="umur" placeholder="Umur"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('umur') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="alamat">Alamat *</label>
								<textarea class="form-control <?php echo form_error('umur') ? 'is-invalid':'' ?>" id="alamat" name="alamat" placeholder="Alamat Lengkap" rows="3"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('umur') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="umur">No Telephone *</label>
								<input class="form-control <?php echo form_error('notelp') ? 'is-invalid':'' ?>"
								 type="text" name="notelp" placeholder="Nomor Telephone"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('notelp') ?>
								</div>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
						</form> 

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->