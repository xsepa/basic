<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_134808_cartridge extends Migration
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
            '{{%cartridge}}',
            [
                'id'=> $this->primaryKey(10)->unsigned(),
                'purchase_date'=> $this->date()->notNull(),
                'cartridge_model_id'=> $this->integer(10)->unsigned()->notNull(),
                'status_id'=> $this->integer(10)->unsigned()->notNull(),
                'inventory_name_id'=> $this->integer(10)->unsigned()->notNull(),
            ],$tableOptions
        );
        $this->createIndex('inventory_id_idx','{{%cartridge}}',['inventory_name_id'],false);
        $this->createIndex('cartridg_model_id_idx','{{%cartridge}}',['cartridge_model_id'],false);
        $this->createIndex('cartridge_status_idx','{{%cartridge}}',['status_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('inventory_id_idx', '{{%cartridge}}');
        $this->dropIndex('cartridg_model_id_idx', '{{%cartridge}}');
        $this->dropIndex('cartridge_status_idx', '{{%cartridge}}');
        $this->dropTable('{{%cartridge}}');
    }
}
