<?php

namespace app\components\widgets;

use yii\bootstrap\NavBar;
use yii\helpers\Html;

class MainMenu extends NavBar
{
    public $brandOptions = ['id' => 'ps-logo'];

    public $screenReaderToggleText = 'MENU';

    public function init()
    {
        parent::init();
    }

    protected function renderToggleButton()
    {
        $line1 = Html::tag('div', '', ['class' => 'line1']);
        $line2 = Html::tag('div', '', ['class' => 'line2']);
        $line3 = Html::tag('div', '', ['class' => 'line3']);
        $screenReader = Html::tag('span', $this->screenReaderToggleText, ['class' => 'sr-only']);

        return Html::tag('div',"{$screenReader}\n{$line1}\n{$line2}\n{$line3}", [
            'id' => 'ps-main-menu-toggle',
            'data-toggle' => 'collapse',
            'data-target' => "#{$this->containerOptions['id']}"
        ]);
    }
}