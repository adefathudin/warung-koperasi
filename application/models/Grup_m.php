<?php

class Grup_m extends MY_Model {

    protected $_table_name = 'grup';
    protected $_primary_key = 'grup_id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    
    public function get_detail_grup($grup_id){
        $this->db->where('grup_id', $grup_id);
        $result = $this->db->get('grup')->row();
        return $result;
    }

    public function get_list_grup(){
        $result = $this->db->get('grup')->result();
        return $result;
    }
}
