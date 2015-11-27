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

        <?php $this->head() ?>
    </head>
<body>
<?php $this->beginBody()?>




<?= $content ?>




<script>

</script>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>



