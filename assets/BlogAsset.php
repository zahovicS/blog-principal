<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BlogAsset extends AssetBundle
{
    public $basePath = '@webroot/theme/deskapp/';
    public $baseUrl = '@web/theme/deskapp/';
    public $css = [
        'css/core.css',
        'css/icon-font.min.css',
        'css/style.css',
    ];
    public $js = [
        'js/core.js',
        'js/script.min.js',
        'js/process.js',
        'js/layout-settings.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
