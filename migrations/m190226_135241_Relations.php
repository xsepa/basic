<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135241_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_order_printer_id',
            '{{%order}}','printer_id',
            '{{%printer}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_order_order_status_id',
            '{{%order}}','order_status_id',
            '{{%order_status}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_order_user_id',
            '{{%order}}','user_id',
            '{{%user}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_order_cartridge_id',
            '{{%order}}','cartridge_id',
            '{{%cartridge}}','id',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_order_printer_id', '{{%order}}');
        $this->dropForeignKey('fk_order_order_status_id', '{{%order}}');
        $this->dropForeignKey('fk_order_user_id', '{{%order}}');
        $this->dropForeignKey('fk_order_cartridge_id', '{{%order}}');
    }
}
