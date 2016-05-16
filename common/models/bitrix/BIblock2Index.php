<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_2_index".
 *
 * @property integer $SECTION_ID
 * @property integer $ELEMENT_ID
 * @property integer $FACET_ID
 * @property integer $VALUE
 * @property double $VALUE_NUM
 * @property integer $INCLUDE_SUBSECTIONS
 */
class BIblock2Index extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_2_index';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SECTION_ID', 'ELEMENT_ID', 'FACET_ID', 'VALUE', 'VALUE_NUM', 'INCLUDE_SUBSECTIONS'], 'required'],
            [['SECTION_ID', 'ELEMENT_ID', 'FACET_ID', 'VALUE', 'INCLUDE_SUBSECTIONS'], 'integer'],
            [['VALUE_NUM'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SECTION_ID' => Yii::t('app', 'Section '),
            'ELEMENT_ID' => Yii::t('app', 'Element '),
            'FACET_ID' => Yii::t('app', 'Facet '),
            'VALUE' => Yii::t('app', 'Value'),
            'VALUE_NUM' => Yii::t('app', 'Value  Num'),
            'INCLUDE_SUBSECTIONS' => Yii::t('app', 'Include  Subsections'),
        ];
    }

    public function getName()
    {
        return $this->SECTION_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'SECTION_ID', 'SECTION_ID');
        return $list;
    }
}
