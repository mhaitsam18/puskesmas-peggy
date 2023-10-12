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
                    <a href="<?php echo site_url('puskesmas/pasienrujukan_index/add_form') ?>"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Data Pasien Rujukan</b></h4>
                </div>
            </div>

            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>ID Rujukan</th>
                            <th>Nama Pasien</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th>Nomor Pasien</th>
                            <th>Diagnosa Sementara</th>
                            <th>Rumah Sakit Yang Dituju</th>
                            <th style="text-align : center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pasienrujukans as $pasienrujukan): ?>
                        <tr>
                            <td width = "80"><?= $no++;?></td>
                            <td width = "150">
                                <?= $pasienrujukan->id_rujukan;?>
                            </td>
                            <td width = "100">
                                <?= $pasienrujukan->namapasien;?>
                            </td>
                            <td>
                                <?= $pasienrujukan->umur;?>
                            </td>
                            <td>
                                <?= $pasienrujukan->alamat;?>
                            </td>
                            
                            <td>
                                <?= $pasienrujukan->nopasien;?>
                            </td>
                            
                            <td>
                                <?= $pasienrujukan->diagnosa;?>
                            </td>

                            <td>
                                <?= $pasienrujukan->rumahsakit;?>
                            </td>

                            <td width="160">
                                <a href="<?= site_url('puskesmas/pasienrujukan_index/edit_form/'.$pasienrujukan->id_rujukan) ?>"
                                    class="btn btn-small text-warning"><i class="fas fa-edit"></i> Edit</a>
                                <a onclick="deleteConfirm('<?= site_url('puskesmas/pasienrujukan_index/delete/'.$pasienrujukan->id_rujukan);?>')"
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
<center>
<a class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Print</a>
</center>