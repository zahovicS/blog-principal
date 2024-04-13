<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot/theme/deskapp/';
    public $baseUrl = '@web/theme/deskapp/';
    public $css = [
        'css/core.css',
        'css/icon-font.min.css',
        'plugins/datatables/css/dataTables.bootstrap4.min.css',
        'plugins/datatables/css/responsive.bootstrap4.min.css',
        'css/style.css',
    ];
    public $js = [
        '/js/constants.js',
        '/js/helpers.js',
        'js/core.js',
        'js/script.min.js',
        'js/process.js',
        'js/layout-settings.js',
        'plugins/jQuery-Knob-master/jquery.knob.min.js',
        'plugins/highcharts-6.0.7/code/highcharts.js',
        'plugins/highcharts-6.0.7/code/highcharts-more.js',
        'plugins/datatables/js/jquery.dataTables.min.js',
        'plugins/datatables/js/dataTables.bootstrap4.min.js',
        'plugins/datatables/js/dataTables.responsive.min.js',
        'plugins/datatables/js/responsive.bootstrap4.min.js',
        'plugins/datatables/js/jquery.dataTables.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
