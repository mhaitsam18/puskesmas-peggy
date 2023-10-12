<div class="container-fluid">

    <?php $this->load->view('admin/_partials/breadcrumb');?>

    <!-- DataTables -->
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Laporan</b></h4>
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
                            <td width="80">
                                <a href="<?= site_url('puskesmas/laporan/detail/'.$ibuhamil->id_reg) ?>"
                                    class="btn btn-small text-primary"><i class="fas fa-file-alt"></i> Lihat</a>
                                    
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>
<center>
<a class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Print</a>
</center>