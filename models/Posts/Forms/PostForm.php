<?php

namespace app\models\Posts\Forms;

use app\models\Posts\ActiveRecord\Post;
use Exception;
use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

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
    /**
     * @var UploadedFile
     */
    public $header_image;
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
            [['title', 'id_user', 'id_category', 'content', 'posted_at','extract'], 'required'],
            [
                ['post_image'],
                'image',
                'skipOnEmpty' => true,
                'maxSize' => 1600000,
                'extensions' => ['png', 'jpg', 'gif'],
                'mimeTypes' => ['image/*'],
            ],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id_post' => 'El post',
            'title' => 'El titulo del post',
            'id_user' => 'El usuario del post',
            'id_category' => 'La categoría del post',
            'content' => 'El contenido del post',
            'extract' => 'El extracto del post',
            'posted_at' => 'La fecha de publicación del post',
            'post_image' => 'La miniatura del post',
            'header_image' => 'La imagen de la cabecera del post',
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
            $post->title = $this->title;
            $post->id_category = $this->id_category;
            $post->id_user = $this->id_user;
            $post->title = $this->title;
            $post->slug = $this->getSlug();
            $post->content = $this->content;
            $post->extract = $this->extract;
            $post->posted_at = $this->getPostedAt();
            $post->save();
            $this->uploadHeaderImage($post);
            $this->uploadPostImage($post);
            return true;
        } catch (Exception $exception) {
            $this->addError('id_post', $exception->getMessage());
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
    public function getPostImage()
    {
        if (empty($this->post_image) || !$this->post_image) {
            $this->post_image = UploadedFile::getInstance($this, 'post_image');
        }
        return $this->post_image;
    }
    /**
     * Upload miniature  image of a post
     * @var \app\models\Posts\ActiveRecord\Post $post
     * @return void
     */
    public function uploadPostImage($post)
    {
        try {
            $post_image = $this->getPostImage();
            if ($post_image) {
                $this->removeOldPostImage($post);
                $uniq_name = uniqid('post_image_');
                $extension = $post_image->extension;
                $file_name = $uniq_name . '.' . $extension;
                $path = 'uploads/posts/' . $post->id;
                FileHelper::createDirectory($path);
                $post_image->saveAs($path . '/' . $file_name);
                $post->post_image = '/' . $path . '/' . $file_name;
                $post->save();
            }
        } catch (Exception $exception) {
            //in case of a error ignore upload ... XD
        }
    }
    /**
     * Remove miniature image of a post edited
     * @var \app\models\Posts\ActiveRecord\Post $post
     * @return void
     */
    public function removeOldPostImage($post)
    {
        if (!empty($post->post_image) && $post->post_image != "/images/posts/placeholder.jpg") {
            FileHelper::unlink(substr($post->post_image, 1));
        }
    }
}
