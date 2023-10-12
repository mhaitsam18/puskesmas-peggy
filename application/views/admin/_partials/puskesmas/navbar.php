<?php 
$count = 1;
$menu = '';
foreach ($this->uri->segments as $segment): ?>
    <?php
        $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
        $is_active =  $url == $this->uri->uri_string;
        if($count==2){
          $menu = ucfirst($segment);
        }
        $count++;
    ?>
<?php endforeach; ?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('/puskesmas')?>">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">POLI KIA</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?= $menu==''?'active':''?>">
  <a class="nav-link" href="<?=base_url('/puskesmas')?>">
    <i class="fas fa-fw fa-home"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Menu
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?= $menu=='Ibuhamil'?'active':''?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-female"></i>
    <span>Ibu Hamil</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Pilihan :</h6>
      <a class="collapse-item" href="<?=base_url('/puskesmas/ibuhamil')?>">Data</a>
      <a class="collapse-item" href="<?=base_url('/puskesmas/ibuhamil/pemeriksaan')?>">Pemeriksaan</a>
    </div>
  </div>
</li>

<li class="nav-item <?= $menu=='Bidan'?'active':''?>">
  <a class="nav-link" href="<?=base_url('/puskesmas/pasienrujukan_index')?>">
    <i class="fas fa-fw fa-file-alt"></i>
  <span>Data Pasien Rujukan</span></a>
</li>

<li class="nav-item <?= $menu=='Rujukan'?'active':''?>">
  <a class="nav-link" href="<?=base_url('/puskesmas/petugas')?>">
    <i class="fas fa-fw fa-file-alt"></i>
  <span>Data Petugas</span></a>
</li>

<li class="nav-item <?= $menu=='Laporan'?'active':''?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-address-book"></i>
    <span>Laporan</span>
  </a>
  <div id="collapseLaporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Pilihan :</h6>
      <a class="collapse-item" href="<?=base_url('/puskesmas/laporan')?>">Puskesmas</a>
      <a class="collapse-item" href="<?=base_url('/puskesmas/Laporan/posyandu')?>">Posyandu</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

</ul>
<!-- End of Sidebar -->