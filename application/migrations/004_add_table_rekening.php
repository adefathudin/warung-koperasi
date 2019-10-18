<?php

/**
 * Description of 004_add_table_rekeningku
 * 
 * Created On Oct 3, 2019, 11:03:58 AM
 * @author adefathudin
 */
class Migration_add_table_rekening extends MY_Migration {

    protected $_table_name = 'rekening';
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
        'nomor_rekening' => array(
            'type' => 'VARCHAR',
            'constraint' => 20
        ),
        'saldo_awal' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'saldo_akhir' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ), 
        'saldo_koperasi' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'saldo_beku' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'total_nominal_cash_in' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'total_cash_in' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'total_nominal_cash_out' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'total_cash_out' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        )
    );

}