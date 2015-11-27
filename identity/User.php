<?php


namespace app\identity;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


class User extends ActiveRecord implements IdentityInterface
{

    static public function tableName()
    {
        return 'users';
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function setPassword($password)
    {
        $this->password = \Yii::$app->security->generatePasswordHash($password);
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function getId()
    {
        return $this->id;
    }

    static public function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    static public function findIdentity($id)
    {
        return static::findOne($id);
    }


}