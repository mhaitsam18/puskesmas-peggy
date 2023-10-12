<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Data Ibu Hamil</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <a href="<?=base_url('admin/puskesmas/ibuHamil')?>" class="btn btn-danger mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Ibu Hamil</h5>
                        <form class="" action="<?=base_url('admin/puskesmas/addIbuHamil')?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_reg">ID Pasien *</label>
                                    <input class="form-control <?php echo form_error('id_reg') ? 'is-invalid' : '' ?>" type="text" name="id_reg" placeholder="ID Pasien" required>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_suami') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Pasien*</label>
                                    <div class="form-group">
                                        <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="Nama Pasien" required />
                                        <div class="invalid-feedback">
                                            Nama harus di isi
                                            <?php echo form_error('nama') ?>
                                        </div>
                                        <div class="valid-feedback">
                                            Looks Good
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan Pasien*</label>
                                    <input class="form-control <?php echo form_error('pekerjaan') ? 'is-invalid' : '' ?>"
                                    type="text" name="pekerjaan" placeholder="Pekerjaan Pasien" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('pekerjaan') ?>
                                    </div>
                                    <div class="valid-feedback">
                                        Looks Good
                                    </div>
                                </div> -->

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="pekerjaan">Pekerjaan Pasien</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="pekerjaan" required>
                                            <option selected>Pilih Pekerjaan</option>
                                            <?php foreach ($pekerjaan_pasien as $item): ?>
                                                <option value="<?= $item['nama_pekerjaan'] ?>"><?= $item['nama_pekerjaan'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>



                                    <!-- <div class="form-group">
                                        <label for="gol_dar">Golongan Darah Pasien *</label>
                                        <input class="form-control <?php echo form_error('gol_dar') ? 'is-invalid' : '' ?>"
                                        type="text" name="gol_dar" placeholder="Golongan Darah Pasien"></textarea>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('gol_dar') ?>
                                        </div>
                                    </div> -->

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="gol_dar">Gologan Darah</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="gol_dar" required>
                                            <option selected>Pilih Golongan Darah</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_suami">Nama Suami *</label>
                                        <input
                                            class="form-control <?php echo form_error('nama_suami') ? 'is-invalid' : '' ?>"
                                            type="text" name="nama_suami" placeholder="Nama Suami" required>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('nama_suami') ?>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                    <label for="pekerjaan_suami">Pekerjaan Suami *</label>
                                    <input class="form-control <?php echo form_error('pekerjaan_suami') ? 'is-invalid' : '' ?>"
                                    type="text" name="pekerjaan_suami" placeholder="Pekerjaan Suami"></textarea>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('pekerjaan_suami') ?>
                                    </div>
                                    </div> -->

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="pekerjaan_suami">Pekerjaan Suami Pasien</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="pekerjaan_suami" required>
                                            <option selected>Pilih Pekerjaan</option>
                                            <?php foreach ($pekerjaan_suami as $item): ?>
                                                <option value="<?= $item['nama_pekerjaan'] ?>"><?= $item['nama_pekerjaan'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tgl_lahir">Tanggal Lahir*</label>
                                            <input type="date" class="form-control <?php echo form_error('tgl_lahir') ? 'is-invalid' : '' ?>" name="tgl_lahir" id="tgl_lahir" required>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('tgl_lahir') ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="umur">Umur*</label>
                                            <div id="ctn">
                                                <input type="number" class="form-control <?php echo form_error('umur') ? 'is-invalid' : '' ?>" name="umur" placeholder="Umur Pasien" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat *</label>
                                        <textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat" name="alamat" placeholder="Alamat" rows="3" required></textarea>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('alamat') ?>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="kelurahan">Kelurahan</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="kelurahan" required>
                                            <option selected>Pilih Kelurahan Alamat</option>
                                            <option value="27 Ilir">27 Ilir</option>
                                            <option value="28 Ilir">28 Ilir</option>
                                            <option value="29 Ilir">29 Ilir</option>
                                            <option value="30 Ilir">30 Ilir</option>
                                            <option value="32 Ilir">32 Ilir</option>
                                            <option value="35 Ilir">35 Ilir</option>
                                            <option value="Kemang Manis">Kemang Manis</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="notelp">No Telephone *</label>
                                        <input class="form-control <?php echo form_error('notelp') ? 'is-invalid' : '' ?>" type="number" name="notelp" placeholder="Nomor Telephone" required>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('notelp') ?>
                                        </div>
                                    </div>
                                    <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                                </div>
                                <div class="card-footer small text-muted">
                                    * required fields
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
<script>
    // ambil elements yg di buutuhkan
var keyword = document.getElementById('tgl_lahir');

var container = document.getElementById('ctn');

// tambahkan event ketika keyword ditulis

keyword.addEventListener('change', function () {


    //buat objek ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', '<?= base_url('admin/Puskesmas/prosesUmur/') ?>' + keyword.value, true);
    xhr.send();


});

$( function() {
    $( "#datepicker" ).datepicker({                  
        minDate: moment().add('d', 1).toDate(),
    });
  } );
</script>