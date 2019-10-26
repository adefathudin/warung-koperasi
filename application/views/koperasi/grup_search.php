<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>




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
        foreach ($list_grup_search as $grup){  
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
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
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
      <form class="form-group" action="" method="POST">
        <div class="font-weight-bold">Pencarian Grup</div><br>
          <input type="text" name="nama_grup" class="form-control form-control-sm" placeholder="Masukan nama grup"> 
          <hr>
        <div class="font-weight-bold">Area Coverage</div><br>
          <input type="text" name="wilayah" class="form-control form-control-sm" placeholder="Wilayah"> 
          <hr>
          <div class="font-weight-bold">Minimal Simpanan Pokok</div><br>
            <input type="number" name="minimal_pokok" class="form-control form-control-sm" placeholder="Masukan nominal">
          <hr>
          <div class="font-weight-bold">Minimal Simpanan Wajib</div><br>
            <input type="number" name="minimal_wajib" class="form-control form-control-sm" placeholder="Masukan nominal">
          <hr>
          <div class="font-weight-bold">Minimal Pinjaman</div><br>
            <input type="number" name="maksimal_pinjaman" class="form-control form-control-sm" placeholder="Masukan nominal">
          <hr>
          <div class="font-weight-bold">Rating</div><br>
            <input type="range" min="1" max="5" class="form-control" value="3" id="filterstar" placeholder="Min">
            Star <p><span id="star"></span></p>        
          <hr>
        <button class="btn btn-primary form-control"><i class="fas fa-fw fa-search"></i> Search</button>
      </form>
    </div>
  </div>
</div>

</div><!--END ROW-->