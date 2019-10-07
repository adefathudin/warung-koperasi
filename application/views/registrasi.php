<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css')?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block">              
          <img src="<?php echo base_url('assets/img/logo.png')?>"/>
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form id="form_Registrasi" action="<?php echo base_url('auth/save_registrasi'); ?>" method="POST" >
                <div class="form-group row">
                  <div class="col-sm-6">
                    <input type="text" name='nama_depan' class="form-control form-control-user" id="nama_depan" placeholder="Nama Depan">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name='nama_belakang' class="form-control form-control-user" id="nama_belakang" placeholder="Nama Belakang">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <input type="text" name='tempat_lahir' class="form-control form-control-user" id="tempat_lahir" placeholder="Tempat Lahir">
                  </div>
                  <div class="col-sm-6">
                    <input type="date" name='tanggal_lahir' class="form-control form-control-user" id="tanggal_lahir" placeholder="Tanggal Lahir">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="Email Address">
                </div>
                <div class="form-group">
                  <input type="number" name="nomor_hp" class="form-control form-control-user" id="nomor_hp" placeholder="No. HP">
                </div>
                <div class="form-group">
                  <textarea class="form-control form-control-user" name="alamat" placeholder="Alamat lengkap"></textarea>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="password" class="form-control form-control-user" id="repassword" placeholder="Repeat Password">
                  </div>
                </div>  
                <hr>
                <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                <hr>
                <button type="submit" class="btn btn-primary btn-user btn-block" id="btn-submit" onclick="saveSnap()">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
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
