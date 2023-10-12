<!-- Begin Page Content -->
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
                    <a onclick="sentConfirm('<?php echo site_url('posyandu/Laporan/kirim') ?>')" href="#!" class="btn btn-small text-success"><i class="fas fa-file-export"></i> Kirim Laporan</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Data Laporan</b></h4>
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
						 <a href="<?php echo site_url('posyandu/Laporan/detail/'.$data->no_pasien) ?>"
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
        <!-- Logout Delete Confirmation-->
		<div class="modal fade" id="sentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
		        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">×</span>
		        </button>
		      </div>
		      <div class="modal-body">Data yang dikirim tidak akan bisa dikembalikan.</div>
		      <div class="modal-footer">
		        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
		        <a id="btn-sent" class="btn btn-info" href="#">Sent</a>
		      </div>
		    </div>
		  </div>
		</div>
        <script>
		function sentConfirm(url){
			$('#btn-sent').attr('href', url);
			$('#sentModal').modal();
		}
		</script>
        <!-- /.container-fluid -->