<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135635_inventoryDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%inventory}}',
                           ["id", "inventory_name"],
                            [
    [
        'id' => '3',
        'inventory_name' => 'ин1',
    ],
    [
        'id' => '11',
        'inventory_name' => 'ин10',
    ],
    [
        'id' => '15',
        'inventory_name' => 'ин13',
    ],
    [
        'id' => '16',
        'inventory_name' => 'ин14',
    ],
    [
        'id' => '14',
        'inventory_name' => 'ин18',
    ],
    [
        'id' => '13',
        'inventory_name' => 'ин19',
    ],
    [
        'id' => '1',
        'inventory_name' => 'ин1_',
    ],
    [
        'id' => '2',
        'inventory_name' => 'ин2',
    ],
    [
        'id' => '19',
        'inventory_name' => 'ин25',
    ],
    [
        'id' => '5',
        'inventory_name' => 'ин4',
    ],
    [
        'id' => '17',
        'inventory_name' => 'ин41',
    ],
    [
        'id' => '18',
        'inventory_name' => 'ин42',
    ],
    [
        'id' => '20',
        'inventory_name' => 'ин43',
    ],
    [
        'id' => '6',
        'inventory_name' => 'ин5',
    ],
    [
        'id' => '7',
        'inventory_name' => 'ин6',
    ],
    [
        'id' => '4',
        'inventory_name' => 'принтер ин1',
    ],
    [
        'id' => '8',
        'inventory_name' => 'принтер ин2',
    ],
    [
        'id' => '9',
        'inventory_name' => 'принтер ин3',
    ],
    [
        'id' => '10',
        'inventory_name' => 'принтер ин4',
    ],
    [
        'id' => '12',
        'inventory_name' => 'принтер ин5',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%inventory}} CASCADE');
    }
}
