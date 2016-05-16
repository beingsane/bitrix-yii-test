<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_blog_post_category".
 *
 * @property integer $ID
 * @property integer $BLOG_ID
 * @property integer $POST_ID
 * @property integer $CATEGORY_ID
 */
class BBlogPostCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_blog_post_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BLOG_ID', 'POST_ID', 'CATEGORY_ID'], 'required'],
            [['BLOG_ID', 'POST_ID', 'CATEGORY_ID'], 'integer'],
            [['POST_ID', 'CATEGORY_ID'], 'unique', 'targetAttribute' => ['POST_ID', 'CATEGORY_ID'], 'message' => 'The combination of Post  and Category  has already been taken.']
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
            'POST_ID' => Yii::t('app', 'Post '),
            'CATEGORY_ID' => Yii::t('app', 'Category '),
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
