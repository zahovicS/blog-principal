<?php

namespace app\models\Social\ActiveRecord;

use Yii;

/**
 * This is the model class for table "socials".
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 * @property string $created_at
 *
 * @property SocialUser[] $socialUsers
 */
class Social extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'socials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'icon'], 'required'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['icon'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'icon' => Yii::t('app', 'Icon'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * Gets query for [[SocialUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSocialUsers()
    {
        return $this->hasMany(SocialUser::class, ['id_social' => 'id']);
    }
}
