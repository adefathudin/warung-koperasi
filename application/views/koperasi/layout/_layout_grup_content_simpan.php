<div class="card-body">  
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-capitalize mb-1">Nominal Simpanan Pokok
                </div>
                <div class="mb-0 font-weight-bold text-gray-800"><?= number_format($data_grup_tmp->minimal_pokok, 0, ".", ".") ?>
                  <small>(1 kali bayar)</small>
                </div>
                <?php if ($cek_periode_pinjaman_pokok == 0){ ?>
                <div class="text-danger small">Anda belum membayar simpanan pokok
                </div>
                <?php } ?>
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
                <div class="text-xs font-weight-bold text-capitalize mb-1">Nominal Simpanan Wajib
                </div>
                <div class="mb-0 font-weight-bold text-gray-800"><?= number_format($data_grup_tmp->minimal_wajib, 0, ".", ".") ?>
                  <small>/ bulan (periode <?= date('Y-m') ?>)</small>
                </div>
                <?php if ($cek_periode_pinjaman_wajib == 0){ ?>
                <div class="text-danger small">Anda belum membayar simpanan wajib
                </div>
                <?php } ?>
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
                <div class="text-xs font-weight-bold text-capitalize mb-1">Total Simpanan Koperasi</div>
                <div class="mb-0 font-weight-bold text-gray-800"><?= number_format($saldo->saldo_koperasi,0,".", "."); ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  <div class="card mb-4">    
    <div class="card-body">
      <?php if ($saldo->saldo_akhir < $data_grup_tmp->minimal_pokok or $saldo->saldo_akhir < $data_grup_tmp->minimal_wajib or $saldo->saldo_akhir == 0){
        echo "<div class='text-danger text-center'>Saldo Rekening anda tidak mencukupi untuk melakukan pembayaran</div><br>";
      }?>
      <form method="POST" action="<?= base_url('koperasi/grup/proses_pembayaran_simpan') ?>">
        <div class="form-row align-items-center d-flex flex-row justify-content-between">        
          <div class="col my-1">
            <input type="hidden" name="grup_name" value="<?= $data_grup_tmp->nama_grup ?>">
            <input type="hidden" name="grup_id" value="<?= $grup_id ?>">
            <input type="hidden" name="minimal_pokok" value="<?= $data_grup_tmp->minimal_pokok ?>">
            <input type="hidden" name="minimal_wajib" value="<?= $data_grup_tmp->minimal_wajib ?>">
            <input type="hidden" name="periode" value="<?= date('Y-m') ?>">
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="jenis_simpanan" required>
              <option value="null" selected required>Pilih Jenis Simpanan</option>              
              <?php if ($cek_periode_pinjaman_pokok == 0){ ?>
              <option value="Pokok">Simpanan Pokok</option>
              <?php } 
              if ($cek_periode_pinjaman_wajib == 0){
              ?>
              <option value="Wajib">Simpanan Wajib</option>              
              <?php } ?>
              <option value="Sukarela">Simpanan Sukarela</option>
            </select>
          </div>
          <div class="col my-1">
            <input type="number" class="form-control" name="nominal_simpanan" placeholder="Nominal" required>
          </div>
          <div class="col-auto my-1">
            <button type="submit" class="btn btn-primary" <?php if ($saldo->saldo_akhir < $data_grup_tmp->minimal_pokok or $saldo->saldo_akhir < $data_grup_tmp->minimal_wajib or $saldo->saldo_akhir == 0){ echo"disabled";} ?>><i class="fas fa-fw fa-wallet"></i> Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php
    // Cek apakah terdapat session simpanan
    if($this->session->flashdata('status_simpanan')){ // Jika ada
      echo "
      <div class='alert alert-danger alert-dismissible'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"
        .$this->session->flashdata('status_simpanan')."</div>";
      }
  ?>
  <div class="card mb-4">    
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tanggal Simpan</th>
              <th>Jenis Simpanan</th>
              <th>Periode</th>
              <th>Nominal</th>
            </tr>
          </thead>
          <tbody>
          <?php
            foreach ($simpanan_grup as $simpan){ ?>
                 <tr>
                    <td><?= $simpan->tanggal_simpan ?></td>
                    <td><?= $simpan->jenis_simpanan ?></td>
                    <td><?= $simpan->periode ?></td>
                    <td><?= number_format($simpan->nominal,0, ".", ".") ?></td>
                  </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div> 
