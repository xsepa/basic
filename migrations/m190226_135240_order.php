<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135240_order extends Migration
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
            '{{%order}}',
            [
                'id'=> $this->primaryKey(10)->unsigned(),
                'cartridge_id'=> $this->integer(10)->unsigned()->null()->defaultValue(null),
                'date'=> $this->date()->notNull(),
                'user_id'=> $this->integer(10)->unsigned()->notNull(),
                'printer_id'=> $this->integer(10)->unsigned()->notNull(),
                'order_status_id'=> $this->integer(10)->unsigned()->notNull(),
            ],$tableOptions
        );
        $this->createIndex('zayvka__user_idx','{{%order}}',['user_id'],false);
        $this->createIndex('zyavka__cartridge_idx','{{%order}}',['cartridge_id'],false);
        $this->createIndex('zayavka__status_idx','{{%order}}',['order_status_id'],false);
        $this->createIndex('zayavka__printer_idx','{{%order}}',['printer_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('zayvka__user_idx', '{{%order}}');
        $this->dropIndex('zyavka__cartridge_idx', '{{%order}}');
        $this->dropIndex('zayavka__status_idx', '{{%order}}');
        $this->dropIndex('zayavka__printer_idx', '{{%order}}');
        $this->dropTable('{{%order}}');
    }
}
