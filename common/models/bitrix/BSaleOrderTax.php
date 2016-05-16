<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_tax".
 *
 * @property integer $ID
 * @property integer $ORDER_ID
 * @property string $TAX_NAME
 * @property string $VALUE
 * @property string $VALUE_MONEY
 * @property integer $APPLY_ORDER
 * @property string $CODE
 * @property string $IS_PERCENT
 * @property string $IS_IN_PRICE
 */
class BSaleOrderTax extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_tax';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'TAX_NAME', 'VALUE_MONEY', 'APPLY_ORDER'], 'required'],
            [['ORDER_ID', 'APPLY_ORDER'], 'integer'],
            [['VALUE', 'VALUE_MONEY'], 'number'],
            [['TAX_NAME'], 'string', 'max' => 255],
            [['CODE'], 'string', 'max' => 50],
            [['IS_PERCENT', 'IS_IN_PRICE'], 'string', 'max' => 1]
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
            'TAX_NAME' => Yii::t('app', 'Tax  Name'),
            'VALUE' => Yii::t('app', 'Value'),
            'VALUE_MONEY' => Yii::t('app', 'Value  Money'),
            'APPLY_ORDER' => Yii::t('app', 'Apply  Order'),
            'CODE' => Yii::t('app', 'Code'),
            'IS_PERCENT' => Yii::t('app', 'Is  Percent'),
            'IS_IN_PRICE' => Yii::t('app', 'Is  In  Price'),
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
