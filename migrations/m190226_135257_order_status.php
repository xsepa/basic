<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135257_order_status extends Migration
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
            '{{%order_status}}',
            [
                'id'=> $this->primaryKey(10)->unsigned(),
                'status'=> $this->string(45)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('status_zayavok_UNIQUE','{{%order_status}}',['status'],true);

    }

    public function safeDown()
    {
        $this->dropIndex('status_zayavok_UNIQUE', '{{%order_status}}');
        $this->dropTable('{{%order_status}}');
    }
}
