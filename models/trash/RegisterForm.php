<?php

namespace app\models;



use app\identity\User;
use yii\base\Model;

class RegisterForm extends Model
{
    public $name;
    public $email;
    public $password;
    public $password_repeat;

    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            ['email', 'email'],
            ['password', 'compare'],
            ['password_repeat', 'safe'],
        ];
    }

    public function registerUser()
    {
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->save();

        return $user->hasErrors() ? false: $user;

    }

}