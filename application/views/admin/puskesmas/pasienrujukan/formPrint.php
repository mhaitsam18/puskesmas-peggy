<div class="container-fluid">

    <?php $this->load->view('admin/_partials/breadcrumb');?>
    
    <?php if ($this->session->flashdata('success')){ ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php }else if ($this->session->flashdata('error')){ ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php }?>

    <!-- DataTables -->
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <a href="<?php echo site_url('puskesmas/pasienrujukan_index') ?>"><i class="fas fa-angle-left"></i> Kembali</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>SURAT RUJUKAN PASIEN</b></h4>
                </div>
            </div>

            
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="id_rujukan">ID Rujukan *</label>
                        <input class="form-control <?php echo form_error('id_rujukan') ? 'is-invalid':'' ?>"
                            type="text" name="id_rujukan" placeholder="ID Rujukan" value="<?= $pasienrujukan->id_rujukan; ?>" readonly/>
                        <div class="invalid-feedback">
                            <?php echo form_error('id_rujukan') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="no_rujukan">Nomor Rujukan *</label>
                        <input class="form-control <?php echo form_error('no_rujukan') ? 'is-invalid':'' ?>"
                            type="text" name="no_rujukan" placeholder="Nomor Rujukan" value="<?= $pasienrujukan->no_rujukan; ?>" readonly />
                        <div class="invalid-feedback">
                            <?php echo form_error('no_rujukan') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="puskesmas">Puskesmas *</label>
                        <input class="form-control <?php echo form_error('puskesmas') ? 'is-invalid':'' ?>"
                            type="text" name="puskesmas" placeholder="Puskesmas" value="<?= $pasienrujukan->puskesmas; ?>" readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('puskesmas') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rumahsakit">Rumah Sakit *</label>
                        <input class="form-control <?php echo form_error('rumahsakit') ? 'is-invalid':'' ?>"
                            type="text" name="rumahsakit" placeholder="Rumah Sakit" value="<?= $pasienrujukan->rumahsakit; ?>"readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('rumahsakit') ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="kab_kota">Kabupaten/Kota *</label>
                        <input class="form-control <?php echo form_error('kab_kota') ? 'is-invalid':'' ?>"
                            type="text" name="kab_kota" placeholder="Kabupaten/Kota" value="<?= $pasienrujukan->kab_kota; ?>"readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('kab_kota') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="poli">Poli Yang Dituju *</label>
                        <input class="form-control <?php echo form_error('poli') ? 'is-invalid':'' ?>"
                            type="text" name="poli" placeholder="Poli Yang Dituju" value="<?= $pasienrujukan->poli; ?>"readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('poli') ?>
                        </div>
                    </div>
                </div>

                
                
                <div class="col">
                    <div class="form-group">
                        <label for="namapasien">Nama Pasien *</label>
                        <input class="form-control <?php echo form_error('namapasien') ? 'is-invalid':'' ?>"
                            type="text" name="namapasien" placeholder="Nama Pasien" value="<?= $pasienrujukan->namapasien; ?>" readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('namapasien') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur Pasien *</label>
                        <input class="form-control <?php echo form_error('umur') ? 'is-invalid':'' ?>"
                            type="text" name="umur" placeholder="Umur Pasien" value="<?= $pasienrujukan->umur; ?>" readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('umur') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Pasien *</label>
                        <input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
                            type="text" name="alamat" placeholder="Alamat Pasien" value="<?= $pasienrujukan->alamat; ?>" readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('alamat') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nopasien">Nomor Pasien *</label>
                        <input class="form-control <?php echo form_error('nopasien') ? 'is-invalid':'' ?>"
                            type="text" name="nopasien" placeholder="Nomor Pasien" value="<?= $pasienrujukan->nopasien; ?>" readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('nopasien') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="diagnosa">Diagnosa Pasien *</label>
                        <input class="form-control <?php echo form_error('diagnosa') ? 'is-invalid':'' ?>"
                            type="text" name="diagnosa" placeholder="Diagnosa Pasien" value="<?= $pasienrujukan->diagnosa; ?>" readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('diagnosa') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pembuatan">Tanggal Pembuatan Surat *</label>
                        <input class="form-control <?php echo form_error('tgl_pembuatan') ? 'is-invalid':'' ?>"
                            type="text" name="tgl_pembuatan" placeholder="Tanggal Pembuatan Surat" value="<?= $pasienrujukan->tgl_pembuatan; ?>" readonly>
                        <div class="invalid-feedback">
                            <?php echo form_error('tgl_pembuatan') ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
<script>
function detailConfirm(id_rujukan, no_rujukan,puskesmas,rumahsakit, kab_kota, poli, namapasien, umur, alamat, nopasien, diagnosa, tgl_pembuatan)
{

    $('#id-rujukan').attr('value',id_rujukan);
    $('#no-rujukan').attr('value',no_rujukan);
    $('#puskesmas').attr('value',puskesmas);
    $('#rumahsakit').attr('value',rumahsakit);
    $('#kab-kota').attr('value',kab_kota);
    $('#poli').attr('value',poli);
    $('#namapasien').attr('value',namapasien);
    $('#umur').attr('value',umur);
    $('#alamat').attr('value',alamat);
    $('#nopasien').attr('value',nopasien);
    $('#diagnosa').attr('value',diagnosa);
    $('#tgl-pembuatan').attr('value',tgl_pembuatan);
    $('#detailModal').modal();
}
</script>

<center>
<a class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Print</a>
</center>