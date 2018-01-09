<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
?>
<div class="site-index">
    <?= \yii\bootstrap\Carousel::widget([
        'items' => [
            [
                'content' => Html::img('@web/img/carousel/carousel1.jpg'),
                'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
                'options' => [],
            ]
        ]
    ])?>
</div>
