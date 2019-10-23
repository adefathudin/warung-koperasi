

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

  <!-- Notifikasi Modal-->
  <div class="modal fade" id="test" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  
  <!-- Create Group Modal-->
  <div class="modal fade" id="createGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buat Group Koperasi</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <!-- MODAL ADD GROUP -->
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
            <option value="utensils"">Keluarga</option>
            <option value="briefcase">Tempat Kerja</option>
            <option value="graduation-cap">Sekolah</option>
            <option value="people-carry">Lingkungan</option>
          </select>            
        </div>
        <div class="form-group">
            <textarea class="form-control" name="tentang" placeholder="Deskripsi grup..."></textarea>
        </div>
        <div class="modal-footer">
          <div class="form-group text-right">
            <button type="submit" class="btn btn-primary mb-2">Buat Grup</button>
          </div>
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
        <!-- MODAL ADD GROUP -->
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
                    <input type="hidden" id="value_ktp" name="value_ktp">  
                    <input type="hidden" id="value_profile" name="value_profile">  
                    <input type="submit" class="btn btn-primary btn-user btn-block"  onClick="upload()" id="btn_UploadKTP" value="Upload"/>
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
                      <option value="<?= $data_user->jenis_kelamin ?>"><?= $data_user->jenis_kelamin ?></option>
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
        </select>
      </div>
      <div class="form-group">
        <textarea class="form-control form-control-user" name="alamat" placeholder="Alamat lengkap" required ><?= $data_user->alamat ?></textarea>
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
  

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

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
  <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/js/demo/datatables-demo.js')?>"></script>
  <script src="<?php echo base_url('assets/js/webcam.min.js')?>"></script>
  <!-- Configure a few settings and attach camera -->
<script>
    $('#frm_OpenKamera').hide();
    $('#frm_HasilKamera').hide();
    $('#frm_OpenKameraProfile').hide();
    $('#frm_HasilKameraProfile').hide();
    $('#frm_UploadProfile').hide();
    $('#frm_submit').hide();


    //BUTTON UPLOAD KTP
		$('#btn_UploadKTP').click(function(){
      $('#frm_OpenKamera').show();
      Webcam.set({
      width: 320,
      height: 240,
      image_format: 'jpeg',
      jpeg_quality: 90
      });
      Webcam.attach('#kamera');
      $('#frm_UploadKTP').hide();
      }),		

    //BUTTON CAPTURE
    $('#btn_capture').click(function(){
      $('#frm_UploadProfile').show();
      $('#frm_HasilKamera').show();
      Webcam.snap( function(data_uri) {
      document.getElementById('hasilKamera').innerHTML = '<img id="imageprevKTP" src="'+data_uri+'"/>';
      });
      Webcam.reset();
      $('#frm_OpenKamera').hide();
    }),

    //BUTTON RECAPTURE
    $('#btn_recapture').click(function(){
      Webcam.set({
      width: 320,
      height: 240,
      image_format: 'jpeg',
      jpeg_quality: 90
      });
      Webcam.attach('#kamera');
      $('#frm_OpenKamera').show();
      $('#frm_HasilKamera').hide();
    }),

    //BUTTON CAPTURE SAVE
    
    $('#btn_save_capture').click(function(){
      $('#btn_recapture').hide();
      $('#btn_save_capture').hide();
      Webcam.snap( function(data_uri) {
        Webcam.upload(data_uri, 'http://localhost/warkop/auth/save_registrasi', function(code, text) {} );
     } )
    }),


    //BUTTON UPLOAD PROFILE
		$('#btn_UploadProfile').click(function(){
      $('#frm_OpenKameraProfile').show();
      Webcam.set({
      width: 320,
      height: 240,
      image_format: 'jpeg',
      jpeg_quality: 90
      });
      Webcam.attach('#kameraProfile');
      $('#frm_UploadProfile').hide();
      }),		

    //BUTTON CAPTURE
    $('#btn_captureProfile').click(function(){
      $('#frm_submit').show();
      $('#frm_HasilKameraProfile').show();
      Webcam.snap( function(data_uri) {
      document.getElementById('hasilKameraProfile').innerHTML = '<img id="imageprevProfile" src="'+data_uri+'"/>';
      });
      Webcam.reset();
      $('#frm_OpenKameraProfile').hide();
    }),

    //BUTTON RECAPTURE
    $('#btn_recaptureProfile').click(function(){
      Webcam.set({
      width: 320,
      height: 240,
      image_format: 'jpeg',
      jpeg_quality: 90
      });
      Webcam.attach('#kameraProfile');
      $('#frm_OpenKameraProfile').show();
      $('#frm_HasilKameraProfile').hide();
    })
</script>
<script>


function upload(){
 // Get base64 value from <img id='imageprev'> source
    var foto_ktp = document.getElementById("imageprevKTP").src;
    var foto_profile = document.getElementById("imageprevProfile").src;
    document.getElementById("value_ktp").value = foto_ktp;
    document.getElementById("value_profile").value = foto_profile;
}
function closeKamera(){
      Webcam.reset();
    }
    </script>

</body> 
</html>