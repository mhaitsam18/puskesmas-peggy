<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('puskesmas/petugas/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('puskesmas/petugas/add') ?>" method="post">

							<div class="form-group">
								<label for="id_petugas">ID Petugas *</label>
								<input class="form-control <?php echo form_error('id_petugas') ? 'is-invalid':'' ?>"
								 type="text" name="id_petugas" placeholder="ID Petugas" />
								<div class="invalid-feedback">
									<?php echo form_error('id_petugas') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="username">Username *</label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								 type="text" name="username" placeholder="Username" />
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="password">Password *</label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
								 type="password" name="password" placeholder="Password"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="nama">Nama *</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Nama Petugas" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="foto">Foto *</label>
								<input class="form-control <?php echo form_error('foto') ? 'is-invalid':'' ?>"
								 type="file" name="foto" placeholder="Foto Petugas"/>
								<div class="invalid-feedback">
									<?php echo form_error('foto') ?>
								</div>
							</div>
							

							<div class="form-group">
								<label for="status">Status Petugas*</label>
								<input class="form-control <?php echo form_error('status') ? 'is-invalid':'' ?>"
								 type="text" name="status" placeholder="Status Petugas" />
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