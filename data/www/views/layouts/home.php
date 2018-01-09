<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap\Nav;
use app\components\widgets\MainMenu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
<?php $this->beginBody() ?>

    <div class="home-page">

        <?php
        MainMenu::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'id' => 'ps-main-menu',
                'class' => 'navbar navbar-fixed-top text-uppercase',
            ],
        ]); ?>
        <?php echo Nav::widget([
            'options' => ['id' => 'ps-menu-items', 'class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => Yii::t('frontend', 'Production'), 'url' => ['/production/index']],
                ['label' => Yii::t('frontend', 'Services'), 'url' => ['/services/index']],
                ['label' => Yii::t('frontend', 'About'), 'url' => ['/page/view', 'slug'=>'about']],
                ['label' => Yii::t('frontend', 'Search'), 'url' => ['/page/view', 'slug'=>'search']],
            ]
        ]);
        ?>
        <?php MainMenu::end(); ?>

        <?= $content ?>
    </div>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

