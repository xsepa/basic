<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135701_loading_statusDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%loading_status}}',
                           ["id", "loading_status"],
                            [
    [
        'id' => '2',
        'loading_status' => 'closed',
    ],
    [
        'id' => '1',
        'loading_status' => 'open',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%loading_status}} CASCADE');
    }
}
