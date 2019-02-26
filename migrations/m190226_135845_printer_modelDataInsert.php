<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135845_printer_modelDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%printer_model}}',
                           ["id", "printer_model"],
                            [
    [
        'id' => '1',
        'printer_model' => 'HP model 1',
    ],
    [
        'id' => '2',
        'printer_model' => 'HP model 2',
    ],
    [
        'id' => '3',
        'printer_model' => 'HP model 3',
    ],
    [
        'id' => '4',
        'printer_model' => 'CANNON printer 1',
    ],
    [
        'id' => '5',
        'printer_model' => 'CANNON printer 2',
    ],
    [
        'id' => '6',
        'printer_model' => 'CYOCERA model 1',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%printer_model}} CASCADE');
    }
}
