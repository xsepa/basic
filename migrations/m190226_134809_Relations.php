<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_134809_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_cartridge_cartridge_model_id',
            '{{%cartridge}}','cartridge_model_id',
            '{{%cartridge_model}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_cartridge_status_id',
            '{{%cartridge}}','status_id',
            '{{%cartridge_status}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_cartridge_inventory_name_id',
            '{{%cartridge}}','inventory_name_id',
            '{{%inventory}}','id',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_cartridge_cartridge_model_id', '{{%cartridge}}');
        $this->dropForeignKey('fk_cartridge_status_id', '{{%cartridge}}');
        $this->dropForeignKey('fk_cartridge_inventory_name_id', '{{%cartridge}}');
    }
}
