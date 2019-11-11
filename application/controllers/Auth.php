<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
  public function __construct(){
    parent::__construct();
   // $this->load->model('users_detail_m','users_login_m');
  }
  public function index(){
    if(!empty($this->session->userdata('user_id'))){
      redirect('dashboard'); }
      else {
    $this->load->view('login');
  }}

  public function cek_login(){
    $this->load->model('users_login_m');
    $this->load->model('users_detail_m');
    $email = $this->input->post('email');
    $user_id = md5($this->input->post('email'));
    $password = md5($this->input->post('password'));
    if ($this->users_login_m->get_count(array('email'=>$email)) > 0){
      if ($this->users_login_m->get_count(array('password'=>$password)) >0){
        $session = array(
          'user_id' => $user_id, 'email' => $email, 'password' => $password
        );      
        $this->session->set_userdata($session);
        redirect('dashboard');
    } else {
        $this->session->set_flashdata('message', 'email atau password anda salah'); 
    }}else {$this->session->set_flashdata('message', 'email belum terdaftar'); 
      } 
      print_r($password);     
      redirect('auth');
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
    $this->load->model('rekening_m');

    $user_id = md5($this->input->post('email'));
    $nama_lengkap = strtoupper($this->input->post('nama_lengkap'));
    $email = $this->input->post('email');
    $nomor_hp = $this->input->post('nomor_hp');
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
       
        //generate simple random code
      $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $code = substr(str_shuffle($set), 0, 12);
      $data_user_detail =  array(
        'user_id'=>$user_id, 'nama_lengkap' => $nama_lengkap, 
        'email' => $email, 'nomor_hp' => $nomor_hp, 'type'=> 'Basic Member', 'verifikasi_email' => 0, 'verifikasi_nomor_hp' => 0,'kode_unik'=>$code
      );
      
      if ($this->users_detail_m->save($data_user_detail)){        
        $this->users_login_m->save($data_login);       
        $this->rekening_m->save(array('user_id' => $user_id));
        $this->session->set_userdata($data_login);        
        $this->session->set_flashdata('welcome_new_member', 'Kami berharap, Anda dan Kami bisa menjadi mitra yang Hebat ^_^'); 
        //KIRIM EMAIL
  //set up email
  $config = array(
    'protocol' => 'smtp',
      'smtp_host' => 'mail.warungkoperasi.my.id',
      'smtp_port' => 587,
      'smtp_user' => 'no-reply@warungkoperasi.my.id',
      'smtp_pass' => 'hancamacul',
      'smtp_username' => 'no-reply@warungkoperasi.my.id',
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
     );
$message =  "
<html>
<head>
<title>Verifikasi E-Mail WarungKoperasi</title>
</head>
<body>
<p>
Selamat datang <b>".$nama_lengkap."</b>,
<br><br>Terima kasih telah bergabung bersama kami, <a href='".base_url()."' target='_blank'><strong>WarungKoperasi</strong></a>. Akun anda saat ini belum sepenuhnya aktif, silahkan
klik link dibawah ini untuk mengaktifkannya:<br><br>

<a href='".base_url()."auth/aktivasi/".$this->session->userdata('user_id')."/".$code."'>".base_url()."auth/aktivasi/".$this->session->userdata('user_id')."/".$code."</a>
<br><br>
Jika anda tidak merasa melakukan registrasi, silahkan abaikan email ini.
<br>Terima kasih
<br><br><br>
Best Regards,
<br><b>WarungKoperasi Team</b></p>
</body>
</html>
";
   
   $this->load->library('email', $config);
   $this->email->set_newline("\r\n");
   $this->email->from($config['smtp_user'], 'WarungKoperasi');
   $this->email->to($email);
   $this->email->subject('Selamat Datang di WarungKoperasi');
   $this->email->message($message);

      //sending email
   if($this->email->send()){
    $this->session->set_flashdata('message','Kode verifikasi telah dikirim ke alamat email anda');
   }
   else{
    $this->session->set_flashdata('message', $this->email->print_debugger());
    
   }  
        $this->session->set_flashdata('message', 'sepertinya ada sesuatu yang salah saat mengirim email');
        redirect('dashboard');
      } else {
        $this->session->set_flashdata('message', 'sepertinya ada sesuatu yang salah saat mengirim email'); 
        redirect('auth/registrasi');
      } 
  }
}


//aktivasi email

public function aktivasi(){
  $this->load->model('users_detail_m');
  $user_id =  $this->uri->segment(3);
  $code = $this->uri->segment(4);

  //fetch user details
  $user= $this->users_detail_m->get_user($user_id);

  //if code matches
  if($user->kode_unik == $code){
   $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $code = substr(str_shuffle($set), 0, 12);
   //update user active status
   $data['verifikasi_email'] = 1;
   $data['kode_unik'] = $code;
   $query = $this->users_detail_m->save($data, $user_id);

   if($query){
    $this->session->set_flashdata('message', 'Email anda berhasil diverifikasi');
   }
   else{
    $this->session->set_flashdata('message', 'Ada sesuatu yang salah saat verifikasi');
   }
  }
  else{
   $this->session->set_flashdata('message', 'Link verifikasi email tidak valid');
  }
  redirect('dashboard');
 }

 function test(){
   echo "<script>alert('ok')</script>";
 }

}