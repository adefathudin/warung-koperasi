<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
<!-- Main Content -->
<div id="content">
  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="http://localhost/warkop/koperasi/grup" method="GET">
      <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search..." name="nama_grup" aria-label="Search" aria-describedby="basic-addon2">
      </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
          <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Nav Item - Alerts -->
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <!-- Counter - Alerts -->
          <span class="badge badge-danger badge-counter" id="count_notifikasi"></span>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
          <h5 class="dropdown-header">
            Pemberitahuan
          </h5>
          
          <!-- ambil data notifikasi dari jquery -->
          <div class="notifikasi"></div>
          
          <a class="dropdown-item text-center text-gray-500" href="#">Tampilkan semua pemberitahuan</a>
        </div>
      </li>

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">
              <?php
              echo $data_user->nama_lengkap; 
              if ($data_user->type == 'Full Service') {
                echo " <i class='far fa-fw fa-check-circle text-primary'></i>";} 
              echo "<small><div>".$data_user->type ?></div></small>
          </span>
          <img class="img-profile rounded-circle" src="<?= base_url('assets/img/user/profile/'.$data_user->profil.'')?>">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?php echo base_url('user')."/".$data_user->user_id;?>">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <a class="dropdown-item"  href='#' data-toggle='modal' data-target='#settingUserModal'>
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Settings
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>

    </ul>

  </nav>
  <!-- End of Topbar -->
 <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<?php
// Cek apakah terdapat session nama message
if($this->session->flashdata('message')){
echo "<div class='alert alert-info alert-dismissible'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"
.$this->session->flashdata('message')."</div>";
}
if ($data_user->verifikasi_email == 0){
  $email = $this->session->userdata('email');
  echo "<div class='alert alert-warning alert-dismissible'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong><i class='fas fa-fw fa-exclamation-triangle'></i></strong> Email anda belum diverifikasi, link verifikasi sudah terkirim ke email <strong>".
        str_repeat("*", strlen($email)-15) . substr($email, -15)." </strong>
        </div>";
        }

if ($data_user->verifikasi_nomor_hp == 0){
  echo "<div class='alert alert-warning alert-dismissible'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong><i class='fas fa-fw fa-exclamation-triangle'></i></strong> Nomor HP anda belum diverifikasi. 
        <a href='verifikasi_hp' class='alert-link'>Klik disini</a> untuk mengirim kode verifikasi ke nomor <strong>".
        str_repeat("*", strlen($data_user->nomor_hp)-4) . substr($data_user->nomor_hp, -4)." </strong>
        </div>";
        }

        if ($data_user->status_approve == '0') {
          echo "<div class='alert alert-info alert-dismissible'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <a href='".base_url('user/'.$user_id)."'><li class='fas fa-fw fa-trophy faa-tada animated'></li>
          Upgrade akun anda menjadi akun premium dan dapatkan saldo sebesar <strong>Rp. 50.000</strong></a>
          </div>";
        } 
?>