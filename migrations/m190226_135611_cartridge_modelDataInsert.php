<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135611_cartridge_modelDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%cartridge_model}}',
                           ["id", "cartridge_model"],
                            [
    [
        'id' => '5',
        'cartridge_model' => 'CANNON cartrdge model 1',
    ],
    [
        'id' => '6',
        'cartridge_model' => 'CANNON cartrdge model 2',
    ],
    [
        'id' => '7',
        'cartridge_model' => 'CYOCERA cartridge model 1',
    ],
    [
        'id' => '1',
        'cartridge_model' => 'HP cartrdge model 1',
    ],
    [
        'id' => '2',
        'cartridge_model' => 'HP cartrdge model 2',
    ],
    [
        'id' => '3',
        'cartridge_model' => 'HP cartrdge model 3',
    ],
    [
        'id' => '4',
        'cartridge_model' => 'HP cartrdge model 4',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%cartridge_model}} CASCADE');
    }
}
