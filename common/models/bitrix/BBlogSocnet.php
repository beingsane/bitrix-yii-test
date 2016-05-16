<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_blog_socnet".
 *
 * @property integer $ID
 * @property integer $BLOG_ID
 */
class BBlogSocnet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_blog_socnet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BLOG_ID'], 'required'],
            [['BLOG_ID'], 'integer'],
            [['BLOG_ID'], 'unique']
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
