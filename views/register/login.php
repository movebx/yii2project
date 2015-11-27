<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>


<?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>