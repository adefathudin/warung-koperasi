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
                Total Cash In
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
                Nominal Cash In
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
                Total Saldo
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
      <div class="form-group">
          <input type="number" min="10000" id="nominalTopup" name="nominalTopup" class="form-control" placeholder="Minimal Rp10.000"> 
          <hr>
          <div class="small">*saldo akan otomatis bertambah. Jika mengalami kendala, silahkan hubungi tim support kami
          <hr>
        <button class="btn btn-primary form-control" id="pay-button"><i class="fas fa-fw fa-money-bill-wave"></i> Top Up</button>
      </div>
    </div>
  </div>
</div>

</div><!--END ROW-->

<?php
if (isset($_GET['order_id'])){
  $order_id = $_GET['order_id'];
  $status = $_GET['status_code'];
    if (!empty($order_id and !empty($status))){
      if ($status == 200){
        
        echo "Top-up Saldo berhasil dilakukan";

      }      
    }
  }
?>


<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-yXauJI1zHbAPH4dl"></script>
<script type="text/javascript">
  document.getElementById('pay-button').onclick = function(){
    // This is minimal request body as example.
    // Please refer to docs for all available options: https://snap-docs.midtrans.com/#json-parameter-request-body
    // TODO: you should change this gross_amount and order_id to your desire. 
    var requestBody = 
    {
      transaction_details: {
        gross_amount: document.getElementById('nominalTopup').value,
        deskripsi: 'Top Up',        
        //order_id: 'WARKOP-'+Math.round((new Date()).getTime() / 1000) 
        order_id: '<?= uniqid() ?>'
        
      }
    }
    
    getSnapToken(requestBody, function(response){
      var response = JSON.parse(response);
      console.log("new token response", response);
      // Open SNAP payment popup, please refer to docs for all available options: https://snap-docs.midtrans.com/#snap-js
      snap.pay(response.token);
    })
  };
  /**
  * Send AJAX POST request to checkout.php, then call callback with the API response
  * @param {object} requestBody: request body to be sent to SNAP API
  * @param {function} callback: callback function to pass the response
  */
  function getSnapToken(requestBody, callback) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
      if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        callback(xmlHttp.responseText);
      }
    }
    xmlHttp.open("post", "<?= base_url('payment/checkout.php')?>");
    xmlHttp.send(JSON.stringify(requestBody));
  }
</script>

<script>
function getTopup(objButton){
        document.getElementById("nominalTopup").value = objButton.value;
}
</script>