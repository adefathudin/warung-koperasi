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
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rekening" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-chart-area"></i>
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
      <!-- ADMIN GROUP -->
      <div class="collapse-header"><i class="fas fa-fw fa-users-cog"></i> Groups you manage</div>
      <?php
      if (strpos($user_grup->admin_grup, "|")){
      $detail_grup = explode("|", $user_grup->admin_grup);
      $count = count($detail_grup);
      $i = 0;
      while ($i < $count){
        foreach ($list_grup as $grup){
          if ($grup->grup_id == $detail_grup[$i]){
            echo "<a class='collapse-item' href='".base_url('grup')."/".$detail_grup[$i]."'>".$grup->nama_grup."</a>";
            //echo $grup->nama_grup;
            $i++;
          }
        }  
      }
    } else {
      foreach ($list_grup as $grup){
        if ($grup->grup_id == $user_grup->admin_grup){
          echo "<a class='collapse-item' href='".base_url('grup')."/".$user_grup->admin_grup."'>".$grup->nama_grup."</a>";
          //echo $grup->nama_grup;
        }
      }
    }
    ?>
      <!-- BASIC GROUP -->
      <div class="collapse-header"><i class="fas fa-fw fa-users"></i> Groups you're in</div>
      <?php
      if (strpos($user_grup->basic_grup, "|")){
      $detail_grup = explode("|", $user_grup->basic_grup);
      $count = count($detail_grup);
      $i = 0;
      while ($i < $count){
        foreach ($list_grup as $grup){
          if ($grup->grup_id == $detail_grup[$i]){
            echo "<a class='collapse-item' href='".base_url('grup')."/".$detail_grup[$i]."'>".$grup->nama_grup."</a>";
            //echo $grup->nama_grup;
            $i++;
          }
        }  
      }
    } else {
      foreach ($list_grup as $grup){
        if ($grup->grup_id == $user_grup->basic_grup){
          echo "<a class='collapse-item' href='".base_url('grup')."/".$user_grup->basic_grup."'>".$grup->nama_grup."</a>";
          //echo $grup->nama_grup;
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