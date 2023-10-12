<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Wilayah Posyandu</div>
                </div>
            </div>
        </div>
        <a class="mb-2 mr-2 btn btn-success" style="color: white;" href="<?= base_url('admin/posyandu/tambahWilayah') ?>">Tambah</a>
        <div class="row">
            <div class="col-sm">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Wilayah ID</th>
                                    <th>Nama Wilayah</th>
                                    <th>kelurahan</th>
                                    <th>RW</th>
                                    <th>RT</th>
                                    <th>Nama Posyandu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $value) { ?>
                                    <tr>
                                        <td><?php echo $value->id_wilayah; ?></td>
                                        <td><?php echo $value->nama_wilayah; ?></td>
                                        <td><?php echo $value->kelurahan; ?></td>
                                        <td><?php echo $value->rw; ?></td>
                                        <td><?php echo $value->rt; ?></td>
                                        <td><?php echo $value->nama_posyandu; ?></td>
                                        <td>
                                            <a class="btn btn-warning" href="<?php echo base_url('admin/posyandu/editWilayah/' . $value->id_wilayah ); ?>">Update</a>
                                            <a class="btn btn-danger" href="<?php echo base_url('admin/posyandu/deleteWilayah/' . $value->id_wilayah); ?>">Delete</a>
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
                    $('#myTable').DataTable();
                });
            </script>
        </div>
    </div>
</div>