<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Daftar Pasien Rujukan</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <?=$this->session->flashdata('pesan')?>
                        <a class="mb-2 mr-2 btn btn-success" style="color: white;" href="<?=base_url('admin/puskesmas/tambahRujukan1')?>">Tambah</a>
                        <table class="display" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Rujukan</th>
                                    <th>No Rujukan</th>
                                    <th>Puskesmas</th>
                                    <th>Rumah sakit</th>
                                    <th>Kab/Kota</th>
                                    <th>Poli Suami</th>
                                    <th>Nama Pasien</th>
                                    <th>Alamat</th>
                                    <th>No Pasien</th>
                                    <th>Diagnosa</th>
                                    <th>Tanggal Pembuatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;foreach ($pasienrujukans as $value) {$no++;?>
                                <tr>
                                    <td><?=$no;?></td>
                                    <td><?php echo $value->id_rujukan; ?></td>
                                    <td><?php echo $value->no_rujukan; ?></td>
                                    <td><?php echo $value->puskesmas ?></td>
                                    <td><?php echo $value->rumahsakit; ?></td>
                                    <td><?php echo $value->kab_kota; ?></td>
                                    <td><?php echo $value->poli; ?></td>
                                    <td><?php echo $value->namapasien; ?></td>
                                    <td><?php echo $value->alamat; ?></td>
                                    <td><?php echo $value->nopasien; ?></td>
                                    <td><?php echo $value->diagnosa; ?></td>
                                    <td><?php echo $value->tgl_pembuatan; ?></td>
                                    <td>
                                        <a href="<?=site_url('admin/puskesmas/edit_form/' . $value->id_rujukan)?>" class="btn btn-small text-warning"><i class="fas fa-edit"></i> Edit</a>

                                        <a href="<?=site_url('admin/puskesmas/delete/' . $value->id_rujukan);?>" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
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