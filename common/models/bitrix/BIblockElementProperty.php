<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_element_property".
 *
 * @property integer $ID
 * @property integer $IBLOCK_PROPERTY_ID
 * @property integer $IBLOCK_ELEMENT_ID
 * @property string $VALUE
 * @property string $VALUE_TYPE
 * @property integer $VALUE_ENUM
 * @property string $VALUE_NUM
 * @property string $DESCRIPTION
 */
class BIblockElementProperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_element_property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_PROPERTY_ID', 'IBLOCK_ELEMENT_ID', 'VALUE'], 'required'],
            [['IBLOCK_PROPERTY_ID', 'IBLOCK_ELEMENT_ID', 'VALUE_ENUM'], 'integer'],
            [['VALUE'], 'string'],
            [['VALUE_NUM'], 'number'],
            [['VALUE_TYPE'], 'string', 'max' => 4],
            [['DESCRIPTION'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'IBLOCK_PROPERTY_ID' => Yii::t('app', 'Iblock  Property '),
            'IBLOCK_ELEMENT_ID' => Yii::t('app', 'Iblock  Element '),
            'VALUE' => Yii::t('app', 'Value'),
            'VALUE_TYPE' => Yii::t('app', 'Value  Type'),
            'VALUE_ENUM' => Yii::t('app', 'Value  Enum'),
            'VALUE_NUM' => Yii::t('app', 'Value  Num'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
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
