<?php

use yii\widgets\ActiveForm;
use \yii\helpers\Html;

$this->title = 'Upload new image';

$flashBag = \Yii::$app->session->allFlashes;
?>

<?php
    if(!empty($flashBag))
        foreach($flashBag as $class => $messages)
            foreach($messages as $message)
            {
?>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div id="alert-close" class="alert alert-<?= $class ?> "><strong><?= $class ?>!</strong> <?= $message ?></div>
                    </div>
                </div>
<?php
            }
?>


    <div class="row">
        <div class="col-lg-offset-3 col-lg-5">
            <h1>Add new image into gallery</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-1 col-lg-10">
            <?php $form = ActiveForm::begin(['id' => 'add-image',
                'options' => ['enctype' => 'multipart/form-data', 'style' => 'margin-top: 5%;'],
                'fieldConfig' => [
                    'template' => "<div class='col-lg-3'>{label}</div><div class='col-lg-9'>{input}</div>\n<div class='col-lg-12'>{hint}{error}</div>",

                ]
            ]); ?>

            <?= $form->field($model, 'alt')->textInput()->label('Image Description <span class="glyphicon glyphicon-list-alt"></span>') ?>
            <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*',
                            'title' => 'Download one or no more then four images',])->label('Image Files <span class="glyphicon glyphicon-picture"></span>') ?>

            <?php
            echo '<div class="col-lg-offset-4 col-lg-4">';
                echo Html::submitButton('Upload', ['class' => 'btn btn-success btn-block']);
            echo '</div>';
                ActiveForm::end();
            ?>
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
