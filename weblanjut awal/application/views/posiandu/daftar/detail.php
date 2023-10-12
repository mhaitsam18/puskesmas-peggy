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
                <a href="<?php echo site_url('posyandu/Daftar') ?>"><i class="fas fa-arrow-left"></i>Back</a>
                </div>
                <div class="col-md-4 pull-right">
                    <h4><b>Detail Pendaftaran</b></h4>
                </div>
            </div>
            
    <div class="card-body">
        <br>
        <br>
        <center><table width="50%" class="table" height="50% ">
            <thead>
                <tr>
                    <td>No Pasien</td>
                    <td>:</td>
                    <td><?php echo $pendaftaran->no_pasien ?></td>
                </tr>
                <tr>
                    <td>Nama Anak</td>
                    <td>:</td>
                    <td><?php echo $pendaftaran->nama_anak ?></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>:</td>
                    <td><?php echo $pendaftaran->tempat_lahir.", ".$pendaftaran->tanggal_lahir?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?php echo $pendaftaran->jk ?></td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>:</td>
                    <td><?php echo $pendaftaran->nama_ibu ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan Ibu</td>
                    <td>:</td>
                    <td><?php echo $pendaftaran->p_ibu ?></td>
                </tr>
                <tr>
                    <td>Nama Ayah</td>
                    <td>:</td>
                    <td><?php echo $pendaftaran->nama_ayah ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan Ayah</td>
                    <td>:</td>
                    <td><?php echo $pendaftaran->p_ayah ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $pendaftaran->alamat ?></td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table></center>
        </div>
    </div> <!-- /.card -->
</div>  