<?php

use yii\db\Schema;
use yii\db\Migration;

class m190226_135858_userDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%user}}',
                           ["id", "username", "auth_key", "password_hash", "password_reset_token", "email", "status", "created_at", "updated_at"],
                            [
    [
        'id' => '1',
        'username' => 'admin_',
        'auth_key' => 'znMciaHnrNfrU_za_dwHr1bNpt479djJ',
        'password_hash' => '$2y$13$.sSTgfgjpQSJ4zlySCovuuUjssIxJGetG0adbZZZqwtqOkK5/eWPa',
        'password_reset_token' => null,
        'email' => 'xsepa@mail.ru_',
        'status' => '10',
        'created_at' => '0',
        'updated_at' => null,
    ],
    [
        'id' => '2',
        'username' => 'admin',
        'auth_key' => '10YuMvU-1juPJiL-Fu_5rnsW-m6YvJ8n',
        'password_hash' => '$2y$13$VwLaD0LsomMyQJbdchl1.u16wakotxSqUAbN2RGiXWk/MRKIHbbcu',
        'password_reset_token' => null,
        'email' => 'xsepa@mail.ru',
        'status' => '10',
        'created_at' => '1550658176',
        'updated_at' => null,
    ],
    [
        'id' => '3',
        'username' => 'user',
        'auth_key' => 'g9YGMRDf-3CjuvSY4drvJRUAze9Bxre-',
        'password_hash' => '$2y$13$X9nLUkvC4GvlgzwfMSZOE.W/0NKiD5/VeOS8HV8nzkcfojFcWei3m',
        'password_reset_token' => null,
        'email' => 'user@basic.lo',
        'status' => '10',
        'created_at' => '1550658499',
        'updated_at' => null,
    ],
    [
        'id' => '4',
        'username' => 'user2',
        'auth_key' => 'TScHNpGdN4AaMrvN-TYHlLXBUjUbIPuH',
        'password_hash' => '$2y$13$0jlhbC9opUsIz6GVFcEo4OTbv5EPdyhDVlv8Owz08eK0/BylXATQu',
        'password_reset_token' => null,
        'email' => 'user2@user2.ru',
        'status' => '10',
        'created_at' => '1551172454',
        'updated_at' => null,
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%user}} CASCADE');
    }
}
