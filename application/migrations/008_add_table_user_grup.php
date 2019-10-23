<?php

/**
 * Description of 004_add_table_notifikasi
 * 
 * Created On Oct 3, 2019, 11:03:58 AM
 * @author adefathudin
 */
class Migration_add_table_user_grup extends MY_Migration {

    protected $_table_name = 'user_grup';
    protected $_primary_key = 'id';
    //protected $_index_keys = array('user_name');
    protected $_fields = array(
        'id' => array(
            'type' => 'INT',
            'constraint' => 15,
            'auto_increment' => TRUE
        ),
        'user_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 32
        ),
        'admin_grup' => array(
            'type' => 'VARCHAR',
            'constraint' => 10000
        ),
        'basic_grup' => array(
            'type' => 'VARCHAR',
            'constraint' => 10000
        ),
        'request_grup' => array(
            'type' => 'VARCHAR',
            'constraint' => 1000
        ),
        'total_grup' => array(
            'type' => 'VARCHAR',
            'constraint' => 10,
            'default' => 0
        )
    );

}
