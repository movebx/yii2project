<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1>register/register</h1>
<?php

$form = ActiveForm::begin() ?>

<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'password_repeat')->passwordInput() ?>


<?= Html::submitButton('Register') ?>

<?php ActiveForm::end() ?>





