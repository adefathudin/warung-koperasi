<?php

class Grup_user_m extends MY_Model {

    protected $_table_name = 'grup_user';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    public function get_list_grup($user_id){
        $this->db->select("a.grup_id, a.nama_grup,a.kategori,b.status_user");
        $this->db->from('grup a');
        $this->db->join('grup_user b', 'a.grup_id = b.grup_id');
        $this->db->where('b.user_id', $user_id);
        $result = $this->db->get()->result();
        return $result;
    }

    public function grup_user($user_id,$grup_id){
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
        $this->db->select("a.nama_lengkap, a.user_id, datediff(curdate(), b.joined) as joined, a.profil,b.id");
        $this->db->from('users_detail a');
        $this->db->join('grup_user b', 'a.user_id = b.user_id');
        $this->db->where('b.status_user', 'member');
        $this->db->where('b.grup_id', $grup_id);
        $result = $this->db->get()->result();
        return $result;
    }

    public function get_list_admin($grup_id){
        $this->db->select("a.nama_lengkap, a.user_id, datediff(curdate(), b.joined) as joined, a.profil,b.id");
        $this->db->from('users_detail a');
        $this->db->join('grup_user b', 'a.user_id = b.user_id');
        $this->db->where('b.status_user', 'admin');
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
    
    public function get_total_grup($user_id){
        $this->db->select('count(*) as total_grup');
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('grup_user')->row();
        return $result;
    }
}