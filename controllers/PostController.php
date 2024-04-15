<?php

namespace app\controllers;

use app\models\Categories\ActiveRecord\Category;
use app\models\Posts\ActiveRecord\Post;
use app\models\Posts\Forms\PostForm;
use app\models\Users\ActiveRecord\User;
use Exception;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\UploadedFile;

class PostController extends \yii\web\Controller
{
    public function actionShow($slug){
        
    }
}