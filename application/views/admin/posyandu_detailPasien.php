<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Daftar Pasien</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <a href="<?=base_url('admin/posyandu/daftarPasien')?>" class="btn btn-danger mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <center>
                            <table width="50%" class="table" height="50% ">
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
                                        <td><?php echo $pendaftaran->tempat_lahir . ", " . $pendaftaran->tanggal_lahir ?>
                                        </td>
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
                            </table>
                        </center>
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
