<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135148_cartridge_status extends Migration
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
            '{{%cartridge_status}}',
            [
                'id'=> $this->primaryKey(10)->unsigned(),
                'status'=> $this->string(45)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%cartridge_status}}');
    }
}
