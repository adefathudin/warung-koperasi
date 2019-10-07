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
  <div class="card-body py-3 d-flex flex-row align-items-center justify-content-between">
  <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo base_url('assets/img/baner_grup_koperasi/baner_grup.jpg')?>" alt="">
  Dropdown menus can be placed in the card header in order to extend the functionality of a basic card. In this dropdown card example, the Font Awesome vertical ellipsis icon in the card header can be clicked on in order to toggle a dropdown menu. 
  </div>
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

 <div class="col-xl-12 col-lg-7">
    <div class="card shadow mb-4">
      <div class="card-body">
        <button  class="btn btn-primary">Join Group</button>
      </div>
    </div>
  </div>

</div>

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-12 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Body -->
      <div class="card-body">
      
        <form method="POST">
        <div class="form-group mx-sm-3 mb-2">
        <div class="form-group">
          <input type="text" name="nominal_topup" class="form-control" id="nominal_topup" placeholder="Nama Grup Koperasi">    
        </div>
        <div class="form-group">
          <input type="text" name="nominal_topup" class="form-control" id="nominal_topup" placeholder="Area Coverage (mis. nama kota atau daerah)">    
        </div>
        <div class="form-group">
            <textarea class="form-control" placeholder="Deskripsi..."></textarea>
        </div>
        <div class="form-group" align="right">
            <button type="submit" class="btn btn-primary mb-2">Buat Grup</button>
        </div>       
        </div>   
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->