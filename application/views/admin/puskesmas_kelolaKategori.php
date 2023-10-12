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
        <div class="row">
            <div class="col-md-4">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5>Jenis Pembayaran</h5>
                        <a href="#" class="mb-2 mr-2 btn btn-success" data-toggle="modal" data-target=".addJenisModal">Tambah Kategori</a>
                        <table class="mb-0 table" id="kategorijp">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                    foreach ($jenisBayar as $key => $value) 
                                    { $no++;?>
                                <tr>
                                    <td><?=$no;?></td>
                                    <td><?=$value['pembayaran'];?></td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href="#" class="mb-2 mr-1 btn btn-warning" id="editJenisBayar" data-toggle="modal" data-target=".editJenisbayarModal" data-id="<?=$value['id_jenis']?>">Edit</a>
                                            <a href="<?=base_url('admin/puskesmas/hapusKategori/jenisBayar/') . $value['id_jenis'];?>" class="mb-2 mr-1 btn btn-danger">Delete</a>
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
                        <h5>Kondisi HB</h5>
                        <a href="#" class="mb-2 mr-2 btn btn-success" data-toggle="modal"
                            data-target=".addkondisiHB">Tambah Kategori</a>
                        <table class="mb-0 table" id="kategorikh">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kondisi HB</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                    foreach ($kondisihb as $key => $value) {
                                    $no++;?>
                                <tr>
                                    <td><?=$no;?></td>
                                    <td><?=$value['kondisiHb'];?></td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href="#" class="mb-2 mr-1 btn btn-warning" id="editKondisiHb" data-toggle="modal" data-target=".editKondisiHbModal" data-id="<?=$value['id_hb']?>">Edit</a>
                                            <a href="<?=base_url('admin/puskesmas/hapusKategori/kondisiHb/') . $value['id_hb'];?>" class="mb-2 mr-1 btn btn-danger">Delete</a>
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
                        <h5>Letak Bayi</h5>
                        <a href="#" class="mb-2 mr-2 btn btn-success" data-toggle="modal"
                            data-target=".addLetakBayi">Tambah Kategori</a>
                        <table class="mb-0 table" id="kategorilb">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Letak Bayi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                    foreach ($letakbayi as $key => $value) {
                                    $no++;?>
                                <tr>
                                    <td><?=$no;?></td>
                                    <td><?=$value['letakBayi'];?></td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href="#" class="mb-2 mr-1 btn btn-warning" id="editLetakBayi" data-toggle="modal" data-target=".editLetakBayiModal" data-id="<?=$value['id_letak']?>">Edit</a>
                                            <a href="<?=base_url('admin/puskesmas/hapusKategori/letakBayi/') . $value['id_letak'];?>" class="mb-2 mr-1 btn btn-danger">Delete</a>
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

<!-- JENIS PEMBAYARAN MODAL -->
<div class="modal fade addJenisModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jenisModalTitle">Jenis Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?=form_open_multipart('admin/puskesmas/addkategori/jenisPembayaran', ['class' => 'modal-form', 'context' => 'addJenisModal']);?>
            <div class="modal-body">
                <div class="form-group form-input">
                    <div class="row">
                        <div class="col-md-2 text-sm-left">
                            <label for="input-jenisPembayaran" class="col-form-label text-dark">Jenis Pembayaran</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="jenisPembayaran" class="form-control" id="input-jenisPembayaran">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>

<div class="modal fade editJenisbayarModal" id="ModaleditJenisbayar" tabindex="-1" role="dialog"
    aria-labelledby="editJenisbayarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jenisModalTitle">Jenis Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?=form_open_multipart('admin/puskesmas/editKategori/jenisPembayaran', ['class' => 'modal-form', 'context' => 'editJenisbayarModal']);?>
            <div class="modal-body" id="ModalBody">
                <div class="form-group form-input">
                    <div class="row">
                        <div class="col-md-2 text-sm-left">
                            <label for="input-jenisPembayaran" class="col-form-label text-dark">Jenis Pembayaran</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="jenisPembayaran" class="form-control" id="input-jenisPembayaran">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>

<!-- KONDISI HB MODAL -->
<div class="modal fade addkondisiHB" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kondisiHBTitle">Kondisi HB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?=form_open_multipart('admin/puskesmas/addkategori/kondisiHB', ['class' => 'modal-form', 'context' => 'addJenisModal']);?>
            <div class="modal-body">
                <div class="form-group form-input">
                    <div class="row">
                        <div class="col-md-2 text-sm-left">
                            <label for="input-kondisiHB" class="col-form-label text-dark">KondisiHB</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="kondisiHB" class="form-control" id="input-kondisiHB">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>

<div class="modal fade editKondisiHbModal" id="ModalEditKondisiHb" tabindex="-1" role="dialog"
    aria-labelledby="editKondisiHbModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kondisiHBTitle">Kondisi HB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?=form_open_multipart('admin/puskesmas/addkategori/kondisiHB', ['class' => 'modal-form', 'context' => 'editKondisiHbModal']);?>
            <div class="modal-body" id="ModalBody">
                <div class="form-group form-input">
                    <div class="row">
                        <div class="col-md-2 text-sm-left">
                            <label for="input-kondisiHB" class="col-form-label text-dark">KondisiHB</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="kondisiHB" class="form-control" id="input-kondisiHB">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>

<!-- LETAK BAYI MODAL -->
<div class="modal fade addLetakBayi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="letakBayiTitle">Letak Bayi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?=form_open_multipart('admin/puskesmas/addkategori/letakBayi', ['class' => 'modal-form', 'context' => 'addJenisModal']);?>
            <div class="modal-body">
                <div class="form-group form-input">
                    <div class="row">
                        <div class="col-md-2 text-sm-left">
                            <label for="input-letakBayi" class="col-form-label text-dark">Letak Bayi</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="letakBayi" class="form-control" id="input-letakBayi">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>

<div class="modal fade editLetakBayiModal" id="ModalEditLetakBayi" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="letakBayiTitle">Letak Bayi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?=form_open_multipart('admin/puskesmas/addkategori/letakBayi', ['class' => 'modal-form', 'context' => 'editLetakBayiModal']);?>
            <div class="modal-body" id="ModalBody">
                <div class="form-group form-input">
                    <div class="row">
                        <div class="col-md-2 text-sm-left">
                            <label for="input-letakBayi" class="col-form-label text-dark">Letak Bayi</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="letakBayi" class="form-control" id="input-letakBayi">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>

<!-- kelola kategori pekerjaan -->
<div class="modal fade pekerjaan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pekerjaanTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>

                </button>
            </div>
            <?=form_open_multipart('admin/puskesmas/addkategori/pekerjaan', ['class' => 'modal-form', 'id' => 'pekerjaan']);?>
            <div class="modal-body">
                <div class="form-group form-input">
                    <div class="row">
                        <div class="col-md-2 text-sm-left">
                            <label for="input-pekerjaan" id="pekerjaanLabel" class="col-form-label text-dark"></label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="pekerjaan" class="form-control" id="input-pekerjaan">
                            <input type="text" name="tipe" class="form-control" id="input-tipe" hidden>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" id="submitButton" class="btn btn-primary"></button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>
