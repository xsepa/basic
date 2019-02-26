<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135832_printer_cartridge_installedDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%printer_cartridge_installed}}',
                           ["id", "printer_id", "cartridge_id", "date"],
                            [
    [
        'id' => '3',
        'printer_id' => '1',
        'cartridge_id' => '2',
        'date' => '2019-02-25',
    ],
    [
        'id' => '4',
        'printer_id' => '2',
        'cartridge_id' => '6',
        'date' => '2019-02-25',
    ],
    [
        'id' => '5',
        'printer_id' => '3',
        'cartridge_id' => '13',
        'date' => '2019-02-25',
    ],
    [
        'id' => '6',
        'printer_id' => '4',
        'cartridge_id' => '14',
        'date' => '2019-02-25',
    ],
    [
        'id' => '7',
        'printer_id' => '5',
        'cartridge_id' => '12',
        'date' => '2019-02-25',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%printer_cartridge_installed}} CASCADE');
    }
}
