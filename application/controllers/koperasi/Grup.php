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
        $this->load->model('rekening_m');
        $user_id = $this->session->userdata('user_id');

        //JIKA HALAMAN SIMPAN DI GRUP DIBUKA
        if ($this->uri->segment(3) == 'simpan'){
            $grup_id = $this->uri->segment(2);
            $this->load->model('simpan_grup_m');
            $this->data['simpanan_grup'] = $this->simpan_grup_m->get_simpanan_grup($user_id,$grup_id);
            //cek periode pinjaman
            $this->data['cek_periode_pinjaman_pokok'] = $this->simpan_grup_m->get_cek_belum_simpanan_pokok($user_id,$grup_id);
            $this->data['cek_periode_pinjaman_wajib'] = $this->simpan_grup_m->get_cek_belum_simpanan($user_id,$grup_id);
        }
        //
        $this->data['grup_id'] = $this->uri->segment(2);
        $this->data['saldo'] = $this->rekening_m->get_saldo($user_id);
        $this->data['list_data_all_user'] = $this->users_detail_m->get_data_all_user();
        $this->data['data_grup_tmp'] = $this->grup_m->get($grup_id); 
        $this->data['title'] = ucwords($this->grup_m->get($grup_id)->nama_grup);
        $this->data['subview'] = 'koperasi/grup';
        $this->load->view('_layout_main', $this->data);
        
    }

    //BUAT GRUP BARU
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
    
    //UPDATE  DATA PROFIL
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

    //Setting nominal minimal pinjaman dan simpanan
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


    public function proses_pembayaran_simpan(){
        $this->load->model('simpan_grup_m');
        $this->load->model('rekening_m');
        $this->load->model('mutasi_rekening_m');
        $user_id = $this->session->userdata('user_id');
        $grup_id = $this->input->post('grup_id');
        $grup_name = $this->input->post('grup_name');
        $jenis_simpanan = $this->input->post('jenis_simpanan');
        $nominal_simpanan = $this->input->post('nominal_simpanan');
        $periode = $this->input->post('periode_simpanan');        
        $minimal_pokok = $this->input->post('minimal_pokok');        
        $minimal_wajib = $this->input->post('minimal_wajib');        
        $rek = $this->rekening_m->get($user_id);
        //jika simpanan pokok, maka mengecek apakah simpanan pokok sudah pernah dibayar atau tidak
        if ($jenis_simpanan == "Pokok"){
            if ($minimal_pokok != $nominal_simpanan){
                $this->session->set_flashdata('status_simpanan','<i class="fas fa-fw fa-info-circle"></i><b>Transaksi Gagal</b><br> Nominal simpanan pokok yang diinput Rp<b>'.number_format($nominal_simpanan).'</b> tidak sama dengan nominal pokok yang telah ditentukan Rp<b>'.number_format($minimal_pokok).'</b>');
                redirect ('grup/'.$grup_id.'/simpan');
            } else {
            $cek_simpanan = $this->simpan_grup_m->get_cek_belum_simpanan_pokok($user_id,$grup_id);
            $periode = "-";}
        //jika simpanan wajib
        } elseif ($jenis_simpanan == "Wajib"){
            if ($minimal_wajib != $nominal_simpanan){
                $this->session->set_flashdata('status_simpanan','<i class="fas fa-fw fa-info-circle"></i><b>Transaksi Gagal</b><br> Nominal simpanan wajib yang diinput Rp<b>'.number_format($nominal_simpanan).'</b> tidak sama dengan nominal wajib yang telah ditentukan Rp<b>'.number_format($minimal_wajib).'</b>');
                redirect ('grup/'.$grup_id.'/simpan');
            } else {
            $cek_simpanan = $this->simpan_grup_m->get_cek_belum_simpanan($user_id,$grup_id);}
        } elseif ($jenis_simpanan == "Sukarela"){           
            $periode = "-";
        } elseif ($jenis_simpanan == "null"){            
            $this->session->set_flashdata('status_simpanan','<i class="fas fa-fw fa-info-circle"></i><b>Transaksi Gagal</b> Silahkan pilih jenis simpanan');
            redirect ('grup/'.$grup_id.'/simpan');
        }
        if ($cek_simpanan == 0){
        $update_saldo = array (
            'saldo_awal' => $rek->saldo_akhir, 'saldo_akhir' => ($rek->saldo_akhir - $nominal_simpanan),
            'saldo_koperasi' => ($rek->saldo_koperasi + $nominal_simpanan)
        );
        $data_simpanan = array(
            'user_id' => $user_id, 'grup_id' => $grup_id,
            'jenis_simpanan' => $jenis_simpanan, 'periode' => $periode, 'nominal' => $nominal_simpanan
        );
        $insert_mutasi = array (
            'user_id' => $user_id, 'jenis_trx' => '4', 'nominal' => $nominal_simpanan,
            'saldo_awal' => $rek->saldo_akhir, 'saldo_akhir' => ($rek->saldo_akhir + $nominal_simpanan),
            'keterangan_trx' => 'Simpanan '.$jenis_simpanan.' '.$grup_name
        );
        if ($this->simpan_grup_m->save($data_simpanan)){     
            $this->rekening_m->save($update_saldo,$user_id);
            $this->mutasi_rekening_m->save($insert_mutasi);
            }
        } else {
            $this->session->set_flashdata('status_simpanan','<i class="fas fa-fw fa-info-circle"></i><b>Transaksi Gagal</b><br> Simpanan '.$jenis_simpanan.' periode '.substr($periode,0,7).' sudah pernah dilakukan sebelumnya');
        }
        redirect ('grup/'.$grup_id.'/simpan');
    }
}
