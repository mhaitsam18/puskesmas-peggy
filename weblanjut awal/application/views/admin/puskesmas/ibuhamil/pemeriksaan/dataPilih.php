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
                
            </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Pemeriksaan</b></h4>
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
                        foreach ($ibuhamils as $obj): ?>
                        <tr>
                            <td width = "80"><?= $no++;?></td>
                            <td width = "150">
                                <?= $obj->nama;?>
                            </td>
                            <td width = "100">
                                <?= $obj->pekerjaan;?>
                            </td>
                            <td>
                                <?= $obj->nama_suami;?>
                            </td>
                            <td>
                                <?= $obj->pekerjaan_suami;?>
                            </td>
                            
                            <td>
                                <?= $obj->umur;?>
                            </td>
                            
                            <td>
                                <?= $obj->alamat;?>
                            </td>
                            
                            <td>
                                <?= $obj->notelp;?>
                            </td>
                            <td width="160">
                                <a href="<?= site_url('puskesmas/ibuhamil/pemeriksaan/tambah/'.$obj->id_reg) ?>"
                                    class="btn btn-small text-primary"><i class="fas fa-edit"></i>Periksa</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>