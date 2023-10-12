<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Pasien Rujukan</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <!-- <div class="alert alert-success fade show" role="alert">Data berhasil ditambah! </div> -->
                        <?=$this->session->flashdata('pesan')?>
                        <a class="mb-2 mr-2 btn btn-success" style="color: white;" href="<?=base_url('admin/posyandu/tambahRujukan1')?>">Tambah</a>
                        <table class="display" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Rujukan</th>
                                    <th>Nomor Rujukan</th>
                                    <th>Puskesmas</th>
                                    <!-- <th>Rumah Sakit</th> -->
                                    <th>KAB/KOTA</th>
                                    <th>POLI</th>
                                    <th>Nama Pasien</th>
                                    <th>Alamat</th>
                                    <th>Nomor Pasien</th>
                                    <th>Diagnosa Sementara</th>
                                    <th>Tanggal Pembuatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                    foreach ($pasienrujukans as $pasienrujukan) {
                                    $no++;?>
                                <tr>
                                    <td width="80"><?=$no++;?></td>
                                    <td width="150">
                                        <?=$pasienrujukan->id_rujukan;?>
                                    </td>
                                    <td width="150">
                                        <?=$pasienrujukan->no_rujukan;?>
                                    </td>
                                    <td>
                                        <?=$pasienrujukan->puskesmas;?>
                                    </td>
                                    <!-- <td>
                                    <?=$pasienrujukan->rumahsakit;?>
                                    </td> -->
                                    <td width="150">
                                        <?=$pasienrujukan->kab_kota;?>
                                    </td>
                                    <td width="150">
                                        <?=$pasienrujukan->poli;?>
                                    </td>
                                    <td width="100">
                                        <?=$pasienrujukan->namapasien;?>
                                    </td>
                                    <td>
                                        <?=$pasienrujukan->alamat;?>
                                    </td>
                                    <td>
                                        <?=$pasienrujukan->nopasien;?>
                                    </td>
                                    <td>
                                        <?=$pasienrujukan->diagnosa;?>
                                    </td>
                                    <td>
                                        <?=$pasienrujukan->tgl_pembuatan;?>
                                    </td>
                                    <td>
                                        <a href="<?=site_url('admin/posyandu/edit_form/' . $pasienrujukan->id_rujukan)?>" class="btn btn-small text-warning"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="<?=site_url('admin/posyandu/delete/' . $pasienrujukan->id_rujukan);?>" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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