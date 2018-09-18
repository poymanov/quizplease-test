<?php

namespace app\widgets\SelectWidget;

use yii\web\AssetBundle;

class SelectAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/assets';

    public $css = [
        'css/style.css',
    ];

    public $js = [
       'js/script.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}