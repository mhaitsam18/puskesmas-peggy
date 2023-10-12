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
                    <a href="<?php echo site_url('posyandu/petugas/add_form') ?>"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Data Petugas Posyandu</b></h4>
                </div>
            </div>

            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>ID Petugas</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th style="text-align : center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($daftarpetugas as $petugas): ?>
                        <tr>
                        <!-- <td><?Php echo $petugas->id_petugas;?></td>
                        <td><?php echo $petugas->username;?></td>
                        <td><?php echo $petugas->nama;?></td>
                        <td><?php echo $petugas->foto;?></td>
                        <td><?php echo $petugas->password;?></td>
                        <td><?php echo $petugas->status;?></td> -->
                        <!-- <td> -->
                            <td width = "80"><?= $no++;?></td>
                            <td width = "150">
                                <?= $petugas->id_petugas;?>
                            </td>
                            <td width = "100">
                                <?= $petugas->username;?>
                            </td>
                            <td>
                                <?= $petugas->nama;?>
                            </td>
                            <td>
                                <?= $petugas->foto;?>
                            </td> 
                            <!-- <td><img src="foto/<?= base_url()?> "$petugas; ?></td> -->
                             <!-- <td><img  src='<?=base_url()?>upload/<?=$r->filecover;?>'></td> -->
                            <td>
                                <?= $petugas->password;?>
                            </td>
                            <td>
                                <?= $petugas->status;?>
                            </td>
                            
                            <td width="160">
                                <a href="<?= site_url('posyandu/petugas/edit_form/'.$petugas->id_petugas) ?>"
                                    class="btn btn-small text-warning"><i class="fas fa-edit"></i> Edit</a>
                                <a onclick="deleteConfirm('<?= site_url('posyandu/petugas/delete/'.$petugas->id_petugas);?>')"
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
        <a id="btR" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
<script>
function deleteConfirm(url){
	$('#btR').attr('href', url);
	$('#deleteModal').modal();
}
</script>
