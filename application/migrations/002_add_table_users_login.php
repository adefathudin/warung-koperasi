<?php

/**
 * Description of 002_add_table_users
 * 
 * Created On Aug 5, 2019, 11:03:58 AM
 * @author fauziansyah
 */
class Migration_add_table_users_login extends MY_Migration {

    protected $_table_name = 'users_login';
    protected $_primary_key = 'user_id';
    //protected $_index_keys = array('user_name');
    protected $_fields = array(
        'user_id' => array(
            'type' => 'INT',
            'constraint' => 11,
            'auto_increment' => TRUE
        ),
        'password' => array(
            'type' => 'INT',
            'constraint' => 11
        ),
        'akses' => array(
            'type' => '',
            'constraint' => 15
        ),
        'last_login' => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'user_created_datetime' => array(
            'type' => 'TIMESTAMP'
        )
    );

}
