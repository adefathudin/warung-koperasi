<div class="card-body">  
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-capitalize mb-1">Sisa Limit Pinjaman</div>
                <div class="mb-0 font-weight-bold text-gray-800"><?= number_format(($saldo->saldo_koperasi * $data_grup_tmp->maksimal_pinjaman)/100, 0, ".", ".") ?>                                              
                  <small>(<?= $data_grup_tmp->maksimal_pinjaman ?>% dr total simpanan)</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-capitalize mb-1">Total Pinjaman</div>
                <div class="row no-gutters align-items-center">
                  <div class="col">
                    <div class="progress">
                      <div class="progress-bar small" role="progressbar" style="width: 25%;" aria-valuenow="3" aria-valuemin="0" aria-valuemax="12">3/12
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-capitalize mb-1">Angsuran bulan ini</div>
                <div class="mb-0 font-weight-bold text-gray-800"><?php if (empty($user_grup->total_grup) or empty($user_grup)) { echo 0;} else echo $user_grup->total_grup; ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="card mb-4">    
    <div class="card-body">
      <form method="POST" action="<?= base_url('koperasi/pinjaman/proses_pengajuan_pinjaman') ?>">
        <div class="form-row align-items-center d-flex flex-row justify-content-between">        
          <div class="col my-1">
            <input type="hidden" name="grup_name" value="<?= $data_grup_tmp->nama_grup ?>">
            <input type="hidden" name="grup_id" value="<?= $grup_id ?>">
            <input type="number" name="nominal_pinjaman" id="nominal_pinjaman" class="form-control" placeholder="Nominal" max="<?= ($saldo->saldo_koperasi * $data_grup_tmp->maksimal_pinjaman)/100?>" required>
          </div>
          <div class="col-auto my-1">
            <select class="custom-select mr-sm-2" name="tenor" id="tenor" required>
              <option selected value="null">Tenor</option>
              <option value="1">1 bulan</option>
              <option value="3">3 bulan</option>
              <option value="6">6 bulan</option>
              <option value="12">12 bulan</option>
            </select>
          </div>
          <div class="col my-1">
            <input type="text" class="form-control" id="kalkulasi_cicilan" value="Akumulasi cicilan perbulan" readonly>
          </div>
        </div>                   
        <div class="form-row">          
          <div class="col my-1">
            <textarea name="tujuan_pinjaman" class="form-control" placeholder="Tujuan mengajukan pinjaman"></textarea>
          </div>
        </div>   
        <div class="form-check form-row">          
          <div class="col-auto my-1">
            <input class="form-check-input" type="checkbox" id="inlineFormCheck" required>
              <label class="form-check-label" for="inlineFormCheck">
              Saya telah membaca dan telah menyutujui <a data-toggle="modal" data-target="#syaratPinjaman" href="#">syarat dan ketentuan pinjaman <?= $data_grup_tmp->nama_grup ?></a>
              </label>
          </div>
        </div>      
        <div class="form-row">          
          <div class="col-auto my-1">
            <button type="submit" id="btn-pinjam" class="btn btn-primary" disabled><i class="fas fa-fw fa-dollar-sign"></i> Ajukan Pinjaman</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="card mb-4">    
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
              <th>12.500.000</th>
              <th>1.700.000</th>
              <th>10.000.000</th>
            </tr>
          </tfoot>
          <tbody>
            
                  <tr>
                    <td>2019-01-04 </td>
                    <td><i class='far fa-fw fa-arrow-alt-circle-up text-success'></i>
                    Top-Up Saldo Rekening via Gopay</td>
                    <td>500.000</td>
                    <td></td>
                    <td>4.500.000</td>
                  </tr>
                  
                  <tr>
                    <td>2019-01-04</td>
                    <td><i class='far fa-fw fa-arrow-alt-circle-down text-danger'></i>
                    Tarik Tunai</td>
                    <td></td>
                    <td>250.000</td>
                    <td>4.250.000</td>
                  </tr>
                      
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div> 