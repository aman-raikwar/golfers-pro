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
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/style.css',
        'css/custom.css',
        'css/icons.css',
        'css/metismenu.min.css',
        'plugins/datatables/dataTables.bootstrap4.min.css',
        'plugins/datatables/buttons.bootstrap4.min.css',
        'plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css',
//        'css/site.css',
    ];
    public $js = [
        'js/modernizr.min.js',
        //"js/jquery.min.js",
        "js/tether.min.js",
        "js/bootstrap.min.js",
        "js/metisMenu.min.js",
        "js/waves.js",
        "js/jquery.slimscroll.js",
        "js/jquery.core.js",
        "js/jquery.app.js",
        "plugins/datatables/jquery.dataTables.min.js",
        "plugins/datatables/dataTables.bootstrap4.min.js",
        "plugins/custombox/js/custombox.min.js",
        "plugins/custombox/js/legacy.min.js",
        "plugins/bootstrap-select/js/bootstrap-select.js",
        "plugins/datatables/dataTables.buttons.min.js",
        "plugins/datatables/buttons.bootstrap4.min.js",
        "plugins/datatables/buttons.html5.min.js",
        "plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js",
        "js/golfclub-script.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
            //'yii\bootstrap\BootstrapAsset',        
    ];

}
