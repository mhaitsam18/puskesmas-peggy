<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Data Ibu Hamil</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <?=$this->session->flashdata('pesan')?>
                        <a href="<?= base_url('admin/puskesmas/kelolaPekerjaan') ?>" class="btn btn-info mb-1">Kelola Pekerjaan</a>
                        <a class="btn btn-success mb-1" href="<?php echo base_url('admin/puskesmas/tambahIbuhamil/'); ?>"><i class="fas fa-plus"></i> Tambah</a>
                        <table class="display" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Pasien</th>
                                    <th>Nama Pasien</th>
                                    <th>Pekerjaan</th>
                                    <th>Gol Darah</th>
                                    <th>Nama Suami</th>
                                    <th>Pekerjaan Suami</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Umur</th>
                                    <th>Alamat</th>
                                    <th>kelurahan</th>
                                    <th>No Telp</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;foreach ($ibuhamil as $value) {$no++;?>
                                <tr>
                                    <td><?=$no;?></td>
                                    <td><?= $value->id_reg; ?></td>
                                    <td><?= $value->nama; ?></td>
                                    <td><?= $value->pekerjaan ?></td>
                                    <td><?= $value->gol_dar; ?></td>
                                    <td><?= $value->nama_suami; ?></td>
                                    <td><?= $value->pekerjaan_suami; ?></td>
                                    <td><?= date('d F Y', strtotime($value->tgl_lahir)); ?></td>
                                    <td><?= $value->umur; ?></td>
                                    <td><?= $value->alamat; ?></td>
                                    <td><?= $value->kelurahan; ?></td>
                                    <td><?= $value->notelp; ?></td>
                                    <td>
                                        <a class="btn btn-warning mt-1" href="<?php echo base_url('admin/puskesmas/editIbuhamil/' . $value->id_reg); ?>"><i class="fas fa-pen"></i> Update</a>
                                        <a class="btn btn-danger mt-1" href="<?php echo base_url('admin/puskesmas/deleteIbuhamil/' . $value->id_reg); ?>"><i class="fas fa-trash"></i> Delete</a>
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
            </script>
        </div>
    </div>
</div>