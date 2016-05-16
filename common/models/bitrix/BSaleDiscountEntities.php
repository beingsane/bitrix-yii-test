<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_discount_entities".
 *
 * @property integer $ID
 * @property integer $DISCOUNT_ID
 * @property string $MODULE_ID
 * @property string $ENTITY
 * @property string $FIELD_ENTITY
 * @property string $FIELD_TABLE
 */
class BSaleDiscountEntities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_discount_entities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISCOUNT_ID', 'MODULE_ID', 'ENTITY', 'FIELD_ENTITY', 'FIELD_TABLE'], 'required'],
            [['DISCOUNT_ID'], 'integer'],
            [['MODULE_ID'], 'string', 'max' => 50],
            [['ENTITY', 'FIELD_ENTITY', 'FIELD_TABLE'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DISCOUNT_ID' => Yii::t('app', 'Discount '),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'ENTITY' => Yii::t('app', 'Entity'),
            'FIELD_ENTITY' => Yii::t('app', 'Field  Entity'),
            'FIELD_TABLE' => Yii::t('app', 'Field  Table'),
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
