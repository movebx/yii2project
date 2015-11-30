<?php

namespace app\controllers;


use app\modules\admin\models\Images;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $images = Images::find()->all();

        return $this->render('index', ['images' => $images]);
    }
}