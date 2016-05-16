<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_blog_user_group_perms".
 *
 * @property integer $ID
 * @property integer $BLOG_ID
 * @property integer $USER_GROUP_ID
 * @property string $PERMS_TYPE
 * @property integer $POST_ID
 * @property string $PERMS
 * @property string $AUTOSET
 */
class BBlogUserGroupPerms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_blog_user_group_perms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BLOG_ID', 'USER_GROUP_ID'], 'required'],
            [['BLOG_ID', 'USER_GROUP_ID', 'POST_ID'], 'integer'],
            [['PERMS_TYPE', 'PERMS', 'AUTOSET'], 'string', 'max' => 1],
            [['BLOG_ID', 'USER_GROUP_ID', 'PERMS_TYPE', 'POST_ID'], 'unique', 'targetAttribute' => ['BLOG_ID', 'USER_GROUP_ID', 'PERMS_TYPE', 'POST_ID'], 'message' => 'The combination of Blog , User  Group , Perms  Type and Post  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'BLOG_ID' => Yii::t('app', 'Blog '),
            'USER_GROUP_ID' => Yii::t('app', 'User  Group '),
            'PERMS_TYPE' => Yii::t('app', 'Perms  Type'),
            'POST_ID' => Yii::t('app', 'Post '),
            'PERMS' => Yii::t('app', 'Perms'),
            'AUTOSET' => Yii::t('app', 'Autoset'),
        ];
    }

    public function getName()
    {
        return $this->ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'ID');
        return $list;
    }
}
