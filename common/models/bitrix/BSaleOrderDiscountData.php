<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_discount_data".
 *
 * @property integer $ID
 * @property integer $ORDER_ID
 * @property integer $ENTITY_TYPE
 * @property integer $ENTITY_ID
 * @property string $ENTITY_VALUE
 * @property string $ENTITY_DATA
 */
class BSaleOrderDiscountData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_discount_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'ENTITY_TYPE', 'ENTITY_ID', 'ENTITY_DATA'], 'required'],
            [['ORDER_ID', 'ENTITY_TYPE', 'ENTITY_ID'], 'integer'],
            [['ENTITY_DATA'], 'string'],
            [['ENTITY_VALUE'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ORDER_ID' => Yii::t('app', 'Order '),
            'ENTITY_TYPE' => Yii::t('app', 'Entity  Type'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'ENTITY_VALUE' => Yii::t('app', 'Entity  Value'),
            'ENTITY_DATA' => Yii::t('app', 'Entity  Data'),
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
