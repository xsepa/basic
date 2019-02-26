<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;

    public function rules() 
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'], 
            ['username', 'string', 'min' => 2, 'max' => 255], 
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 5],
        ];
    }

    public function attributeLabels() 
    {
        return [
            'username' => 'Логин',
            'email' => 'Электронная почта',
            'password' => 'Пароль',
        ];
    }

    public function signup() 
    {

        if (!$this->validate()) { 
            return null;
        }
        $user = new User();
        $user->username = $this->username; 
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->created_at = time();
        return $user->save() ? $user : null; 
    }
}