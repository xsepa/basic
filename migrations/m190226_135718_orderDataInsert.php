<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135718_orderDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%order}}',
                           ["id", "cartridge_id", "date", "user_id", "printer_id", "order_status_id"],
                            [
    [
        'id' => '1',
        'cartridge_id' => '7',
        'date' => '2019-02-22',
        'user_id' => '1',
        'printer_id' => '1',
        'order_status_id' => '2',
    ],
    [
        'id' => '2',
        'cartridge_id' => '1',
        'date' => '2019-02-22',
        'user_id' => '1',
        'printer_id' => '4',
        'order_status_id' => '2',
    ],
    [
        'id' => '3',
        'cartridge_id' => '13',
        'date' => '2019-02-23',
        'user_id' => '1',
        'printer_id' => '3',
        'order_status_id' => '2',
    ],
    [
        'id' => '4',
        'cartridge_id' => '10',
        'date' => '2019-02-25',
        'user_id' => '1',
        'printer_id' => '4',
        'order_status_id' => '2',
    ],
    [
        'id' => '5',
        'cartridge_id' => '2',
        'date' => '2019-02-25',
        'user_id' => '1',
        'printer_id' => '1',
        'order_status_id' => '2',
    ],
    [
        'id' => '6',
        'cartridge_id' => '14',
        'date' => '2019-02-25',
        'user_id' => '1',
        'printer_id' => '4',
        'order_status_id' => '2',
    ],
    [
        'id' => '7',
        'cartridge_id' => '12',
        'date' => '2019-02-25',
        'user_id' => '1',
        'printer_id' => '5',
        'order_status_id' => '2',
    ],
    [
        'id' => '8',
        'cartridge_id' => '2',
        'date' => '2019-02-25',
        'user_id' => '1',
        'printer_id' => '1',
        'order_status_id' => '1',
    ],
    [
        'id' => '9',
        'cartridge_id' => '6',
        'date' => '2019-02-25',
        'user_id' => '1',
        'printer_id' => '2',
        'order_status_id' => '2',
    ],
    [
        'id' => '10',
        'cartridge_id' => '2',
        'date' => '2019-02-25',
        'user_id' => '1',
        'printer_id' => '1',
        'order_status_id' => '1',
    ],
    [
        'id' => '11',
        'cartridge_id' => '12',
        'date' => '2019-02-25',
        'user_id' => '1',
        'printer_id' => '5',
        'order_status_id' => '1',
    ],
    [
        'id' => '12',
        'cartridge_id' => '14',
        'date' => '2019-02-25',
        'user_id' => '1',
        'printer_id' => '4',
        'order_status_id' => '1',
    ],
    [
        'id' => '13',
        'cartridge_id' => '13',
        'date' => '2019-02-26',
        'user_id' => '4',
        'printer_id' => '3',
        'order_status_id' => '1',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%order}} CASCADE');
    }
}
