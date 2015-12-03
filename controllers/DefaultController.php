<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $images = (new \yii\db\Query())->select(['name', 'alt'])->from('images')
            ->limit(12)
            ->offset(0)->all();

        return $this->render('index', ['images' => $images]);
    }

    public function actionAjax()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if(!empty($startFrom = Yii::$app->request->post('startFrom')))
        {

            $images = (new \yii\db\Query())->select(['name', 'alt'])->from('images')
                ->limit(12)
                ->offset($startFrom)->all();

                return $images;
        }

        return '';

    }
}