<div class="container-fluid">



    <?php $this->load->view('admin/_partials/breadcrumb');?>

    <!-- <div class="btn-group mb-2">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Bulan
        </button>
        <div class="dropdown-menu">
            <?php
$no = 1;
foreach ($bulan as $b): ?>
            <a class="dropdown-item"
                href="<?=base_url('puskesmas/Laporan/index/') . date('Y') . '-' . str_pad($no++, 2, "0", STR_PAD_LEFT);?>"><?=$b?></a>
            <?php endforeach;?>

        </div>
    </div> -->
    <form action="<?=base_url('puskesmas/laporan')?>" method="POST">
            <div class="row">
                <div class="col-2">
                    <div class="input-group mb-3">
                        <select class="custom-select" id="tahun" name="tahun" required>
                            <option selected value="">Pilih Tahun</option>
                            <?php foreach ($tahun as $item): ?>
                            <option value="<?=$item['tahun_daftar']?>"><?=$item['tahun_daftar']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect01" name="bulan" required>
                            <option selected value="">Pilih Bulan</option>
                            <?php
                            $num = 1;
                            foreach ($bulan as $item): ?>
                            <option value="<?=str_pad($num++, 2, "0", STR_PAD_LEFT)?>"><?=$item?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <!-- <label for="exampleInputEmail1">asdas</label> -->
                    <div class="input-group mb-3">
                        <button class="btn btn-primary" type="submit" name="cari">Cari</button>
                    </div>
                </div>
            </div>
        </form>

    <div class="row">

        <?php
$no = 1;
foreach ($namaGrafik as $item):
?>

        <div class="col-xl-6 col-lg-6">
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?=$item?></h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myy<?=$no++;?>"></canvas>
                    </div>

                </div>
            </div>
        </div>

        <?php endforeach;?>

    </div>
</div>

<!-- DataTables -->
<div class="card mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8">
            </div>
            <div class="col-md-4 pull-right">
                <h4><b>Laporan</b></h4>
            </div>
        </div>


    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Pasien</th>
                        <th>Nama</th>
                        <th>Pekerjaan</th>
                        <th>Suami</th>
                        <th>Pekerjaan Suami</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>No Hp</th>
                        <th style="text-align : center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$no = 1;

foreach ($ibuhamils as $ibuhamil): ?>
                    <tr>
                        <td width="80"><?=$no++;?></td>
                        <td width="150">
                            <?=$ibuhamil->nama;?>
                        </td>
                        <td width="100">
                            <?=$ibuhamil->pekerjaan;?>
                        </td>
                        <td>
                            <?=$ibuhamil->nama_suami;?>
                        </td>
                        <td>
                            <?=$ibuhamil->pekerjaan_suami;?>
                        </td>

                        <td>
                            <?=$ibuhamil->umur;?>
                        </td>

                        <td>
                            <?=$ibuhamil->alamat;?>
                        </td>

                        <td>
                            <?=$ibuhamil->kelurahan;?>
                        </td>

                        <td>
                            <?=$ibuhamil->notelp;?>
                        </td>
                        <td width="80">
                            <a href="<?=site_url('puskesmas/laporan/detail/' . $ibuhamil->id_reg)?>"
                                class="btn btn-small text-primary"><i class="fas fa-file-alt"></i> Lihat</a>

                        </td>
                    </tr>
                    <?php endforeach;?>

                </tbody>
            </table>
        </div>

    </div>
</div>
</div>
<script src="<?=base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
<script>
function deleteConfirm(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}
</script>
<center>
    <a class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Print</a>
</center>