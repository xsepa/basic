<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135502_cartridgeDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%cartridge}}',
                           ["id", "purchase_date", "cartridge_model_id", "status_id", "inventory_name_id"],
                            [
    [
        'id' => '1',
        'purchase_date' => '2019-01-29',
        'cartridge_model_id' => '5',
        'status_id' => '1',
        'inventory_name_id' => '1',
    ],
    [
        'id' => '2',
        'purchase_date' => '2019-02-07',
        'cartridge_model_id' => '1',
        'status_id' => '3',
        'inventory_name_id' => '2',
    ],
    [
        'id' => '3',
        'purchase_date' => '2019-02-16',
        'cartridge_model_id' => '1',
        'status_id' => '1',
        'inventory_name_id' => '5',
    ],
    [
        'id' => '4',
        'purchase_date' => '2019-02-06',
        'cartridge_model_id' => '2',
        'status_id' => '1',
        'inventory_name_id' => '6',
    ],
    [
        'id' => '5',
        'purchase_date' => '2019-02-21',
        'cartridge_model_id' => '3',
        'status_id' => '1',
        'inventory_name_id' => '7',
    ],
    [
        'id' => '6',
        'purchase_date' => '2019-03-08',
        'cartridge_model_id' => '3',
        'status_id' => '2',
        'inventory_name_id' => '11',
    ],
    [
        'id' => '7',
        'purchase_date' => '2019-01-30',
        'cartridge_model_id' => '1',
        'status_id' => '1',
        'inventory_name_id' => '13',
    ],
    [
        'id' => '8',
        'purchase_date' => '2019-01-29',
        'cartridge_model_id' => '2',
        'status_id' => '1',
        'inventory_name_id' => '14',
    ],
    [
        'id' => '9',
        'purchase_date' => '2019-01-30',
        'cartridge_model_id' => '6',
        'status_id' => '1',
        'inventory_name_id' => '15',
    ],
    [
        'id' => '10',
        'purchase_date' => '2019-01-27',
        'cartridge_model_id' => '5',
        'status_id' => '2',
        'inventory_name_id' => '16',
    ],
    [
        'id' => '11',
        'purchase_date' => '2019-01-30',
        'cartridge_model_id' => '3',
        'status_id' => '1',
        'inventory_name_id' => '17',
    ],
    [
        'id' => '12',
        'purchase_date' => '2019-01-29',
        'cartridge_model_id' => '2',
        'status_id' => '3',
        'inventory_name_id' => '18',
    ],
    [
        'id' => '13',
        'purchase_date' => '2019-01-29',
        'cartridge_model_id' => '4',
        'status_id' => '3',
        'inventory_name_id' => '19',
    ],
    [
        'id' => '14',
        'purchase_date' => '2019-01-28',
        'cartridge_model_id' => '5',
        'status_id' => '3',
        'inventory_name_id' => '20',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%cartridge}} CASCADE');
    }
}
