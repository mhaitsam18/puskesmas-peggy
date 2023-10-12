<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Daftar Pasien</div>
                </div>
            </div>
        </div>
        <!-- <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <a href="<?php echo site_url('posyandu/Pencatatan') ?>"><i class="fas fa-arrow-left"></i>Back</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Data Yang Ingin Dicatat</b></h4>
                </div>
            </div> -->
        <a href="<?=base_url('admin/posyandu/pencatatanMedis')?>" class="btn btn-danger mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                                $no = 1;
                                foreach ($pendaftaran as $data):
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data->no_pasien ?></td>
                            <td><?php echo $data->nama_anak ?></td>
                            <td><?php echo $data->tempat_lahir . ", " . $data->tanggal_lahir ?></td>
                            <td><?php echo $data->nama_ibu ?></td>
                            <td width="250">
                                <a href="<?php echo site_url('admin/posyandu/tambahPencatatan2/' . $data->no_pasien) ?>" class="btn btn- text-info"><i class="fas fa-edit"></i> Catat</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
        $(document).ready(function() {
            $('#notifSukses').modal('show');});
    </script>
<?php endif;?>