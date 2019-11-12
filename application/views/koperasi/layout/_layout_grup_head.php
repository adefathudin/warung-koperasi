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
      <div class="small text-warning">
      <a href="" class="text-secondary">(<?= $data_grup_tmp->rate_akumulatif."/".$data_grup_tmp->rate_person?>)</a>
      <?php 
                $starNumber = $data_grup_tmp->rate_akumulatif;                
                for( $x = 0; $x < 5; $x++ ){
                  if( floor( $starNumber )-$x >= 1 )
                  { 
                    echo '<i class="fas fa-fw fa-star"></i>'; 
                  }
                  elseif( $starNumber-$x > 0 )
                  { 
                    echo '<i class="fas fa-fw fa-star-half-alt"></i>';
                  }
                  else { 
                    echo '<i class="far fa-fw fa-star"></i>'; 
                  }
                }
                ?>
      </div>
    </div>
      <img src="<?= base_url('assets/img/grup_koperasi/'.$data_grup_tmp->banner)?>"  alt="profile" class="img-responsive" height="350px" width="100%"> 
  </div>
    <?php } ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <div class="btn-group">
        <a href="index" class="btn btn-sm btn-light">
          <i class="fas fa-fw fa-home"></i> Home
        </a>
      </div>
      <?php
      
      if (strpos($data_grup_tmp->admin, $user_id) !== true or strpos($data_grup_tmp->admin, $user_id) !== true){
        //
      } else {
        ?>
      
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
           
      //cek apakah user tersebut sebagai admin
      if ($data_grup_tmp->admin == $user_id){?>
      <div class="btn-group">
        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-cog"></i> Pengaturan
        </button>
        <div class="dropdown-menu">        
          <a class="dropdown-item" data-toggle="modal" data-target="#settingIdentitasGrup" href="#">Identitas Grup</a>
          <a class="dropdown-item" data-toggle="modal" data-target="#settingFinanceGrup" href="#">Finance</a>
        </div>
      </div>
      <?php
      } 
 ?>
      
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Report Group</a>
          <a class="dropdown-item text-danger" href="#">Leave Grup</a>
        </div>
      </div>
      <?php } ?>
    </div>