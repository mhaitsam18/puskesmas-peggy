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
                <a href="<?php echo site_url('posyandu/pencatatan/create_pencatatan') ?>"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Data Pencatatan</b></h4>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                    	<th>Tanggal</th>
                      <th>Id Pencatatan</th>
                      <th>Nama Anak</th>
                      <th>Nama Bidan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php 
                  		foreach ($pencatatan as $data): 
                  		?>
                    <tr>
                    	<td><?php echo $data->tgl_pencatatan ?></td>
                      <td><?php echo $data->id_pencatatan ?></td>
                      <td><?php echo $data->nama_anak ?></td>
                      <td><?php echo $data->nama_bidan ?></td>
                      <td width="250">
						<a href="<?php echo site_url('posyandu/Pencatatan/edit/'.$data->id_pencatatan) ?>"
             class="btn btn- text-info"><i class="fas fa-edit"></i> Edit</a>
            <a onclick="deleteConfirm('<?php echo site_url('posyandu/Pencatatan/delete/'.$data->id_pencatatan) ?>')"
            href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
					</td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a id="btR" class="btn btn-danger" href="#">Delete</a>
          </div>
        </div>
      </div>
    </div>
        <script>
    function deleteConfirm(url){
      $('#btR').attr('href', url);
      $('#deleteModal').modal();
    }
    </script>sss