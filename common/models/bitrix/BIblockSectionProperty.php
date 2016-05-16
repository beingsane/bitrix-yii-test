<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_section_property".
 *
 * @property integer $IBLOCK_ID
 * @property integer $SECTION_ID
 * @property integer $PROPERTY_ID
 * @property string $SMART_FILTER
 * @property string $DISPLAY_TYPE
 * @property string $DISPLAY_EXPANDED
 * @property string $FILTER_HINT
 */
class BIblockSectionProperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_section_property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ID', 'SECTION_ID', 'PROPERTY_ID'], 'required'],
            [['IBLOCK_ID', 'SECTION_ID', 'PROPERTY_ID'], 'integer'],
            [['SMART_FILTER', 'DISPLAY_TYPE', 'DISPLAY_EXPANDED'], 'string', 'max' => 1],
            [['FILTER_HINT'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'SECTION_ID' => Yii::t('app', 'Section '),
            'PROPERTY_ID' => Yii::t('app', 'Property '),
            'SMART_FILTER' => Yii::t('app', 'Smart  Filter'),
            'DISPLAY_TYPE' => Yii::t('app', 'Display  Type'),
            'DISPLAY_EXPANDED' => Yii::t('app', 'Display  Expanded'),
            'FILTER_HINT' => Yii::t('app', 'Filter  Hint'),
        ];
    }

    public function getName()
    {
        return $this->IBLOCK_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'IBLOCK_ID', 'IBLOCK_ID');
        return $list;
    }
}
