<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135338_printer_cartridge_installed extends Migration
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
            '{{%printer_cartridge_installed}}',
            [
                'id'=> $this->primaryKey(10)->unsigned(),
                'printer_id'=> $this->integer(10)->unsigned()->notNull(),
                'cartridge_id'=> $this->integer(10)->unsigned()->notNull(),
                'date'=> $this->date()->notNull(),
            ],$tableOptions
        );
        $this->createIndex('installed_printer_idx','{{%printer_cartridge_installed}}',['printer_id'],false);
        $this->createIndex('installed__cartridge_idx','{{%printer_cartridge_installed}}',['cartridge_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('installed_printer_idx', '{{%printer_cartridge_installed}}');
        $this->dropIndex('installed__cartridge_idx', '{{%printer_cartridge_installed}}');
        $this->dropTable('{{%printer_cartridge_installed}}');
    }
}
