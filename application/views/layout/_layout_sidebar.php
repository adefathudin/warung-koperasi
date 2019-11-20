<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url()?>">
  <img height="100%" width="100%" class="img-responsive" src="<?php echo base_url('assets/img/favicon.png')?>"/>
  <div class="sidebar-brand-text mx-3">WarungKoperasi</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">

<?php
if ($data_user->email == 'root@warungkoperasi.my.id'){
  echo "
  <li class='nav-item active'>
    <a class='nav-link collapsed' href='".base_url('admin/dashboard')."'>
      <i class='fas fa-fw fa-user-shield'></i>
      <span>Admin Panel</span>
    </a>
  </li>
";
} 
?>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="<?php echo base_url('dashboard')?>">
    <i class="fas fa-fw fa-home"></i>
    <span>Dashboard</span>
  </a>
</li>


<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rekening" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-dollar-sign"></i>
    <span>Rekening</span>
  </a>
  <div id="rekening" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo base_url('rekening/topup')?>">
        <i class="fas fa-fw fa-plus"></i>  
        Top-Up
      </a>
      <a class="collapse-item" href="<?php echo base_url('rekening/cashout')?>">
        <i class="fas fa-fw fa-minus"></i>
        Cash Out</a>
      <a class="collapse-item" href="<?php echo base_url('rekening/mutasi')?>">
        <i class="fas fa-fw fa-file-invoice-dollar"></i>
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
      <a class="collapse-item" href="<?php echo base_url('koperasi/grup')?>">
        <i class="fas fa-fw fa-search"></i>  
        Explore Grup Koperasi
      </a>
      <!-- ADMIN GROUP -->
      <?php 
      $i = 1;
      if (!empty($list_grup)){
        foreach ($list_grup as $grup){
          if ($grup->status_user == 'admin'){          
            if ($i++ == 1) {                
              echo "<div class='collapse-header'><i class='fas fa-fw fa-users-cog'></i> Groups you manage</div>";
            }
              echo "<a class='collapse-item text-capitalize' href='".base_url('grup')."/".$grup->grup_id."/index'><i class='fas fa-fw fa-".$grup->kategori."'></i>". $grup->nama_grup."</a>";
          }
          else if ($grup->status_user == 'member'){       
            if ($i++ == 1) {                           
              echo "<div class='collapse-header'><i class='fas fa-fw fa-users-cog'></i>  Groups you're in</div>";
            }
            echo "<a class='collapse-item text-capitalize' href='".base_url('grup')."/".$grup->grup_id."/index'><i class='fas fa-fw fa-".$grup->kategori."'></i>". $grup->nama_grup."</a>";
          }
        }
      }
    ?>
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