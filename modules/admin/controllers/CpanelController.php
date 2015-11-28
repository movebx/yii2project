<?php


namespace app\modules\admin\controllers;


use Yii;
use app\modules\admin\models\AddImage;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\modules\admin\models\Images;

class CpanelController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'add-image', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $images = Images::find()->all();


        return $this->render('index', ['images' => $images]);
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

    public function actionDelete($id)
    {

        $image = Images::findOne($id);

        if(!empty($image))
        {
            $image->delete();
            unlink(Yii::getAlias('@webroot/'.AddImage::FULL_IMAGES_PATH.$image->name));
            unlink(Yii::getAlias('@webroot/'.AddImage::THUMBS_IMAGES_PATH.$image->name));

            Yii::$app->session->addFlash('success', 'Image successfully deleted');
            $this->goBack();

        }
        else
        {
        Yii::$app->session->addFlash('danger', 'Image with '.$id.' does not exist');
        $this->goBack();
        }
    }
}