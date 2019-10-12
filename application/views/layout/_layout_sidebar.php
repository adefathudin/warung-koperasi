<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url()?>">
  <div class="sidebar-brand-text mx-3">WarungKoperasi</div>
</a>


<!-- Divider -->
<hr class="sidebar-divider">
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="<?php echo base_url('dashboard')?>">
    <i class="fas fa-fw fa-home"></i>
    <span>Dashboard</span>
  </a>
</li>


<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rekeningku" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Rekeningku</span>
  </a>
  <div id="rekeningku" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo base_url('rekeningku/topup')?>">
        <i class="fas fa-fw fa-plus"></i>  
        Top-Up
      </a>
      <a class="collapse-item" href="<?php echo base_url('rekeningku/cashout')?>">
        <i class="fas fa-fw fa-minus"></i>
        Cash Out</a>
      <a class="collapse-item" href="<?php echo base_url('rekeningku/mutasi')?>">
        <i class="fas fa-fw fa-file"></i>
        Laporan Mutasi
      </a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#koperasi" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-book"></i>
    <span>Koperasi</span>
  </a>
  <div id="koperasi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="#" data-toggle="modal" data-target="#createGroupModal">
        <i class="fas fa-fw fa-plus"></i>  
        Buat Grup Koperasi
      </a>
      <h6 class="collapse-header">Groups you manage</h6>
      <a class="collapse-item" href="<?php echo base_url('koperasi/group')?>">Koperasi Saloome</a>
      
      <h6 class="collapse-header">Groups you're in</h6>
      <a class="collapse-item" href="<?php echo base_url('koperasi/group')?>">Koperasi Ade Fathudin</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>