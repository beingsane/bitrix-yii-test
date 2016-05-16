<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_blog_smile".
 *
 * @property integer $ID
 * @property string $SMILE_TYPE
 * @property string $TYPING
 * @property string $IMAGE
 * @property string $DESCRIPTION
 * @property string $CLICKABLE
 * @property integer $SORT
 * @property integer $IMAGE_WIDTH
 * @property integer $IMAGE_HEIGHT
 */
class BBlogSmile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_blog_smile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IMAGE'], 'required'],
            [['SORT', 'IMAGE_WIDTH', 'IMAGE_HEIGHT'], 'integer'],
            [['SMILE_TYPE', 'CLICKABLE'], 'string', 'max' => 1],
            [['TYPING'], 'string', 'max' => 100],
            [['IMAGE'], 'string', 'max' => 128],
            [['DESCRIPTION'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SMILE_TYPE' => Yii::t('app', 'Smile  Type'),
            'TYPING' => Yii::t('app', 'Typing'),
            'IMAGE' => Yii::t('app', 'Image'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'CLICKABLE' => Yii::t('app', 'Clickable'),
            'SORT' => Yii::t('app', 'Sort'),
            'IMAGE_WIDTH' => Yii::t('app', 'Image  Width'),
            'IMAGE_HEIGHT' => Yii::t('app', 'Image  Height'),
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
