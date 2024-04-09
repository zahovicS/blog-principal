<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var string $content */
/** @var yii\widgets\ActiveForm $form */

$this->title = "Login";
?>
<?php
$form = ActiveForm::begin([
    'id' => 'login-form',
    'action' => ['admin/auth/login'],
    'options' => ['method' => 'post']
]) ?>
<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'password')->passwordInput() ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>
<?php $this->beginBlock('scripts'); ?>
Escripts cargados
<?php $this->endBlock(); ?>