<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_store_barcode".
 *
 * @property integer $ID
 * @property integer $BASKET_ID
 * @property string $BARCODE
 * @property integer $STORE_ID
 * @property double $QUANTITY
 * @property string $DATE_CREATE
 * @property string $DATE_MODIFY
 * @property integer $CREATED_BY
 * @property integer $MODIFIED_BY
 * @property integer $ORDER_DELIVERY_BASKET_ID
 */
class BSaleStoreBarcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_store_barcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BASKET_ID', 'STORE_ID', 'QUANTITY'], 'required'],
            [['BASKET_ID', 'STORE_ID', 'CREATED_BY', 'MODIFIED_BY', 'ORDER_DELIVERY_BASKET_ID'], 'integer'],
            [['QUANTITY'], 'number'],
            [['DATE_CREATE', 'DATE_MODIFY'], 'safe'],
            [['BARCODE'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'BASKET_ID' => Yii::t('app', 'Basket '),
            'BARCODE' => Yii::t('app', 'Barcode'),
            'STORE_ID' => Yii::t('app', 'Store '),
            'QUANTITY' => Yii::t('app', 'Quantity'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DATE_MODIFY' => Yii::t('app', 'Date  Modify'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'ORDER_DELIVERY_BASKET_ID' => Yii::t('app', 'Order  Delivery  Basket '),
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
