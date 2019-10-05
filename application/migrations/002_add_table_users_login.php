<?php


class Migration_add_table_users_login extends MY_Migration {

    protected $_table_name = 'users_login';
    protected $_primary_key = 'id';
    //protected $_index_keys = array('user_name');
    protected $_fields = array(
        'id' => array (
            'type' => 'INT',
            'constraint' => 11
        ),
        'user_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 15
        ),
        'password' => array(
            'type' => 'INT',
            'constraint' => 11
        )
    );

}
