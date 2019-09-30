<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('users_m');
  }
  public function index(){
    if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
      redirect('dashboard'); // Redirect ke page welcome
    $this->load->view('login'); // Load view login.php
  }
  public function login(){
    $email = $this->input->post('email'); // Ambil isi dari inputan email pada form login
    $password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
    $user = $this->users_m->get($email); // Panggil fungsi get yang ada di users_m.php
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
}