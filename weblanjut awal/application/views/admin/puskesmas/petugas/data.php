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
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($daftarpetugas as $petugas): ?>
                        <tr>
                            <td width = "80"><?= $no++;?></td>
                            <td width="300">
                                <?= $petugas->nama;?>
                            </td>
                            <td>
                                <?= $petugas->username;?>
                            </td>
                            <td>
                                <?= $petugas->password;?>
                            </td>
                            <td width="250">
                                <a href="<?= site_url('puskesmas/petugas/edit_form/'.$petugas->id) ?>"
                                    class="btn btn-small text-warning"><i class="fas fa-edit"></i> Edit</a>
                                <a onclick="deleteConfirm('<?= site_url('puskesmas/petugas/delete/'.$petugas->id);?>')"
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
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>
<?php
$this->load->view('admin/_partials/script');
?>
<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>