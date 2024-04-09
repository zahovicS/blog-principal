<?php

namespace app\controllers\admin;

use app\models\Users\Forms\LoginForm;
use yii\web\Controller;
use Yii;

class AuthController extends Controller
{
    public $layout = 'admin';
    public $enableCsrfValidation = true;

    public function getViewPath()
    {
        return Yii::getAlias('@app/views/admin/auth');
    }

    // Mostrar login
    public function actionIndex()
    {
        $model = new LoginForm();
        return $this->render('login',[
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
}
