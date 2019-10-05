<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
  public function __construct(){
    parent::__construct();
   // $this->load->model('users_detail_m','users_login_m');
  }
  public function index(){
    if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
      redirect('dashboard'); // Redirect ke page welcome
    $this->load->view('login'); // Load view login.php
  }
  public function cek_login(){
    $this->load->model('users_login_m');
    $email = $this->input->post('email'); // Ambil isi dari inputan email pada form login
    $password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
    $user = $this->users_login_m->get($email); // Panggil fungsi get yang ada di users_login_m.php
    if(empty($user) ){ // Jika hasilnya kosong / user tidak ditemukan
      $this->session->set_flashdata('message', 'User tidak ditemukan'); // Buat session flashdata
      redirect('auth'); // Redirect ke halaman login
    }else{
      if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
        $session = array(
          'authenticated'=>true, // Buat session authenticated dengan value true
          'email'=>$user->email,  // Buat session email
          'nama'=>$user->nama // Buat session authenticated
        );
        $this->session->set_userdata($session); // Buat session sesuai $session
        redirect('dashboard'); // Redirect ke halaman welcome
      }else{
        $this->session->set_flashdata('message', 'E-Mail atau Password salah'); // Buat session flashdata
        redirect('auth'); // Redirect ke halaman login
      }
    }
  }


  public function registrasi(){
    $this->load->view('registrasi');
  }


  public function logout(){
    $this->session->sess_destroy(); // Hapus semua session
    redirect('auth'); // Redirect ke halaman login
  }


  public function save_registrasi(){
    $this->load->model('users_detail_m');
    $this->load->model('users_login_m');
    $output = ['status' => FALSE, 'message' => ''];

    $user_id = uniqid();
    $nama_depan = $this->input->post('nama_depan');
    $nama_belakang = $this->input->post('nama_belakang');
    $tempat_lahir = $this->input->post('tempat_lahir');
    $tanggal_lahir = $this->input->post('tanggal_lahir');
    $email = $this->input->post('email');
    $nomor_hp = $this->input->post('nomor_hp');
    $alamat = $this->input->post('alamat');
    $password = $this->input->post('password');
    $repassword = $this->input->post('repassword');
    
    if ($this->users_detail_m->get_count(array('email'=>$email))>0){
      echo "email sudah terdaftar";
      $output['message'] = 'Email '.$email.' sudah terdaftar';
    } else {
      $data_login = array(
        'user_id' => $user_id, 'password' => $password
      );
      $this->users_login_m->save($data_login);

      $data_user_detail =  array(
        'user_id'=>$user_id, 'nama_depan' => $nama_depan,
        'nama_belakang' => $nama_belakang, 'tempat_lahir' => $tempat_lahir,
        'email' => $email, 'nomor_hp' => $nomor_hp,
        'alamat' => $alamat
      );

      if ($this->users_detail_m->save($data_user_detail)){
        $output = ['message' => 'Registrasi berhasil'];
      } else {
        $output = ['message' => 'ada yang salah'];
      }

    }


    
  /*$filename = 'ktp_'.date('YmdHis') . '.jpeg';
  $url = '';
  if( move_uploaded_file($_FILES['webcam']['tmp_name'],'upload/'.$filename) ){
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/upload/' . $filename;
  }

echo $url;*/
  }
}