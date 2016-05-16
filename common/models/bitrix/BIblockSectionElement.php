<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_section_element".
 *
 * @property integer $IBLOCK_SECTION_ID
 * @property integer $IBLOCK_ELEMENT_ID
 * @property integer $ADDITIONAL_PROPERTY_ID
 */
class BIblockSectionElement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_section_element';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_SECTION_ID', 'IBLOCK_ELEMENT_ID'], 'required'],
            [['IBLOCK_SECTION_ID', 'IBLOCK_ELEMENT_ID', 'ADDITIONAL_PROPERTY_ID'], 'integer'],
            [['IBLOCK_SECTION_ID', 'IBLOCK_ELEMENT_ID', 'ADDITIONAL_PROPERTY_ID'], 'unique', 'targetAttribute' => ['IBLOCK_SECTION_ID', 'IBLOCK_ELEMENT_ID', 'ADDITIONAL_PROPERTY_ID'], 'message' => 'The combination of Iblock  Section , Iblock  Element  and Additional  Property  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IBLOCK_SECTION_ID' => Yii::t('app', 'Iblock  Section '),
            'IBLOCK_ELEMENT_ID' => Yii::t('app', 'Iblock  Element '),
            'ADDITIONAL_PROPERTY_ID' => Yii::t('app', 'Additional  Property '),
        ];
    }

    public function getName()
    {
        return $this->IBLOCK_SECTION_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'IBLOCK_SECTION_ID', 'IBLOCK_SECTION_ID');
        return $list;
    }
}
