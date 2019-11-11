

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('auth/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Syarat dan ketentuan pinjaman-->
  <div class="modal fade" id="syaratPinjaman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Syarat dan ketentuan pengajuan pinjaman <?= $data_grup_tmp->nama_grup ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          1. 1% dari total nominal pengajuan pinjaman digunakan untuk kas koperasi<br>
          2. Limit kredit pinjaman <?= $data_grup_tmp->maksimal_pinjaman ?> dari total simpanan koperasi aktif<br>
          3. Pengajuan pinjaman akan diverifikasi terlebih dahulu oleh pengurus koperasi dan selanjutnya bila disetujui, akan masuk ke saldo rekening
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="button" data-dismiss="modal">Saya setuju</button>
        </div>
      </div>
    </div>
  </div>
 
  <!-- Create Group Modal-->
  
  <div class="modal fade" id="createGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buat Group Koperasi
          </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form id="updateIdentitas" method="POST" action="<?php echo base_url('koperasi/grup/new')?>">
          <div class="form-group mx-sm-3 mb-2">
            <div class="form-group">
              <input type="text" name="nama_grup" class="form-control" id="nominal_topup" placeholder="Nama Grup">    
            </div>
            <div class="form-group">
              <input type="text" name="wilayah" class="form-control" id="nominal_topup" placeholder="Area Coverage (mis. nama kota atau daerah)">
            </div>
            <div class="form-group">
              <select class="form-control" name="kategori">
                <option value="utensils">Keluarga</option>
                <option value="briefcase">Tempat Kerja</option>
                <option value="graduation-cap">Sekolah</option>
                <option value="people-carry">Lingkungan</option>
              </select>            
            </div>
            <div class="form-group">
              <textarea class="form-control" maxlength="75" name="tentang" placeholder="Deskripsi singkat."></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <div class="form-group text-right">         
              <?php 
              if ($data_user->type != "Full Service"){
              echo "<div class='text-danger'>Harap upgrade member menjadi full service terlebih dahulu, melalui menu profile</div>";
              } else { ?>
              <button type="submit" class="btn btn-primary mb-2">Buat Grup</button>
              <?php } ?>
            </div>
          </div> 
        </form>     
      </div>
    </div>
  </div>

  <!-- Create Group Modal-->
  <div class="modal fade" id="upgrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upgrade Full Service Member</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="closeKamera()">
            <span aria-hidden="true">×</span>
          </button>
        </div>
          <div class="form-group mx-sm-3 mb-2">
                <div id="frm_UploadKTP" class="form-group">             
                    <input type="button" class="btn btn-info btn-user btn-block" id="btn_UploadKTP" value="Upload Foto Identitas"/>
                </div>
                <div id="frm_OpenKamera" class="form-group" align="center">
                    <div id="kamera"></div>
                    Foto Kartu Identitas
                    <br>
                    <button class="btn" id="btn_capture"><i class="fas fa-fw fa-camera"></i></button>
                </div>
                <div id="frm_HasilKamera" class="form-group" align="center">    
                    <div id="hasilKamera" ></div>
                    Foto Kartu Identitas
                    <br>
                    <button class="btn" id="btn_recapture"><i class="fas fa-fw fa-undo-alt"></i></button>
                </div>               
                
                <div id="frm_UploadProfile" class="form-group">                  
                    <input type="button" class="btn btn-info btn-user btn-block" id="btn_UploadProfile" value="Upload Foto Profile"/>
                </div>
                <div id="frm_OpenKameraProfile" class="form-group" align="center">
                    <div id="kameraProfile"></div>
                    Foto Profile (Pastikan wajah anda terlihat dengan jelas)
                    <br>
                    <button class="btn" id="btn_captureProfile"><i class="fas fa-fw fa-camera"></i></button>
                </div>
                <div id="frm_HasilKameraProfile" class="form-group" align="center">    
                    <div id="hasilKameraProfile" ></div>
                    Foto Profile
                    <br>
                    <button class="btn" id="btn_recaptureProfile"><i class="fas fa-fw fa-undo-alt"></i></button>
                </div>              
                <form method="POST" action="<?php echo base_url('profile/identitas/lampiran')?>">    
                <div id="frm_submit" class="form-group">      
                <div class="form-check form-row">          
                  <div class="col-auto my-1">
                    <input class="form-check-input" type="checkbox" id="konfirmasi_upgrade_member" required>
                    <label class="form-check-label" for="konfirmasi_upgrade_member">
                      Saya sudah melengengkapi identitas pribadi. Termasuk mengkonfirmasi email, nomor hp, mengisi alamat rumah, nomor rekening, dll.
                    </label>
                  </div>
                </div>      
                    <input type="hidden" id="value_ktp" name="value_ktp">  
                    <input type="hidden" id="value_profile" name="value_profile">  
                    <input type="submit" class="btn btn-primary btn-user btn-block"  onClick="upload()" id="btn_UploadKTP" value="Upload" disabled/>
                </div>
                </form>
          </div>
      </div>
    </div>
  </div>

  <!-- setting User -->
  <div class="modal fade" id="settingUserModal" tabindex="-1" role="dialog" ia-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Identitas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <form id="updateIdentitas" method="POST" action="<?php echo base_url('profile/identitas/data')?>">
      <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id') ?>">
      <div class="form-group mx-sm-3 mb-2">
      <div class="form-group">
        <input type="text" name="nama_lengkap" class="form-control" id="nominal_topup" placeholder="Nama Lengkap" value="<?= $data_user->nama_lengkap ?>">    
      </div>
      <div class="form-group row">
      <div class="col-sm-6">
        <input type="text" name='tempat_lahir' class="form-control form-control-user" id="tempat_lahir" placeholder="Tempat Lahir" value="<?= $data_user->tempat_lahir ?>" required >
      </div>
      <div class="col-sm-6">
        <input type="date" name='tanggal_lahir' class="form-control form-control-user" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= $data_user->tanggal_lahir ?>" required >
      </div>
      </div>
      <div class="form-group">
        <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
          <option value="">Jenis Kelamin</option>
          <option value="<?= $data_user->jenis_kelamin ?>"><?= $data_user->jenis_kelamin ?></option>
          <option value="L">Laki-laki</option>
          <option value="P">Perempuan</option>
        </select>
      </div>
      <div class="form-group">
        <textarea class="form-control form-control-user" name="alamat" placeholder="Alamat lengkap" required ><?= $data_user->alamat ?></textarea>
      </div>
      <div class="form-group">
        <input type="text" name="nomor_rekening" class="form-control" id="nomor_rekening" placeholder="Nomor Rekening" value="<?= $data_user->nomor_rekening ?>">
      </div>
      <div class="form-group">
        <select class="form-control" name="nama_bank">
          <option value="">Pilih Jenis Bank</option>
          <option value="BRI">BRI</option>
          <option value="BCA">BCA</option>
          <option value="Mandiri">Mandiri</option>
          <option value="BNI">BNI</option>
        </select>            
      </div>
      <hr>
      <div class="form-group">
        <textarea class="form-control form-control-user" name="about" placeholder="About me" required ><?= $data_user->about ?></textarea>
      </div>
        <div class="modal-footer">
          <div class="form-group text-right">
            <button type="submit" class="btn btn-primary mb-2">Update Data</button>
        </div>
        </div>   
        </div>
        </form>        
      </div>
    </div>
  </div>
  
  <script>
   $(function(){
     $('.stars').stars();
    });
  </script>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.rating.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.validate.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js')?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/js/demo/chart-area-demo.js')?>"></script>
  <script src="<?php echo base_url('assets/js/demo/chart-pie-demo.js')?>"></script>

  <!-- Page level plugins -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/touch-rating.js')?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.star-rating-svg.js')?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/js/demo/datatables-demo.js')?>"></script>
  <script src="<?php echo base_url('assets/js/webcam.min.js')?>"></script>
  <!-- Configure a few settings and attach camera -->  
  <script src="<?php echo base_url('assets/js/getWebcam.js')?>"></script>

  <script>
  var JS = {
    init: function(){

      //jika tombol cashout diklik
      $('#formCashOut').on('submit',function(e) { 
        var nominal = $('#nominalCashout').val();
        if (!confirm("Anda yakin ingin melakukan tarik tunai sebesar "+nominal+"?")){
          return false;
        }
          $('#btnKonfirmasiCashout').find('i').removeClass('fa-money-bill-wave').addClass('fa-circle-notch fa-spin');
          $('#btnKonfirmasiCashout').prop('disabled', true);   
        }),
        
      //Jika telah selesai topup
      <?php if($this->session->flashdata('pesan_cashout')){ ?>
        Swal.fire({
          position: 'center',
          title: 'Cash Out Sukses!',
          icon: 'success',
          showConfirmButton: true,
          text: '<?= $this->session->flashdata('pesan_cashout') ?>'
        }),
      <?php } ?>

      //----------------------------------------
      
      //jika checkbox pinjam dicentang
      $('#inlineFormCheck').click(function(){
          $('#btn-pinjam').attr('disabled', !this.checked);
      }),

      //JIka pencarian grup tanpa bintang dicentang
      $('#cari_tanpa_bintang').click(function(){
        $('#filterstar').attr('disabled', this.checked);
        $('#filterstar').valu('', this.checked);
      }),

      //auto kalkulasi cicilan pembayaran
      $("#tenor").change(function() {
        var $tenor = $("#tenor option:selected").val();
        var $nominal = $("#nominal_pinjaman").val();
        var $cicilan = $nominal / $tenor;
          $("#kalkulasi_cicilan").val("Rp. "+Math.ceil($cicilan)+ " per bulan");
      }),

      //Ucapan Welcome ketika pertama kali daftar
      <?php if($this->session->flashdata('welcome_new_member')){ ?>
        Swal.fire({
          title: 'Selamat Datang di WarungKoperasi',
          text: '<?= $this->session->flashdata('welcome_new_member') ?> ',
          imageUrl: '<?= base_url('assets/img/logo.png')?>',
          imageWidth: 200,
          imageHeight: 200,
          imageAlt: 'WarungKoperasi',
        }),
      <?php } ?>

      //Jika telah selesai update identitas diri
      <?php if($this->session->flashdata('update_identitas')){ ?>
        Swal.fire({
          position: 'center',
          icon: 'success',
          text: '<?= $this->session->flashdata('update_identitas') ?>',
          showConfirmButton: false,
          timer: 1900
        });
      <?php } ?>

      //jika range bintang dipilih
      $("#filterstar").on('input', function(){
        $("#star").html($(this).val());
      });

    }
  }
  $(document).ready(function(){
    JS.init();
  });
  </script>

