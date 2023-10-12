    <div class="app-main__outer">
        <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                            </div>
                            <div>Tambah Data Diagnosis Pemeriksaan Ibu Hamil</div>
                        </div>
                    </div>
                </div>
                <form action="<?=site_url('admin/puskesmas/add_pemeriksaan2/')?>" enctype="multipart/form-data" method="POST">
                    <div class="card-body" id="formPemeriksaan">
                        <div class="card">
                            <div class="card-header">Diagnosis</div>
                            <div class="card-body">
                                <div class="container">

                                    <div class="row"><hr>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="jarak_kehamilan" class="col-sm-3 col-form-label">Id Pemeriksaan</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="id-pemeriksaan" value="<?=$this->uri->segment(4)?>" readonly name="id_pemeriksaan">
                                                </div>
                                                <label for="jarak_kehamilan" class="col-sm-2 col-form-label">Nama Pasien</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="nama-pasien" value="<?=$pemeriksaan_pasien['nama']?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row"><hr>
                                        <div class="col-lg-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="hbsag">HBSAG</label>
                                                </div>
                                                <select class="custom-select" id="hbsag" name="hbsag" autofocus required>
                                                    <option value="Negatif">Negatif</option>
                                                    <option value="Positif">Positif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="hiv">HIV</label>
                                                </div>
                                                <select class="custom-select" id="hiv" name="hiv" required>
                                                    <option value="Negatif">Negatif</option>
                                                    <option value="Positif">Positif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="sypilis">Sypilis</label>
                                                </div>
                                                <select class="custom-select" id="sypilis" name="sypilis" required>
                                                    <option value="Negatif">Negatif</option>
                                                    <option value="Positif">Positif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Bayar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                        </div>
                        </div>
                        </div>

                        <!-- Large modal -->

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Pilih Pembayaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="jenis_pembayaran">Jenis Pembayaran</label>
                                                        </div>
                                                        <select class="custom-select" id="pembayaran" name="pembayaran" autofocus required>
                                                            <?php foreach ($pembayaran as $item): ?>
                                                            <option value="<?=strtoupper($item->pembayaran)?>"><?=$item->pembayaran;?> </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <small>* Silahkan pilih jenis pembayaran</small>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Oke">
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
                    <script src="<?=base_url('assets/vendor/jquery/jquery.min.js');?>"></script>  
    </div>                                                   

