<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
  public function __construct(){
    parent::__construct();
   // $this->load->model('users_detail_m','users_login_m');
  }
  public function index(){
    if($this->session->userdata('$email'))
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
        'sesi'=> true, 'email' => $email, 'nomor_hp' =>$data->nomor_hp, 'password' => $password, 'nama_lengkap'=>$data->nama_lengkap,'type'=>$data->type,
        'user_id'=>$data->user_id,'tempat_lahir'=>$data->tempat_lahir,'tanggal_lahir'=>$data->tanggal_lahir, 'verifikasi_email' => $data->verifikasi_email, 'verifikasi_nomor_hp' => $data->verifikasi_nomor_hp
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
      //SIMPAN DATA KE TABLE USERS_lOGIN
      $data_user_detail =  array(
        'user_id'=>$user_id, 'nama_lengkap' => $nama_lengkap, 'tempat_lahir' => $tempat_lahir,
        'tanggal_lahir' => $tanggal_lahir, 'jenis_kelamin' => $jenis_kelamin,
        'email' => $email, 'nomor_hp' => $nomor_hp, 'type'=> 'Basic Member', 'verifikasi_email' => 0, 'verifikasi_nomor_hp' => 0,'kode_unik'=>$code
      );
      
      if ($this->users_detail_m->save($data_user_detail)){        
        $this->users_login_m->save($data_login);
        $this->session->set_userdata($data_user_detail);
        $this->session->set_userdata('sesi' == true);
        //KIRIM EMAIL
  //set up email
  $config = array(
    'protocol' => 'smtp',
      'smtp_host' => 'smtp.adefathudin.com',
      'smtp_port' => 25,
      'smtp_user' => 'mail@adefathudin.com',
      'smtp_pass' => 'evVyMxM(3',
      'smtp_username' => 'mail@adefathudin.com',
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
     );
$message =  "
<html>
<head>
<title>Verifikasi E-Mail Warung Koperasi</title>
</head>
<body>
<p>
Selamat datang <b>".$nama_lengkap."</b>,
<br><br>Terima kasih telah bergabung dengan <a href='".base_url()."' target='_blank'><strong>Warung Koperasi</strong></a>. Akun anda saat ini belum sepenuhnya aktif, silahkan
klik link dibawah ini untuk mengaktifkannya:<br><br>

<a href='".base_url()."auth/aktivasi/".$this->session->userdata('user_id')."/".$code."'>".base_url()."auth/aktivasi/".$this->session->userdata('user_id')."/".$code."</a>
<br><br>
Jika anda tidak merasa melakukan registrasi, silahkan abaikan email ini.
<br>Terima kasih atas perhatian dan kerjasamanya
<br><br><br>
Best Regards,
<br>Warung Koperasi Team</p>
</body>
</html>
";
   
   $this->load->library('email', $config);
   $this->email->set_newline("\r\n");
   $this->email->from($config['smtp_user'], 'WarungKoperasi');
   $this->email->to($email);
   $this->email->subject('Selamat Datang di Warung Koperasi');
   $this->email->message($message);

      //sending email
   if($this->email->send()){
    $this->session->set_flashdata('message','Kode verifikasi telah dikirim ke alamat email anda');
   }
   else{
    $this->session->set_flashdata('message', $this->email->print_debugger());
    
   }
        redirect('dashboard');
      } else {
        $this->session->set_flashdata('message', 'sepertinya ada sesuatu yang salah saat mengirim email'); 
        redirect('auth/registrasi');
      } 
  }
}


public function aktivasi(){
  $this->load->model('users_detail_m');
  $user_id =  $this->uri->segment(3);
  $code = $this->uri->segment(4);

  //fetch user details
  $user= $this->users_detail_m->get_user($user_id);

  //if code matches
  if($user->kode_unik == $code){
   //update user active status
   $data['verifikasi_email'] = 1;
   $query = $this->users_detail_m->save($data, $user_id);

   if($query){
    $this->session->set_flashdata('message', 'Email anda berhasil diverifikasi');
    $this->session->set_userdata('verifikasi_email', 1);
   }
   else{
    $this->session->set_flashdata('message', 'Ada sesuatu yang salah saat verifikasi');
   }
  }
  else{
   $this->session->set_flashdata('message', 'Link verifikasi tidak valid');
  }
  redirect('dashboard');
 }

}