<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135327_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_printer_cartridge_compatible_cartridge_model_id',
            '{{%printer_cartridge_compatible}}','cartridge_model_id',
            '{{%cartridge_model}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_printer_cartridge_compatible_printer_model_id',
            '{{%printer_cartridge_compatible}}','printer_model_id',
            '{{%printer_model}}','id',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_printer_cartridge_compatible_cartridge_model_id', '{{%printer_cartridge_compatible}}');
        $this->dropForeignKey('fk_printer_cartridge_compatible_printer_model_id', '{{%printer_cartridge_compatible}}');
    }
}
