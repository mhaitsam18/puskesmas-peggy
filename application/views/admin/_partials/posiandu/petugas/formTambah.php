<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
				
				<div class="card mb-3">
					<div class="card-header">
						
						<a href="<?php echo site_url('posyandu/petugas/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('posyandu/petugas/add') ?>" method="post" class="needs-validation" novalidate>
							<div class="form-group">
								<label for="id_petugas">ID Petugas*</label>
								<input class="form-control <?php echo form_error('id_petugas') ? 'is-invalid':'' ?>"
								 type="number" name="id_petugas" placeholder="ID Petugas" required/>
								<div class="invalid-feedback">
									ID Rujukan harus di isi
									<?php echo form_error('id_petugas') ?>
								</div>
								<div class="valid-feedback">
									Looks Good
								</div>
							</div> 

							<div class="form-group">
								<label for="username">Username *</label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								 type="email" name="username" placeholder="Username" />
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
								<div class="valid-feedback">
									Looks Good
								</div>
							</div>

							<div class="form-group">
								<label for="nama">Nama *</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="nama"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<!-- <div class="form-group">
								<label for="foto">Foto *</label>
								<textarea class="form-control <?php echo form_error('foto') ? 'is-invalid':'' ?>" id="foto" name="foto"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('foto') ?>
								</div>
							</div> -->
							<div class="form-group">
								<label for="foto">Foto *</label>
								<input class="form-control <?php echo form_error('foto') ? 'is-invalid':'' ?>"
								 type="file" name="foto" placeholder="Foto Petugas"/>

								 <div class="invalid-feedback">
									<?php echo form_error('foto') ?>
								</div>
							</div>

							<!-- <div class="custom-file">
							<input type="file" class="custom-file-input" <?php echo form_error('foto') ? 'is-invalid':'' ?> id="customFile" name="foto">
							<label class="custom-file-label" for="customFile">Choose file</label>
							</div> -->

							<div class="form-group">
								<label for="password">Password *</label>
								<input class="form-control <?php echo form_error('nopasien') ? 'is-invalid':'' ?>"
								 type="password" name="password" placeholder="Password"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="status">Status *</label>
								<input class="form-control <?php echo form_error('status') ? 'is-invalid':'' ?>"
								 type="text" name="status" placeholder="Status"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('status') ?>
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