<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
				
				<div class="card mb-3">
					<div class="card-header">
						
						<a href="<?php echo site_url('puskesmas/ibuhamil/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('puskesmas/ibuhamil/edit_save/'.$ibuhamil->id_reg) ?>" method="post">
							<input type="hidden" name="id_reg" value="<?= $ibuhamil->id_reg;?>">
							<div class="form-group">
								<label for="nama">Nama *</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Nama Lengkap" value="<?= $ibuhamil->nama; ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="pekerjaan">Pekerjaan *</label>
								<input class="form-control <?php echo form_error('pekerjaan') ? 'is-invalid':'' ?>"
								 type="text" name="pekerjaan" placeholder="Pekerjaan" value="<?= $ibuhamil->pekerjaan; ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('pekerjaan') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="nama_suami">Suami *</label>
								<input class="form-control <?php echo form_error('nama_suami') ? 'is-invalid':'' ?>"
								 type="text" name="nama_suami" placeholder="Nama Suami" value="<?= $ibuhamil->nama_suami; ?>">
								<div class="invalid-feedback">
									<?php echo form_error('nama_suami') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="pekerjaan_suami">Pekerjaan Suami *</label>
								<input class="form-control <?php echo form_error('pekerjaan_suami') ? 'is-invalid':'' ?>"
								 type="text" name="pekerjaan_suami" placeholder="Pekerjaan Suami" value="<?= $ibuhamil->pekerjaan_suami; ?>">
								<div class="invalid-feedback">
									<?php echo form_error('pekerjaan_suami') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="umur">Umur *</label>
								<input class="form-control <?php echo form_error('umur') ? 'is-invalid':'' ?>"
								 type="number" name="umur" placeholder="Umur" value="<?= $ibuhamil->umur; ?>">
								<div class="invalid-feedback">
									<?php echo form_error('umur') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="alamat">Alamat *</label>
								<textarea class="form-control <?php echo form_error('umur') ? 'is-invalid':'' ?>" id="alamat" name="alamat" placeholder="Alamat Lengkap" rows="3"><?= $ibuhamil->alamat; ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('umur') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="umur">No Telepon *</label>
								<input class="form-control <?php echo form_error('notelp') ? 'is-invalid':'' ?>"
								 type="text" name="notelp" placeholder="Nomor Telepon" value="<?= $ibuhamil->notelp; ?>">
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