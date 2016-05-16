<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_blog_user2user_group".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property integer $BLOG_ID
 * @property integer $USER_GROUP_ID
 */
class BBlogUser2userGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_blog_user2user_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'BLOG_ID', 'USER_GROUP_ID'], 'required'],
            [['USER_ID', 'BLOG_ID', 'USER_GROUP_ID'], 'integer'],
            [['USER_ID', 'BLOG_ID', 'USER_GROUP_ID'], 'unique', 'targetAttribute' => ['USER_ID', 'BLOG_ID', 'USER_GROUP_ID'], 'message' => 'The combination of User , Blog  and User  Group  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_ID' => Yii::t('app', 'User '),
            'BLOG_ID' => Yii::t('app', 'Blog '),
            'USER_GROUP_ID' => Yii::t('app', 'User  Group '),
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
