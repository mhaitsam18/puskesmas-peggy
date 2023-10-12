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
                <a href="<?php echo site_url('posyandu/pasienrujukan') ?>"><i class="fas fa-arrow-left"></i>Back</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Detail Pasien Rujukan</b></h4>
                </div>
            </div>
            
    <div class="card-body">
        <br>
        <br>
        <center><table width="50%" class="table" height="50% ">
            <thead>
                <tr>
                    <td>ID Rujukan</td>
                    <td>:</td>
                    <td><?php echo $pasienrujukan->id_rujukan ?></td>
                </tr>
                <tr>
                    <td>Nomor Rujukan</td>
                    <td>:</td>
                    <td><?php echo $pasienrujukan->no_rujukan ?></td>
                </tr>
                <tr>
                    <td>Puskesmas</td>
                    <td>:</td>
                    <td><?php echo $pasienrujukan->puskesmas ?></td>
                </tr>
                <!-- <tr>
                    <td>Rumah Sakit</td>
                    <td>:</td>
                    <td><?php echo $pasienrujukan->rumahsakit ?></td>
                </tr> -->
                <tr>
                    <td>KAB/KOTA</td>
                    <td>:</td>
                    <td><?php echo $pasienrujukan->kab_kota ?></td>
                </tr>
                <tr>
                    <td>Poli</td>
                    <td>:</td>
                    <td><?php echo $pasienrujukan->poli ?></td>
                </tr>
                <tr>
                    <td>Nama Pasien</td>
                    <td>:</td>
                    <td><?php echo $pasienrujukan->namapasien ?></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>:</td>
                    <td><?php echo $pasienrujukan->umur?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $pasienrujukan->alamat ?></td>
                </tr>
                <tr>
                    <td>Nomor Pasien</td>
                    <td>:</td>
                    <td><?php echo $pasienrujukan->nopasien ?></td>
                </tr>
                <tr>
                    <td>Diagnosa Sementara</td>
                    <td>:</td>
                    <td><?php echo $pasienrujukan->diagnosa ?></td>
                </tr>
                <tr>
                    <td>Tanggal Pembuatan</td>
                    <td>:</td>
                    <td><?php echo $pasienrujukan->tgl_pembuatan ?></td>
                </tr>
        
            </thead>
            <tbody>
            </tbody>
        </table></center>
        <center>
<a class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Print</a>
</center>
        </div>
    </div> <!-- /.card -->
</div>  