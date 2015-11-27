<?php
/* @var $content string */
/* @var $this \yii\web\View */

use Yii;
use yii\helpers\Html;
use app\modules\admin\assets\CpanelAsset;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

$this->title = 'Application control panel';
?>

<?php CpanelAsset::register($this) ?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= Html::encode($this->title) ?></title>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody()?>

<?php
NavBar::begin([
    'brandLabel' => 'Admin panel',
    'brandUrl' => '/admin/cpanel',
    'options' => [
        'class' => 'navbar-inverse navbar-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items' => [
        [
            'label' => '<span class="glyphicon glyphicon-home"></span>',
            'url' => '/',
            'encode' => false,
        ],
        [
            'label' => 'Add Image',
            'url' => '/admin/cpanel/add-image',
        ]
    ]
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
            [
                'label' => '<span class="glyphicon glyphicon-off" style="color: white;"></span>',
                'url' => ['/admin/login/logout'],
                'encode' => false,
                //'linkOptions' => ['data-method' => 'post']
            ],
    ],
]);
NavBar::end();
?>

<div class="container body-dotted">

        <?= $content ?>
</div>




<script>

</script>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
