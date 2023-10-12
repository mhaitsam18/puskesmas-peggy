<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Jadwal Posyandu</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <a class="mb-2 mr-2 btn btn-success" style="color: white;" href="<?= base_url('admin/posyandu/tambahJadwal') ?>">Tambah</a>
                        <table class="display" id="example">
                            <thead>
                                <tr>
                                    <th>Jadwal ID</th>
                                    <th>Nama Petugas</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Wilayah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $value) { ?>
                                    <tr>
                                        <td><?php echo $value->id_jadwal; ?></td>
                                        <td><?php echo $value->nama; ?></td>
                                        <td><?php echo $value->bln; ?></td>
                                        <td><?php echo $value->thn; ?></td>
                                        <td><?php echo $value->wilayah; ?></td>
                                        <td>
                                            <a class="btn btn-warning" href="<?php echo base_url('admin/posyandu/editJadwal/' . $value->id_jadwal); ?>">Update</a>
                                            <a class="btn btn-danger" href="<?php echo base_url('admin/posyandu/deleteJadwal/' . $value->id_jadwal); ?>">Delete</a>
                                        </td>
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