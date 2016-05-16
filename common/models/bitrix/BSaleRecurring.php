<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_recurring".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $TIMESTAMP_X
 * @property string $MODULE
 * @property integer $PRODUCT_ID
 * @property string $PRODUCT_NAME
 * @property string $PRODUCT_URL
 * @property integer $PRODUCT_PRICE_ID
 * @property string $PRICE_TYPE
 * @property string $RECUR_SCHEME_TYPE
 * @property integer $RECUR_SCHEME_LENGTH
 * @property string $WITHOUT_ORDER
 * @property string $PRICE
 * @property string $CURRENCY
 * @property string $CANCELED
 * @property string $DATE_CANCELED
 * @property string $PRIOR_DATE
 * @property string $NEXT_DATE
 * @property string $CALLBACK_FUNC
 * @property string $PRODUCT_PROVIDER_CLASS
 * @property string $DESCRIPTION
 * @property string $CANCELED_REASON
 * @property integer $ORDER_ID
 * @property integer $REMAINING_ATTEMPTS
 * @property string $SUCCESS_PAYMENT
 */
class BSaleRecurring extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_recurring';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'TIMESTAMP_X', 'NEXT_DATE', 'ORDER_ID'], 'required'],
            [['USER_ID', 'PRODUCT_ID', 'PRODUCT_PRICE_ID', 'RECUR_SCHEME_LENGTH', 'ORDER_ID', 'REMAINING_ATTEMPTS'], 'integer'],
            [['TIMESTAMP_X', 'DATE_CANCELED', 'PRIOR_DATE', 'NEXT_DATE'], 'safe'],
            [['PRICE'], 'number'],
            [['MODULE', 'CALLBACK_FUNC', 'PRODUCT_PROVIDER_CLASS'], 'string', 'max' => 100],
            [['PRODUCT_NAME', 'PRODUCT_URL', 'DESCRIPTION', 'CANCELED_REASON'], 'string', 'max' => 255],
            [['PRICE_TYPE', 'RECUR_SCHEME_TYPE', 'WITHOUT_ORDER', 'CANCELED', 'SUCCESS_PAYMENT'], 'string', 'max' => 1],
            [['CURRENCY'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_ID' => Yii::t('app', 'User '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'MODULE' => Yii::t('app', 'Module'),
            'PRODUCT_ID' => Yii::t('app', 'Product '),
            'PRODUCT_NAME' => Yii::t('app', 'Product  Name'),
            'PRODUCT_URL' => Yii::t('app', 'Product  Url'),
            'PRODUCT_PRICE_ID' => Yii::t('app', 'Product  Price '),
            'PRICE_TYPE' => Yii::t('app', 'Price  Type'),
            'RECUR_SCHEME_TYPE' => Yii::t('app', 'Recur  Scheme  Type'),
            'RECUR_SCHEME_LENGTH' => Yii::t('app', 'Recur  Scheme  Length'),
            'WITHOUT_ORDER' => Yii::t('app', 'Without  Order'),
            'PRICE' => Yii::t('app', 'Price'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'CANCELED' => Yii::t('app', 'Canceled'),
            'DATE_CANCELED' => Yii::t('app', 'Date  Canceled'),
            'PRIOR_DATE' => Yii::t('app', 'Prior  Date'),
            'NEXT_DATE' => Yii::t('app', 'Next  Date'),
            'CALLBACK_FUNC' => Yii::t('app', 'Callback  Func'),
            'PRODUCT_PROVIDER_CLASS' => Yii::t('app', 'Product  Provider  Class'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'CANCELED_REASON' => Yii::t('app', 'Canceled  Reason'),
            'ORDER_ID' => Yii::t('app', 'Order '),
            'REMAINING_ATTEMPTS' => Yii::t('app', 'Remaining  Attempts'),
            'SUCCESS_PAYMENT' => Yii::t('app', 'Success  Payment'),
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
