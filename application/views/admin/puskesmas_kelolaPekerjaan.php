<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Kelola Kategori</div>
                </div>
            </div>
        </div>
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-4">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5>Pekerjaan Pasien</h5>
                        <a href="#" class="mb-2 mr-2 btn btn-success" data-toggle="modal" data-target="#pekerjaanPasienModal">Tambah Pekerjaan Pasien</a>
                        <table class="mb-0 table" id="kategorijp">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pekerjaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                    foreach ($Ppasien as $key => $value) 
                                    { $no++;?>
                                <tr>
                                    <td><?=$no;?></td>
                                    <td><?=$value['nama_pekerjaan'];?></td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href="#" class="mb-2 mr-1 btn btn-warning" data-toggle="modal" data-target="#editPekerjaanPasienModal<?=$value['id_pekerjaan']?>">Edit</a>
                                            <a href="<?=base_url('admin/puskesmas/deletePekerjaan/') . $value['id_pekerjaan'];?>" class="mb-2 mr-1 btn btn-danger"  onclick="return confirm('Are you sure?')">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5>Pekerjaan Suami</h5>
                        <a href="#" class="mb-2 mr-2 btn btn-success" data-toggle="modal" data-target="#pekerjaanSuamiModal">Tambah Pekerjaan Suami</a>
                        <table class="mb-0 table" id="kategorikh">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pekerjaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                    foreach ($Psuami as $key => $value) {
                                    $no++;?>
                                <tr>
                                    <td><?=$no;?></td>
                                    <td><?=$value['nama_pekerjaan'];?></td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href="#" class="mb-2 mr-1 btn btn-warning" data-toggle="modal" data-target="#editPekerjaanSuamiModal<?=$value['id_pekerjaan']?>">Edit</a>
                                            <a href="<?=base_url('admin/puskesmas/deletePekerjaan/') . $value['id_pekerjaan'];?>" class="mb-2 mr-1 btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="pekerjaanPasienModal" tabindex="-1" aria-labelledby="pekerjaanPasienModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pekerjaanPasienModalLabel">Tambah Data Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/Puskesmas/addPekerjaan') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_pekerjaan">Nama Pekerjaan</label>
                        <input type="text" class="form-control" name="nama_pekerjaan" id="nama_pekerjaan">
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <input type="text" class="form-control" name="tipe" id="tipe" value="Pasien" readonly="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="pekerjaanSuamiModal" tabindex="-1" aria-labelledby="pekerjaanSuamiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pekerjaanSuamiModalLabel">Tambah Data Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/Puskesmas/addPekerjaan') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_pekerjaan">Nama Pekerjaan</label>
                        <input type="text" class="form-control" name="nama_pekerjaan" id="nama_pekerjaan">
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <input type="text" class="form-control" name="tipe" id="tipe" value="Suami" readonly="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($pekerjaan as $item): ?>
    
    <!-- Modal -->
    <div class="modal fade" id="editPekerjaanPasienModal<?= $item['id_pekerjaan'] ?>" tabindex="-1" aria-labelledby="editPekerjaanPasienModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPekerjaanPasienModalLabel">Edit Data Pekerjaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/Puskesmas/updatePekerjaan') ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id_pekerjaan" id="id_pekerjaan" value="<?= $item['id_pekerjaan'] ?>">
                        <div class="form-group">
                            <label for="nama_pekerjaan">Nama Pekerjaan</label>
                            <input type="text" class="form-control" name="nama_pekerjaan" id="nama_pekerjaan" value="<?= $item['nama_pekerjaan'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="tipe">Tipe</label>
                            <input type="text" class="form-control" name="tipe" id="tipe" value="Pasien" readonly="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editPekerjaanSuamiModal<?= $item['id_pekerjaan']?>" tabindex="-1" aria-labelledby="editPekerjaanSuamiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPekerjaanSuamiModalLabel">Edit Data Pekerjaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/Puskesmas/updatePekerjaan') ?>" method="post">
                    <div class="modal-body">
                    <input type="hidden" class="form-control" name="id_pekerjaan" id="id_pekerjaan" value="<?= $item['id_pekerjaan'] ?>">
                        <div class="form-group">
                            <label for="nama_pekerjaan">Nama Pekerjaan</label>
                            <input type="text" class="form-control" name="nama_pekerjaan" id="nama_pekerjaan" value="<?= $item['nama_pekerjaan'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="tipe">Tipe</label>
                            <input type="text" class="form-control" name="tipe" id="tipe" value="Suami" readonly="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach ?>