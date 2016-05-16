<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_product".
 *
 * @property integer $ID
 * @property double $QUANTITY
 * @property string $QUANTITY_TRACE
 * @property double $WEIGHT
 * @property string $TIMESTAMP_X
 * @property string $PRICE_TYPE
 * @property integer $RECUR_SCHEME_LENGTH
 * @property string $RECUR_SCHEME_TYPE
 * @property integer $TRIAL_PRICE_ID
 * @property string $WITHOUT_ORDER
 * @property string $SELECT_BEST_PRICE
 * @property integer $VAT_ID
 * @property string $VAT_INCLUDED
 * @property string $CAN_BUY_ZERO
 * @property string $NEGATIVE_AMOUNT_TRACE
 * @property string $TMP_ID
 * @property string $PURCHASING_PRICE
 * @property string $PURCHASING_CURRENCY
 * @property string $BARCODE_MULTI
 * @property double $QUANTITY_RESERVED
 * @property string $SUBSCRIBE
 * @property double $WIDTH
 * @property double $LENGTH
 * @property double $HEIGHT
 * @property integer $MEASURE
 * @property integer $TYPE
 * @property string $AVAILABLE
 * @property string $BUNDLE
 */
class BCatalogProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'QUANTITY', 'TIMESTAMP_X'], 'required'],
            [['ID', 'RECUR_SCHEME_LENGTH', 'TRIAL_PRICE_ID', 'VAT_ID', 'MEASURE', 'TYPE'], 'integer'],
            [['QUANTITY', 'WEIGHT', 'PURCHASING_PRICE', 'QUANTITY_RESERVED', 'WIDTH', 'LENGTH', 'HEIGHT'], 'number'],
            [['TIMESTAMP_X'], 'safe'],
            [['QUANTITY_TRACE', 'PRICE_TYPE', 'RECUR_SCHEME_TYPE', 'WITHOUT_ORDER', 'SELECT_BEST_PRICE', 'VAT_INCLUDED', 'CAN_BUY_ZERO', 'NEGATIVE_AMOUNT_TRACE', 'BARCODE_MULTI', 'SUBSCRIBE', 'AVAILABLE', 'BUNDLE'], 'string', 'max' => 1],
            [['TMP_ID'], 'string', 'max' => 40],
            [['PURCHASING_CURRENCY'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'QUANTITY' => Yii::t('app', 'Quantity'),
            'QUANTITY_TRACE' => Yii::t('app', 'Quantity  Trace'),
            'WEIGHT' => Yii::t('app', 'Weight'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'PRICE_TYPE' => Yii::t('app', 'Price  Type'),
            'RECUR_SCHEME_LENGTH' => Yii::t('app', 'Recur  Scheme  Length'),
            'RECUR_SCHEME_TYPE' => Yii::t('app', 'Recur  Scheme  Type'),
            'TRIAL_PRICE_ID' => Yii::t('app', 'Trial  Price '),
            'WITHOUT_ORDER' => Yii::t('app', 'Without  Order'),
            'SELECT_BEST_PRICE' => Yii::t('app', 'Select  Best  Price'),
            'VAT_ID' => Yii::t('app', 'Vat '),
            'VAT_INCLUDED' => Yii::t('app', 'Vat  Included'),
            'CAN_BUY_ZERO' => Yii::t('app', 'Can  Buy  Zero'),
            'NEGATIVE_AMOUNT_TRACE' => Yii::t('app', 'Negative  Amount  Trace'),
            'TMP_ID' => Yii::t('app', 'Tmp '),
            'PURCHASING_PRICE' => Yii::t('app', 'Purchasing  Price'),
            'PURCHASING_CURRENCY' => Yii::t('app', 'Purchasing  Currency'),
            'BARCODE_MULTI' => Yii::t('app', 'Barcode  Multi'),
            'QUANTITY_RESERVED' => Yii::t('app', 'Quantity  Reserved'),
            'SUBSCRIBE' => Yii::t('app', 'Subscribe'),
            'WIDTH' => Yii::t('app', 'Width'),
            'LENGTH' => Yii::t('app', 'Length'),
            'HEIGHT' => Yii::t('app', 'Height'),
            'MEASURE' => Yii::t('app', 'Measure'),
            'TYPE' => Yii::t('app', 'Type'),
            'AVAILABLE' => Yii::t('app', 'Available'),
            'BUNDLE' => Yii::t('app', 'Bundle'),
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
