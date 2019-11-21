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
    
    public function id($user_id = null ){ 
        $this->load->model('users_detail_m');
        $user_id =  $this->uri->segment(2);
        $this->data['data_user_tmp'] = $this->users_detail_m->get_user($user_id); 
        $this->data['title'] = $this->users_detail_m->get_user($user_id)->nama_lengkap;
        $this->data['subview'] = 'profile/profile';
        $this->load->view('_layout_main', $this->data);
    }

    public function member_request_full_service(){ 
        $this->load->model('users_detail_m');
        $data = $this->users_detail_m->get_member_request_full_service();
        echo json_encode($data);
    }

    public function detail_member_request_full_service(){ 
        $this->load->model('users_detail_m');
        $user_id = $this->input->GET('user_id');
        $data = $this->users_detail_m->get_detail_member_request_full_service($user_id);
        echo json_encode($data);
    }

    public function approve_member_full_service(){ 
        $this->load->model('users_detail_m');
        $this->load->model('notifikasi_m');
        $user_id = $this->input->GET('user_id');
        $this->notifikasi_m->save(array('user_id'=>$user_id, 'judul'=>'Status Upgrade Member','isi'=>'Permohonan upgrade member Full Service anda telah disetujui'));
        $this->users_detail_m->save(array('status_approve'=> 1, 'type' => 'Full Service'), $user_id);
    }

    public function reject_member_full_service(){ 
        $this->load->model('users_detail_m');
        $user_id = $this->input->GET('user_id');
        $this->users_detail_m->save(array('status_approve'=> 0, 'type' => 'Basic Service'), $user_id);
    }
}

