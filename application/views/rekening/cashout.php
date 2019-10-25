<?php 
  if($this->session->flashdata('pesan_cashout')){ // Jika ada
    echo "
    <div class='alert alert-info alert-dismissible' small>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"
    .$this->session->flashdata('pesan_cashout')."</div>";
    }
?>                  
<div class="row">
  <div class="col-lg-4 mb-4">
    <div class="card shadow mb-4">    
      <div class="card-header">
       Form Cash Out
      </div>
      <div class="card-body">  
        <div class="font-weight-bold disabled">Nominal Saldo</div><br>
        <button value="50000" class="btn btn-secondary" onClick="getCashOut(this)">50.000</button>
        <button value="100000" class="btn btn-secondary" onClick="getCashOut(this)">100.000</button>
        <button value="250000" class="btn btn-secondary" onClick="getCashOut(this)">250.000</button>
        <button value="500000" class="btn btn-secondary" onClick="getCashOut(this)">500.000</button>
        <br><br>       
        <form method="POST" action="<?php echo base_url('rekening/cashout/proses')?>" class="form-group">
          <div class="form-group">
            <input readonly required type="number" id="nominalCashout" name="nominalCashout" min="50000" max="<?= $saldo->saldo_akhir ?>" class="form-control" placeholder="Minimal Rp50.000">
          </div>
          <div id="konfirmasiCashout">
              <p><?= $data_user->nomor_rekening ?> a/n <?= $data_user->nama_lengkap ?> -
              <?= $data_user->nama_bank ?>
              </p>
              <div class="form-group">
                <input required type="password" name="password" id="password" autocomplete="off" class="form-control" placeholder="Masukan password terlebih dahulu">
              </div>              
              <div class="small">*tarik tunai saldo akan diproses paling lambat 1x24 jam dan akan dikenakan biaya penanganan sebesar 4% dari total    penarikan.
              </div>     
          </div>                     
          <hr>
            <?php if ($data_user->type != "Full Service"){
            echo "
            <div class='text-danger'>Anda harus upgrade menjadi member full service terlebih dahulu. <a href='".base_url('user/'.$this->session->userdata('user_id'))."'>Klik disini</a></div>
            <button class='btn btn-primary form-control' disabled ><i class='fas fa-fw fa-donate'></i> Cash Out</button>";
            } else {
            echo "
            <button type='submit' class='btn btn-primary form-control'><i class='fas fa-fw fa-money-bill-wave'></i> Cash Out</button>";
            } ?>
        </form>
    </div>
  </div>
</div>

<div class="col-lg-8 mb-4">
  <div class="card shadow mb-4">

  <div class="card-header">
        <div class="text-center font-weight-bold text-primary">Tarik Tunai Saldo Rekening</div>
      </div>
      <div class="card-body">
        <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-70">          
            <div class="card-header">
              <div class="card-title">
                Total Cash Out
              </div>
            </div>
            <div class="card-body">
                <div class="small">s/d <?= $curdate ?></div>
                <h6 class="font-weight-bold"><?= $saldo->total_cash_out; ?> kali</h6>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-70">          
            <div class="card-header">
              <div class="card-title">
                Nominal Cash Out
              </div>
            </div>
            <div class="card-body">
                <div class="small">s/d <?= $curdate ?></div>
                <h6 class="font-weight-bold"><?= number_format($saldo->total_nominal_cash_out, 0, ".", ".") ?></h6>
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

</div><!--END ROW-->
