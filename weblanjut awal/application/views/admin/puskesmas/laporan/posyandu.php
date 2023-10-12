<div class="container-fluid">

<?php $this->load->view('admin/_partials/breadcrumb');?>

 <!-- DataTables -->
 <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4 pull-right">
                    <h4><b>Data Pendaftaran</b></h4>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                    	<th>No</th>
                      <th>No Pasien</th>
                      <th>Nama Anak</th>
                      <th>TTL</th>
                      <th>Nama Ibu</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php
                  	$no=1; 
                  		foreach ($pendaftaran as $data): 
                  		?>
                    <tr>
                    	<td><?php echo $no++ ?></td>
                      <td><?php echo $data->no_pasien ?></td>
                      <td><?php echo $data->nama_anak ?></td>
                      <td><?php echo $data->tempat_lahir.", ".$data->tanggal_lahir ?></td>
                      <td><?php echo $data->nama_ibu ?></td>
                      <td width="250">
						 <a href="<?php echo site_url('puskesmas/laporan/posyandu/detail/'.$data->no_pasien) ?>"
						 class="btn btn-small text-info"><i class="fas fa-eye"></i> Detail Laporan</a>
					</td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>