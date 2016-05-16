<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_modules".
 *
 * @property integer $ID
 * @property integer $ORDER_DISCOUNT_ID
 * @property string $MODULE_ID
 */
class BSaleOrderModules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_modules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_DISCOUNT_ID', 'MODULE_ID'], 'required'],
            [['ORDER_DISCOUNT_ID'], 'integer'],
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
            'ORDER_DISCOUNT_ID' => Yii::t('app', 'Order  Discount '),
            'MODULE_ID' => Yii::t('app', 'Module '),
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
