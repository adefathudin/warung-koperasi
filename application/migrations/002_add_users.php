<?php

/**
 * Description of 002_add_table_users
 * 
 * Created On Aug 5, 2019, 11:03:58 AM
 * @author fauziansyah
 */
class Migration_add_table_users extends CI_Migration {

    protected $_table_name = 'users';
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
    
    function up(){
        parent::up();
        
        $userlib = new Userlib();
        
        $insert = array(
            array(
                'user_group_id' => USER_GROUP_ADMIN,
                'user_name'     => 'administrator',
                'user_password' => $userlib->generate_password('123'),
                'user_full_name' => 'Administrator',
                'user_email'    => 'it-bsm@bsminsbroker.com',
                'user_created_by' => 0,
                'user_created_datetime' => date('Y-m-d H:i:s')
            ),
            array(
                'user_group_id' => USER_GROUP_SPV,
                'user_name'     => 'supervisor',
                'user_password' => $userlib->generate_password('123'),
                'user_full_name' => 'Supervisor',
                'user_email'    => 'info@bsminsbroker.com',
                'user_created_by' => 0,
                'user_created_datetime' => date('Y-m-d H:i:s')
            ),
            array(
                'user_group_id' => USER_GROUP_USER,
                'user_name'     => 'user',
                'user_password' => $userlib->generate_password('123'),
                'user_full_name' => 'User BSM',
                'user_email'    => 'info@bsminsbroker.com',
                'user_created_by' => 0,
                'user_created_datetime' => date('Y-m-d H:i:s')
            )
        );
        
        $this->_seed($insert);
    }

}
