<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135313_printer extends Migration
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
            '{{%printer}}',
            [
                'id'=> $this->primaryKey(10)->unsigned(),
                'printer_model_id'=> $this->integer(10)->unsigned()->null()->defaultValue(null),
                'inventory_name_id'=> $this->integer(10)->unsigned()->notNull(),
            ],$tableOptions
        );
        $this->createIndex('printer_model_id_idx','{{%printer}}',['printer_model_id'],false);
        $this->createIndex('inventory_id_idx','{{%printer}}',['inventory_name_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('printer_model_id_idx', '{{%printer}}');
        $this->dropIndex('inventory_id_idx', '{{%printer}}');
        $this->dropTable('{{%printer}}');
    }
}
