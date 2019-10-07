<?php

/**
 * Description of 004_add_table_mutasi_rekeningku
 * 
 * Created On Oct 3, 2019, 11:03:58 AM
 * @author adefathudin
 */
class Migration_add_table_mutasi_rekeningku extends MY_Migration {

    protected $_table_name = 'mutasi_rekeningku';
    protected $_primary_key = 'trx_id';
    //protected $_index_keys = array('user_name');
    protected $_fields = array(
        'trx_id' => array(
            'type' => 'INT',
            'constraint' => 15,
            'auto_increment' => TRUE
        ),
        'nomor_rekening' => array(
            'type' => 'VARCHAR',
            'constraint' => 20
        ),
        'jenis_trx' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'tanggal_trx' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'merchant_trx' => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        )
    );

}
