<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_payment".
 *
 * @property integer $ID
 * @property integer $ORDER_ID
 * @property string $ACCOUNT_NUMBER
 * @property string $PAID
 * @property string $DATE_PAID
 * @property integer $EMP_PAID_ID
 * @property integer $PAY_SYSTEM_ID
 * @property string $PS_STATUS
 * @property string $PS_INVOICE_ID
 * @property string $PS_STATUS_CODE
 * @property string $PS_STATUS_DESCRIPTION
 * @property string $PS_STATUS_MESSAGE
 * @property string $PS_SUM
 * @property string $PS_CURRENCY
 * @property string $PS_RESPONSE_DATE
 * @property string $PAY_VOUCHER_NUM
 * @property string $PAY_VOUCHER_DATE
 * @property string $DATE_PAY_BEFORE
 * @property string $DATE_BILL
 * @property string $XML_ID
 * @property string $SUM
 * @property string $PRICE_COD
 * @property string $CURRENCY
 * @property string $PAY_SYSTEM_NAME
 * @property integer $RESPONSIBLE_ID
 * @property string $DATE_RESPONSIBLE_ID
 * @property integer $EMP_RESPONSIBLE_ID
 * @property string $COMMENTS
 * @property integer $COMPANY_ID
 * @property string $PAY_RETURN_DATE
 * @property integer $EMP_RETURN_ID
 * @property string $PAY_RETURN_NUM
 * @property string $PAY_RETURN_COMMENT
 * @property string $IS_RETURN
 * @property string $ID_1C
 * @property string $VERSION_1C
 * @property string $EXTERNAL_PAYMENT
 * @property string $UPDATED_1C
 */
class BSaleOrderPayment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'PAY_SYSTEM_ID', 'SUM', 'CURRENCY', 'PAY_SYSTEM_NAME'], 'required'],
            [['ORDER_ID', 'EMP_PAID_ID', 'PAY_SYSTEM_ID', 'RESPONSIBLE_ID', 'EMP_RESPONSIBLE_ID', 'COMPANY_ID', 'EMP_RETURN_ID'], 'integer'],
            [['DATE_PAID', 'PS_RESPONSE_DATE', 'PAY_VOUCHER_DATE', 'DATE_PAY_BEFORE', 'DATE_BILL', 'DATE_RESPONSIBLE_ID', 'PAY_RETURN_DATE'], 'safe'],
            [['PS_SUM', 'SUM', 'PRICE_COD'], 'number'],
            [['COMMENTS', 'PAY_RETURN_COMMENT'], 'string'],
            [['ACCOUNT_NUMBER'], 'string', 'max' => 100],
            [['PAID', 'PS_STATUS', 'IS_RETURN', 'EXTERNAL_PAYMENT', 'UPDATED_1C'], 'string', 'max' => 1],
            [['PS_INVOICE_ID', 'PS_STATUS_DESCRIPTION', 'PS_STATUS_MESSAGE'], 'string', 'max' => 250],
            [['PS_STATUS_CODE', 'XML_ID'], 'string', 'max' => 255],
            [['PS_CURRENCY', 'CURRENCY'], 'string', 'max' => 3],
            [['PAY_VOUCHER_NUM', 'PAY_RETURN_NUM'], 'string', 'max' => 20],
            [['PAY_SYSTEM_NAME'], 'string', 'max' => 128],
            [['ID_1C'], 'string', 'max' => 36],
            [['VERSION_1C'], 'string', 'max' => 15],
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
            'ORDER_ID' => Yii::t('app', 'Order '),
            'ACCOUNT_NUMBER' => Yii::t('app', 'Account  Number'),
            'PAID' => Yii::t('app', 'Paid'),
            'DATE_PAID' => Yii::t('app', 'Date  Paid'),
            'EMP_PAID_ID' => Yii::t('app', 'Emp  Paid '),
            'PAY_SYSTEM_ID' => Yii::t('app', 'Pay  System '),
            'PS_STATUS' => Yii::t('app', 'Ps  Status'),
            'PS_INVOICE_ID' => Yii::t('app', 'Ps  Invoice '),
            'PS_STATUS_CODE' => Yii::t('app', 'Ps  Status  Code'),
            'PS_STATUS_DESCRIPTION' => Yii::t('app', 'Ps  Status  Description'),
            'PS_STATUS_MESSAGE' => Yii::t('app', 'Ps  Status  Message'),
            'PS_SUM' => Yii::t('app', 'Ps  Sum'),
            'PS_CURRENCY' => Yii::t('app', 'Ps  Currency'),
            'PS_RESPONSE_DATE' => Yii::t('app', 'Ps  Response  Date'),
            'PAY_VOUCHER_NUM' => Yii::t('app', 'Pay  Voucher  Num'),
            'PAY_VOUCHER_DATE' => Yii::t('app', 'Pay  Voucher  Date'),
            'DATE_PAY_BEFORE' => Yii::t('app', 'Date  Pay  Before'),
            'DATE_BILL' => Yii::t('app', 'Date  Bill'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'SUM' => Yii::t('app', 'Sum'),
            'PRICE_COD' => Yii::t('app', 'Price  Cod'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'PAY_SYSTEM_NAME' => Yii::t('app', 'Pay  System  Name'),
            'RESPONSIBLE_ID' => Yii::t('app', 'Responsible '),
            'DATE_RESPONSIBLE_ID' => Yii::t('app', 'Date  Responsible '),
            'EMP_RESPONSIBLE_ID' => Yii::t('app', 'Emp  Responsible '),
            'COMMENTS' => Yii::t('app', 'Comments'),
            'COMPANY_ID' => Yii::t('app', 'Company '),
            'PAY_RETURN_DATE' => Yii::t('app', 'Pay  Return  Date'),
            'EMP_RETURN_ID' => Yii::t('app', 'Emp  Return '),
            'PAY_RETURN_NUM' => Yii::t('app', 'Pay  Return  Num'),
            'PAY_RETURN_COMMENT' => Yii::t('app', 'Pay  Return  Comment'),
            'IS_RETURN' => Yii::t('app', 'Is  Return'),
            'ID_1C' => Yii::t('app', 'Id 1 C'),
            'VERSION_1C' => Yii::t('app', 'Version 1 C'),
            'EXTERNAL_PAYMENT' => Yii::t('app', 'External  Payment'),
            'UPDATED_1C' => Yii::t('app', 'Updated 1 C'),
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
