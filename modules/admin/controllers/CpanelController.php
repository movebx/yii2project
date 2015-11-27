<?php


namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\AddImage;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

class CpanelController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'add-image'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'add-image'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionAddImage()
    {
        $model = new AddImage();

        if (Yii::$app->request->isPost)
        {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            $model->alt = Yii::$app->request->post('AddImage')['alt'];

            $model->uploadImages();


        }

        return $this->render('add-image', ['model' => $model]);
    }
}