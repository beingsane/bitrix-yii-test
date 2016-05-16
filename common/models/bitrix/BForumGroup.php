<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_group".
 *
 * @property integer $ID
 * @property integer $SORT
 * @property integer $PARENT_ID
 * @property integer $LEFT_MARGIN
 * @property integer $RIGHT_MARGIN
 * @property integer $DEPTH_LEVEL
 * @property string $XML_ID
 */
class BForumGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SORT', 'PARENT_ID', 'LEFT_MARGIN', 'RIGHT_MARGIN', 'DEPTH_LEVEL'], 'integer'],
            [['XML_ID'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SORT' => Yii::t('app', 'Sort'),
            'PARENT_ID' => Yii::t('app', 'Parent '),
            'LEFT_MARGIN' => Yii::t('app', 'Left  Margin'),
            'RIGHT_MARGIN' => Yii::t('app', 'Right  Margin'),
            'DEPTH_LEVEL' => Yii::t('app', 'Depth  Level'),
            'XML_ID' => Yii::t('app', 'Xml '),
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
