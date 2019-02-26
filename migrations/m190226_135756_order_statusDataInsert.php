<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135756_order_statusDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%order_status}}',
                           ["id", "status"],
                            [
    [
        'id' => '2',
        'status' => 'закрыта',
    ],
    [
        'id' => '1',
        'status' => 'открыта',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%order_status}} CASCADE');
    }
}
