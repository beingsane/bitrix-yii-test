<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_iproperty".
 *
 * @property integer $ID
 * @property integer $IBLOCK_ID
 * @property string $CODE
 * @property string $ENTITY_TYPE
 * @property integer $ENTITY_ID
 * @property string $TEMPLATE
 */
class BIblockIproperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_iproperty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ID', 'CODE', 'ENTITY_TYPE', 'ENTITY_ID', 'TEMPLATE'], 'required'],
            [['IBLOCK_ID', 'ENTITY_ID'], 'integer'],
            [['TEMPLATE'], 'string'],
            [['CODE'], 'string', 'max' => 50],
            [['ENTITY_TYPE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'CODE' => Yii::t('app', 'Code'),
            'ENTITY_TYPE' => Yii::t('app', 'Entity  Type'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'TEMPLATE' => Yii::t('app', 'Template'),
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
