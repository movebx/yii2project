<?php
/* @var $this yii\web\View */


$this->title = \Yii::$app->name;

?>

<h1>register/index</h1>

<ul>

    <?php
        if(\Yii::$app->user->isGuest)
        {
    ?>
            <li style="display: inline;"><a href="<?= \yii\helpers\Url::to('/register/login') ?>">Войти</a></li>
            <li style="display: inline;"><a href="<?= \yii\helpers\Url::to('/register/register') ?>">Зарегистрироваться</a></li>
    <?php
        }
        else
        {
    ?>
            <li style="display: inline;"><a href="<?= \yii\helpers\Url::to('/register/logout') ?>">Выйти</a></li>
    <?php
        }
    ?>

</ul>

