<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registrasi Akun - WarungKoperasi</title>

  <!-- Custom fonts for this template-->
  <link rel="icon" href="<?php echo base_url('assets/img/favicon.png')?>" type="image/x-icon">
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css')?>" rel="stylesheet">

</head>

<body class="bg-gradient-info">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block">        
                <img height="80%" width="100%" class=" shadow img-responsive" src="<?php echo base_url('assets/img/logo.png')?>"/>
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                          <?php
                          // Cek apakah terdapat session nama message
                          if($this->session->flashdata('message')){ // Jika ada
                            echo "
                            <div class='alert alert-danger alert-dismissible'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"
                            .$this->session->flashdata('message')."</div>";
                            }
                          ?>
              </div>
              <form id="FormRegistrasi" action="<?php echo base_url('auth/save_registrasi'); ?>" method="POST" >
                  <div class="form-group">
                    <input type="text" name='nama_lengkap' class="form-control form-control-user" id="nama_lengkap" placeholder="Nama Lengkap" required autofocus>
                  </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="Email Address (pastikan email belum pernah terdaftar)" required>
                </div>
                <div class="form-group">
                  <input type="number" min="10" name="nomor_hp" class="form-control form-control-user" id="nomor_hp" placeholder="No. HP (pastikan no. hp belum pernah terdaftar)" required>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" required >
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="password" class="form-control form-control-user" id="repassword" placeholder="Repeat Password" required >
                  </div>
                </div>  
                <hr>
                <div class="form-group">
                      <!--<div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>-->
                <button type="submit" class="btn btn-primary btn-user btn-block" id="btn-submit">
                  Register Account <i class="fas fa-fw fa-sign-in-alt"></i>
                </button>
              </form>
              <hr><!--
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>-->
              <div class="text-center">
                <a class="small" href="<?php echo base_url('auth')?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>  
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.validate.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
  <!-- Configure a few settings and attach camera -->
<script type="text/javaScript">
    //UPLOAD FORM DAN KTP
     var password = document.getElementById("password"),
      repassword = document.getElementById("repassword");
      function validatePassword(){
        if(password.value != repassword.value) {
          repassword.setCustomValidity("Password tidak sama");
          } else {
          repassword.setCustomValidity('');
          }
        }
        password.onchange = validatePassword;
        repassword.onkeyup = validatePassword;
</script>
</body>

</html>
