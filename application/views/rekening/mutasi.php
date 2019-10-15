  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Laporan Mutasi Rekening s/d <?= $curdate ?></h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tgl</th>
              <th>Keterangan</th>
              <th>Cash In</th>
              <th>Cash Out</th>
              <th>Saldo</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th colspan='2' class="text-center">Total</th>
              <th><?= number_format($saldo->total_nominal_cash_in, 0, ".", "."); ?></th>
              <th><?= number_format($saldo->total_nominal_cash_out, 0, ".", "."); ?></th>
              <th><?= number_format($saldo->saldo_akhir, 0, ".", "."); ?></th>
            </tr>
          </tfoot>
          <tbody>
            <?php 
              foreach ($laporan_mutasi as $mutasi){
                if ($mutasi->jenis_trx == 1){
                  echo "
                  <tr>
                    <td>".$mutasi->tanggal_trx."</td>
                    <td><i class='far fa-fw fa-arrow-alt-circle-up text-success'></i>
                    ".$mutasi->keterangan_trx." via ".$mutasi->merchant_trx."</td>
                    <td>".number_format($mutasi->nominal, 0, ".", ".")."</td>
                    <td></td>
                    <td>".number_format($mutasi->saldo_akhir, 0, ".", ".")."</td>
                  </tr>
                  ";}
                  elseif ($mutasi->jenis_trx == 2){
                    echo "
                  <tr>
                    <td>".$mutasi->tanggal_trx."</td>
                    <td><i class='far fa-fw fa-arrow-alt-circle-down text-danger'></i>
                    ".$mutasi->keterangan_trx."</td>
                    <td></td>
                    <td>".number_format($mutasi->nominal, 0, ".", ".")."</td>
                    <td>".number_format($mutasi->saldo_akhir, 0, ".", ".")."</td>
                  </tr>
                    ";}
                  elseif ($mutasi->jenis_trx == 3){
                      echo "
                  <tr>
                    <td>".$mutasi->tanggal_trx."</td>
                    <td><i class='fas fa-fw fa-angle-double-left text-info'></i>
                    ".$mutasi->keterangan_trx."</td>
                    <td>".number_format($mutasi->nominal, 0, ".", ".")."</td>
                    <td></td>
                    <td>".number_format($mutasi->saldo_akhir, 0, ".", ".")."</td>
                  </tr>
                    ";}
                    elseif ($mutasi->jenis_trx == 4){
                    echo "
                  <tr>
                    <td>".$mutasi->tanggal_trx."</td>
                    <td><i class='fas fa-fw fa-angle-double-right text-warning'></i>
                    ".$mutasi->keterangan_trx."</td>
                    <td></td>
                    <td>".number_format($mutasi->nominal, 0, ".", ".")."</td>
                    <td>".number_format($mutasi->saldo_akhir, 0, ".", ".")."</td>
                  </tr>
                    ";}
                    else {
                      echo "
                    <tr>
                      <td>Err.</td>
                      <td>Err.</td>
                      <td>Err.</td>
                      <td>Err.</td>
                      <td>Err.</td>
                      <td>Err.</td>
                    </tr>
                      ";}
              }
            ?>  
          </tbody>
        </table>
      </div>
    </div>
  </div>