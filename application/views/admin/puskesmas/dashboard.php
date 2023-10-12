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

  <!-- Card Total Data Ibu Hamil -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Ibu Hamil</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ibu?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-female fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Card Total Kunjungan Pemeriksaan -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kunjungan Pemeriksaan</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=  $pemeriksaan?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-door-open fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Card Tanggal -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tanggal<?php 
    $tanggal = mktime(date('m'), date("d"), date('Y'));
    date_default_timezone_set("Asia/Jakarta");
  ?></div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= date("d-m-Y", $tanggal ) . "</b>";?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Card Tanggal -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Waktu
            <span id="waktu"></span>
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <span id="waktuok">
              </span></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clock fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div> -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
setInterval(function(){
  var d = new Date();
  document.getElementById("waktuok").innerHTML = d.toLocaleTimeString();
},1000);
</script>