<?php
/* @var $content string */
/* @var $this \yii\web\View */

use yii\helpers\Html;
use app\modules\admin\assets\CpanelAsset;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

$this->title = 'Application control panel';
$flashBag = \Yii::$app->session->allFlashes;
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
    'brandLabel' => '<span class="glyphicon glyphicon-home"></span>',
    'brandUrl' => '/',
    'options' => [
        'class' => 'navbar-inverse navbar-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items' => [
        [
            'label' => 'Cpanel',
            'url' => '/admin/cpanel',
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
    <?php
    if(!empty($flashBag))
        foreach($flashBag as $class => $messages)
            foreach($messages as $message)
            {
                ?>
                <div class="row row-margin">
                    <div class="col-lg-12 text-center">
                        <div id="alert-close" class="alert alert-<?= $class ?> "><strong><?= $class ?>!</strong> <?= $message ?></div>
                    </div>
                </div>
                <?php
            }
    ?>

        <?= $content ?>
    <div class="row">
        <div class="col-lg-12 footer">

        </div>
    </div>
</div>




<script>
    var alertClose = document.getElementById('alert-close');
    if(alertClose !== null)
        setTimeout(function()
        {
            $(alertClose).remove();
        }, 4000);
</script>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
