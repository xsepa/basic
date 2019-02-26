<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135558_cartridge_loadingDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%cartridge_loading}}',
                           ["id", "cartridge_id", "loading_id", "loading_price"],
                            [
    [
        'id' => '1',
        'cartridge_id' => '1',
        'loading_id' => '4',
        'loading_price' => '11',
    ],
    [
        'id' => '2',
        'cartridge_id' => '2',
        'loading_id' => '4',
        'loading_price' => '22',
    ],
    [
        'id' => '3',
        'cartridge_id' => '4',
        'loading_id' => '4',
        'loading_price' => '33',
    ],
    [
        'id' => '4',
        'cartridge_id' => '1',
        'loading_id' => '5',
        'loading_price' => '25',
    ],
    [
        'id' => '5',
        'cartridge_id' => '2',
        'loading_id' => '5',
        'loading_price' => '26',
    ],
    [
        'id' => '6',
        'cartridge_id' => '3',
        'loading_id' => '5',
        'loading_price' => '27',
    ],
    [
        'id' => '7',
        'cartridge_id' => '4',
        'loading_id' => '5',
        'loading_price' => '28',
    ],
    [
        'id' => '8',
        'cartridge_id' => '7',
        'loading_id' => '5',
        'loading_price' => '29',
    ],
    [
        'id' => '9',
        'cartridge_id' => '8',
        'loading_id' => '5',
        'loading_price' => '30',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%cartridge_loading}} CASCADE');
    }
}
