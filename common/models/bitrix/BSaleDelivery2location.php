<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_delivery2location".
 *
 * @property integer $DELIVERY_ID
 * @property string $LOCATION_CODE
 * @property string $LOCATION_TYPE
 */
class BSaleDelivery2location extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_delivery2location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DELIVERY_ID', 'LOCATION_CODE', 'LOCATION_TYPE'], 'required'],
            [['DELIVERY_ID'], 'integer'],
            [['LOCATION_CODE'], 'string', 'max' => 100],
            [['LOCATION_TYPE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DELIVERY_ID' => Yii::t('app', 'Delivery '),
            'LOCATION_CODE' => Yii::t('app', 'Location  Code'),
            'LOCATION_TYPE' => Yii::t('app', 'Location  Type'),
        ];
    }

    public function getName()
    {
        return $this->DELIVERY_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'DELIVERY_ID', 'DELIVERY_ID');
        return $list;
    }
}
