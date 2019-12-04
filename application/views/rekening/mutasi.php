  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="m-0 text-primary">Laporan Mutasi Rekening s/d <?= $curdate ?></div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Tanggal</th>
              <th>Keterangan</th>
              <th>Cash In</th>
              <th>Cash Out</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $no = 1;
              foreach ($laporan_mutasi as $mutasi){
                if ($mutasi->jenis_trx == 1){
                  echo "
                  <tr>
                    <td>".$no++."</td>
                    <td>".$mutasi->tanggal_trx."</td>
                    <td><i class='far fa-fw fa-arrow-alt-circle-up text-success'></i>
                    ".$mutasi->keterangan_trx."</td>
                    <td>".number_format($mutasi->nominal, 0, ".", ".")."</td>
                    <td></td>
                  </tr>
                  ";}
                  elseif ($mutasi->jenis_trx == 2){
                    echo "
                  <tr>
                    <td>".$no++."</td>
                    <td>".$mutasi->tanggal_trx."</td>
                    <td><i class='far fa-fw fa-arrow-alt-circle-down text-danger'></i>
                    Tarik Tunai</td>
                    <td></td>
                    <td>".number_format($mutasi->nominal, 0, ".", ".")."</td>
                  </tr>
                    ";}
                  elseif ($mutasi->jenis_trx == 3){
                      echo "
                  <tr>
                    <td>".$no++."</td>
                    <td>".$mutasi->tanggal_trx."</td>
                    <td><i class='fas fa-fw fa-angle-double-left text-info'></i>
                    ".$mutasi->keterangan_trx."</td>
                    <td>".number_format($mutasi->nominal, 0, ".", ".")."</td>
                    <td></td>
                  </tr>
                    ";}
                    elseif ($mutasi->jenis_trx == 4){
                    echo "
                  <tr>
                    <td>".$no++."</td>
                    <td>".$mutasi->tanggal_trx."</td>
                    <td><i class='fas fa-fw fa-angle-double-right text-warning'></i>
                    ".$mutasi->keterangan_trx."</td>
                    <td></td>
                    <td>".number_format($mutasi->nominal, 0, ".", ".")."</td>
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
                    </tr>
                      ";}
              }
            ?>  
          </tbody>
          <tfoot>
            <tr>
              <td colspan="2">Total Top Up</td>
              <td colspan="4">Rp<?= number_format($saldo->total_nominal_cash_in, 0, ".", "."); ?></td>
            </tr>
            <tr>
              <td colspan="2">Total Tarik Tunai</td>
              <td colspan="4">Rp<?= number_format($saldo->total_nominal_cash_out, 0, ".", "."); ?></td>
            </tr>
            <tr>
              <th colspan="2">Sisa Saldo</th>
              <th colspan="4">Rp<?= number_format($saldo->saldo_akhir, 0, ".", "."); ?></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>