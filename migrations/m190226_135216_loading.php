<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135216_loading extends Migration
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
            '{{%loading}}',
            [
                'id'=> $this->primaryKey(10)->unsigned(),
                'date'=> $this->date()->null()->defaultValue(null),
                'user_id'=> $this->integer(10)->unsigned()->notNull(),
                'loading_order_name'=> $this->string(45)->notNull(),
                'loading_status_id'=> $this->integer(10)->unsigned()->notNull(),
            ],$tableOptions
        );
        $this->createIndex('loading_order_name_UNIQUE','{{%loading}}',['loading_order_name'],true);
        $this->createIndex('loading__user_idx','{{%loading}}',['user_id'],false);
        $this->createIndex('loading__status_idx','{{%loading}}',['loading_status_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('loading_order_name_UNIQUE', '{{%loading}}');
        $this->dropIndex('loading__user_idx', '{{%loading}}');
        $this->dropIndex('loading__status_idx', '{{%loading}}');
        $this->dropTable('{{%loading}}');
    }
}
