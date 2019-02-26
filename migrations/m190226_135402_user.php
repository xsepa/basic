<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135402_user extends Migration
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
            '{{%user}}',
            [
                'id'=> $this->primaryKey(10)->unsigned(),
                'username'=> $this->string(255)->notNull(),
                'auth_key'=> $this->string(32)->null()->defaultValue(null),
                'password_hash'=> $this->string(255)->notNull(),
                'password_reset_token'=> $this->string(255)->null()->defaultValue(null),
                'email'=> $this->string(255)->notNull(),
                'status'=> $this->smallInteger(6)->unsigned()->notNull(),
                'created_at'=> $this->integer(11)->unsigned()->notNull(),
                'updated_at'=> $this->integer(11)->unsigned()->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('username_UNIQUE','{{%user}}',['username'],true);
        $this->createIndex('email_UNIQUE','{{%user}}',['email'],true);

    }

    public function safeDown()
    {
        $this->dropIndex('username_UNIQUE', '{{%user}}');
        $this->dropIndex('email_UNIQUE', '{{%user}}');
        $this->dropTable('{{%user}}');
    }
}
