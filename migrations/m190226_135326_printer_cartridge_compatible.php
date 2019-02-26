<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135326_printer_cartridge_compatible extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%printer_cartridge_compatible}}',
            [
                'id'=> $this->primaryKey(10)->unsigned(),
                'cartridge_model_id'=> $this->integer(10)->unsigned()->notNull(),
                'printer_model_id'=> $this->integer(10)->unsigned()->notNull(),
            ],$tableOptions
        );
        $this->createIndex('compatible_cartridge_model_idx','{{%printer_cartridge_compatible}}',['cartridge_model_id'],false);
        $this->createIndex('compatible__printer_model_idx','{{%printer_cartridge_compatible}}',['printer_model_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('compatible_cartridge_model_idx', '{{%printer_cartridge_compatible}}');
        $this->dropIndex('compatible__printer_model_idx', '{{%printer_cartridge_compatible}}');
        $this->dropTable('{{%printer_cartridge_compatible}}');
    }
}
