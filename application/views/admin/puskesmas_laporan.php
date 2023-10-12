<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Laporan Puskesmas</div>
                </div>
            </div>
        </div>
        <form action="<?=base_url('admin/puskesmas/laporanPuskesmas')?>" method="POST">
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
                        <select class="custom-select" id="bulan" name="bulan">
                            <option selected value="">Pilih Bulan</option>
                            <?php $num = 1; foreach ($bulan as $item): ?>
                            <option value="<?=str_pad($num++, 2, "0", STR_PAD_LEFT)?>"><?=$item?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <!-- <div class="col-2">
                    <div class="input-group mb-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="tahun" aria-describedby="emailHelp" placeholder="Tahun" name="tahun" required>
                        </div>
                    </div>
                </div> -->
                <div class="col-2">
                    <!-- <label for="exampleInputEmail1">asdas</label> -->
                    <div class="input-group mb-3">
                        <button class="btn btn-primary" type="submit" name="cari">Cari</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <?php $no = 1; foreach ($graph as $item): ?>
            <div class="col-md-12 col-lg-6">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                            <?=$item?>
                        </div>
                        <ul class="nav">
                            <!-- <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">Last</a></li> -->
                            <li class="nav-item">

                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                <div class="card mb-3 widget-chart widget-chart2 text-left w-80">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                            <canvas id="myChart<?=$no++;?>"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <!-- grafik -->

            <div class="col-sm">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table class="display" id="example">
                            <thead>
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                    foreach ($ibuhamils as $data) {
                                    $no++;?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data->nama ?></td>
                                    <td><?php echo $data->pekerjaan ?></td>
                                    <td><?php echo $data->nama_suami ?></td>
                                    <td><?php echo $data->pekerjaan_suami ?></td>
                                    <td><?php echo $data->umur ?></td>
                                    <td><?php echo $data->alamat ?></td>
                                    <td><?php echo $data->kelurahan ?></td>
                                    <td><?php echo $data->notelp ?></td>
                                    <td><a href="<?php echo site_url('admin/puskesmas/laporanDetail/' . $data->id_reg) ?>" class="btn btn-small text-info"><i class="fas fa-eye"></i> Detail</a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <script>
                $(document).ready(function() {
                $('#myTable').DataTable();});
            </script>
        </div>
    </div>
</div>
