<?php
/* @var $content string */
/* @var $this \yii\web\View */

use Yii;
use yii\helpers\Html;
use app\assets\MyAsset;
?>

<?php MyAsset::register($this) ?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?= Html::encode($this->title) ?></title>

        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>

        <?php $this->head() ?>
    </head>
<body>
<?php $this->beginBody()?>


<div class="container-fluid">
        <header>
        <div class="row">
            <div class="col-xs-12 header">
                <span class="col-xs-12 a-logo tip"><b>Сизоненко Марина</b></span>
            </div>

        </div>
    </header>
    <nav>
        <div class="row nav-bar">
            <div class="col-xs-12 ">
                <div class="col-xs-offset-4 col-xs-2 text-right" style="border-right: 1px solid #122b40;">
                    <a class="nav-elem" href="#">портфолио<div></div></a>
                </div>
                <div class="col-xs-2 text-left">
                    <a class="nav-elem" href="#">контакты<div></div></a>
                </div>
            </div>
        </div>
    </nav>


    <?= $content ?>


</div>
<footer>
    <div class="row">
        <div id="footer" class="col-xs-12">

        </div>
    </div>
</footer>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>



