

<!-- Begin Page Content -->
        <div class="container-fluid">
<?php $this->load->view('admin/_partials/breadcrumb');?>
        	<h1 class="h3 mb-2 text-gray-800">Data Pasien</h1>
          <div class="card shadow mb-4">
          	<div class="card-header">
				<a href="#" onclick="javascript:window.history.back()"><i class="fas fa-arrow-left"></i>
                Back</a>
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
    <br>
    <h1 class="h3 mb-2 text-gray-800">Data Pencatatan</h1>
    <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    	<th>Tanggal</th>
                      <th>Id Pencatatan</th>
                      <th>Nama Bidan</th>
                      <th>Diagnosa</th>
                      <th>Penyuluhan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    	<th>Tanggal</th>
                      <th>Id Pencatatan</th>
                      <th>Nama Bidan</th>
                      <th>Diagnosa</th>
                      <th>Penyuluhan</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php
                  	$no=1; 
                  		foreach ($pencatatan as $data): 
                  		?>
                    <tr>
                      <td><?php echo $data->tgl_pencatatan ?></td>
                      <td><?php echo $data->id_pencatatan ?></td>
                      <td><?php echo $data->nama_bidan ?></td>
                      <td><?php echo $data->diagnosa ?></td>
                      <td><?php echo $data->penyuluhan ?></td>
                      <td width="250">
                      	<a href="" class="btn btn- text-info" class="btn btn-primary" data-toggle="modal" data-target="#modaldetail<?php echo $data->id_pencatatan?>"><i class="fas fa-info-circle"></i> More</a>

                      	<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaldetail<?php echo $data->id_pencatatan?>">
						  More
						</button> -->
					</td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- Logout Delete Confirmation-->

        <?php 
        	foreach ($pencatatan as $datas){


         ?>
		<div class="modal fade" id="modaldetail<?php echo $datas->id_pencatatan?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Detail Pencatatan</h5>
		        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">×</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      		<center><table width="50%" class="table" height="50% ">
			            <thead>
			                <tr>
			                    <td>Tanggal Pencatatan</td>
			                    <td>:</td>
			                    <td><?php echo $datas->tgl_pencatatan ?></td>
			                </tr>
			                <tr>
			                    <td>Id Pencatatan</td>
			                    <td>:</td>
			                    <td><?php echo $datas->id_pencatatan ?></td>
			                </tr>
			                <tr>
			                    <td>Nama Bidan</td>
			                    <td>:</td>
			                    <td><?php echo $datas->nama_bidan?></td>
			                </tr>
			                <tr>
			                    <td>Umur</td>
			                    <td>:</td>
			                    <td><?php echo $datas->umur ?></td>
			                </tr>
			                <tr>
			                    <td>Kategori</td>
			                    <td>:</td>
			                    <td><?php echo $datas->kategori ?></td>
			                </tr>
			                <tr>
			                    <td>Tinggi Badan</td>
			                    <td>:</td>
			                    <td><?php echo $datas->tinggi ?></td>
			                </tr>
			                <tr>
			                    <td>Berat Badan</td>
			                    <td>:</td>
			                    <td><?php echo $datas->bb ?></td>
			                </tr>
			                <tr>
			                    <td>Temperatur</td>
			                    <td>:</td>
			                    <td><?php echo $datas->temperatur ?></td>
			                </tr>
			                <tr>
			                    <td>Lingkar</td>
			                    <td>:</td>
			                    <td><?php echo $datas->lingkar ?></td>
			                </tr>
			                <tr>
			                    <td>Jenis Imunisasi</td>
			                    <td>:</td>
			                    <td><?php echo $datas->jenis_imunisasi ?></td>
			                </tr>
			                <tr>
			                    <td>Diagnosa</td>
			                    <td>:</td>
			                    <td><?php echo $datas->diagnosa ?></td>
			                </tr>
			                <tr>
			                    <td>Penyuluhan</td>
			                    <td>:</td>
			                    <td><?php echo $datas->penyuluhan ?></td>
			                </tr>
			                <tr>
			                    <td>Vitamin</td>
			                    <td>:</td>
			                    <td><?php echo $datas->vitamin ?></td>
			                </tr>
			                <tr>
			                    <td>Obat</td>
			                    <td>:</td>
			                    <td><?php echo $datas->obat ?></td>
			                </tr>
			                <tr>
			                    <td>No Telpon</td>
			                    <td>:</td>
			                    <td><?php echo $datas->notelp ?></td>
			                </tr>
			            </thead>
			            <tbody>
			            </tbody>
			        </table></center>
		      </div>
		      <div class="modal-footer">
		        <button class="btn btn-info" type="button" data-dismiss="modal">Kembali</button>
		      </div>
		    </div>
		  </div>
		</div>
	<?php } ?>
        <script>
		function popUpConfirm(url){
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
		</script>
        <!-- /.container-fluid -->