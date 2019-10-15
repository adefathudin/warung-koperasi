<div class="row">
<div class="col-lg-12">
<!-- Dropdown Card Example -->
<div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">    
    <div class="m-0 font-weight-bold text-primary"><?= $data_grup_tmp->nama_grup ?></div>
    <div class="text-left text-warning small"> 4.6 (190)<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>    
    </div>
    <div class="text-center" id="collapseBanner" >
    <img src="<?php echo base_url('assets/img/grup_koperasi/nobanner.jpg')?>"  alt="profile" class="img-responsive" height="300px" width="100%">  
    </div> 
</div>

<!-- Collapsable Card Example -->
<div class="card shadow mb-4">
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
  <div class="m-0 text-primary">About this group</div>
  </a>
  <!-- Card Content - Collapse -->
  <div class="collapse" id="collapseCardExample">
    <div class="card-body">
    <?= $data_grup_tmp->about ?>
    </div>
  </div>
</div>
</div>
<div class="col-lg-12">
    <!-- Dropdown Card Example -->
    <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <div class="m-0 font-weight-bold text-primary">
          <button class="btn btn-light" type="button" id="">
            Dashboard
          </button>
          <div class="btn-group">
            <button class="btn btn-light dropdown-toggle dropdown-toggle-split" type="button" id="dropSimpanan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Simpanan
            </button>
              <div class="dropdown-menu animated--fade-in" aria-labelledby="dropSimpanan">
                <a class="dropdown-item" href="#">Setoran Tunai</a>
                <a class="dropdown-item" href="#">Penarikan Tunai</a>
              </div>
          </div>
          <div class="btn-group">
            <button class="btn btn-light dropdown-toggle dropdown-toggle-split" type="button" id="dropSimpanan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Simpanan
            </button>
              <div class="dropdown-menu animated--fade-in" aria-labelledby="dropSimpanan">
                <a class="dropdown-item" href="#">Setoran Tunai</a>
                <a class="dropdown-item" href="#">Penarikan Tunai</a>
              </div>
          </div>
        </div>
        <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">Keluar Group</a>
            <a class="dropdown-item" href="#">Laporkan</a>
        </div>
        </div>
    </div>
    
    <!-- Card Body -->
    <div class="card-body">
    ini adalah dashboard grup ini adalah dashboard grup ini adalah dashboard grup ini adalah dashboard grup ini adalah dashboard grup ini adalah dashboard grup 
    </div>
    </div>
</div>