<?php

namespace app\models\Posts\ActiveRecord;

use app\models\Categories\ActiveRecord\Category;
use app\models\Users\ActiveRecord\User;
use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_category
 * @property string|null $header_image
 * @property string $post_image
 * @property string $title
 * @property string $slug
 * @property string $extract
 * @property string $content
 * @property string $posted_at
 *
 * @property Category $category
 * @property User $user
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_category' => 'Id Category',
            'header_image' => 'Header Image',
            'post_image' => 'Post Image',
            'title' => 'Title',
            'slug' => 'Slug',
            'extract' => 'Extract',
            'content' => 'Content',
            'posted_at' => 'Posted At',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
    /**
     *
     * @return string
     */
    public function getContent()
    {
        return str_replace(["\r\n", "\r", "\n", "\\n"], "<br/>", $this->content);
    }
    /**
     *
     * @return string
     */
    public function getPostedAt($format = "Y-m-d")
    {
        return date($format, strtotime($this->posted_at));
    }
}
