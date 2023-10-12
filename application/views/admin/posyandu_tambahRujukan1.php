<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Data Pemeriksaan Pasien</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <a href="<?=base_url('admin/posyandu/pasienRujukan')?>" class="btn btn-danger mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table class="display" id="example">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Id Pencatatan</th>
                                    <th>Nama Anak</th>
                                    <th>Nama Bidan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pencatatan as $data) {?>
                                <tr>
                                    <td><?php echo $data->tgl_pencatatan ?></td>
                                    <td><?php echo $data->id_pencatatan ?></td>
                                    <td><?php echo $data->nama_anak ?></td>
                                    <td><?php echo $data->nama_bidan ?></td>
                                    <td><a href="<?php echo site_url('admin/posyandu/laporanDetail/' . $data->no_pasien) ?>" class="btn btn-small text-info"><i class="fas fa-eye"></i> Detail </a>
                                        <a href="<?=base_url("admin/posyandu/tambahRujukan2/") . $data->id_pencatatan?>" class="btn btn-small text-primary">
                                        <i class="fas fa-info">Rujuk</i>
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
                $('#myTable').DataTable();});
            </script>
        </div>
    </div>
</div>