<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135100_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_cartridge_loading_cartridge_id',
            '{{%cartridge_loading}}','cartridge_id',
            '{{%cartridge}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_cartridge_loading_loading_id',
            '{{%cartridge_loading}}','loading_id',
            '{{%loading}}','id',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_cartridge_loading_cartridge_id', '{{%cartridge_loading}}');
        $this->dropForeignKey('fk_cartridge_loading_loading_id', '{{%cartridge_loading}}');
    }
}
