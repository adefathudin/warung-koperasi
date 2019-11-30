<div class="card-body">  
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link" id="nav-simpan-tab" data-toggle="tab" href="#nav-simpan" role="tab" aria-controls="nav-simpan" aria-selected="true">Simpan</a>
      <a class="nav-item nav-link" id="nav-pinjam-tab" data-toggle="tab" href="#nav-pinjam" role="tab" aria-controls="nav-pinjam" aria-selected="false">Pinjam</a>
      <a class="nav-item nav-link" id="nav-member-tab" data-toggle="tab" href="#nav-member" role="tab" aria-controls="nav-member" aria-selected="false">Pembayaran</a>
    </div>
  </nav>
  <br>
  
  <div class="tab-content" id="nav-tabContent">
  
    <div class="tab-pane fade" id="nav-simpan" role="tabpanel" aria-labelledby="nav-simpan-tab">
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
                  <div class="mb-0 font-weight-bold text-gray-800"><?= number_format($grup_user->saldo_koperasi,0,".", "."); ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="card mb-4">    
      <div class="card-body">
        <?php
          $text = "<div class='text-danger text-center'>Saldo Rekening anda tidak mencukupi untuk melakukan pembayaran";
          $div = "</div><br>";
            if ($saldo->saldo_akhir < $data_grup_tmp->minimal_pokok){
              if ($cek_periode_pinjaman_pokok == 0){
                echo $text." Simpanan Pokok".$div;}
          } else if ($saldo->saldo_akhir < $data_grup_tmp->minimal_wajib){
              if ($cek_periode_pinjaman_wajib == 0){
                echo $text." Simpanan Wajib".$div;}
          } else if ($saldo->saldo_akhir == 0){
              echo $text.$div;
          } else {
          }
          ?>
        <form method="POST" action="<?= base_url('koperasi/simpanan/proses_pembayaran_simpan') ?>">
          <div class="form-row align-items-center d-flex flex-row justify-content-between">        
            <div class="col my-1">
              <input type="hidden" name="grup_name" value="<?= $data_grup_tmp->nama_grup ?>">
              <input type="hidden" name="grup_id" value="<?= $grup_id ?>">
              <input type="hidden" name="grup_user_id" value="<?= $grup_user->id ?>">
              <input type="hidden" name="maksimal_pinjaman" value="<?= $data_grup_tmp->maksimal_pinjaman ?>">
              <input type="hidden" name="saldo_koperasi" value="<?= $grup_user->saldo_koperasi ?>">
              <input type="hidden" name="minimal_pokok" value="<?= $data_grup_tmp->minimal_pokok ?>">
              <input type="hidden" name="minimal_wajib" value="<?= $data_grup_tmp->minimal_wajib ?>">
              <input type="hidden" name="periode_simpanan" value="<?= date('Y-m') ?>">
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
              <button type="submit" id="simpan_simpanan_grup" class="btn btn-primary" <?php if ($saldo->saldo_akhir == 0){ echo"disabled";} ?>><i class="fas fa-fw fa-wallet"></i> Simpan</button>
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
  
<!-- end halaman simpan body -->

    <div class="tab-pane fade" id="nav-pinjam" role="tabpanel" aria-labelledby="nav-pinjam-tab">
      <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card shadow h-100">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-capitalize mb-1">Sisa Limit Pinjaman</div>
                  <div class="mb-0 font-weight-bold text-gray-800"><?= number_format($grup_user->limit_pinjaman, 0, ".", ".") ?>                                              
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
                        <div class="progress-bar small" role="progressbar" style="width: 75%;" aria-valuenow="3" aria-valuemin="0" aria-valuemax="12">3/12
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
              <input type="hidden" name="limit_pinjaman" value=<?= $grup_user->limit_pinjaman ?>">
              <input type="hidden" name="maksimal_pinjaman" value="<?= $data_grup_tmp->maksimal_pinjaman ?>">
              <input type="hidden" name="grup_user_id" value="<?= $grup_user->id ?>">
              <input type="hidden" name="maksimal_pinjaman" value="<?= $data_grup_tmp->maksimal_pinjaman ?>">
              <input type="hidden" name="saldo_koperasi" value="<?= $grup_user->saldo_koperasi ?>">
              <input type="number" name="nominal_pinjaman" id="nominal_pinjaman" class="form-control" placeholder="Nominal" max="<?= $grup_user->limit_pinjaman?>" required>
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
              <input type="text" class="form-control" id="kalkulasi_cicilan" value="Akumulasi cicilan perbulan" readonly required>
            </div>
          </div>                   
          <div class="form-row">          
            <div class="col my-1">
              <textarea name="tujuan_pinjaman" class="form-control" placeholder="Tujuan mengajukan pinjaman" required></textarea>
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
    <?php
      // Cek apakah terdapat session simpanan
      if($this->session->flashdata('status_pinjaman')){ // Jika ada
        echo "
        <div class='alert alert-danger alert-dismissible'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"
          .$this->session->flashdata('status_pinjaman')."</div>";
        }
    ?>
      <div class="card mb-4">    
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Tanggal Simpan</th>
                  <th>Nominal</th>
                  <th>Tenor</th>
                  <th>Tujuan Pinjaman</th>
                  <th>Progress</th>
                </tr>
              </thead>
              <tbody>
              <?php
                foreach ($pinjaman_grup as $pinjam){ ?>
                    <tr>
                        <td><?= $pinjam->tanggal_pinjam ?></td>
                        <td><?= number_format($pinjam->nominal,0, ".", ".") ?></td>
                        <td><?= $pinjam->tenor ?></td>
                        <td><?= $pinjam->tujuan ?></td>
                        <td>
                        <div class="progress">
                          <div class="progress-bar small" role="progressbar" style="width: <?php echo ($pinjam->sisa_tenor/$pinjam->tenor)*100 ?>%;" aria-valuenow="<?= $pinjam->sisa_tenor ?>" aria-valuemin="0" aria-valuemax="<?= $pinjam->tenor ?>"><?= $pinjam->sisa_tenor ?>/<?= $pinjam->tenor ?>
                          </div>
                        </div>
                        </td>
                      </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>








</div> 
