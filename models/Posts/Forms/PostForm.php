<?php

namespace app\models\Posts\Forms;

use app\models\Posts\ActiveRecord\Post;
use yii\web\UploadedFile;
use Exception;
use Yii;

class PostForm extends \yii\base\Model
{

    public $id_post = null;
    public $mode;
    public $title;
    public $id_user;
    public $id_category;
    public $content;
    public $extract;
    /**
     * @var UploadedFile
     */
    public $post_image;
    public $posted_at;
    public $_user = false;
    public $_post = false;

    function __construct($options = [])
    {
        parent::__construct();
        $this->mode = $options["mode"] ?? "SAVE";
        $this->id_post = $options["id_post"] ?? null;
    }

    public function rules()
    {
        return [
            // the name, email, subject and body attributes are required
            ['id_post', 'validatedPost'],
            [['title', 'id_user', 'id_category', 'content', 'posted_at'], 'required'],
            [['post_image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id_post' => 'El post',
            'title' => 'El titulo',
            'id_user' => 'El usuario',
            'id_category' => 'La categoría',
            'content' => 'El contenido',
            'posted_at' => 'La fecha de publicación',
        ];
    }
    public function getPostID()
    {
        return Yii::$app->encrypter->decrypt($this->id_post);
    }
    public function validatedPost($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $post = $this->getPost();
            if (!$post && $this->mode == "UPDATE") {
                $this->addError($attribute, 'Post not found!.');
            }
        }
    }
    public function saveOrUpdate()
    {
        try {
            $post = $this->getPost();
            //new post
            if ($post === null) {
                $post = new Post();
            }
            // $post->title = $this->title;
            // $post->id_category = $this->id_category;
            // $post->id_user = $this->id_user;
            // $post->title = $this->title;
            // $post->slug = $this->getSlug();
            // $post->content = $this->content;
            // $post->extract = $this->extract;
            // $post->posted_at = $this->getPostedAt();
            // $post->save();
            $this->uploadHeaderImage($post);
            $this->uploadPostImage($post);
            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
    public function getPost()
    {
        if ($this->_post == null) {
            $this->_post = Post::findOne($this->getPostID());
        }
        return $this->_post;
    }
    public function getSlug()
    {
        return Yii::$app->post->makeSlug($this->title);
    }
    public function getPostedAt()
    {
        return date("Y-m-d H:i:s", strtotime($this->posted_at));
    }
    /**
     * Upload Header image of a post
     * @var \app\models\Posts\ActiveRecord\Post $post
     * @return void
     */
    public function uploadHeaderImage($post)
    {
        try {
            //code...
        } catch (Exception $exception) {
            //in case of a error ignore upload ... XD
        }
    }

    /**
     * Upload miniature  image of a post
     * @var \app\models\Posts\ActiveRecord\Post $post
     * @return void
     */
    public function uploadPostImage($post)
    {
        try {
            var_dump($this->post_image);
            //code...
        } catch (Exception $exception) {
            //in case of a error ignore upload ... XD
        }
    }
}
