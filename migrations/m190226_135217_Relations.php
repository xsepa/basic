<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135217_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_loading_loading_status_id',
            '{{%loading}}','loading_status_id',
            '{{%loading_status}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_loading_user_id',
            '{{%loading}}','user_id',
            '{{%user}}','id',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_loading_loading_status_id', '{{%loading}}');
        $this->dropForeignKey('fk_loading_user_id', '{{%loading}}');
    }
}
