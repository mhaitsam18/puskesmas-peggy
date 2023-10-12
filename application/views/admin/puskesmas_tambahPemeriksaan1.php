<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Daftar Ibu Hamil</div>
                </div>
            </div>
        </div>
        <div class="card-body">
                        <table class="display" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Pasien</th>
                                    <th>Nama Pasien</th>
                                    <th>Pekerjaan</th>
                                    <th>Gol Darah</th>
                                    <th>Nama Suami</th>
                                    <th>Pekerjaan Suami</th>
                                    <th>Umur</th>
                                    <th>Alamat</th>
                                    <th>kelurahan</th>
                                    <th>No Telp</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0; foreach ($ibuhamil as $value) {  $no++;?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?php echo $value->id_reg; ?></td>
                                        <td><?php echo $value->nama; ?></td>
                                        <td><?php echo $value->pekerjaan ?></td>
                                        <td><?php echo $value->gol_dar; ?></td>
                                        <td><?php echo $value->nama_suami; ?></td>
                                        <td><?php echo $value->pekerjaan_suami; ?></td>
                                        <td><?php echo $value->umur; ?></td>
                                        <td><?php echo $value->alamat; ?></td>
                                        <td><?php echo $value->kelurahan; ?></td>
                                        <td><?php echo $value->notelp; ?></td>
                                        <td width="250"><a href="<?php echo site_url('admin/puskesmas/tambahPemeriksaan2/'.$value->id_reg) ?>" class="btn btn- text-info"><i class="fas fa-edit"></i> Periksa</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script>
            </script>
        <!-- Logout Delete Confirmation-->
   <div class="modal fade" id="notifSukses" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Berhasil Disimpan!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Lanjut Ke Data Pasien Rujukan ?</p>
      </div>
      <div class="modal-footer">
        <a href="<?php echo site_url('puskesmas/Pemeriksaan') ?>"><button type="button" class="btn btn-danger">Batal</button></a>
        <a href="<?php echo site_url('puskesmas/pasienrujukan') ?>"><button type="button" class="btn btn-primary">Lanjut</button></a>
      </div>
    </div>
  </div>
</div>

<?php 

if ($this->session->flashdata('success')): ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    $('#notifSukses').modal('show'); });
</script>
<?php endif; ?>