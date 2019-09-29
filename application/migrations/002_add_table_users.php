<?php

/**
 * Description of 002_add_table_users
 * 
 * Created On Aug 5, 2019, 11:03:58 AM
 * @author fauziansyah
 */
class Migration_add_table_users extends MY_Migration {

    protected $_table_name = 't_users';
    protected $_primary_key = 'user_id';
    protected $_index_keys = array('user_name');
    protected $_fields = array(
        'user_id' => array(
            'type' => 'INT',
            'constraint' => 11,
            'auto_increment' => TRUE
        ),
        'user_group_id' => array(
            'type' => 'INT',
            'constraint' => 11
        ),
        'user_name' => array(
            'type' => 'VARCHAR',
            'constraint' => 15
        ),
        'user_password' => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'user_full_name' => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'user_email' => array(
            'type' => 'VARCHAR',
            'constraint' => 150,
            'null' => TRUE
        ),
        'user_avatar' => array(
            'type' => 'TEXT',
            'null' => TRUE
        ),
        'user_last_login' => array(
            'type' => 'TIMESTAMP',
            'null' => TRUE
        ),
        'user_locked' => array(
            'type' => 'TINYINT',
            'constraint' => 1,
            'default' => 0
        ),
        'user_locked_by' => array(
            'type' => 'INT',
            'constraint' => 11,
            'null' => TRUE
        ),
        'user_locked_datetime' => array(
            'type' => 'TIMESTAMP',
            'null' => TRUE
        ),
        'user_created_by' => array(
            'type' => 'INT',
            'constraint' => 11
        ),
        'user_created_datetime' => array(
            'type' => 'TIMESTAMP'
        )
    );

}
