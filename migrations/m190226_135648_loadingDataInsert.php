<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135648_loadingDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%loading}}',
                           ["id", "date", "user_id", "loading_order_name", "loading_status_id"],
                            [
    [
        'id' => '1',
        'date' => '2019-03-24',
        'user_id' => '1',
        'loading_order_name' => 'sDD',
        'loading_status_id' => '1',
    ],
    [
        'id' => '2',
        'date' => '2019-02-24',
        'user_id' => '1',
        'loading_order_name' => 'asasdasd',
        'loading_status_id' => '1',
    ],
    [
        'id' => '3',
        'date' => '2019-02-24',
        'user_id' => '1',
        'loading_order_name' => 'asasdasd2',
        'loading_status_id' => '1',
    ],
    [
        'id' => '4',
        'date' => '2019-02-24',
        'user_id' => '1',
        'loading_order_name' => 'ad',
        'loading_status_id' => '2',
    ],
    [
        'id' => '5',
        'date' => '2019-02-25',
        'user_id' => '1',
        'loading_order_name' => 'заправка 4',
        'loading_status_id' => '2',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%loading}} CASCADE');
    }
}
