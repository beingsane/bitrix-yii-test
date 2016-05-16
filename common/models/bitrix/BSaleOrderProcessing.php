<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_processing".
 *
 * @property integer $ORDER_ID
 * @property string $PRODUCTS_ADDED
 * @property string $PRODUCTS_REMOVED
 */
class BSaleOrderProcessing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_processing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID'], 'integer'],
            [['PRODUCTS_ADDED', 'PRODUCTS_REMOVED'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ORDER_ID' => Yii::t('app', 'Order '),
            'PRODUCTS_ADDED' => Yii::t('app', 'Products  Added'),
            'PRODUCTS_REMOVED' => Yii::t('app', 'Products  Removed'),
        ];
    }

    public function getName()
    {
        return $this->ORDER_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ORDER_ID', 'ORDER_ID');
        return $list;
    }
}
