<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135314_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_printer_inventory_name_id',
            '{{%printer}}','inventory_name_id',
            '{{%inventory}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_printer_printer_model_id',
            '{{%printer}}','printer_model_id',
            '{{%printer_model}}','id',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_printer_inventory_name_id', '{{%printer}}');
        $this->dropForeignKey('fk_printer_printer_model_id', '{{%printer}}');
    }
}
