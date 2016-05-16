<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_rules".
 *
 * @property integer $ID
 * @property string $MODULE_ID
 * @property integer $ORDER_DISCOUNT_ID
 * @property integer $ORDER_ID
 * @property integer $ENTITY_TYPE
 * @property integer $ENTITY_ID
 * @property string $ENTITY_VALUE
 * @property integer $COUPON_ID
 * @property string $APPLY
 * @property string $ACTION_BLOCK_LIST
 * @property integer $APPLY_BLOCK_COUNTER
 */
class BSaleOrderRules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_rules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MODULE_ID', 'ORDER_DISCOUNT_ID', 'ORDER_ID', 'ENTITY_TYPE', 'ENTITY_ID', 'COUPON_ID', 'APPLY'], 'required'],
            [['ORDER_DISCOUNT_ID', 'ORDER_ID', 'ENTITY_TYPE', 'ENTITY_ID', 'COUPON_ID', 'APPLY_BLOCK_COUNTER'], 'integer'],
            [['ACTION_BLOCK_LIST'], 'string'],
            [['MODULE_ID'], 'string', 'max' => 50],
            [['ENTITY_VALUE'], 'string', 'max' => 255],
            [['APPLY'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'ORDER_DISCOUNT_ID' => Yii::t('app', 'Order  Discount '),
            'ORDER_ID' => Yii::t('app', 'Order '),
            'ENTITY_TYPE' => Yii::t('app', 'Entity  Type'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'ENTITY_VALUE' => Yii::t('app', 'Entity  Value'),
            'COUPON_ID' => Yii::t('app', 'Coupon '),
            'APPLY' => Yii::t('app', 'Apply'),
            'ACTION_BLOCK_LIST' => Yii::t('app', 'Action  Block  List'),
            'APPLY_BLOCK_COUNTER' => Yii::t('app', 'Apply  Block  Counter'),
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
