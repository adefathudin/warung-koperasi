<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
      <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="saldo_akhir"><i class="fas fa-fw fa-circle-notch fa-spin"></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Grup</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="saldo_koperasi"><i class="fas fa-fw fa-circle-notch fa-spin"></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Saldo Rekening</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Omset</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if (empty($user_grup->total_grup) or empty($user_grup)) { echo 0;} else echo $user_grup->total_grup; ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


<div class="row">
  <div class="col-lg-9 mb-4">
    <div class="card shadow mb-4">
      <div class="card-header">
        <h5 class="text-center font-weight-bold text-primary">Belanja murah meriah</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-8">
            <form class="form-group">
              <input type="text" placeholder="Cari barang kesukaan anda disini..." class="form-control">    
            </form>
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
              </div>
            </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
        </div>
      </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt="">
            </a>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt="">
            </a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Item One
                </a>
              </h4>
              <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt="">
            </a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Item One
                </a>
              </h4>
              <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt="">
            </a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Item One
                </a>
              </h4>
              <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <a href="#" class="btn btn-primary btn-block"><i class="fas fa-fw fa-shopping-cart"></i> Lihat semua barang</a>
      </div>
    </div> 
  </div>
</div>

<div class="col-lg-3 mb-4">
  <div class="card shadow mb-4">
    <div class="card-header">
       Filter by
    </div>
    <div class="card-body small">      
      <form class="form-group">
        <div class="font-weight-bold">Pencarian Barang</div><br>
          <input type="text" class="form-control form-control-sm" placeholder="Nama barang yang dicari"> 
          <hr>
          <div class="font-weight-bold">Kondisi Barang</div><br>
            <input type="checkbox"> Baru<br>
            <input type="checkbox"> Bekas
          <hr>
          <div class="font-weight-bold">Harga</div><br>
            <input type="number" class="form-control form-control-sm" placeholder="Min"><br>
            <input type="number" class="form-control form-control-sm" placeholder="Max">
          <hr>
          <div class="font-weight-bold">Rating</div><br>
            <input type="range" min="1" max="5" class="form-control" value="3" id="filterstar" placeholder="Min">
            Star <p><span id="star"></span></p>        
          <hr>
        <div class="font-weight-bold">Penawaran</div><br>
          <input type="checkbox"> Diskon<br>
          <input type="checkbox"> Gratis Ongkir
        <hr>
        <button class="btn btn-primary form-control"><i class="fas fa-fw fa-search"></i> Search</button>
      </form>
    </div>
  </div>
</div>

</div><!--END ROW-->



<hr>




<!-- BATAS BARANG DAN GROUP -->
<div class="row">
  <div class="col-lg-9 mb-4">
    <div class="card shadow mb-4">
      <div class="card-header">
        <h5 class="text-center font-weight-bold text-primary">Gabung bersama grup Koperasi supaya tambah untung!</h5>
      </div>
      <div class="card-body">
        <div class="row">

        <?php
        foreach ($list_grup_limit_3 as $grup){  
        ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-70">          
            <div class="card-header">
              <div class="card-title">
                <a href="<?= base_url('grup/'.$grup->grup_id.'/index') ?>"><?= $grup->nama_grup;?>
                </a>
              </div>
            </div>
            <a href="<?= base_url('grup/'.$grup->grup_id.'/index') ?>"><img class="card-img-top" height="150px" src="<?= base_url('assets/img/grup_koperasi/'.$grup->banner)?>" alt="">
            </a>
            <div class="card-body">
                <p class="card-text"><?= $grup->about;?></p>
                <div class="small text-warning">
                <?php 
                $starNumber = $grup->rate_akumulatif;                
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
          </div>
        </div>
        <?php 
        } ?>

      </div>
      <div class="card-footer">
        <a href="<?= base_url('koperasi/grup') ?>" class="btn btn-primary btn-block"><i class="fas fa-fw fa-users"></i> Lihat semua grup</a>
      </div>
    </div> 
  </div>
</div>


<div class="col-lg-3 mb-4">
  <div class="col-lg-12 mb-4">
    <div class="card shadow mb-4">
      <div class="card-header">
        <h5 class="text-center text-primary">Grup Popular</h5>
      </div>
      <div class="card-body">
        <div class="row">

        <?php
        foreach ($list_grup_limit_3 as $grup){  
        ?>
        <div class="col-lg-12 col-md-6 mb-4">
          <div class="card h-70">  
            <a href="<?= base_url('grup/'.$grup->grup_id.'/index') ?>"><img class="card-img-top" height="120px" src="<?= base_url('assets/img/grup_koperasi/'.$grup->banner)?>" alt="">
            </a>
            <div class="card-body">
              <div class="card-title">
                <a href="<?= base_url('grup/'.$grup->grup_id.'/index') ?>"><?= $grup->nama_grup;?>
                </a>
              </div>
              <div class="small text-warning">
                <?php 
                $starNumber = $grup->rate_akumulatif;                
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
          </div>
        </div>
        <?php 
        } ?>

      </div>
    </div> 
  </div>
</div>


</div><!--END ROW-->