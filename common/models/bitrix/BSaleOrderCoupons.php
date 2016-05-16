<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_coupons".
 *
 * @property integer $ID
 * @property integer $ORDER_ID
 * @property integer $ORDER_DISCOUNT_ID
 * @property string $COUPON
 * @property integer $TYPE
 * @property integer $COUPON_ID
 * @property string $DATA
 */
class BSaleOrderCoupons extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_coupons';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'ORDER_DISCOUNT_ID', 'COUPON', 'TYPE', 'COUPON_ID'], 'required'],
            [['ORDER_ID', 'ORDER_DISCOUNT_ID', 'TYPE', 'COUPON_ID'], 'integer'],
            [['DATA'], 'string'],
            [['COUPON'], 'string', 'max' => 32]
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
            'ORDER_DISCOUNT_ID' => Yii::t('app', 'Order  Discount '),
            'COUPON' => Yii::t('app', 'Coupon'),
            'TYPE' => Yii::t('app', 'Type'),
            'COUPON_ID' => Yii::t('app', 'Coupon '),
            'DATA' => Yii::t('app', 'Data'),
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
