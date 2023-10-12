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
                    <a href="<?php echo site_url('posyandu/Pencatatan') ?>"><i class="fas fa-arrow-left"></i>Back</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Data Yang Ingin Dicatat</b></h4>
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
                        <a href="<?php echo site_url('posyandu/pencatatan/create_input_pencatatan/'.$data->no_pasien) ?>" class="btn btn- text-info"><i class="fas fa-edit"></i> Catatat</a>
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
   <div class="modal fade" id="notifSukses" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Berhasil Disimpan!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Lanjut Ke Data Pasien Rujukan ?</p>
      </div>
      <div class="modal-footer">
        <a href="<?php echo site_url('posyandu/Pencatatan') ?>"><button type="button" class="btn btn-danger">Batal</button></a>
        <a href="<?php echo site_url('posyandu/pasienrujukan') ?>"><button type="button" class="btn btn-primary">Lanjut</button></a>
      </div>
    </div>
  </div>
</div>

<?php 

if ($this->session->flashdata('success')): ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#notifSukses').modal('show');
  });
</script>
<?php endif; ?>