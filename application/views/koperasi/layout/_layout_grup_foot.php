</div>
</div>

<div class="col-lg-3 mb-4">
  <!--//JIKA HALAMAN SELAIN HOME DIBUKA-->
  <?php 
    if ($page = $this->uri->segment(3) != 'index'){ ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">    
      <div class="m-0 font-weight-bold text-capitalize text-primary"><?= $data_grup_tmp->nama_grup ?>
      </div>
      <div class="text-left text-warning small"> 4.6 (190)<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i  class="fa fa-star"></i><i class="fa fa-star"></i>
      </div>    
    </div>
      <img src="<?php echo base_url('assets/img/grup_koperasi/baner_grup.jpg')?>"  alt="profile" class="img-responsive" width="100%"> 
  </div>
    <?php } ?>


    <!--JIKA HALAMAN LAPAK DIBUKA-->
    <?php 
    if ($page = $this->uri->segment(3) == 'lapak'){ ?>
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
    <?php } ?>

  <div class=" shadow mb-4 small">
    <button width="100%" class="btn btn-primary btn-md btn-block"><i class="fas fa-fw fa-plus"></i> Join grup</button> 
  </div>

 <!--JIKA HALAMAN ANGGOTA DIBUKA-->
 <?php 
    if ($page = $this->uri->segment(3) == 'anggota'){ ?>
  <div class="card shadow mb-4">
    <div class="card-body small">
    <div class=" font-weight-bold"><i class="fas fa-fw fa-user-plus"></i> Invite members</div><br>
    <label class="small">Enter email or phone number</label>
    <input class="form-control input-sm" type="text">
    </div>
  </div>
    <?php } ?>
  
  <!--JIKA HALAMAN HOME DIBUKA-->
  <?php 
    if ($page = $this->uri->segment(3) == 'index'){ ?>
  <div class="card shadow mb-4">
    <div class="card-body small">
    <i class="far fa-fw fa-flag"></i> Group created on <?= $data_grup_tmp->created ?>
    </div>
  </div>
  
  <div class="card shadow mb-4">
    <div class="card-body small">
    <div class=" font-weight-bold"><i class="fas fa-fw fa-layer-group"></i> About</div><br>
    <p><?= $data_grup_tmp->about ?></p> 
    </div>    
  </div>

  <div class="card shadow mb-4">
    <div class="card-body small">
    <div class=" font-weight-bold text-capitalize"><i class="fas fa-fw fa-map-marker-alt"></i> <?= $data_grup_tmp->wilayah ?></div><br>
    <!--<div class="mapouter"><div class="gmap_canvas"><iframe id="gmap_canvas" src="https://maps.google.com/maps?q=kranggan%2C%20bekasi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:relative;text-align:right;height:auto;width:auto;}.gmap_canvas {overflow:hidden;background:none!important;height:auto;width:auto;}</style></div>-->
    </div>    
  </div>

  <div class="card shadow mb-4">
    <div class="card-body small">
    <div class=" font-weight-bold"><i class="fas fa-fw fa-search-location"></i> Sugested Groups</div><br>
    <label class="small">Enter email or phone number</label>
    <input class="form-control input-sm" type="text">
    </div>
  </div>
  
  <div class="card shadow mb-4">
    <div class="card-body small">
    <div class=" font-weight-bold"><i class="fas fa-fw fa-user-plus"></i> Invite members</div><br>
    <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
    </div>
  </div>

    <?php } ?>

</div>
</div>
<script>
          var slider = document.getElementById("filterstar");
          var output = document.getElementById("star");
          output.innerHTML = slider.value;
          slider.oninput = function() {
          output.innerHTML = this.value;
          }
        </script>