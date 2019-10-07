<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url()?>">
  <div class="sidebar-brand-text mx-3">WarKop Mas-Jali</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">
<li class="nav-item active">
  <a class="nav-link" href="<?php echo base_url('profile')."/".$this->session->userdata('user_id');?>">
    <span>
    <?php
      $sesi = $this->session;
      echo $sesi->userdata('nama_depan')." ".$sesi->userdata('nama_belakang').
    
    "<small> (".$sesi->userdata('type').")</small>"
    ?>
    </span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rekeningku" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Rekeningku</span>
  </a>
  <div id="rekeningku" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo base_url('rekeningku/topup')?>">Top-Up</a>
      <a class="collapse-item" href="<?php echo base_url('rekeningku/cashout')?>">Cash Out</a>
      <a class="collapse-item" href="<?php echo base_url('rekeningku/mutasi')?>">Mutasi</a>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#koperasi" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-book"></i>
    <span>Koperasi</span>
  </a>
  <div id="koperasi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo base_url('koperasi/create_group')?>">Buat Grup Koperasi</a>
      <hr>
      <a class="collapse-item" href="<?php echo base_url('koperasi/group')?>">Koperasi Saloome</a>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#simpan" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-table"></i>
    <span>Simpan</span>
  </a>
  <div id="simpan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="buttons.html">Buat Grup Koperasi</a>
      <a class="collapse-item" href="cards.html">Mutasi</a>
      <a class="collapse-item" href="cards.html">Pembukuan</a>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pinjam" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-folder"></i>
    <span>Pinjam</span>
  </a>
  <div id="pinjam" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="buttons.html">Buat Grup Koperasi</a>
      <a class="collapse-item" href="cards.html">Mutasi</a>
      <a class="collapse-item" href="cards.html">Pembukuan</a>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>