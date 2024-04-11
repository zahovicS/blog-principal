<?php

namespace app\controllers\admin;

use app\models\Posts\ActiveRecord\Post;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;

class PostController extends \yii\web\Controller
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
                        'actions' => ['index', 'list'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function getViewPath()
    {
        return Yii::getAlias('@app/views/admin/post');
    }
    // Mostrar dashboard
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionList()
    {
        $posts = Post::find()->all();
        $result["data"] = [];
        foreach ($posts as $key => $post) {
            $url_edit = Url::to("/admin/post/edit/{$post->id}");
            $actions = "<div class='btn-group btn-group-sm'>
            <a href='{$url_edit}' class='btn btn-success'><i class='icon-copy dw dw-pencil-1'></i></a>
            <button type='button' class='btn btn-danger'><i class='icon-copy dw dw-trash'></i></button>
        </div>";
            $result["data"][$key] = [
                "key" => $key + 1,
                "title" => $post->title,
                "autor" => $post->user->full_name,
                "category" => $post->category->name,
                "publish_date" => $post->posted_at,
                "actions" => $actions
            ];
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $result;
    }
}
