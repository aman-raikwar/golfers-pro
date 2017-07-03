<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FrontendAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/icons.css',
        'css/style.css',
        'css/custom.css',
        'plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css',
    ];
    public $js = [
        'js/modernizr.min.js',
        "js/tether.min.js",
        "js/bootstrap.min.js",
        "js/metisMenu.min.js",
        "js/waves.js",
        "js/jquery.slimscroll.js",
        "js/jquery.core.js",
        "js/jquery.app.js",
        "plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js",
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];

}
