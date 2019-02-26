<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135806_printer_cartridge_compatibleDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%printer_cartridge_compatible}}',
                           ["id", "cartridge_model_id", "printer_model_id"],
                            [
    [
        'id' => '1',
        'cartridge_model_id' => '1',
        'printer_model_id' => '1',
    ],
    [
        'id' => '2',
        'cartridge_model_id' => '2',
        'printer_model_id' => '1',
    ],
    [
        'id' => '3',
        'cartridge_model_id' => '5',
        'printer_model_id' => '4',
    ],
    [
        'id' => '4',
        'cartridge_model_id' => '6',
        'printer_model_id' => '5',
    ],
    [
        'id' => '5',
        'cartridge_model_id' => '3',
        'printer_model_id' => '2',
    ],
    [
        'id' => '6',
        'cartridge_model_id' => '4',
        'printer_model_id' => '3',
    ],
    [
        'id' => '7',
        'cartridge_model_id' => '7',
        'printer_model_id' => '6',
    ],
    [
        'id' => '8',
        'cartridge_model_id' => '1',
        'printer_model_id' => '2',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%printer_cartridge_compatible}} CASCADE');
    }
}
