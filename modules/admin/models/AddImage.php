<?php


namespace app\modules\admin\models;

use Yii;
use Imagine\Gd\Imagine;
use yii\base\Model;
use Imagine\Filter\Transformation;
use Imagine\Image\Box;


class AddImage extends Model
{
    const FULL_IMAGES_PATH = 'images/portfolio/full/';
    const THUMBS_IMAGES_PATH = 'images/portfolio/thumbs/';

    public $alt;
    /* @var $imageFiles array */
    public $imageFiles;

    public function rules()
    {
        return [
            ['imageFiles', 'file', 'maxFiles' => 5, 'extensions' => 'png, jpg, jpeg, gif',
                'skipOnEmpty' => false, 'maxSize' => 5000000],
            ['alt', 'required'],
            ['alt', 'string', 'length' => [5, 30]],
        ];
    }



    public function uploadImages()
    {
        if($this->validate())
        {
            $transformation = new Transformation();
            $imagine = new Imagine();

            foreach($this->imageFiles as $file)
            {/* @var $file \yii\web\UploadedFile */

                $imageRandName = Yii::$app->security->generateRandomString(12);

                $file->saveAs(self::FULL_IMAGES_PATH.$imageRandName.'.'.$file->extension);

                $randHeight = rand(300, 500);
                $transformation->thumbnail(new Box(300, $randHeight))
                    ->save(Yii::getAlias('@webroot/'.self::THUMBS_IMAGES_PATH.$imageRandName.'.'.$file->extension));

                $transformation->apply($imagine->open(Yii::getAlias('@webroot/'.self::FULL_IMAGES_PATH.$imageRandName.'.'.$file->extension)));

                $images = new Images();
                $images->name = $imageRandName.'.'.$file->extension;
                $images->alt = $this->alt;

                if(!$images->save())
                {
                    Yii::$app->session->addFlash('danger', 'Image not saved into data base!');
                    return false;
                }
            }

            Yii::$app->session->addFlash('success', 'Image uploaded successfully');
            return true;
        }
        Yii::$app->session->addFlash('danger', 'Incorrect data');
        return false;
    }

    static public function getFullImagesPath()
    {
        return self::FULL_IMAGES_PATH;
    }

    static public function getThumbsImagesPath()
    {
        return self::THUMBS_IMAGES_PATH;
    }
}