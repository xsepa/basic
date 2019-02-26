<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135351_printer_model extends Migration
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
            '{{%printer_model}}',
            [
                'id'=> $this->primaryKey(10)->unsigned(),
                'printer_model'=> $this->string(45)->null()->defaultValue(null),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%printer_model}}');
    }
}
