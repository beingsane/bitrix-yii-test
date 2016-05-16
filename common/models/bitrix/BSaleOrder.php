<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order".
 *
 * @property integer $ID
 * @property string $LID
 * @property integer $PERSON_TYPE_ID
 * @property string $PAYED
 * @property string $DATE_PAYED
 * @property integer $EMP_PAYED_ID
 * @property string $CANCELED
 * @property string $DATE_CANCELED
 * @property integer $EMP_CANCELED_ID
 * @property string $REASON_CANCELED
 * @property string $STATUS_ID
 * @property string $DATE_STATUS
 * @property integer $EMP_STATUS_ID
 * @property string $PRICE_DELIVERY
 * @property string $PRICE_PAYMENT
 * @property string $ALLOW_DELIVERY
 * @property string $DATE_ALLOW_DELIVERY
 * @property integer $EMP_ALLOW_DELIVERY_ID
 * @property string $DEDUCTED
 * @property string $DATE_DEDUCTED
 * @property integer $EMP_DEDUCTED_ID
 * @property string $REASON_UNDO_DEDUCTED
 * @property string $MARKED
 * @property string $DATE_MARKED
 * @property integer $EMP_MARKED_ID
 * @property string $REASON_MARKED
 * @property string $RESERVED
 * @property string $PRICE
 * @property string $CURRENCY
 * @property string $DISCOUNT_VALUE
 * @property integer $USER_ID
 * @property integer $PAY_SYSTEM_ID
 * @property string $DELIVERY_ID
 * @property string $DATE_INSERT
 * @property string $DATE_UPDATE
 * @property string $USER_DESCRIPTION
 * @property string $ADDITIONAL_INFO
 * @property string $PS_STATUS
 * @property string $PS_STATUS_CODE
 * @property string $PS_STATUS_DESCRIPTION
 * @property string $PS_STATUS_MESSAGE
 * @property string $PS_SUM
 * @property string $PS_CURRENCY
 * @property string $PS_RESPONSE_DATE
 * @property string $COMMENTS
 * @property string $TAX_VALUE
 * @property string $STAT_GID
 * @property string $SUM_PAID
 * @property integer $RECURRING_ID
 * @property string $PAY_VOUCHER_NUM
 * @property string $PAY_VOUCHER_DATE
 * @property integer $LOCKED_BY
 * @property string $DATE_LOCK
 * @property string $RECOUNT_FLAG
 * @property integer $AFFILIATE_ID
 * @property string $DELIVERY_DOC_NUM
 * @property string $DELIVERY_DOC_DATE
 * @property string $UPDATED_1C
 * @property integer $STORE_ID
 * @property string $ORDER_TOPIC
 * @property integer $CREATED_BY
 * @property integer $RESPONSIBLE_ID
 * @property string $DATE_PAY_BEFORE
 * @property string $DATE_BILL
 * @property string $ACCOUNT_NUMBER
 * @property string $TRACKING_NUMBER
 * @property string $XML_ID
 * @property string $ID_1C
 * @property string $VERSION_1C
 * @property integer $VERSION
 * @property string $EXTERNAL_ORDER
 * @property string $BX_USER_ID
 */
class BSaleOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LID', 'PERSON_TYPE_ID', 'STATUS_ID', 'DATE_STATUS', 'PRICE', 'CURRENCY', 'USER_ID', 'DATE_INSERT', 'DATE_UPDATE'], 'required'],
            [['PERSON_TYPE_ID', 'EMP_PAYED_ID', 'EMP_CANCELED_ID', 'EMP_STATUS_ID', 'EMP_ALLOW_DELIVERY_ID', 'EMP_DEDUCTED_ID', 'EMP_MARKED_ID', 'USER_ID', 'PAY_SYSTEM_ID', 'RECURRING_ID', 'LOCKED_BY', 'AFFILIATE_ID', 'STORE_ID', 'CREATED_BY', 'RESPONSIBLE_ID', 'VERSION'], 'integer'],
            [['DATE_PAYED', 'DATE_CANCELED', 'DATE_STATUS', 'DATE_ALLOW_DELIVERY', 'DATE_DEDUCTED', 'DATE_MARKED', 'DATE_INSERT', 'DATE_UPDATE', 'PS_RESPONSE_DATE', 'PAY_VOUCHER_DATE', 'DATE_LOCK', 'DELIVERY_DOC_DATE', 'DATE_PAY_BEFORE', 'DATE_BILL'], 'safe'],
            [['PRICE_DELIVERY', 'PRICE_PAYMENT', 'PRICE', 'DISCOUNT_VALUE', 'PS_SUM', 'TAX_VALUE', 'SUM_PAID'], 'number'],
            [['COMMENTS'], 'string'],
            [['LID', 'STATUS_ID'], 'string', 'max' => 2],
            [['PAYED', 'CANCELED', 'ALLOW_DELIVERY', 'DEDUCTED', 'MARKED', 'RESERVED', 'PS_STATUS', 'RECOUNT_FLAG', 'UPDATED_1C', 'EXTERNAL_ORDER'], 'string', 'max' => 1],
            [['REASON_CANCELED', 'REASON_UNDO_DEDUCTED', 'REASON_MARKED', 'ADDITIONAL_INFO', 'STAT_GID', 'ORDER_TOPIC', 'TRACKING_NUMBER', 'XML_ID'], 'string', 'max' => 255],
            [['CURRENCY', 'PS_CURRENCY'], 'string', 'max' => 3],
            [['DELIVERY_ID'], 'string', 'max' => 50],
            [['USER_DESCRIPTION'], 'string', 'max' => 2000],
            [['PS_STATUS_CODE'], 'string', 'max' => 5],
            [['PS_STATUS_DESCRIPTION', 'PS_STATUS_MESSAGE'], 'string', 'max' => 250],
            [['PAY_VOUCHER_NUM', 'DELIVERY_DOC_NUM'], 'string', 'max' => 20],
            [['ACCOUNT_NUMBER'], 'string', 'max' => 100],
            [['ID_1C'], 'string', 'max' => 36],
            [['VERSION_1C'], 'string', 'max' => 15],
            [['BX_USER_ID'], 'string', 'max' => 32],
            [['ACCOUNT_NUMBER'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'LID' => Yii::t('app', 'Lid'),
            'PERSON_TYPE_ID' => Yii::t('app', 'Person  Type '),
            'PAYED' => Yii::t('app', 'Payed'),
            'DATE_PAYED' => Yii::t('app', 'Date  Payed'),
            'EMP_PAYED_ID' => Yii::t('app', 'Emp  Payed '),
            'CANCELED' => Yii::t('app', 'Canceled'),
            'DATE_CANCELED' => Yii::t('app', 'Date  Canceled'),
            'EMP_CANCELED_ID' => Yii::t('app', 'Emp  Canceled '),
            'REASON_CANCELED' => Yii::t('app', 'Reason  Canceled'),
            'STATUS_ID' => Yii::t('app', 'Status '),
            'DATE_STATUS' => Yii::t('app', 'Date  Status'),
            'EMP_STATUS_ID' => Yii::t('app', 'Emp  Status '),
            'PRICE_DELIVERY' => Yii::t('app', 'Price  Delivery'),
            'PRICE_PAYMENT' => Yii::t('app', 'Price  Payment'),
            'ALLOW_DELIVERY' => Yii::t('app', 'Allow  Delivery'),
            'DATE_ALLOW_DELIVERY' => Yii::t('app', 'Date  Allow  Delivery'),
            'EMP_ALLOW_DELIVERY_ID' => Yii::t('app', 'Emp  Allow  Delivery '),
            'DEDUCTED' => Yii::t('app', 'Deducted'),
            'DATE_DEDUCTED' => Yii::t('app', 'Date  Deducted'),
            'EMP_DEDUCTED_ID' => Yii::t('app', 'Emp  Deducted '),
            'REASON_UNDO_DEDUCTED' => Yii::t('app', 'Reason  Undo  Deducted'),
            'MARKED' => Yii::t('app', 'Marked'),
            'DATE_MARKED' => Yii::t('app', 'Date  Marked'),
            'EMP_MARKED_ID' => Yii::t('app', 'Emp  Marked '),
            'REASON_MARKED' => Yii::t('app', 'Reason  Marked'),
            'RESERVED' => Yii::t('app', 'Reserved'),
            'PRICE' => Yii::t('app', 'Price'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'DISCOUNT_VALUE' => Yii::t('app', 'Discount  Value'),
            'USER_ID' => Yii::t('app', 'User '),
            'PAY_SYSTEM_ID' => Yii::t('app', 'Pay  System '),
            'DELIVERY_ID' => Yii::t('app', 'Delivery '),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'USER_DESCRIPTION' => Yii::t('app', 'User  Description'),
            'ADDITIONAL_INFO' => Yii::t('app', 'Additional  Info'),
            'PS_STATUS' => Yii::t('app', 'Ps  Status'),
            'PS_STATUS_CODE' => Yii::t('app', 'Ps  Status  Code'),
            'PS_STATUS_DESCRIPTION' => Yii::t('app', 'Ps  Status  Description'),
            'PS_STATUS_MESSAGE' => Yii::t('app', 'Ps  Status  Message'),
            'PS_SUM' => Yii::t('app', 'Ps  Sum'),
            'PS_CURRENCY' => Yii::t('app', 'Ps  Currency'),
            'PS_RESPONSE_DATE' => Yii::t('app', 'Ps  Response  Date'),
            'COMMENTS' => Yii::t('app', 'Comments'),
            'TAX_VALUE' => Yii::t('app', 'Tax  Value'),
            'STAT_GID' => Yii::t('app', 'Stat  Gid'),
            'SUM_PAID' => Yii::t('app', 'Sum  Paid'),
            'RECURRING_ID' => Yii::t('app', 'Recurring '),
            'PAY_VOUCHER_NUM' => Yii::t('app', 'Pay  Voucher  Num'),
            'PAY_VOUCHER_DATE' => Yii::t('app', 'Pay  Voucher  Date'),
            'LOCKED_BY' => Yii::t('app', 'Locked  By'),
            'DATE_LOCK' => Yii::t('app', 'Date  Lock'),
            'RECOUNT_FLAG' => Yii::t('app', 'Recount  Flag'),
            'AFFILIATE_ID' => Yii::t('app', 'Affiliate '),
            'DELIVERY_DOC_NUM' => Yii::t('app', 'Delivery  Doc  Num'),
            'DELIVERY_DOC_DATE' => Yii::t('app', 'Delivery  Doc  Date'),
            'UPDATED_1C' => Yii::t('app', 'Updated 1 C'),
            'STORE_ID' => Yii::t('app', 'Store '),
            'ORDER_TOPIC' => Yii::t('app', 'Order  Topic'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'RESPONSIBLE_ID' => Yii::t('app', 'Responsible '),
            'DATE_PAY_BEFORE' => Yii::t('app', 'Date  Pay  Before'),
            'DATE_BILL' => Yii::t('app', 'Date  Bill'),
            'ACCOUNT_NUMBER' => Yii::t('app', 'Account  Number'),
            'TRACKING_NUMBER' => Yii::t('app', 'Tracking  Number'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'ID_1C' => Yii::t('app', 'Id 1 C'),
            'VERSION_1C' => Yii::t('app', 'Version 1 C'),
            'VERSION' => Yii::t('app', 'Version'),
            'EXTERNAL_ORDER' => Yii::t('app', 'External  Order'),
            'BX_USER_ID' => Yii::t('app', 'Bx  User '),
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
