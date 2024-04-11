<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var string $content */
/** @var yii\widgets\ActiveForm $form */

$this->title = "Login";
?>
<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="login.html">
                <img src="<?= Url::base() ?>/theme/deskapp/images/deskapp-logo.svg" alt="" />
            </a>
        </div>
    </div>
</div>
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
                <img src="<?= Url::base() ?>/theme/deskapp/images/login-page-img.png" alt="" />
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Iniciar sesión al BLOG</h2>
                    </div>
                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'action' => ['admin/auth/login'],
                        'options' => ['method' => 'post']
                    ]) ?>
                    <?= $form->field($model, 'username',  [
                        'addon' => [
                            'groupOptions' => ['class' => 'custom'],
                            'append' => [
                                'options' => [
                                    'class' => 'custom'
                                ],
                                'content' => '<i class="icon-copy dw dw-user1"></i>'
                            ]
                        ]
                    ])->textInput(['class' => 'form-control form-control-lg', 'placeholder' => 'Usuario'])->label(false) ?>
                    <?= $form->field($model, 'password', [
                        'addon' => [
                            'groupOptions' => ['class' => 'custom'],
                            'append' => [
                                'options' => [
                                    'class' => 'custom'
                                ],
                                'content' => '<i class="dw dw-padlock1"></i>'
                            ]
                        ]
                    ])->passwordInput(['class' => 'form-control form-control-lg', 'placeholder' => 'Contraseña'])->label(false) ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-0">
                                <?= Html::submitButton('Iniciar sesión', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
</div>