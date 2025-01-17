<?php

class Simpan_grup_m extends MY_Model {

    protected $_table_name = 'simpan_grup';
    protected $_primary_key = 'user_id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

        public function get_simpanan_grup($user_id,$grup_id){
            $this->db->where('user_id', $user_id);
            $this->db->where('grup_id', $grup_id);
            $this->db->order_by('id', 'desc');
            $result = $this->db->get('simpan_grup')->result();
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

        public function get_simpanan_by_grup($grup_id){
            $this->db->select("a.nama_lengkap,a.profil,a.user_id,b.jenis_simpanan,b.periode,b.nominal,b.tanggal_simpan");
            $this->db->from('users_detail a');
            $this->db->join('simpan_grup b', 'b.user_id = b.user_id');
            $this->db->where('a.user_id = b.user_id');
            $this->db->where('b.grup_id', $grup_id);
            $this->db->order_by('b.id', 'desc');
            $result = $this->db->get()->result();
            return $result;
        }


}