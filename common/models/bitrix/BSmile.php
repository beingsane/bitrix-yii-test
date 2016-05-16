<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_smile".
 *
 * @property integer $ID
 * @property string $TYPE
 * @property integer $SET_ID
 * @property integer $SORT
 * @property string $TYPING
 * @property string $CLICKABLE
 * @property string $HIDDEN
 * @property string $IMAGE
 * @property string $IMAGE_DEFINITION
 * @property integer $IMAGE_WIDTH
 * @property integer $IMAGE_HEIGHT
 */
class BSmile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_smile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SET_ID', 'SORT', 'IMAGE_WIDTH', 'IMAGE_HEIGHT'], 'integer'],
            [['IMAGE'], 'required'],
            [['TYPE', 'CLICKABLE', 'HIDDEN'], 'string', 'max' => 1],
            [['TYPING'], 'string', 'max' => 100],
            [['IMAGE'], 'string', 'max' => 255],
            [['IMAGE_DEFINITION'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TYPE' => Yii::t('app', 'Type'),
            'SET_ID' => Yii::t('app', 'Set '),
            'SORT' => Yii::t('app', 'Sort'),
            'TYPING' => Yii::t('app', 'Typing'),
            'CLICKABLE' => Yii::t('app', 'Clickable'),
            'HIDDEN' => Yii::t('app', 'Hidden'),
            'IMAGE' => Yii::t('app', 'Image'),
            'IMAGE_DEFINITION' => Yii::t('app', 'Image  Definition'),
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
