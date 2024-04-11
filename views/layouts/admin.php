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
    <!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
		rel="stylesheet" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <?php if (isset($this->blocks['style'])) : ?>
        <?= $this->blocks['style'] ?>
    <?php endif; ?>

</head>

<body>
    <?= Yii::$app->view->renderFile('@app/views/admin/components/preloader.php'); ?>
    <?= Yii::$app->view->renderFile('@app/views/admin/components/header.php'); ?>
    <?= Yii::$app->view->renderFile('@app/views/admin/components/sidebar.php'); ?>
	<div class="mobile-menu-overlay"></div>
    <div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
            <?php $this->beginBody() ?>
            <?= $content ?>
            <?php $this->endBody() ?>
		</div>
	</div>
    <!-- scripts bases -->
    <!-- ...  -->
    <!-- scripts de la vista actual -->
    <?php if (isset($this->blocks['scripts'])) : ?>
        <?= $this->blocks['scripts'] ?>
    <?php endif; ?>
</body>
</html>
<?php $this->endPage() ?>