<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_element_iprop".
 *
 * @property integer $IBLOCK_ID
 * @property integer $SECTION_ID
 * @property integer $ELEMENT_ID
 * @property integer $IPROP_ID
 * @property string $VALUE
 */
class BIblockElementIprop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_element_iprop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ID', 'SECTION_ID', 'ELEMENT_ID', 'IPROP_ID', 'VALUE'], 'required'],
            [['IBLOCK_ID', 'SECTION_ID', 'ELEMENT_ID', 'IPROP_ID'], 'integer'],
            [['VALUE'], 'string']
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
            'ELEMENT_ID' => Yii::t('app', 'Element '),
            'IPROP_ID' => Yii::t('app', 'Iprop '),
            'VALUE' => Yii::t('app', 'Value'),
        ];
    }

    public function getName()
    {
        return $this->ELEMENT_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ELEMENT_ID', 'ELEMENT_ID');
        return $list;
    }
}
