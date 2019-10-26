<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Grup extends MY_Controller {
    public function index()
    {
        $this->data['title'] = 'Koperasi Saloome';
        $this->data['subview'] = 'koperasi/group';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function search()
    {
        $this->load->model('grup_m');
        
        $nama_grup = $this->input->post('nama_grup');  
        $wilayah = $this->input->post('wilayah');      
        $minimal_pokok = $this->input->post('minimal_pokok');      
        $minimal_wajib = $this->input->post('minimal_wajib');      
        $minimal_pinjaman = $this->input->post('minimal_pinjaman'); 
        $this->data['list_grup_search'] = $this->grup_m->get_grup_search($nama_grup,$wilayah,$minimal_pokok,$minimal_wajib,$minimal_pinjaman);
        $this->data['title'] = 'Koperasi Saloome';
        $this->data['subview'] = 'koperasi/grup_search';
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
        $nama_grup = ucwords($this->input->post('nama_grup'));  
        $wilayah = $this->input->post('wilayah');      
        $kategori = $this->input->post('kategori');       
        $about = $this->input->post('tentang');    
        $deskripsi = 'Deskripsi grup '.$nama_grup;
        if ($this->user_grup_m->get_count(array('user_id'=>$user_id))==0){
        
        if ($nama_grup != "" and $about != ""){
        $insert_data_grup =  array(
            'grup_id'=>$grup_id, 'nama_grup' => $nama_grup, 'wilayah' => $wilayah, 'about' => $about, 'admin' => $user_id, 'kategori' => $kategori, 'deskripsi' => $deskripsi
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
    
    
    public function update_identitas(){
        $this->load->model('grup_m');
        $grup_id = $this->input->post('grup_id');  
        $nama_grup = ucwords($this->input->post('nama_grup'));  
        $wilayah = $this->input->post('wilayah');      
        $kategori = $this->input->post('kategori');       
        $about = $this->input->post('about');          
        $deskripsi = $this->input->post('deskripsi'); 
        $config_banner = array(
            'upload_path' => './assets/img/grup_koperasi/', 'allowed_types' => 'jpg|jpeg', 
            'file_name' => $grup_id.'.jpg', 'overwrite' => TRUE
        );
        $update_data_grup =  array(
            'nama_grup' => $nama_grup, 'wilayah' => $wilayah, 'about' => $about,  'kategori' => $kategori, 'deskripsi' => $deskripsi,
            'banner' => $grup_id.'.jpg'
            );  
        $this->load->library('upload', $config_banner);
        if ($this->grup_m->save($update_data_grup, $grup_id)){
            $this->upload->do_upload('banner');
           redirect ('grup/'.$grup_id.'/index');
        }
    }

    public function update_finance(){
        $this->load->model('grup_m');         
        $grup_id = $this->input->post('grup_id');  
        $minimal_pokok = ucwords($this->input->post('minimal_pokok'));  
        $minimal_wajib = $this->input->post('minimal_wajib');      
        $maksimal_pinjaman = $this->input->post('maksimal_pinjaman');    
        $update_finance_grup =  array(
            'minimal_pokok' => $minimal_pokok, 'minimal_wajib' => $minimal_wajib, 'maksimal_pinjaman' => $maksimal_pinjaman
            );  
        if ($this->grup_m->save($update_finance_grup, $grup_id)){
            redirect ('grup/'.$grup_id.'/index');
        }
    }
}
