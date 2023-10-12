<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Data Petugas Puskesmas</div>
                </div>
            </div>
        </div>
        <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target="#modal-tambah-petugas"><i class="fas fa-plus"></i> Tambah Data Petugas</button>
        <?=$this->session->flashdata('pesan')?>
        <div class="row">
            <div class="col-sm">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <!-- <a class="mb-2 mr-2 btn btn-success" style="color: white;" href="<?=base_url('admin/posyandu/tambahPetugas')?>">Tambah</a> -->
                        <table class="display" id="example">
                            <thead>
                                <tr>
                                    <th>Petugas ID</th>
                                    <th>Username</th>
                                    <th>Nama Petugas</th>
                                    <th>Foto</th>
                                    <th>Password</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($daftarpetugas as $value) {?>
                                <tr>
                                    <td><?php echo $value->id_petugas; ?></td>
                                    <td><?php echo $value->username; ?></td>
                                    <td><?php echo $value->nama; ?></td>
                                    <td><img src="<?=base_url('upload/petugas_posyandu/') . $value->foto;?>" alt="" style="width: 150px; height: 150px;"></td>
                                    <td><?php echo $value->password; ?></td>
                                    <td><?php echo $value->status; ?></td>
                                    <td>
                                    <a class="btn btn-warning" href="<?php echo base_url('admin/puskesmas/editPetugas/' . $value->id_petugas); ?>">Update</a>
                                    <a class="btn btn-danger" href="<?php echo base_url('admin/posyandu/deletePetugas/' . $value->id_petugas . '/' . 'puskesmas'); ?>">Delete</a>
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