<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_dlv_basket".
 *
 * @property integer $ID
 * @property integer $ORDER_DELIVERY_ID
 * @property integer $BASKET_ID
 * @property string $DATE_INSERT
 * @property string $QUANTITY
 * @property string $RESERVED_QUANTITY
 */
class BSaleOrderDlvBasket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_dlv_basket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_DELIVERY_ID', 'BASKET_ID', 'DATE_INSERT', 'QUANTITY', 'RESERVED_QUANTITY'], 'required'],
            [['ORDER_DELIVERY_ID', 'BASKET_ID'], 'integer'],
            [['DATE_INSERT'], 'safe'],
            [['QUANTITY', 'RESERVED_QUANTITY'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ORDER_DELIVERY_ID' => Yii::t('app', 'Order  Delivery '),
            'BASKET_ID' => Yii::t('app', 'Basket '),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
            'QUANTITY' => Yii::t('app', 'Quantity'),
            'RESERVED_QUANTITY' => Yii::t('app', 'Reserved  Quantity'),
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
