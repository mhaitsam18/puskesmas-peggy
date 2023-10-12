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
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('posyandu/Home/dashboard'); ?>">
  <div class="sidebar-brand-icon">
    <img src="<?php echo site_url('assets/img/bakti-husada.png'); ?>" style="width: 40px;height: 55px">
  </div>
  <div class="sidebar-brand-text mx-3">Posyandu </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?= $menu==''?'active':''?>">
  <a class="nav-link " href="<?php echo site_url('posyandu/Home/dashboard'); ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>
<li class="nav-item <?= $menu=='Daftar'?'active':''?>">
  <a class="nav-link" href="<?php echo site_url('posyandu/Petugas'); ?>">
    <i class="fas fa-fw fa-baby"></i>
    <span>Data Petugas</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Menu
</div>
<!-- Nav Item - Charts -->
<li class="nav-item <?= $menu=='Daftar'?'active':''?>">
  <a class="nav-link" href="<?php echo site_url('posyandu/Daftar'); ?>">
    <i class="fas fa-fw fa-baby"></i>
    <span>Pendaftaran Pasien</span></a>
</li>
<!-- Nav Item - Charts -->
<li class="nav-item <?= $menu=='Pencatatan'?'active':''?>">
  <a class="nav-link" href="<?php echo site_url('posyandu/Pencatatan'); ?>">
    <i class="fas fa-fw fa-list"></i>
    <span>Pencatatan Medis</span></a>
</li>

<!-- <li class="nav-item <?= $menu=='Bidan'?'active':''?>">
  <a class="nav-link" href="<?=base_url('/posyandu/pasienrujukan')?>">
    <i class="fas fa-fw fa-file-alt"></i>
  <span>Data Pasien Rujukan</span></a>
</li> -->
<!-- Nav Item - Charts -->
<!-- <li class="nav-item <?= $menu=='Rujukan'?'active':''?>">
  <a class="nav-link" href="<?php echo site_url('posyandu/Rujukan'); ?>">
    <i class="fas fa-fw fa-file-upload"></i>
    <span>Rujukan</span></a>
</li> -->
<li class="nav-item <?= $menu=='Rujukan'?'active':''?>">
  <a class="nav-link" href="<?=base_url('posyandu/pasienrujukan')?>">
    <i class="fas fa-fw fa-file-alt"></i>
  <span>Data Pasien Rujukan</span></a>
</li>
<Nav Item - Charts >
 <!-- <li class="nav-item <?= $menu=='Rujukan'?'active':''?>">
  <a class="nav-link" href="<?php echo site_url('posyandu/Rujukan'); ?>">
    <i class="fas fa-fw fa-file-upload"></i>
    <span>Rujukan</span></a>
</li>  -->

<li class="nav-item <?= $menu=='Laporan'?'active':''?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-address-book"></i>
    <span>Laporan</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Pilihan :</h6>
      <a class="collapse-item" href="<?=base_url('posyandu/Laporan')?>">Laporan</a>
      <a class="collapse-item" href="<?=base_url('posyandu/Laporan/history')?>">History Laporan</a>
    </div>
  </div>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- <li class="nav-item <?= $menu=='Reminder'?'active':''?>">
  <a class="nav-link" href="<?=base_url('/posyandu/reminder')?>">
    <i class="fas fa-fw fa-envelope"></i>
  <span>Reminder</span></a>
</li> -->
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->