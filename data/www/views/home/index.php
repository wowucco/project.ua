<?php
use yii\helpers\Html;
use yii\bootstrap\Carousel;
/* @var $this yii\web\View */
?>
<div class="home-index">
    <?= Carousel::widget([
        'controls' => false,
        'showIndicators' => false,
        'items' => [
            [
                'content' => Html::img('@web/img/carousel/carousel1.jpg'),
                'caption' =>
                    Html::tag('h4', Yii::t('app', 'Home sweet home'))
                    .Html::tag('p', Yii::t('app', 'Do you remember road to home')),
                'options' => ['class' => 'home-carousel'],
            ]
        ]
    ])?>
</div>
