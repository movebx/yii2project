<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionContact()
    {

        return $this->render('contact');
    }

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

        if(!empty($all = Yii::$app->request->post('all')))
        {
            return (new \yii\db\Query())->select('name')->from('images')->all();
        }

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