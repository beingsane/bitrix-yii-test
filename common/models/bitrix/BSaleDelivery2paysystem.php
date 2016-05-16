<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_delivery2paysystem".
 *
 * @property integer $DELIVERY_ID
 * @property string $LINK_DIRECTION
 * @property integer $PAYSYSTEM_ID
 */
class BSaleDelivery2paysystem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_delivery2paysystem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DELIVERY_ID', 'LINK_DIRECTION', 'PAYSYSTEM_ID'], 'required'],
            [['DELIVERY_ID', 'PAYSYSTEM_ID'], 'integer'],
            [['LINK_DIRECTION'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DELIVERY_ID' => Yii::t('app', 'Delivery '),
            'LINK_DIRECTION' => Yii::t('app', 'Link  Direction'),
            'PAYSYSTEM_ID' => Yii::t('app', 'Paysystem '),
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
