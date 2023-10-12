<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
				
				<div class="card mb-3">
					<div class="card-header">
						
						<a href="<?php echo site_url('puskesmas/pasienrujukan_index/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('puskesmas/pasienrujukan_index/edit_save/'.$pasienrujukan->id_rujukan) ?>" method="post">
							<input type="hidden" name="id_rujukan" value="<?= $pasienrujukan->id_rujukan;?>">
							<div class="form-group">
								<label for="id_rujukan">ID Rujukan *</label>
								<input class="form-control <?php echo form_error('id_rujukan') ? 'is-invalid':'' ?>"
								 type="number" name="id_rujukan" placeholder="ID Rujukan" value="<?= $pasienrujukan->id_rujukan; ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nip') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="namapasien">Nama Pasien *</label>
								<input class="form-control <?php echo form_error('namapasien') ? 'is-invalid':'' ?>"
								 type="text" name="namapasien" placeholder="Nama Pasien" value="<?= $pasienrujukan->namapasien; ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('namapasien') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="umur">Umur *</label>
								<input class="form-control <?php echo form_error('umur') ? 'is-invalid':'' ?>"
								 type="text" name="umur" placeholder="Umur" value="<?= $pasienrujukan->umur; ?>">
								<div class="invalid-feedback">
									<?php echo form_error('umur') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="alamat">Alamat *</label>
								<textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" id="alamat" name="alamat" placeholder="Alamat Lengkap" rows="3"><?= $pasienrujukan->alamat; ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nopasien">No Pasien *</label>
								<input class="form-control <?php echo form_error('nopasien') ? 'is-invalid':'' ?>"
								 type="text" name="nopasien" placeholder="No Pasien" value="<?= $pasienrujukan->nopasien; ?>">
								<div class="invalid-feedback">
									<?php echo form_error('nopasien') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="diagnosa">Diagnosa Sementara *</label>
								<input class="form-control <?php echo form_error('diagnosa') ? 'is-invalid':'' ?>"
								 type="text" name="diagnosa" placeholder="Diagnosa Sementara" value="<?= $pasienrujukan->diagnosa; ?>">
								<div class="invalid-feedback">
									<?php echo form_error('diagnosa') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="rumahsakit">Rumah Sakit Yang Dituju *</label>
								<input class="form-control <?php echo form_error('rumahsakit') ? 'is-invalid':'' ?>"
								 type="text" name="rumahsakit" placeholder="Rumah Sakit Yang Dituju" value="<?= $pasienrujukan->rumahsakit; ?>">
								<div class="invalid-feedback">
									<?php echo form_error('rumahsakit') ?>
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