<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_basket".
 *
 * @property integer $ID
 * @property integer $FUSER_ID
 * @property integer $ORDER_ID
 * @property integer $PRODUCT_ID
 * @property integer $PRODUCT_PRICE_ID
 * @property string $PRICE
 * @property string $CURRENCY
 * @property string $BASE_PRICE
 * @property string $VAT_INCLUDED
 * @property string $DATE_INSERT
 * @property string $DATE_UPDATE
 * @property double $WEIGHT
 * @property double $QUANTITY
 * @property string $LID
 * @property string $DELAY
 * @property string $NAME
 * @property string $CAN_BUY
 * @property string $MODULE
 * @property string $CALLBACK_FUNC
 * @property string $NOTES
 * @property string $ORDER_CALLBACK_FUNC
 * @property string $DETAIL_PAGE_URL
 * @property string $DISCOUNT_PRICE
 * @property string $CANCEL_CALLBACK_FUNC
 * @property string $PAY_CALLBACK_FUNC
 * @property string $PRODUCT_PROVIDER_CLASS
 * @property string $CATALOG_XML_ID
 * @property string $PRODUCT_XML_ID
 * @property string $DISCOUNT_NAME
 * @property string $DISCOUNT_VALUE
 * @property string $DISCOUNT_COUPON
 * @property string $VAT_RATE
 * @property string $SUBSCRIBE
 * @property string $DEDUCTED
 * @property string $RESERVED
 * @property string $BARCODE_MULTI
 * @property double $RESERVE_QUANTITY
 * @property string $CUSTOM_PRICE
 * @property string $DIMENSIONS
 * @property integer $TYPE
 * @property integer $SET_PARENT_ID
 * @property integer $MEASURE_CODE
 * @property string $MEASURE_NAME
 * @property string $RECOMMENDATION
 * @property integer $SORT
 */
class BSaleBasket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_basket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FUSER_ID', 'PRODUCT_ID', 'PRICE', 'CURRENCY', 'DATE_INSERT', 'DATE_UPDATE', 'LID', 'NAME', 'DISCOUNT_PRICE'], 'required'],
            [['FUSER_ID', 'ORDER_ID', 'PRODUCT_ID', 'PRODUCT_PRICE_ID', 'TYPE', 'SET_PARENT_ID', 'MEASURE_CODE', 'SORT'], 'integer'],
            [['PRICE', 'BASE_PRICE', 'WEIGHT', 'QUANTITY', 'DISCOUNT_PRICE', 'VAT_RATE', 'RESERVE_QUANTITY'], 'number'],
            [['DATE_INSERT', 'DATE_UPDATE'], 'safe'],
            [['CURRENCY'], 'string', 'max' => 3],
            [['VAT_INCLUDED', 'DELAY', 'CAN_BUY', 'SUBSCRIBE', 'DEDUCTED', 'RESERVED', 'BARCODE_MULTI', 'CUSTOM_PRICE'], 'string', 'max' => 1],
            [['LID'], 'string', 'max' => 2],
            [['NAME', 'DISCOUNT_NAME', 'DIMENSIONS'], 'string', 'max' => 255],
            [['MODULE', 'CALLBACK_FUNC', 'ORDER_CALLBACK_FUNC', 'CANCEL_CALLBACK_FUNC', 'PAY_CALLBACK_FUNC', 'PRODUCT_PROVIDER_CLASS', 'CATALOG_XML_ID', 'PRODUCT_XML_ID'], 'string', 'max' => 100],
            [['NOTES', 'DETAIL_PAGE_URL'], 'string', 'max' => 250],
            [['DISCOUNT_VALUE', 'DISCOUNT_COUPON'], 'string', 'max' => 32],
            [['MEASURE_NAME'], 'string', 'max' => 50],
            [['RECOMMENDATION'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FUSER_ID' => Yii::t('app', 'Fuser '),
            'ORDER_ID' => Yii::t('app', 'Order '),
            'PRODUCT_ID' => Yii::t('app', 'Product '),
            'PRODUCT_PRICE_ID' => Yii::t('app', 'Product  Price '),
            'PRICE' => Yii::t('app', 'Price'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'BASE_PRICE' => Yii::t('app', 'Base  Price'),
            'VAT_INCLUDED' => Yii::t('app', 'Vat  Included'),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'WEIGHT' => Yii::t('app', 'Weight'),
            'QUANTITY' => Yii::t('app', 'Quantity'),
            'LID' => Yii::t('app', 'Lid'),
            'DELAY' => Yii::t('app', 'Delay'),
            'NAME' => Yii::t('app', 'Name'),
            'CAN_BUY' => Yii::t('app', 'Can  Buy'),
            'MODULE' => Yii::t('app', 'Module'),
            'CALLBACK_FUNC' => Yii::t('app', 'Callback  Func'),
            'NOTES' => Yii::t('app', 'Notes'),
            'ORDER_CALLBACK_FUNC' => Yii::t('app', 'Order  Callback  Func'),
            'DETAIL_PAGE_URL' => Yii::t('app', 'Detail  Page  Url'),
            'DISCOUNT_PRICE' => Yii::t('app', 'Discount  Price'),
            'CANCEL_CALLBACK_FUNC' => Yii::t('app', 'Cancel  Callback  Func'),
            'PAY_CALLBACK_FUNC' => Yii::t('app', 'Pay  Callback  Func'),
            'PRODUCT_PROVIDER_CLASS' => Yii::t('app', 'Product  Provider  Class'),
            'CATALOG_XML_ID' => Yii::t('app', 'Catalog  Xml '),
            'PRODUCT_XML_ID' => Yii::t('app', 'Product  Xml '),
            'DISCOUNT_NAME' => Yii::t('app', 'Discount  Name'),
            'DISCOUNT_VALUE' => Yii::t('app', 'Discount  Value'),
            'DISCOUNT_COUPON' => Yii::t('app', 'Discount  Coupon'),
            'VAT_RATE' => Yii::t('app', 'Vat  Rate'),
            'SUBSCRIBE' => Yii::t('app', 'Subscribe'),
            'DEDUCTED' => Yii::t('app', 'Deducted'),
            'RESERVED' => Yii::t('app', 'Reserved'),
            'BARCODE_MULTI' => Yii::t('app', 'Barcode  Multi'),
            'RESERVE_QUANTITY' => Yii::t('app', 'Reserve  Quantity'),
            'CUSTOM_PRICE' => Yii::t('app', 'Custom  Price'),
            'DIMENSIONS' => Yii::t('app', 'Dimensions'),
            'TYPE' => Yii::t('app', 'Type'),
            'SET_PARENT_ID' => Yii::t('app', 'Set  Parent '),
            'MEASURE_CODE' => Yii::t('app', 'Measure  Code'),
            'MEASURE_NAME' => Yii::t('app', 'Measure  Name'),
            'RECOMMENDATION' => Yii::t('app', 'Recommendation'),
            'SORT' => Yii::t('app', 'Sort'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
