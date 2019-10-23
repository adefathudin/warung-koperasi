<!-- Content Row -->
<div class="row">

<!-- Content Column -->
<div class="col-lg-9 mb-4">
  <?php 
    if ($page = $this->uri->segment(3) == 'index'){ ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">    
      <div class="m-0 font-weight-bold text-capitalize text-primary"><?= $data_grup_tmp->nama_grup ?>
      </div>
      <div class="text-left text-warning small"> 4.6 (190)<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i  class="fa fa-star"></i><i class="fa fa-star"></i>
      </div>    
    </div>
      <img src="<?php echo base_url('assets/img/grup_koperasi/baner_grup.jpg')?>"  alt="profile" class="img-responsive" height="350px" width="100%"> 
  </div>
    <?php } ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <div class="btn-group">
        <a href="index" class="btn btn-sm btn-light">
          <i class="fas fa-fw fa-home"></i> Home
        </a>
      </div>

      <div class="btn-group">
        <a href="lapak" class="btn btn-sm btn-light">
          <i class="fas fa-fw fa-shopping-cart"></i> Lapak
        </a>
      </div>
      
      <div class="btn-group">
        <a href="simpan" class="btn btn-sm btn-light">
          <i class="fas fa-fw fa-money-check"></i> Simpan
        </a>
      </div>

      <div class="btn-group">
        <a href="pinjam" class="btn btn-sm btn-light">
          <i class="fas fa-fw fa-money-bill-wave-alt"></i> Pinjam
        </a>
      </div>
      
      <div class="btn-group">
        <a href="anggota" class="btn btn-sm btn-light">
          <i class="fas fa-fw fa-users"></i> Anggota
        </a>
      </div>

      <div class="btn-group">
        <a href="anggota" class="btn btn-sm btn-light">
          <i class="fas fa-fw fa-chart-line"></i> Laporan
        </a>
      </div>

      <?php
      if ($data_grup_tmp->admin == $data_user->user_id){?>
      <div class="btn-group">
        <a href="pengaturan" class="btn btn-sm btn-light">
          <i class="fas fa-fw fa-cog"></i> Pengaturan
        </a>
      </div>
      <?php } ?>

      <!--<div class="btn-group">
        <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-money-bill-wave-alt"></i> Pinjam
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Action</a>
            <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
        </div>
      </div>-->
      
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Report Group</a>
          <a class="dropdown-item text-danger" href="#">Leave Grup</a>
        </div>
      </div>
    </div>