<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class User extends MY_Controller {
    
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
        $user_id =  $this->uri->segment(2);
        $this->data['data_user_tmp'] = $this->users_detail_m->get_user($user_id); 
        $this->data['title'] = '';
        $this->data['subview'] = 'profile/profile';
        $this->load->view('_layout_main', $this->data);
    }

    public function udate_identitas($user_id = null){
        $this->load->model('users_detail_m');
        $user_id = $this->post('user_id');
        $nama_lengkap = $this->post('nama_lengkap');
        $tempat_lahir = $this->post('tempat_lahir');
        $tanggal_lahir = $this->post('tanggal_lahir');
        $jenis_kelamin = $this->post('jenis_kelamin');
        $alamat = $this->post('alamat');
        $about = $this->post('about');
        $data = array(
            'nama_lengkap' => $nama_lengkap, 'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir, 'jenis_kelamin' => $jenis_kelamin,
            'alamat' => $alamat, 'about' => $about
        );
        $this->users_detail_m->save($data, $user_id);
    }
}

