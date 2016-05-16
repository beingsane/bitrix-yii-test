<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_delivery_es".
 *
 * @property integer $ID
 * @property integer $SHIPMENT_ID
 * @property integer $EXTRA_SERVICE_ID
 * @property string $VALUE
 */
class BSaleOrderDeliveryEs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_delivery_es';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SHIPMENT_ID', 'EXTRA_SERVICE_ID'], 'required'],
            [['SHIPMENT_ID', 'EXTRA_SERVICE_ID'], 'integer'],
            [['VALUE'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SHIPMENT_ID' => Yii::t('app', 'Shipment '),
            'EXTRA_SERVICE_ID' => Yii::t('app', 'Extra  Service '),
            'VALUE' => Yii::t('app', 'Value'),
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
