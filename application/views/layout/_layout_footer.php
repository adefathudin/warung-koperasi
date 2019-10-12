

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
        <form method="POST">
        <div class="form-group mx-sm-3 mb-2">
        <div class="form-group">
          <input type="text" name="nominal_topup" class="form-control" id="nominal_topup" placeholder="Nama Grup">    
        </div>
        <div class="form-group">
          <input type="text" name="nominal_topup" class="form-control" id="nominal_topup" placeholder="Area Coverage (mis. nama kota atau daerah)">    
        </div>
        <div class="form-group">
            <textarea class="form-control" placeholder="Deskripsi..."></textarea>
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
      <form id="updateIdentitas" method="POST" action="<?php echo base_url('user/update_identitas')?>">
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
  <script>
    var AF = {
      init: function(){ 
        var _this = this;
        $('#updateIdentitas').validate({
          rules:{
            //
          },
          submitHandler: function(form){
            var $btn = $(form).find('[type="submit"]');
            $(form).ajaxSubmit({
              beforeSubmit: function(){
                if (!confirm('Update identitas?')){
                  return false;
                }
              },
              success: function(data){
                if (data.status){
                  alert('Update identitas berhasil');
                } else {
                  alert(data.message);
                }
              }
            });
          }
        });

      }
    }
  
<script type="text/javascript" src="<?php echo base_url('assets/js/webcam.min.js')?>"></script>
  <!-- Configure a few settings and attach camera -->
<script type="text/javascript">
	$(document).ready(function(){
    
    $('#frm_OpenKamera').hide();
    $('#frm_HasilKamera').hide();
    $('#frm_OpenKameraProfile').hide();
    $('#frm_HasilKameraProfile').hide();

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
    }),

    //BUTTON CAPTURE SAVE
    $('#btn_save_captureProfile').click(function(){
      $('#btn_recaptureProfile').hide();
      $('#btn_save_captureProfile').hide();
    })
  }
</script>
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

</body> 
</html>