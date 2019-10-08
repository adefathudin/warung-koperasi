<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class User extends CI_Controller {
    
    public function index($user_id = null )
    {
        $user_id = $this->session->userdata('user_id');
        $this->data = array (
            'title' => 'Ade Fathudin',
            'subview' => 'profile/profile'
        );
        $this->load->view('_layout_main', $this->data,$user_id);
    }


    public function id($user_id = null )
    {
        $this->load->model('users_detail_m');
        $data_user = $this->users_detail_m->get_user($user_id);
        if (!$data_user){
            redirect ('dashboard');
        } else {
        $this->data = array (
            'title' => 'Profile '.$data_user->nama_lengkap.'', 'subview' => 'profile/profile',
            'email' => $data_user->email, 'nama_lengkap'=>$data_user->nama_lengkap, 'type'=>$data_user->type,
            'user_id'=>$data_user->user_id,'alamat'=>$data_user->alamat,'tempat_lahir'=>$data_user->tempat_lahir,'tanggal_lahir'=>$data_user->tanggal_lahir
        );      
        $this->load->view('_layout_main', $this->data);
    }
}

}
