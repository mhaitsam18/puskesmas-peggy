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
        <a href="<?=base_url('admin/posyandu/pencatatanMedis')?>" class="btn btn-danger mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5>Kategori Usia</h5>
                        <a href="#" class="mb-2 mr-2 btn btn-success addKategoriUsia" data-toggle="modal"
                            data-target=".formKategoriModal">Tambah Kategori</a>
                        <table class="mb-0 table" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kataegori Usia</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                    foreach ($kategoriUsia as $key => $value) {
                                    $no++;?>
                                    <tr>
                                        <td><?=$no;?></td>
                                        <td><?=$value['usia'];?></td>
                                        <td>
                                            <a href="#" class="mb-2 mr-1 btn btn-warning editKategoriUsia" data-toggle="modal" data-target=".formKategoriModal" data-id="<?=$value['id_usia']?>">Edit</a>
                                            <a href="<?=base_url('admin/posyandu/hapusKategori/kategoriUsia/') . $value['id_usia'];?>" class="mb-2 mr-1 btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5>Imunisasi</h5>
                        <a href="#" class="mb-2 mr-2 btn btn-success addImunisasi" data-toggle="modal" data-target=".formKategoriModal">Tambah Kategori</a>
                        <table class="mb-0 table" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Imunisasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                    foreach ($imunisasi as $key => $value) {
                                    $no++;?>
                                    <tr>
                                        <td><?=$no;?></td>
                                        <td><?=$value['imunisasi'];?></td>
                                        <td>
                                            <a href="#" class="mb-2 mr-1 btn btn-warning editImunisasi" data-toggle="modal" data-target=".formKategoriModal" data-id="<?=$value['id_imunisasi']?>">Edit</a>
                                            <a href="<?=base_url('admin/posyandu/hapusKategori/imunisasi/') . $value['id_imunisasi'];?>" class="mb-2 mr-1 btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5>Vitamin</h5>
                        <a href="#" class="mb-2 mr-2 btn btn-success addVitamin" data-toggle="modal" data-target=".formKategoriModal">Tambah Kategori</a>
                        <table class="mb-0 table" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Vitamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                        foreach ($vitamin as $key => $value) {
                                        $no++;?>
                                    <tr>
                                        <td><?=$no;?></td>
                                        <td><?=$value['vitamin'];?></td>
                                        <td>
                                            <a href="#" class="mb-2 mr-1 btn btn-warning editVitamin" data-toggle="modal" data-target=".formKategoriModal" data-id="<?=$value['id_vitamin']?>">Edit</a>
                                            <a href="<?=base_url('admin/posyandu/hapusKategori/vitamin/') . $value['id_vitamin'];?>" class="mb-2 mr-1 btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5>Obat Cacing</h5>
                        <a href="#" class="mb-2 mr-2 btn btn-success addObat" data-toggle="modal" data-target=".formKategoriModal">Tambah Kategori</a>
                        <table class="mb-0 table" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Obat Cacing</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                    foreach ($obatCacing as $key => $value) {
                                    $no++;?>
                                    <tr>
                                        <td><?=$no;?></td>
                                        <td><?=$value['obatCacing'];?></td>
                                        <td>
                                            <a href="#" class="mb-2 mr-1 btn btn-warning editObat" data-toggle="modal" data-target=".formKategoriModal" data-id="<?=$value['id_obat']?>">Edit</a>
                                            <a href="<?=base_url('admin/posyandu/hapusKategori/obatCacing/') . $value['id_obat'];?>" class="mb-2 mr-1 btn btn-danger">Delete</a>
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

<div class="modal fade formKategoriModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
            </div>
            <?=form_open_multipart('admin/puskesmas/addkategori/kategoriUsia', ['class' => 'modal-form', 'context' => 'formKategoriModal']);?>
            <div class="modal-body">
                <div class="form-group form-input">
                    <div class="row">
                        <div class="col-md-2 text-sm-left">
                            <label for="input-Modal" class="col-form-label text-dark formModalLabel"></label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="" class="form-control" id="input-Modal">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submitButton"></button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>
