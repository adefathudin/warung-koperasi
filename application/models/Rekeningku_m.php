<?php

class Rekeningku_m extends MY_Model {

    protected $_table_name = 'rekeningku';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    
    public function get_saldo($user_id){
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('rekeningku')->row();
        return $result;
    }
}
