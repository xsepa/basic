<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_142303_auth_assignmentDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%auth_assignment}}',
                           ["item_name", "user_id", "created_at"],
                            [
    [
        'item_name' => 'admin',
        'user_id' => '2',
        'created_at' => '1551183513',
    ],
    [
        'item_name' => 'user',
        'user_id' => '1',
        'created_at' => '1551185068',
    ],
    [
        'item_name' => 'user',
        'user_id' => '3',
        'created_at' => '1551185068',
    ],
    [
        'item_name' => 'user',
        'user_id' => '4',
        'created_at' => '1551185068',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%auth_assignment}} CASCADE');
    }
}
