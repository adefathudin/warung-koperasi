<?php

/*
  created by @garaulo on Aug 5, 2019
  fauziansyah26@gmail.com
 */

class Userlib extends Library {
    private $_prefix_session = '_usersession_';
    private $_prefix_page = '_pagesession_';
    private $last_message = '';
    
    function __construct() {
        parent::__construct();
        
    }
    
    public function login($username, $password){
        $this->CI->load->model('users_m');
        
        $dt_user = $this->CI->users_m->get_by([
            'user_name' => $username,
            'user_password' => $this->generate($password)
        ], TRUE);
        
        if(!$dt_user){
            $this->last_message = 'Username/Password tidak ditemukan.';
            
            return FALSE;
        }else{
            // set usersession
            $this->_set_usersession($dt_user);
            
            // set menusession
            $this->_set_menusession($dt_user->user_group_id);
            
            return $this->get_login_detail();
        }
    }
    
    public function get_login_detail(){
        if(!property_exists($this->CI, 'session')){
            $this->CI->load->library('session');
        }
        
        $user_data = $this->CI->session->userdata($this->_prefix_session . 'detail');
        
        return $user_data;
    }
    
    public function get_userid(){
        return  $this->get_login_detail()->user_id;
    }
    
    public function get_menus($uri_string){
        $menus = $this->CI->session->get_userdata()[$this->_prefix_page . 'menus'];
        foreach($menus as $menu){
            unset($menu->menu_active);
            if($menu->menu_url == $uri_string){
                $menu->menu_active = TRUE;
            }
            
            if(property_exists($menu, 'children')){
                foreach($menu->children as $children){
                    unset($children->menu_active);
                    if($children->menu_url == $uri_string){
                        $menu->menu_active = TRUE;
                        $children->menu_active = TRUE;
                    }
                }
            }
        }
        
        return $menus;
    }
    
    public function has_login(){
        $this->CI->load->library('session');
        
        return $this->CI->session->userdata($this->_prefix_session . 'has_active') != NULL ? TRUE:FALSE;
    }
    
    public function generate_password($string){
        return $this->generate($string);
    }
    
    public function get_message(){
        return $this->last_message;
    }
    
    private function _set_usersession($dt_user){
        $this->CI->load->model('t_user_group_m');
        
        unset($dt_user->user_password);
        unset($dt_user->user_locked_by);
        unset($dt_user->user_locked_datetime);
        unset($dt_user->user_created_by);
        unset($dt_user->user_created_datetime);
        
        $dt_user->user_group_id_desc = $this->CI->t_user_group_m->get($dt_user->user_group_id)->user_group_name;
        $this->CI->session->set_userdata($this->_prefix_session . 'detail', $dt_user);
        $this->CI->session->set_userdata($this->_prefix_session . 'has_active', TRUE);
    }
    
    private function _set_menusession($group_type){
        $this->CI->load->model(['r_permission_m','t_menu_m']);
        
        if($group_type != USER_GROUP_ADMIN){
            $dt_menu = $this->CI->r_permission_m->get_join_menu([
                't_menu.menu_parent_id' => 0,
                'r_menu_permission.user_group_id' => $group_type,
                'r_menu_permission.mp_permission' => 1,
            ]);
        }else{
            $dt_menu = $this->CI->t_menu_m->get_by([
                'menu_parent_id' => 0
            ]);
        }
        
        $arr_menu = array();
        foreach($dt_menu as $menu){
            $arr_menu[$menu->menu_id] = $menu;
            
            if($group_type != USER_GROUP_ADMIN){
                // check if has children
                $childrens = $this->CI->r_permission_m->get_join_menu([
                    't_menu.menu_parent_id' => $menu->menu_id,
                    'r_menu_permission.user_group_id' => $group_type,
					'r_menu_permission.mp_permission' => 1,
                ]);
            }else{
                $childrens = $this->CI->t_menu_m->get_by([
                    't_menu.menu_parent_id' => $menu->menu_id
                ]);
            }
            if(count($childrens) > 0){
                $arr_menu[$menu->menu_id]->children = $childrens;
            }
        }
        
        $this->CI->session->set_userdata($this->_prefix_page . 'menus', $arr_menu);
    }
	
	public function me(){
        $user = new stdClass();
        foreach ($this->CI->session->userdata() as $key => $value){
            if (strpos($key, $this->_prefix_session)!== FALSE){
                $key_length = strlen($this->_prefix_session) - strlen($key);
                $session_key = substr($key,$key_length);
                $user->$session_key = $value;
            }
        }
        
        return $user;
    }
}