<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135059_cartridge_loading extends Migration
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
            '{{%cartridge_loading}}',
            [
                'id'=> $this->primaryKey(10)->unsigned(),
                'cartridge_id'=> $this->integer(10)->unsigned()->notNull(),
                'loading_id'=> $this->integer(10)->unsigned()->notNull(),
                'loading_price'=> $this->double()->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('cartridge_loading__loading_idx','{{%cartridge_loading}}',['loading_id'],false);
        $this->createIndex('cartridge_loading__cartridge_idx','{{%cartridge_loading}}',['cartridge_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('cartridge_loading__loading_idx', '{{%cartridge_loading}}');
        $this->dropIndex('cartridge_loading__cartridge_idx', '{{%cartridge_loading}}');
        $this->dropTable('{{%cartridge_loading}}');
    }
}
