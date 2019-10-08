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
    $password = md5($this->input->post('password'));
    if ($this->users_login_m->get_count(array('email'=>$email)) == 1){
      if ($this->users_login_m->get_count(array('password'=>$password))==1){
        $data= $this->users_detail_m->get_detail_user($email);
        $session = array(
        'authenticated'=>true, 'email' => $email, 'password' => $password, 'nama_depan'=>$data->nama_depan, 'nama_belakang'=>$data->nama_belakang,'type'=>$data->type,
        'user_id'=>$data->user_id,'alamat'=>$data->alamat,'tempat_lahir'=>$data->tempat_lahir,'tanggal_lahir'=>$data->tanggal_lahir
        );      
        $this->session->set_userdata($session);
        redirect('dashboard');
    } else {
        $this->session->set_flashdata('message', 'email atau password anda salah'); 
        redirect('auth');
      }} else {
        $this->session->set_flashdata('message', 'email belum terdaftar'); 
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

    $user_id = uniqid();
    $nama_lengkap = $this->input->post('nama_depan')." ".$this->input->post('nama_belakang');
    $tempat_lahir = $this->input->post('tempat_lahir');
    $tanggal_lahir = $this->input->post('tanggal_lahir');
    $email = $this->input->post('email');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $nomor_hp = $this->input->post('nomor_hp');
    $alamat = $this->input->post('alamat');
    $password = $this->input->post('password');
    $repassword = $this->input->post('repassword');
    
    //cek email terdaftar
    if ($this->users_detail_m->get_count(array('email'=>$email))>0){
      $this->session->set_flashdata('message', 'email <strong>'.$email.'</strong> sudah terdaftar'); 
      redirect('auth/registrasi');
    //cek no hp terdaftar
    } elseif ($this->users_detail_m->get_count(array('nomor_hp'=>$nomor_hp))>0){
      $this->session->set_flashdata('message', 'No. HP <strong>'.$nomor_hp.'</strong> sudah terdaftar'); 
      redirect('auth/registrasi');
    } else {
      $data_login = array(
        'user_id' => $user_id, 'password' => md5($password), 'email' => $email
      );
      $this->users_login_m->save($data_login);
      $data_user_detail =  array(
        'user_id'=>$user_id, 'nama_lengkap' => $nama_lengkap, 'tempat_lahir' => $tempat_lahir,
        'tanggal_lahir' => $tanggal_lahir, 'jenis_kelamin' => $jenis_kelamin,
        'email' => $email, 'nomor_hp' => $nomor_hp,
        'alamat' => $alamat, 'type'=> 'Basic Member', 'verifikasi_email' => 0, 'verifikasi_nomor_hp' => 0
      );

      if ($this->users_detail_m->save($data_user_detail)){
        kirim_email();
        $this->session->set_userdata('authenticated', TRUE);
        $this->session->set_userdata($data_user_detail);
        redirect('dashboard');
      } else {
        $this->session->set_flashdata('message', 'sepertinya ada sesuatu yang salah'); 
        redirect('auth/registrasi');
      } 
  }
}


function kirim_email (){
  //generate simple random code
  $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $code = substr(str_shuffle($set), 0, 12);
  //set up email
  $config = array(
    'protocol' => 'smtp',
      'smtp_host' => 'smtp.adefathudin.com', //Ubah sesuai dengan host anda
      'smtp_port' => 25,
      'smtp_user' => 'mail@adefathudin.com', // Ubah sesuai dengan email yang dipakai untuk mengirim konfirmasi
      'smtp_pass' => 'evVyMxM(3', // ubah dengan password host anda
      'smtp_username' => 'mail@adefathudin.com', // Masukkan username SMTP anda
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
     );
$message =  "
<html>
<head>
<title>Verification Code</title>
</head>
<body>
<h4>Terima kasih telah bergabung dengan WarKop</h4>
<p>Your Account:</p>
<p>Email: ".$email."</p>
<p>Please click the link below to activate your account.</p>
<h4><a href='".base_url()."auth/aktivasi/".$user_id."/".$code."'>".base_url()."auth/aktivasi/".$user_id."/".$code."</a></h4>
</body>
</html>
";
   
   $this->load->library('email', $config);
   $this->email->set_newline("\r\n");
   $this->email->from($config['smtp_user']);
   $this->email->to($email);
   $this->email->subject('Signup Verification Email');
   $this->email->message($message);

      //sending email
   if($this->email->send()){
    $this->session->set_flashdata('message','Activation code sent to email');
   }
   else{
    $this->session->set_flashdata('message', $this->email->print_debugger());
    
   }
  }

}