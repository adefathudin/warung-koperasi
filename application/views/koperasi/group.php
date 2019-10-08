<div class="row">
<div class="col-lg-12">
<!-- Dropdown Card Example -->
<div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">    
    <h6 class="m-0 font-weight-bold text-primary"><?php echo $this->data['title']?></h6>
    <div class="text-left text-warning"> 4.6 (190)<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
    
  </div>
  <!-- Card Body -->
  <table with="100%">
    <tr>
        <td width="25%" colspan="3" rowspan="4" >
          <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 100%;" src="<?php echo base_url('assets/img/baner_grup_koperasi/baner_grup.jpg')?>" alt="">
        </td>
    </tr>
    <tr>
        <td width="10%">
            Deskripsi
        </td>
        <td width="1%">:</td>
        <td>Ini adalah deskripsi grup</td>
    </tr>
    <tr>
        <td>Member</td>
        <td>:</td>
        <td>31 orang</td>
    </tr>
    <tr>
        <td>Created</td>
        <td>:</td>
        <td>27 Maret 2019</td>
    </tr>
</table>
</div>

<!-- Collapsable Card Example -->
<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
    <div class="m-0 text-primary">About this group</div>
  </a>
  <!-- Card Content - Collapse -->
  <div class="collapse" id="collapseCardExample">
    <div class="card-body">
      This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
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
            <button type="submit" class="btn btn-light mb-2">Dashboard</button>
            <button type="submit" class="btn btn-light mb-2">Simpan</button>
            <button type="submit" class="btn btn-light mb-2">Pinjam</button>
            <button type="submit" class="btn btn-light mb-2">tes</button>
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