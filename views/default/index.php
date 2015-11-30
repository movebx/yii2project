<?php
/* @var $images array */
/* @var $this \yii\web\View */

use app\modules\admin\models\AddImage;

$this->registerJsFile('/js/scrollReveal.min.js', ['position' => \yii\web\View::POS_HEAD]);

$arr =
    [
        'data-sr="enter left, hustle 20px"',
        'data-sr="wait 1s, ease-in-out 100px"',
        'data-sr="move 16px scale up 20%, over 2s"',
        //'data-sr="enter bottom, roll 45deg, over 2s"'
    ];


$randomScrReveal = function() use ($arr) {

    return $arr[rand(0, 2)];
};
?>

<div class="row">
    <section class="gallery">
        <?php foreach($images as $image): ?>
        <div class="img-container">
            <img class="gallery-elem" <?=$randomScrReveal()?> src="<?= '/'.AddImage::THUMBS_IMAGES_PATH.$image->name ?>" alt="<?= $image->alt ?>" >
        </div>
        <?php endforeach; ?>
    </section>
</div>

<script type="text/javascript">
    $(window).load(function()
    {
        (function($)
        {
            'use strict';

            window.sr= new scrollReveal({
                reset: false,
                move: '50px',
                mobile: false
            });

        })();


    });

</script>
