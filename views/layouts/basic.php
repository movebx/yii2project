<?php
/* @var $content string */
/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\MyAsset;

$this->title = 'Наращивание ресниц в Сумах, классика, визаж. Портфолио Сизоненко Марины';
?>

<?php MyAsset::register($this) ?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?= Html::encode($this->title) ?></title>

        <meta name="description" content="Наращивание ресниц в Сумах, классика, визаж. Портфолио Сизоненко Марины">
        <meta name="keywords" content="Нарастить ресницы Сумы, наращивание ресниц в Сумах, наращивание ресниц сумы, визаж сумы, визаж сумы цена, наращивание ресниц">
        <meta name='wmail-verification' content='92ef07ff7f85457e09c13f779382e9d7' />
        <meta name="author" content="Сизоненко Марина">
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/images/portfolio/system/favicon.png" rel="shortcut icon" type="image/x-icon" />
        <?= Html::csrfMetaTags() ?>

        <?php $this->head() ?>
    </head>
<body>
<?php $this->beginBody()?>

<div class="container-fluid">
        <header>
        <div class="row">
            <div class="col-xs-12 header">
                <span class="col-xs-12 a-logo"><b>Сизоненко Марина</b></span>
            </div>

        </div>
    </header>

        <div class="row nav-bar">

                <div class="nav-container nav-delimiter">
                    <a class="nav-elem" href="<?= Url::to(['default/index']) ?>">портфолио</a>
                </div><!--
              --><div class="nav-container">
                    <a class="nav-elem" href="<?= Url::to(['default/contact']) ?>">контакты</a>
                </div>

        </div>



    <?= $content ?>


    <footer>
        <div class="row">
            <div id="footer" class="col-xs-12">

            </div>
        </div>
    </footer>
</div>

<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>



