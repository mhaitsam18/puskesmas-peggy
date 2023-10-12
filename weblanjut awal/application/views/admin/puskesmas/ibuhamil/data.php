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
                    <a href="<?php echo site_url('puskesmas/ibuhamil/tambah') ?>"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Data Ibu Hamil</b></h4>
                </div>
            </div>

            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Pasien</th>
                            <th>Nama</th>
                            <th>Pekerjaan</th>
                            <th>Suami</th>
                            <th>Pekerjaan Suami</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th style="text-align : center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($ibuhamils as $ibuhamil): ?>
                        <tr>
                            <td width = "80"><?= $no++;?></td>
                            <td width = "150">
                                <?= $ibuhamil->nama;?>
                            </td>
                            <td width = "100">
                                <?= $ibuhamil->pekerjaan;?>
                            </td>
                            <td>
                                <?= $ibuhamil->nama_suami;?>
                            </td>
                            <td>
                                <?= $ibuhamil->pekerjaan_suami;?>
                            </td>
                            
                            <td>
                                <?= $ibuhamil->umur;?>
                            </td>
                            
                            <td>
                                <?= $ibuhamil->alamat;?>
                            </td>
                            
                            <td>
                                <?= $ibuhamil->notelp;?>
                            </td>
                            <td width="160">
                                <a href="<?= site_url('puskesmas/ibuhamil/edit/'.$ibuhamil->id_reg) ?>"
                                    class="btn btn-small text-warning"><i class="fas fa-edit"></i> Edit</a>
                                <a onclick="deleteConfirm('<?= site_url('puskesmas/ibuhamil/delete/'.$ibuhamil->id_reg);?>')"
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


<!-- Logout Delete Confirmation-->
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
        <a id="btP" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
<script>
function deleteConfirm(url){
	$('#btP').attr('href', url);
	$('#deleteModal').modal();
}
</script>