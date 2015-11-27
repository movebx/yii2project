<?php
/**
 * Created by PhpStorm.
 * User: garjo_099
 * Date: 15.11.15
 * Time: 16:14
 */

namespace app\models;


use yii\db\ActiveRecord;


class Users extends ActiveRecord
{


    public function attributeLabels()
    {
        return
            [
                'email' => 'Enter email address',
                'password' => 'Enter password',
            ];
    }

    public function rules()
    {
        return
            [
                [['id', 'role'], 'safe'],
                [['email', 'password'], 'required'],
                ['email', 'email']

            ];
    }


}