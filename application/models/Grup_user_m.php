<?php

class Grup_user_m extends MY_Model {

    protected $_table_name = 'grup_user';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    
    public function get_status_member($user_id,$grup_id){
        $this->db->where('grup_id', $grup_id);
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('grup_user')->row();
        return $result;
    }

    public function get_list_request($grup_id){
        $this->db->select("a.nama_lengkap, a.user_id, a.profil,b.id");
        $this->db->from('users_detail a');
        $this->db->join('grup_user b', 'a.user_id = b.user_id');
        $this->db->where('b.status_user', 'request');
        $this->db->where('b.grup_id', $grup_id);
        $result = $this->db->get()->result();
        return $result;
    }

    public function get_list_member($grup_id){
        $this->db->select("a.nama_lengkap, a.user_id, a.profil,b.id");
        $this->db->from('users_detail a');
        $this->db->join('grup_user b', 'a.user_id = b.user_id');
        $this->db->where('b.status_user', 'member');
        $this->db->where('b.grup_id', $grup_id);
        $result = $this->db->get()->result();
        return $result;
    }
    
    public function accept($user_id){
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('user_grup')->row();
        return $result;
    }

    public function get_user($user_id){
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('users_detail')->row();
        return $result;
    }
}