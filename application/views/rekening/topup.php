<div class="row">
  <div class="col-lg-8 mb-4">
    <div class="card shadow mb-4">
      <div class="card-header">
        <div class="text-center font-weight-bold text-primary">Topup Saldo Rekening</div>
      </div>
      <div class="card-body">
        <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-70">          
            <div class="card-header">
              <div class="card-title">
                <a href="#">Total Cash In
                </a>
              </div>
            </div>
            <div class="card-body">
                <div class="small">s/d <?= $curdate ?></div>
                <h6 class="font-weight-bold"><?= number_format($saldo->total_cash_in, 0, ".", ".") ?> kali</h6>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-70">          
            <div class="card-header">
              <div class="card-title">
                <a href="#">Nominal Cash In
                </a>
              </div>
            </div>
            <div class="card-body">
                <div class="small">s/d <?= $curdate ?></div>
                <h6 class="font-weight-bold"><?= number_format($saldo->total_nominal_cash_in, 0, ".", ".") ?></h6>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-70">          
            <div class="card-header">
              <div class="card-title">
                <a href="#">Total Saldo
                </a>
              </div>
            </div>
            <div class="card-body">
                <div class="small">s/d <?= $curdate ?></div>
                <h6 class="font-weight-bold"><?= number_format($saldo->saldo_akhir, 0, ".", ".") ?></h6>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
</div>

<div class="col-lg-4 mb-4">
  <div class="card shadow mb-4">
    <div class="card-header">
       Form Top Up
    </div>
    <div class="card-body">  
        <div class="font-weight-bold">Nominal Saldo</div><br>
        <button value="10000" class="btn btn-secondary" onClick="getTopup(this)">10.000</button>
        <button value="50000" class="btn btn-secondary" onClick="getTopup(this)">50.000</button>
        <button value="100000" class="btn btn-secondary" onClick="getTopup(this)">100.000</button>
        <button value="500000" class="btn btn-secondary" onClick="getTopup(this)">500.000</button>
        <br><br>            
      <form class="form-group">
          <input type="number" min="10000" id="nominalTopup" name="nominalTopup" class="form-control" placeholder="Minimal Rp10.000"> 
          <hr>
          <div class="small">*saldo akan otomatis bertambah. Jika mengalami kendala, silahkan hubungi tim support kami
          <hr>
        <button class="btn btn-primary form-control"><i class="fas fa-fw fa-money-bill-wave"></i> Top Up</button>
      </form>
    </div>
  </div>
</div>

</div><!--END ROW-->

<script>
function getTopup(objButton){
        document.getElementById("nominalTopup").value = objButton.value;
}
</script>