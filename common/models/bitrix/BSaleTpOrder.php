<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_tp_order".
 *
 * @property integer $ID
 * @property integer $ORDER_ID
 * @property integer $TRADING_PLATFORM_ID
 * @property string $EXTERNAL_ORDER_ID
 * @property string $PARAMS
 */
class BSaleTpOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_tp_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'TRADING_PLATFORM_ID', 'EXTERNAL_ORDER_ID'], 'required'],
            [['ORDER_ID', 'TRADING_PLATFORM_ID'], 'integer'],
            [['PARAMS'], 'string'],
            [['EXTERNAL_ORDER_ID'], 'string', 'max' => 100],
            [['ORDER_ID', 'TRADING_PLATFORM_ID', 'EXTERNAL_ORDER_ID'], 'unique', 'targetAttribute' => ['ORDER_ID', 'TRADING_PLATFORM_ID', 'EXTERNAL_ORDER_ID'], 'message' => 'The combination of Order , Trading  Platform  and External  Order  has already been taken.']
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
            'TRADING_PLATFORM_ID' => Yii::t('app', 'Trading  Platform '),
            'EXTERNAL_ORDER_ID' => Yii::t('app', 'External  Order '),
            'PARAMS' => Yii::t('app', 'Params'),
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
