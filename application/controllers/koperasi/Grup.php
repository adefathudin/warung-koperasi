<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Grup extends MY_Controller {
    public function index()
    {
        $this->data['title'] = 'Koperasi Saloome';
        $this->data['subview'] = 'koperasi/group';
        $this->load->view('_layout_main', $this->data);
    }

    public function id($grup_id = null )
    { 
        
        $this->load->model('grup_m');
        $this->load->model('users_detail_m');
        $this->data['list_data_all_user'] = $this->users_detail_m->get_data_all_user();
        $this->data['data_grup_tmp'] = $this->grup_m->get($grup_id); 
        $this->data['title'] = ucwords($this->grup_m->get($grup_id)->nama_grup);
        $this->data['subview'] = 'koperasi/grup';
        $this->load->view('_layout_main', $this->data);
        
    }


    public function new(){
        $this->load->model('grup_m');
        $this->load->model('user_grup_m');
        $user_id = $this->session->userdata('user_id');
        $grup_id = md5(uniqid());
        $nama_grup = $this->input->post('nama_grup');  
        $wilayah = $this->input->post('wilayah');      
        $kategori = $this->input->post('kategori');       
        $about = $this->input->post('tentang');    
        $deskripsi = 'Deskripsi grup '.$nama_grup;
        if ($this->user_grup_m->get_count(array('user_id'=>$user_id))==0){
        
        if ($nama_grup != "" and $about != ""){
        $insert_data_grup =  array(
            'grup_id'=>$grup_id, 'nama_grup' => $nama_grup, 'wilayah' => $wilayah, 'about' => $about, 'admin' => $user_id, 'kategori' => $kategori
            );  
        $insert_user_grup =array (
            'user_id' => $user_id, 'admin_grup' => $grup_id
        );
        if ($this->grup_m->save($insert_data_grup)){
            $this->user_grup_m->save($insert_user_grup);
            $this->session->set_flashdata('pesan_new','Grup baru berhasil dibuat');
            }
        }
    } else {
        $list_admin = $this->user_grup_m->get_list_admin($user_id)->admin_grup."|".$grup_id;
        if ($nama_grup != "" and $about != ""){
            $insert_data_grup =  array(
                'grup_id'=>$grup_id, 'nama_grup' => $nama_grup, 'wilayah' => $wilayah, 'about' => $about, 'admin' => $user_id, 'kategori' => $kategori
                );  
            $insert_user_grup = array (
                'admin_grup' => $list_admin
            );
            if ($this->grup_m->save($insert_data_grup)){
                if ($this->user_grup_m->save($insert_user_grup, $user_id)){
                    
                }
                $this->session->set_flashdata('grup_exist','Grup berhasil dibuat');
                }
            }            
        }
        redirect ('grup/'.$grup_id.'/index');
    }


}
