<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135137_cartridge_model extends Migration
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
            '{{%cartridge_model}}',
            [
                'id'=> $this->primaryKey(10)->unsigned(),
                'cartridge_model'=> $this->string(255)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('cartridge_model_UNIQUE','{{%cartridge_model}}',['cartridge_model'],true);

    }

    public function safeDown()
    {
        $this->dropIndex('cartridge_model_UNIQUE', '{{%cartridge_model}}');
        $this->dropTable('{{%cartridge_model}}');
    }
}
