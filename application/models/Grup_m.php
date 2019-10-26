<?php

class Grup_m extends MY_Model {

    protected $_table_name = 'grup';
    protected $_primary_key = 'grup_id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    
    /*public function get_detail_grup($grup_id){
        $this->db->where('grup_id', $grup_id);
        $result = $this->db->get('grup')->row();
        return $result;
    }*/

    public function get_list_grup(){
        $result = $this->db->get('grup')->result();
        return $result;
    }

    public function get_grup_search($nama_grup,$wilayah,$minimal_pokok,$minimal_wajib,$maksimal_pinjaman){
        
        $this->db->like('nama_grup', $nama_grup);
        //$this->db->where('wilayah', $wilayah);
        //$this->db->where('minimal_pokok >=', $minimal_pokok);
        //$this->db->where('minimal_wajib >=', $minimal_wajib);
        //$this->db->where('maksimal_pinjaman >=', $maksimal_pinjaman);
        $result = $this->db->get('grup')->result();
        return $result;
    }

    public function get_list_grup_limit_3(){
        $user_id = $this->session->userdata('user_id');
        $this->db->where('admin !=', $user_id);
        $this->db->limit(3);
        $this->db->order_by('nama_grup','RANDOM');
        $result = $this->db->get('grup')->result();
        return $result;
    }
}
