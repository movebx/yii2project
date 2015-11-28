<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use yii\web\Controller;

class JopaController extends Controller
{



    public function actionRegister()
    {
        $model = new Users();

        $model->load(Yii::$app->request->post());


        if($model->validate())
        {
            $model->save();

            return $this->render('confirm', ['model' => $model]);
        }

        return $this->render('register', ['model' => $model]);
    }

    public function actionSuka($name)
    {

        return $name;
    }
}