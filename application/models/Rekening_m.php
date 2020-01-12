<?php

class Rekening_m extends MY_Model {

    protected $_table_name = 'rekening';
    protected $_primary_key = 'user_id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    
    public function get_saldo($user_id){
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('rekening')->row();
        return $result;
    }

    public function get_saldo_all(){
        $this->db->select('sum(saldo_akhir) as saldo_akhir_all, sum(saldo_koperasi) as saldo_koperasi_all');
        $result = $this->db->get('rekening')->row();
        return $result;
    }
}
