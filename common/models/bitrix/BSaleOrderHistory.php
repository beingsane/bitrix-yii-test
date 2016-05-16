<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_history".
 *
 * @property string $ID
 * @property string $H_USER_ID
 * @property string $H_DATE_INSERT
 * @property string $H_ORDER_ID
 * @property string $H_CURRENCY
 * @property string $PERSON_TYPE_ID
 * @property string $PAYED
 * @property string $DATE_PAYED
 * @property string $EMP_PAYED_ID
 * @property string $CANCELED
 * @property string $DATE_CANCELED
 * @property string $REASON_CANCELED
 * @property string $STATUS_ID
 * @property string $DATE_STATUS
 * @property string $PRICE_DELIVERY
 * @property string $ALLOW_DELIVERY
 * @property string $DATE_ALLOW_DELIVERY
 * @property string $RESERVED
 * @property string $DEDUCTED
 * @property string $DATE_DEDUCTED
 * @property string $REASON_UNDO_DEDUCTED
 * @property string $MARKED
 * @property string $DATE_MARKED
 * @property string $REASON_MARKED
 * @property string $PRICE
 * @property string $CURRENCY
 * @property string $DISCOUNT_VALUE
 * @property string $USER_ID
 * @property string $PAY_SYSTEM_ID
 * @property string $DELIVERY_ID
 * @property string $PS_STATUS
 * @property string $PS_STATUS_CODE
 * @property string $PS_STATUS_DESCRIPTION
 * @property string $PS_STATUS_MESSAGE
 * @property string $PS_SUM
 * @property string $PS_CURRENCY
 * @property string $PS_RESPONSE_DATE
 * @property string $TAX_VALUE
 * @property string $STAT_GID
 * @property string $SUM_PAID
 * @property string $PAY_VOUCHER_NUM
 * @property string $PAY_VOUCHER_DATE
 * @property string $AFFILIATE_ID
 * @property string $DELIVERY_DOC_NUM
 * @property string $DELIVERY_DOC_DATE
 */
class BSaleOrderHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['H_USER_ID', 'H_DATE_INSERT', 'H_ORDER_ID', 'H_CURRENCY', 'STATUS_ID'], 'required'],
            [['H_USER_ID', 'H_ORDER_ID', 'PERSON_TYPE_ID', 'EMP_PAYED_ID', 'USER_ID', 'PAY_SYSTEM_ID', 'AFFILIATE_ID'], 'integer'],
            [['H_DATE_INSERT', 'DATE_PAYED', 'DATE_CANCELED', 'DATE_STATUS', 'DATE_ALLOW_DELIVERY', 'DATE_DEDUCTED', 'DATE_MARKED', 'PS_RESPONSE_DATE', 'PAY_VOUCHER_DATE', 'DELIVERY_DOC_DATE'], 'safe'],
            [['PRICE_DELIVERY', 'PRICE', 'DISCOUNT_VALUE', 'PS_SUM', 'TAX_VALUE', 'SUM_PAID'], 'number'],
            [['H_CURRENCY', 'CURRENCY', 'PS_CURRENCY'], 'string', 'max' => 3],
            [['PAYED', 'CANCELED', 'ALLOW_DELIVERY', 'RESERVED', 'DEDUCTED', 'MARKED', 'PS_STATUS'], 'string', 'max' => 1],
            [['REASON_CANCELED', 'REASON_UNDO_DEDUCTED', 'REASON_MARKED', 'STAT_GID'], 'string', 'max' => 255],
            [['STATUS_ID'], 'string', 'max' => 2],
            [['DELIVERY_ID'], 'string', 'max' => 50],
            [['PS_STATUS_CODE'], 'string', 'max' => 5],
            [['PS_STATUS_DESCRIPTION', 'PS_STATUS_MESSAGE'], 'string', 'max' => 250],
            [['PAY_VOUCHER_NUM', 'DELIVERY_DOC_NUM'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'H_USER_ID' => Yii::t('app', 'H  User '),
            'H_DATE_INSERT' => Yii::t('app', 'H  Date  Insert'),
            'H_ORDER_ID' => Yii::t('app', 'H  Order '),
            'H_CURRENCY' => Yii::t('app', 'H  Currency'),
            'PERSON_TYPE_ID' => Yii::t('app', 'Person  Type '),
            'PAYED' => Yii::t('app', 'Payed'),
            'DATE_PAYED' => Yii::t('app', 'Date  Payed'),
            'EMP_PAYED_ID' => Yii::t('app', 'Emp  Payed '),
            'CANCELED' => Yii::t('app', 'Canceled'),
            'DATE_CANCELED' => Yii::t('app', 'Date  Canceled'),
            'REASON_CANCELED' => Yii::t('app', 'Reason  Canceled'),
            'STATUS_ID' => Yii::t('app', 'Status '),
            'DATE_STATUS' => Yii::t('app', 'Date  Status'),
            'PRICE_DELIVERY' => Yii::t('app', 'Price  Delivery'),
            'ALLOW_DELIVERY' => Yii::t('app', 'Allow  Delivery'),
            'DATE_ALLOW_DELIVERY' => Yii::t('app', 'Date  Allow  Delivery'),
            'RESERVED' => Yii::t('app', 'Reserved'),
            'DEDUCTED' => Yii::t('app', 'Deducted'),
            'DATE_DEDUCTED' => Yii::t('app', 'Date  Deducted'),
            'REASON_UNDO_DEDUCTED' => Yii::t('app', 'Reason  Undo  Deducted'),
            'MARKED' => Yii::t('app', 'Marked'),
            'DATE_MARKED' => Yii::t('app', 'Date  Marked'),
            'REASON_MARKED' => Yii::t('app', 'Reason  Marked'),
            'PRICE' => Yii::t('app', 'Price'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'DISCOUNT_VALUE' => Yii::t('app', 'Discount  Value'),
            'USER_ID' => Yii::t('app', 'User '),
            'PAY_SYSTEM_ID' => Yii::t('app', 'Pay  System '),
            'DELIVERY_ID' => Yii::t('app', 'Delivery '),
            'PS_STATUS' => Yii::t('app', 'Ps  Status'),
            'PS_STATUS_CODE' => Yii::t('app', 'Ps  Status  Code'),
            'PS_STATUS_DESCRIPTION' => Yii::t('app', 'Ps  Status  Description'),
            'PS_STATUS_MESSAGE' => Yii::t('app', 'Ps  Status  Message'),
            'PS_SUM' => Yii::t('app', 'Ps  Sum'),
            'PS_CURRENCY' => Yii::t('app', 'Ps  Currency'),
            'PS_RESPONSE_DATE' => Yii::t('app', 'Ps  Response  Date'),
            'TAX_VALUE' => Yii::t('app', 'Tax  Value'),
            'STAT_GID' => Yii::t('app', 'Stat  Gid'),
            'SUM_PAID' => Yii::t('app', 'Sum  Paid'),
            'PAY_VOUCHER_NUM' => Yii::t('app', 'Pay  Voucher  Num'),
            'PAY_VOUCHER_DATE' => Yii::t('app', 'Pay  Voucher  Date'),
            'AFFILIATE_ID' => Yii::t('app', 'Affiliate '),
            'DELIVERY_DOC_NUM' => Yii::t('app', 'Delivery  Doc  Num'),
            'DELIVERY_DOC_DATE' => Yii::t('app', 'Delivery  Doc  Date'),
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
