<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135339_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_printer_cartridge_installed_cartridge_id',
            '{{%printer_cartridge_installed}}','cartridge_id',
            '{{%cartridge}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_printer_cartridge_installed_printer_id',
            '{{%printer_cartridge_installed}}','printer_id',
            '{{%printer}}','id',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_printer_cartridge_installed_cartridge_id', '{{%printer_cartridge_installed}}');
        $this->dropForeignKey('fk_printer_cartridge_installed_printer_id', '{{%printer_cartridge_installed}}');
    }
}
