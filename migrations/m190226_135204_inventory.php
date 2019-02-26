<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135204_inventory extends Migration
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
            '{{%inventory}}',
            [
                'id'=> $this->primaryKey(10)->unsigned(),
                'inventory_name'=> $this->string(45)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('inventory_name_UNIQUE','{{%inventory}}',['inventory_name'],true);

    }

    public function safeDown()
    {
        $this->dropIndex('inventory_name_UNIQUE', '{{%inventory}}');
        $this->dropTable('{{%inventory}}');
    }
}
