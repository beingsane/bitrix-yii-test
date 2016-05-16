<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_blog_user2blog".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property integer $BLOG_ID
 */
class BBlogUser2blog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_blog_user2blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'BLOG_ID'], 'required'],
            [['USER_ID', 'BLOG_ID'], 'integer'],
            [['BLOG_ID', 'USER_ID'], 'unique', 'targetAttribute' => ['BLOG_ID', 'USER_ID'], 'message' => 'The combination of User  and Blog  has already been taken.']
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
