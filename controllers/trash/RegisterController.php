<?php

namespace app\controllers;

use app\models\login\LoginForm;
use app\models\RegisterForm;
use Yii;


class RegisterController extends \yii\web\Controller
{
    public $layout = 'basic';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRegister()
    {
        $model = new RegisterForm();
        $model->load(Yii::$app->request->post());


        if($model->validate())
        {
            $model->registerUser();
            return $this->render('index');
        }


        return $this->render('register',
            [
            'model' => $model,
            ]);
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        $model->load(Yii::$app->request->post());

        if($model->validate())
        {
            if($model->validatePassword())
            {
                $model->login();
                $this->redirect('/register/index');
            }
        }

        return $this->render('login', ['model' => $model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect('/register/index');
    }
}
