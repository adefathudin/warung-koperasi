<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>




<!-- BATAS BARANG DAN GROUP -->
<div class="row">
  <div class="col-lg-9 mb-4">
    <div class="card shadow mb-4">
      <div class="card-header">
        <h5 class="text-center font-weight-bold text-primary">Grup Koperasi<small> (<?= count($list_grup_search)?> grup)</small></h5>
      </div>
      <div class="card-body">
        <div class="row">

        <?php
        foreach ($list_grup_search as $grup){  
        ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-70">          
            <div class="card-header">
              <div class="card-title d-flex flex-row align-items-center justify-content-between">
                <a href="<?= base_url('grup/'.$grup->grup_id.'/index') ?>"><?= $grup->nama_grup;?>
                </a>
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
            <a href="<?= base_url('grup/'.$grup->grup_id.'/index') ?>"><img class="card-img-top" height="150px" src="<?= base_url('assets/img/grup_koperasi/'.$grup->banner)?>" alt="">
            </a>
            <div class="card-body small">
                <p class="card-text">
                <?= $grup->about;?>
                <table class="table-responsive">
                <tr><td>Simpanan Pokok</td><td>:</td><td>
                <b><?= number_format($grup->minimal_pokok) ?></b>
                </td></tr>
                <tr><td>Simpanan Wajib</td><td>:</td><td>
                <b><?= number_format($grup->minimal_pokok) ?></b>
                </td></tr>
                <tr><td>Maksimal Pinjaman</td><td>:</td><td>
                <b><?= number_format($grup->minimal_pokok) ?></b>
                </td></tr>
                </table>                
                </p>
                <i class="fas fa-fw fa-map-marker-alt"></i> <?= $grup->wilayah;?>
            </div>
          </div>
        </div>
        <?php 
        } ?>

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
      <form class="form-group" action="" method="GET">
        <div class="font-weight-bold">Pencarian Grup</div><br>
          <input type="text" value="<?= $this->input->get('nama_grup')?>" name="nama_grup" class="form-control form-control-sm" placeholder="Masukan nama grup"> 
          <hr>
        <div class="font-weight-bold">Area Coverage</div><br>
          <input type="text" <?= $this->input->get('wilayah')?> name="wilayah" class="form-control form-control-sm" id="wilayah" placeholder="Wilayah"> 
          <hr>
          <div class="font-weight-bold">Minimal Simpanan Pokok</div><br>
            <input type="number" <?= $this->input->get('minimal_pokok')?> name="minimal_pokok" class="form-control form-control-sm" placeholder="Masukan nominal">
          <hr>
          <div class="font-weight-bold">Minimal Simpanan Wajib</div><br>
            <input type="number" name="minimal_wajib" class="form-control form-control-sm" placeholder="Masukan nominal">
          <hr>
          <div class="font-weight-bold">Minimal Pinjaman</div><br>
            <input type="number" name="maksimal_pinjaman" class="form-control form-control-sm" placeholder="Masukan nominal">
          <hr>
          <div class="font-weight-bold">Bintang <span id="star">1</span></div><br>
          <div class="text-warning py-3 d-flex flex-row align-items-center justify-content-between">
            <i class="fas fa-fw fa-star"></i>
            <i class="fas fa-fw fa-star"></i>
            <i class="fas fa-fw fa-star"></i>
            <i class="fas fa-fw fa-star"></i>
            <i class="fas fa-fw fa-star"></i>
            <br>            
          </div>
            <input type="range" name="rate" value="1" class="custom-range" min="1" max="5" id="filterstar">
          <hr>
        <button class="btn btn-primary form-control"><i class="fas fa-fw fa-search"></i> Search</button>
      </form>
    </div>
  </div>
</div>

</div><!--END ROW-->