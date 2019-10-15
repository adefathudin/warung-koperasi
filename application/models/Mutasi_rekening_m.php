<?php

class Mutasi_rekening_m extends MY_Model {

    protected $_table_name = 'mutasi_rekening';
    protected $_primary_key = 'trx_id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    
    public function get_mutasi_rekening($user_id){
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('mutasi_rekening')->result();
        return $result;
    }
}
