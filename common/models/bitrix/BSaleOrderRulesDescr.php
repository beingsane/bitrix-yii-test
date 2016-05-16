<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_rules_descr".
 *
 * @property integer $ID
 * @property string $MODULE_ID
 * @property integer $ORDER_DISCOUNT_ID
 * @property integer $ORDER_ID
 * @property integer $RULE_ID
 * @property string $DESCR
 */
class BSaleOrderRulesDescr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_rules_descr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MODULE_ID', 'ORDER_DISCOUNT_ID', 'ORDER_ID', 'RULE_ID', 'DESCR'], 'required'],
            [['ORDER_DISCOUNT_ID', 'ORDER_ID', 'RULE_ID'], 'integer'],
            [['DESCR'], 'string'],
            [['MODULE_ID'], 'string', 'max' => 50]
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
            'RULE_ID' => Yii::t('app', 'Rule '),
            'DESCR' => Yii::t('app', 'Descr'),
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
