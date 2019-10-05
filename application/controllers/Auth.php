<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
  public function __construct(){
    parent::__construct();
   // $this->load->model('users_detail_m','users_login_m');
  }
  public function index(){
    if($this->session->userdata('authenticated'))
      redirect('dashboard');
    $this->load->view('login');
  }
  public function cek_login(){
    $this->load->model('users_login_m');
    $this->load->model('users_detail_m');
    $email = $this->input->post('email');
    $password = password_hash($this->input->post('password'),PASSWORD_BCRYPT);
    
    if ($this->users_login_m->get_count(array('email'=>$email))>0){
      $data = $this->users_detail_m->get_detail_user($email);
      
      $session = array(
        'authenticated'=>true, 'nama_depan'=>$data->nama_depan,
        'nama_belakang' =>$data->nama_belakang
      );      
      $this->session->set_userdata($session);
      redirect('auth');
    } else {
      $this->session->set_flashdata('message', 'E-Mail atau Password salah'); 
      redirect('auth');
    }
  }


  //REGISTRASI PAGE
  public function registrasi(){
    $this->load->view('registrasi');
  }

  //LOGOUT
  public function logout(){
    $this->session->sess_destroy();
    redirect('auth');
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
      $str = hash ( "sha256", $str );
      $data_login = array(
        'user_id' => $user_id, 'password' => password_hash($password, PASSWORD_BCRYPT), 'email' => $email
      );
      $this->users_login_m->save($data_login);

      $data_user_detail =  array(
        'user_id'=>$user_id, 'nama_depan' => $nama_depan,
        'nama_belakang' => $nama_belakang, 'tempat_lahir' => $tempat_lahir,
        'email' => $email, 'nomor_hp' => $nomor_hp,
        'alamat' => $alamat
      );

      if ($this->users_detail_m->save($data_user_detail)){
        redirect('dashboard');
      } else {
        echo "false";
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