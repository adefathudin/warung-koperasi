<div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Durasi Cash In s/d <?= $curdate ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $saldo->total_cash_in ?> kali</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Cash In s/d <?= $curdate ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($saldo->total_nominal_cash_in, 0, ".", ".") ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Saldo</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($saldo->saldo_akhir, 0, ".", ".") ?></div>
                    </div>
                  </div>
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
      
  <form class="form-inline">
        <a href="#" class="btn btn-light btn-icon-split" data-value="10000" name="a"><span class="icon text-gray-800">Rp. 10.0000</span></a>
        <a href="#" class="btn btn-light btn-icon-split"data-value="25000"><span class="icon text-gray-800">Rp. 25.0000</span></a>
        <a href="#" class="btn btn-light btn-icon-split"data-value="50000"><span class="icon text-gray-800">Rp. 50.0000</span></a>
        <a href="#" class="btn btn-light btn-icon-split"data-value="100000"><span class="icon text-gray-800">Rp. 100.0000</span></a>
        <a href="#" class="btn btn-light btn-icon-split"data-value="250000"><span class="icon text-gray-800">Rp. 250.0000</span></a>
        <a href="#" class="btn btn-light btn-icon-split"data-value="500000"><span class="icon text-gray-800">Rp. 500.0000</span></a>
  <div class="form-group mx-sm-3 mb-2">
    <input type="number" name="nominal_topup" class="form-control" id="nominal_topup" onClick="getText()" placeholder="Nominal">
  </div>
  <button type="submit" class="btn btn-primary mb-2">next</button>
</form>

      
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
  function getText() {
    var result = document.getElementById('a').value;
    if (!isNaN(result)) {
     document.getElementById('nominal_topup').value = result;
           }
        }
</script>