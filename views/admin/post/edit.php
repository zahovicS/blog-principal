<?php

use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;
use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Posts\ActiveRecord\Post $post */
/** @var string $content */

$this->title = "Editar: {$post->title}";
?>
<?php
$form = ActiveForm::begin([
    'id' => 'post-form',
    'action' => ['/admin/post/update/' . $id_post],
    'options' => ['method' => 'post', 'enctype' => 'multipart/form-data']
]) ?>
<div class="card-box mb-30 sticky-top shadow-none" style="top: 75px">
    <div class="pd-20 d-flex justify-content-between">
        <h4 class="text-blue h4">Editar Post</h4>
        <?= Html::submitButton('Guardar Post', ['class' => 'btn btn-sm btn-primary']) ?>
    </div>
</div>
<div class="card-box mb-30">
    <div class="pb-20 pt-20 px-4">
        <div class="row">
            <div class="col-12">
                <?= $form->field($model, 'title')->textInput(['class' => 'form-control', 'placeholder' => 'Titulo', 'value' => isset($post) ? $post->title : ""])->label("Titulo") ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <?= $form->field($model, 'content')->widget(TinyMce::class, [
                    'options' => [
                        'rows' => 15,
                        'value' => nl2br($post->getContent()),
                    ],
                    'language' => 'es',
                    'clientOptions' => [
                        'plugins' => [
                            "autosave",
                            "image",
                            "advlist",
                            "lists",
                            "link",
                            "charmap",
                            "anchor",
                            "searchreplace",
                            "visualblocks",
                            "code",
                            "fullscreen",
                            "insertdatetime",
                            "media",
                            "table",
                        ],
                        'height' => "780px",
                        'toolbar' => "restoredraftimage undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image fullscreen"
                    ]
                ])->label("Contenido"); ?>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Miniatura</label>
                    <?=
                    Html::img($post->post_image, ["class" => "img-thumbnail mb-2 p-4"])
                    ?>
                    <?= $form->field($model, 'post_image')
                        ->fileInput(["class" => "form-control"])
                        ->label(false); ?>
                </div>
                <?= $form->field($model, 'id_user')
                    ->widget(Select2::class, [
                        'data' => $usuarios,
                        'theme' => Select2::THEME_DEFAULT,
                        'language' => 'es',
                        'options' => [
                            'placeholder' => 'Seleccione el usuario',
                            'class' => 'custom-select2 w-100',
                            'height' => 'width:10px;',
                            'value' => $post->id_user
                        ],
                        'pluginOptions' => [
                            'width' => '100%',
                        ],
                    ])->label("Usuario") ?>
                <?= $form->field($model, 'id_category')
                    ->widget(Select2::class, [
                        'data' => $categorias,
                        'theme' => Select2::THEME_DEFAULT,
                        'language' => 'es',
                        'options' => [
                            'placeholder' => 'Seleccione la categoría',
                            'class' => 'custom-select2 w-100',
                            'height' => 'width:10px;',
                            'value' => $post->id_category
                        ],
                        'pluginOptions' => [
                            'width' => '100%',
                        ],
                    ])->label("Categoría") ?>
                <?= $form->field($model, 'posted_at')->widget(
                    DateTimePicker::class,
                    [
                        'language' => 'es',
                        'type' => DateTimePicker::TYPE_INPUT,
                        'options' => [
                            'placeholder' => 'Seleccione la fecha de publicación',
                            'value' => isset($post) ? $post->getPostedAt("d-m-Y H:i:s") : ""
                        ],
                        'convertFormat' => true,
                        'pluginOptions' => [
                            'format' => 'dd-MM-yyyy H:i:ss',
                            'todayHighlight' => true
                        ]
                    ]
                )->label("Publicado el"); ?>
                <?= $form->field($model, 'extract')
                    ->textarea(['class' => 'form-control', 'placeholder' => 'Extracto', 'value' => isset($post) ? $post->extract : ""])
                    ->label("Extracto") ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end() ?>