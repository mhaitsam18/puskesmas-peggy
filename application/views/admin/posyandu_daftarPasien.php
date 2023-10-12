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
        <div class="row">
            <div class="col-sm">
                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <?=$this->session->flashdata('pesan')?>

                        <a class="mb-2 mr-2 btn btn-success" style="color: white;"
                            href="<?=base_url('admin/posyandu/tambahPendaftaran')?>">Tambah</a>
                        <table class="display" id="example">
                            <thead>
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
                                <?php $no = 0;
                                    foreach ($pendaftaran as $value) {
                                    $no++;?>
                                    <tr>
                                        <td><?=$no;?></td>
                                        <td><?php echo $value->no_pasien; ?></td>
                                        <td><?php echo $value->nama_anak; ?></td>
                                        <td><?php echo $value->tempat_lahir . ", " . $value->tanggal_lahir; ?></td>
                                        <td><?php echo $value->nama_ibu; ?></td>
                                        <td>
                                            <a href="<?=base_url("admin/posyandu/detailPasien/") . $value->no_pasien?>"
                                                 class="btn btn-small text-primary">
                                                <i class="fas fa-info"></i> Detail
                                                <a class="btn btn-warning" href="<?php echo base_url('admin/posyandu/editPendaftaran/' . $value->no_pasien); ?>">Update</a>
                                                <a class="btn btn-danger" href="<?php echo base_url('admin/posyandu/deletePendaftaran/' . $value->no_pasien); ?>">Delete</a>
                                            </a>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                $('#myTable').DataTable(); });
            </script>
        </div>
    </div>
</div>
