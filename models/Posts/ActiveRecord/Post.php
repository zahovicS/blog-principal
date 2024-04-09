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
    public function rules()
    {
        return [
            [['id_user', 'id_category', 'title', 'slug', 'extract', 'content'], 'required'],
            [['id_user', 'id_category'], 'integer'],
            [['content'], 'string'],
            [['posted_at'], 'safe'],
            [['header_image', 'title', 'slug'], 'string', 'max' => 255],
            [['post_image'], 'string', 'max' => 150],
            [['extract'], 'string', 'max' => 120],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id']],
        ];
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
}
