<?php

namespace app\controllers\admin;

use app\models\Categories\ActiveRecord\Category;
use app\models\Users\Forms\LoginForm;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\ForbiddenHttpException;

class AuthController extends Controller
{
    public $layout = 'loginAdmin';
    public $enableCsrfValidation = true;

    public function getViewPath()
    {
        return Yii::getAlias('@app/views/admin/auth');
    }
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index','login','logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'denyCallback' => function ($rule, $action) {
                            if(!Yii::$app->user->isGuest){
                                return $this->redirect("/admin/dashboard/index");
                            }
                        }
                    ],
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'denyCallback' => function ($rule, $action) {
                            if(!Yii::$app->user->isGuest){
                                return $this->redirect("/admin/dashboard/index");
                            }
                        }
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    // Mostrar login
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect("/admin/dashboard/index");
        }
        $model = new LoginForm();
        return $this->render('login', [
            "model" => $model
        ]);
    }
    // Logearse
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect("/admin/dashboard/index");
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect("/admin/dashboard/index");
        }
        $model->password = '';
        return $this->redirect("/admin/auth/login");
    }

    public function actionLogout()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect("/");
        }
        Yii::$app->user->logout();
        return $this->redirect("/");
    }
    // public function actionTest()
    // {
    //     $categories = Category::find()->all();
    //     echo "<pre>";
    //     VarDumper::dump($categories[1]->subCategories, 10, true);
    //     echo "</pre>";
    //     die;
    // }
}
