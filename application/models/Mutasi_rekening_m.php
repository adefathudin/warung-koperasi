<?php

class Mutasi_rekening_m extends MY_Model {

    protected $_table_name = 'mutasi_rekening';
    protected $_primary_key = 'order_id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    
    public function get_mutasi_rekening($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->order_by('tanggal_trx', 'desc');
        $result = $this->db->get('mutasi_rekening')->result();
        return $result;
    }
}
