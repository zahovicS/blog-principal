<?php

/** @var yii\web\View $this */
/** @var string $content */

use yii\helpers\Html;
use app\assets\AdminAsset;

$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerCsrfMetaTags();
AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <?php if (isset($this->blocks['style'])) : ?>
        <?= $this->blocks['style'] ?>
    <?php endif; ?>

</head>

<body class="login-page">
    <?php $this->beginBody() ?>
    <?= $content ?>
    <?php $this->endBody() ?>

    <?php if (isset($this->blocks['scripts'])) : ?>
        <?= $this->blocks['scripts'] ?>
    <?php endif; ?>

</body>

</html>
<?php $this->endPage() ?>