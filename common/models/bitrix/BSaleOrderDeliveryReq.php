<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_delivery_req".
 *
 * @property integer $ID
 * @property integer $ORDER_ID
 * @property string $DATE_REQUEST
 * @property string $DELIVERY_LOCATION
 * @property string $PARAMS
 * @property integer $SHIPMENT_ID
 */
class BSaleOrderDeliveryReq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_delivery_req';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID'], 'required'],
            [['ORDER_ID', 'SHIPMENT_ID'], 'integer'],
            [['DATE_REQUEST'], 'safe'],
            [['PARAMS'], 'string'],
            [['DELIVERY_LOCATION'], 'string', 'max' => 50]
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
            'DATE_REQUEST' => Yii::t('app', 'Date  Request'),
            'DELIVERY_LOCATION' => Yii::t('app', 'Delivery  Location'),
            'PARAMS' => Yii::t('app', 'Params'),
            'SHIPMENT_ID' => Yii::t('app', 'Shipment '),
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
