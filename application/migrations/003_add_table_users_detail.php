<?php

/**
 * Description of 003_add_table_users_detail
 * 
 * Created On Oct 3, 2019, 11:03:58 AM
 * @author adefathudin
 */
class Migration_add_table_users_detail extends MY_Migration {

    protected $_table_name = 'users_detail';
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
            'constraint' => 20
        ),
        'nama_depan' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'nama_belakang' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'tempat_lahir' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'tanggal_lahir' => array(
            'type' => 'DATETIME'
        ),        
        'jenis_kelamin' => array(
            'type' => 'TEXT',
            'constraint' => 2
        ),
        'email' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'nomor_hp' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'alamat' => array(
            'type' => 'VARCHAR',
            'constraint' => 100
        ),
        'ktp' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'profil' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'type' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        )
    );

}
