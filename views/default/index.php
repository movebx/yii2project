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
            <img class="gallery-elem" <?=$randomScrReveal()?> src="<?= '/'.AddImage::THUMBS_IMAGES_PATH.$image['name'] ?>" alt="<?= $image['alt'] ?>" >
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

        var offset = 12;
        var inProgress = false;
        var startFrom = 12;

        var scrollHandler = function()
        {
            var scrollHeight = Math.max(
                document.body.scrollHeight, document.documentElement.scrollHeight,
                document.body.offsetHeight, document.documentElement.offsetHeight,
                document.body.clientHeight, document.documentElement.clientHeight
            );


            var footHeight = document.getElementById('footer').offsetHeight;
            var pageEnd = (scrollHeight - document.documentElement.clientHeight - 10 - footHeight);

            //console.log(scrollHandler.getRandSr());

                if(pageEnd <= window.pageYOffset)
                {
                    if(inProgress == false)
                        $.ajax({
                            type: 'POST',
                            url: 'ajax',
                            beforeSend: function()
                            {
                                inProgress = true;
                                startFrom += offset;
                            },
                            data: { startFrom: startFrom, _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'},
                            success: function(imgs)
                            {
                                //console.log(imgs.length);

                                for(var key in imgs)
                                {
                                    var imgContainer = document.createElement('div');
                                    var img = document.createElement('img');

                                    $(img).addClass('gallery-elem')
                                        .attr({src: '/images/portfolio/thumbs/' + imgs[key].name, alt: imgs[key].alt, "data-sr": 'enter left, hustle 20px'})
                                        .appendTo($(imgContainer));

                                    $(imgContainer).addClass('img-container').appendTo($('.gallery'));

                                    img.onload = function()
                                    {
                                        $(this).css('visibility', 'visible');
                                    }
                                }

                                (function($)
                                {
                                    'use strict';

                                    window.sr= new scrollReveal({
                                        reset: false,
                                        move: '50px',
                                        mobile: false
                                    });

                                })();

                                inProgress = false;

                                if(imgs.length < offset)
                                {
                                    window.removeEventListener('scroll', scrollHandler);
                                }
                            }

                        });
                }
        };

        scrollHandler.getRandSr = function()
        {
            var dataSrs = [
                'data-sr="enter left, hustle 20px"',
                'data-sr="wait 1s, ease-in-out 100px"',
                'data-sr="move 16px scale up 20%, over 2s"'
            ];

            var rand = function (min, max)
            {
                return Math.floor(Math.random() * (max - min + 1));
            };

            return dataSrs[rand(0, 2)];
        };

        window.addEventListener('scroll', scrollHandler);

    });

</script>
