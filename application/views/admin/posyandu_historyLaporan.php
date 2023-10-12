<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>History Laporan</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table class="display" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Pasien</th>
                                    <th>Nama Anak</th>
                                    <th>TTL</th>
                                    <th>Nama Ibu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                    foreach ($history as $data) {
                                    $no++; ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data->no_pasien ?></td>
                                        <td><?php echo $data->nama_anak ?></td>
                                        <td><?php echo $data->tempat_lahir . ", " . $data->tanggal_lahir ?></td>
                                        <td><?php echo $data->nama_ibu ?></td>
                                        <td><a href="<?php echo site_url('admin/posyandu/laporanDetail/' . $data->no_pasien) ?>" class="btn btn-small text-info"><i class="fas fa-eye"></i> Detail Laporan</a></td>
                                    </tr>
                                <?php } ?>
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