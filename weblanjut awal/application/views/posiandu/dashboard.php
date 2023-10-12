

	<!-- Begin Page Content -->
<div class="container-fluid">
<?php if ($this->session->flashdata('success')){ ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php }else if ($this->session->flashdata('error')){ ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php }?>

<?php $this->load->view('admin/_partials/breadcrumb');?>
	<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Pendaftaran</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlDaftar[0]->jml?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-baby fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Pencatatan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlPencatatan[0]->jml?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Laporan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlLaporan[0]->jml?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-address-book fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data History Laporan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlHistory[0]->jml?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
	<!-- Page Heading -->
	 <div class="row">

            <div class="col-xl-12 col-lg-7">
            	<?php 
            		for ($i=0; $i <12 ; $i++) { 
            			?>
            				<input type="hidden" id="bln<?=$i?>" value="<?=$cek[$i]?>">
            			<?php
            		}
            	 ?>
            	
              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                	<?php $thn = gmdate("Y", time()+60*60*8); ?>
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Pendaftaran / <?php echo $thn."- ".($thn+1) ?></h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                  <hr>
                </div>
              </div>
          </div>
	
	</div>
	<!-- /.container-fluid -->

</div>
