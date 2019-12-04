<?php

class Pinjam_grup_m extends MY_Model {

    protected $_table_name = 'pinjam_grup';
    protected $_primary_key = 'user_id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

        public function get_pinjaman_grup($user_id,$grup_id){
            $this->db->where('user_id', $user_id);
            $this->db->where('grup_id', $grup_id);
            $this->db->order_by('tanggal_pinjam', 'desc');
            $result = $this->db->get('pinjam_grup')->result();
            return $result;
        }

        public function get_pinjaman_by_id_pinjaman($id_pinjaman){
            $this->db->select("a.id_pinjaman,a.nominal,a.tenor,a.sisa_cicilan,a.sisa_tenor,b.periode,b.nominal as cicilan,b.status_bayar");
            $this->db->from('pinjam_grup a');
            $this->db->join('cicilan_pinjaman b', 'a.id_pinjaman = b.id_pinjaman');
            $this->db->where('b.id_pinjaman', $id_pinjaman);
            $this->db->where('b.status_bayar', '0');
            $this->db->limit('1');
            $result = $this->db->get()->row();
            return $result;
        }

        function cek_total_simpanan($user_id,$grup_id){      
            $this->db->select('sum(tenor),sum(sisa_tenor)');      
            $this->db->where('user_id', $user_id);
            $this->db->where('grup_id', $grup_id);
            $result = $this->db->get('pinjam_grup')->result();
            return $result;
        }
        
        public function get_cek_belum_simpanan($user_id,$grup_id){            
            $this->db->where('user_id', $user_id);
            $this->db->where('grup_id', $grup_id);
            $this->db->where('periode', date('Y-m'),'%Y-%m');
            $this->db->where('jenis_simpanan', 'Wajib');
            $result = $this->db->count_all_results('simpan_grup');
            return $result;
        }

        public function get_cek_belum_simpanan_pokok($user_id,$grup_id){            
            $this->db->where('user_id', $user_id);
            $this->db->where('grup_id', $grup_id);
            $this->db->where('jenis_simpanan', 'Pokok');
            $result = $this->db->count_all_results('simpan_grup');
            return $result;
        }

        public function get_pinjaman_by_grup($grup_id){
            $this->db->select("a.nama_lengkap,a.profil,a.user_id,b.tujuan,b.nominal,b.tenor,b.tanggal_pinjam");
            $this->db->from('users_detail a');
            $this->db->join('pinjam_grup b', 'b.user_id = b.user_id');
            $this->db->where('a.user_id = b.user_id');
            $this->db->where('b.grup_id', $grup_id);
            $this->db->order_by('b.id', 'desc');
            $result = $this->db->get()->result();
            return $result;
        }



}