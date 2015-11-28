<?php
/* @var $images array */
/* @var $this \yii\web\View */

use app\modules\admin\models\AddImage;


?>
    <div class="row row-margin border-bot-dashed">
        <div class="col-lg-12 text-center"><h2>YOU CAN DELETE IMAGE HERE:</h2></div>
    </div>

<?php


foreach($images as $image)
{
?>

    <div class="row row-margin">
        <div class="col-lg-offset-4 col-lg-4 img-background">
            <a class="remove-img" href="/admin/delete/<?= $image->id ?>" title="Remove image">
                <span class="glyphicon glyphicon-remove"></span></a>
            <img class="cpanel-img" src="<?= \Yii::getAlias('@web/'.AddImage::THUMBS_IMAGES_PATH.$image->name) ?> ">
        </div>
    </div>

<?php
}
?>