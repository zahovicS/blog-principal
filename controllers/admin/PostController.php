<?php

namespace app\controllers\admin;

use app\models\Categories\ActiveRecord\Category;
use app\models\Posts\ActiveRecord\Post;
use app\models\Posts\Forms\PostForm;
use app\models\Users\ActiveRecord\User;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;

class PostController extends \yii\web\Controller {
	public $layout = 'admin';
	public function behaviors() {
		return [
			'access' => [
				'class' => AccessControl::class,
				'only' => ['index', 'list', 'edit', 'update'],
				'rules' => [
					[
						'allow' => true,
						'actions' => ['index', 'list', 'edit', 'update'],
						'roles' => ['@'],
					],
				],
			],
		];
	}
	public function getViewPath() {
		return Yii::getAlias('@app/views/admin/post');
	}
	// Mostrar dashboard
	public function actionIndex() {
		return $this->render('index');
	}
	public function actionList() {
		$posts = Post::find()->all();
		$result["data"] = [];
		foreach ($posts as $key => $post) {
			$encrypted_id = urlencode(Yii::$app->encrypter->encrypt($post->id));
			$url_edit = Url::to("/admin/post/edit/{$encrypted_id}");
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
				"actions" => $actions,
			];
		}
		return Json::encode($result);
	}
	public function actionEdit($id) {
		$post = Post::findOne(Yii::$app->encrypter->decrypt($id));
		$model = new PostForm();
		$usuarios = ArrayHelper::map(User::find()->all(), 'id', 'full_name');
		$categorias = ArrayHelper::map(Category::find()->all(), 'id', 'name');
		return $this->render('edit', [
			"post" => $post,
			"id_post" => $id,
			"model" => $model,
			"usuarios" => $usuarios,
			"categorias" => $categorias,
		]);
	}
	public function actionUpdate($id) {
		$model = new PostForm(["mode" => "UPDATE", "id_post" => $id]);
		$model->load(Yii::$app->request->post());
		// echo "<pre>";
		// var_dump($model->getPostedAt());
		// echo "</pre>";
		if (!$model->validate()) {
			var_dump($model->getErrors());
			echo "error";
			die;
		}
		if (!$model->saveOrUpdate()) {
			echo "error";
		}
		echo "ojk";
	}
}