<script>
  function upload(){
    var foto_ktp = document.getElementById("imageprevKTP").src;
    var foto_profile = document.getElementById("imageprevProfile").src;
    document.getElementById("value_ktp").value = foto_ktp;
    document.getElementById("value_profile").value = foto_profile;
}
  function closeKamera(){
    Webcam.reset();
    }

function getCashOut(objButton){  
  $('#konfirmasiCashout').show();
  document.getElementById("nominalCashout").value = objButton.value;  
  $('#btnKonfirmasiCashout').prop("disabled", false);
}   
function getTopup(objButton){  
  document.getElementById("nominalTopup").value = objButton.value;
}   
</script>
<script>
function joinGrup() {
    $.ajax({
        type: 'POST',
        url: '<?= base_url("auth/test")?>',
        data: {
            id: 1
        },
        success: function (data) {
            $("#joinGrup").html("<i class='fas fa-fw fa-clock'></i> Requested");
        },
        error: function (data) {
            $("#joinGrup").html("Error");
        }
    });
}
</script>
<script>
function verifikasi_email(){
  Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Your work has been saved',
  showConfirmButton: false,
  timer: 1500
    });
  };

function upgrade_member(){
  Swal.mixin({
  input: 'html',
  confirmButtonText: 'Next &rarr;',
  showCancelButton: false,
  progressSteps: ['1', '2']
}).queue([
  {
    title: 'Update Data Identitas',
    html: ''
  },
  'Question 2'
]).then((result) => {
  if (result.value) {
    Swal.fire({
      title: 'All done!',
      html:
        'Your answers: <pre><code>' +
          JSON.stringify(result.value) +
        '</code></pre>',
      confirmButtonText: 'Lovely!'
    })
  }
})
};

function welcome_message(){
  Swal.fire({
  title: 'Selamat Datang di WarungKoperasi'
})
  };

</script>
</body> 
</html>