<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135623_cartridge_statusDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%cartridge_status}}',
                           ["id", "status"],
                            [
    [
        'id' => '1',
        'status' => 'Полный',
    ],
    [
        'id' => '2',
        'status' => 'Установлен',
    ],
    [
        'id' => '3',
        'status' => 'Пустой',
    ],
    [
        'id' => '4',
        'status' => 'Заправляется',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%cartridge_status}} CASCADE');
    }
}
