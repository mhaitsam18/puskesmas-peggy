<div class="container-fluid">

    <?php $this->load->view('admin/_partials/breadcrumb');?>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!-- DataTables -->
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <a href="<?php echo site_url('puskesmas/petugas/add_form') ?>"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Tabel Data Petugas</b></h4>
                </div>
            </div>

            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Petugas</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($daftarpetugas as $petugas): ?>
                        <tr>
                            <td width ="80"><?= $no++;?></td>
                            <td>
                                <?= $petugas->id_petugas;?>
                            </td>
                            <td>
                                <?= $petugas->username;?>
                            </td>
                            <td width = "150">
                                <?= $petugas->password;?>
                            </td>
                            <td >
                                <?= $petugas->nama;?>
                            </td>
                            <td><img src="<?= base_url('upload/petugas_posyandu/').$petugas->foto;?>" width="200">
                            </td>
                            <td>
                                <?= $petugas->status;?>
                            </td>
                           
                            <td width="250">
                                <a href="<?= site_url('puskesmas/petugas/edit_form/'.$petugas->id_petugas) ?>"
                                    class="btn btn-small text-warning"><i class="fas fa-edit"></i> Edit</a>
                                <a onclick="deleteConfirm('<?= site_url('puskesmas/petugas/delete/'.$petugas->id_petugas);?>')"
                                    href="#!" class="btn btp-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
        <!-- <a id="btn-delete" class="btn btn-danger" href="#">Delete</a> -->
        <a id="btP2" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>
<?php
$this->load->view('admin/_partials/script');
?>
<script>
// function deleteConfirm(url){
// 	$('#btz-delete').attr('href', url);
// 	$('#deleteModal').modal();
// }
function deleteConfirm(url){
	$('#btP2').attr('href', url);
	$('#deleteModal').modal();
}

</script>