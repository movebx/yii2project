<?php

namespace app\models\login;


use app\identity\User;
use yii\base\Model;

class LoginForm extends Model
{
    public $email;
    public $password;
    protected $user;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email']
        ];
    }

    public function validatePassword()
    {
        $user = User::findOne(['email' => $this->email]);

        if(!is_null($user))
            if(\Yii::$app->security->validatePassword($this->password, $user->password))
            {
                $this->user = $user;
                return true;
            }

        return false;

    }

    public function login()
    {
        \Yii::$app->user->login($this->user);
    }


}