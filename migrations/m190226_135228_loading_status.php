<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135228_loading_status extends Migration
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
            '{{%loading_status}}',
            [
                'id'=> $this->primaryKey(10)->unsigned(),
                'loading_status'=> $this->string(45)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('loading_status_UNIQUE','{{%loading_status}}',['loading_status'],true);

    }

    public function safeDown()
    {
        $this->dropIndex('loading_status_UNIQUE', '{{%loading_status}}');
        $this->dropTable('{{%loading_status}}');
    }
}
