<?php

namespace app\models\Categories\ActiveRecord;

use app\models\Posts\ActiveRecord\Post;
use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property int $id_subcategoria
 * @property string $name
 * @property string $created_at
 *
 * @property Post[] $posts
 * @property Category $parentCategory
 * @property Category $subCategories
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::class, ['id_category' => 'id']);
    }
    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParentCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id_parent_category']);
    }
    public function getSubCategories()
    {
        return $this->hasMany(Category::class, ['id_parent_category' => 'id']);
    }
}
