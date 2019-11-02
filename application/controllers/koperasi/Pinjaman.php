<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Pinjaman extends MY_Controller {
    public function index()
    {
        $this->data['title'] = 'Koperasi Saloome';
        $this->data['subview'] = 'koperasi/group';
        $this->load->view('_layout_main', $this->data);
    }
    
    //PROSES PENGAJUAN PINJAMAN
    public function proses_pengajuan_pinjaman(){

        $this->load->model('pinjam_grup_m');
        $this->load->model('rekening_m');
        $this->load->model('mutasi_rekening_m');

        $user_id = $this->session->userdata('user_id');
        $grup_id = $this->input->post('grup_id');
        $grup_name = $this->input->post('grup_name');
        $nominal_pinjaman = $this->input->post('nominal_pinjaman');
        $tenor = $this->input->post('tenor');
        $tujuan = $this->input->post('tujuan_pinjaman');        
        $rek = $this->rekening_m->get($user_id);
        
        $update_saldo = array (
            'saldo_awal' => $rek->saldo_akhir, 'saldo_akhir' => ($rek->saldo_akhir + $nominal_pinjaman),
            'saldo_koperasi' => ($rek->saldo_koperasi - $nominal_pinjaman)
        );
        $data_pinjaman = array(
            'user_id' => $user_id, 'grup_id' => $grup_id,
            'nominal' => $nominal_pinjaman, 'tenor' => $tenor, 'tujuan' => $tujuan
        );
        $insert_mutasi = array (
            'user_id' => $user_id, 'jenis_trx' => '3', 'nominal' => $nominal_pinjaman,
            'saldo_awal' => $rek->saldo_akhir, 'saldo_akhir' => ($rek->saldo_akhir + $nominal_pinjaman),
            'keterangan_trx' => 'Pinjaman dari '.$grup_name
        );
        if ($this->pinjam_grup_m->save($data_pinjaman)){     
            $this->rekening_m->save($update_saldo,$user_id);
            $this->mutasi_rekening_m->save($insert_mutasi);
            }
            $this->session->set_flashdata('status_simpanan','<i class="fas fa-fw fa-info-circle"></i><b>Transaksi Gagal</b><br> Simpanan '.$jenis_simpanan.' periode '.substr($periode,0,7).' sudah pernah dilakukan sebelumnya');
            redirect ('grup/'.$grup_id.'/pinjam');
    }
    
}
