<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;

class CategoryController extends \yii\web\Controller
{
    public $layout = 'admin';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function getViewPath()
    {
        return Yii::getAlias('@app/views/admin/category');
    }
    // Mostrar dashboard
    public function actionIndex()
    {
        return $this->render('index');
    }
}