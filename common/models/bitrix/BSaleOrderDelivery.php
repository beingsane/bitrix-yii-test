<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_delivery".
 *
 * @property integer $ID
 * @property integer $ORDER_ID
 * @property string $ACCOUNT_NUMBER
 * @property string $DATE_INSERT
 * @property string $DATE_REQUEST
 * @property string $DATE_UPDATE
 * @property string $DELIVERY_LOCATION
 * @property string $PARAMS
 * @property string $STATUS_ID
 * @property string $PRICE_DELIVERY
 * @property string $DISCOUNT_PRICE
 * @property string $BASE_PRICE_DELIVERY
 * @property string $CUSTOM_PRICE_DELIVERY
 * @property string $ALLOW_DELIVERY
 * @property string $DATE_ALLOW_DELIVERY
 * @property integer $EMP_ALLOW_DELIVERY_ID
 * @property string $DEDUCTED
 * @property string $DATE_DEDUCTED
 * @property integer $EMP_DEDUCTED_ID
 * @property string $REASON_UNDO_DEDUCTED
 * @property string $RESERVED
 * @property integer $DELIVERY_ID
 * @property string $DELIVERY_DOC_NUM
 * @property string $DELIVERY_DOC_DATE
 * @property string $TRACKING_NUMBER
 * @property string $XML_ID
 * @property string $DELIVERY_NAME
 * @property string $CANCELED
 * @property string $DATE_CANCELED
 * @property integer $EMP_CANCELED_ID
 * @property string $REASON_CANCELED
 * @property string $MARKED
 * @property string $DATE_MARKED
 * @property integer $EMP_MARKED_ID
 * @property string $REASON_MARKED
 * @property string $CURRENCY
 * @property string $SYSTEM
 * @property integer $RESPONSIBLE_ID
 * @property integer $EMP_RESPONSIBLE_ID
 * @property string $DATE_RESPONSIBLE_ID
 * @property string $COMMENTS
 * @property integer $COMPANY_ID
 * @property integer $TRACKING_STATUS
 * @property string $TRACKING_DESCRIPTION
 * @property string $TRACKING_LAST_CHECK
 * @property string $TRACKING_LAST_CHANGE
 * @property string $ID_1C
 * @property string $VERSION_1C
 * @property string $EXTERNAL_DELIVERY
 * @property string $UPDATED_1C
 */
class BSaleOrderDelivery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_delivery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'DATE_INSERT', 'STATUS_ID', 'DELIVERY_ID'], 'required'],
            [['ORDER_ID', 'EMP_ALLOW_DELIVERY_ID', 'EMP_DEDUCTED_ID', 'DELIVERY_ID', 'EMP_CANCELED_ID', 'EMP_MARKED_ID', 'RESPONSIBLE_ID', 'EMP_RESPONSIBLE_ID', 'COMPANY_ID', 'TRACKING_STATUS'], 'integer'],
            [['DATE_INSERT', 'DATE_REQUEST', 'DATE_UPDATE', 'DATE_ALLOW_DELIVERY', 'DATE_DEDUCTED', 'DELIVERY_DOC_DATE', 'DATE_CANCELED', 'DATE_MARKED', 'DATE_RESPONSIBLE_ID', 'TRACKING_LAST_CHECK', 'TRACKING_LAST_CHANGE'], 'safe'],
            [['PARAMS', 'COMMENTS'], 'string'],
            [['PRICE_DELIVERY', 'DISCOUNT_PRICE', 'BASE_PRICE_DELIVERY'], 'number'],
            [['ACCOUNT_NUMBER'], 'string', 'max' => 100],
            [['DELIVERY_LOCATION'], 'string', 'max' => 50],
            [['STATUS_ID'], 'string', 'max' => 2],
            [['CUSTOM_PRICE_DELIVERY', 'ALLOW_DELIVERY', 'DEDUCTED', 'RESERVED', 'CANCELED', 'MARKED', 'SYSTEM', 'EXTERNAL_DELIVERY', 'UPDATED_1C'], 'string', 'max' => 1],
            [['REASON_UNDO_DEDUCTED', 'TRACKING_NUMBER', 'XML_ID', 'REASON_CANCELED', 'REASON_MARKED', 'TRACKING_DESCRIPTION'], 'string', 'max' => 255],
            [['DELIVERY_DOC_NUM'], 'string', 'max' => 20],
            [['DELIVERY_NAME'], 'string', 'max' => 128],
            [['CURRENCY'], 'string', 'max' => 3],
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
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
            'DATE_REQUEST' => Yii::t('app', 'Date  Request'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'DELIVERY_LOCATION' => Yii::t('app', 'Delivery  Location'),
            'PARAMS' => Yii::t('app', 'Params'),
            'STATUS_ID' => Yii::t('app', 'Status '),
            'PRICE_DELIVERY' => Yii::t('app', 'Price  Delivery'),
            'DISCOUNT_PRICE' => Yii::t('app', 'Discount  Price'),
            'BASE_PRICE_DELIVERY' => Yii::t('app', 'Base  Price  Delivery'),
            'CUSTOM_PRICE_DELIVERY' => Yii::t('app', 'Custom  Price  Delivery'),
            'ALLOW_DELIVERY' => Yii::t('app', 'Allow  Delivery'),
            'DATE_ALLOW_DELIVERY' => Yii::t('app', 'Date  Allow  Delivery'),
            'EMP_ALLOW_DELIVERY_ID' => Yii::t('app', 'Emp  Allow  Delivery '),
            'DEDUCTED' => Yii::t('app', 'Deducted'),
            'DATE_DEDUCTED' => Yii::t('app', 'Date  Deducted'),
            'EMP_DEDUCTED_ID' => Yii::t('app', 'Emp  Deducted '),
            'REASON_UNDO_DEDUCTED' => Yii::t('app', 'Reason  Undo  Deducted'),
            'RESERVED' => Yii::t('app', 'Reserved'),
            'DELIVERY_ID' => Yii::t('app', 'Delivery '),
            'DELIVERY_DOC_NUM' => Yii::t('app', 'Delivery  Doc  Num'),
            'DELIVERY_DOC_DATE' => Yii::t('app', 'Delivery  Doc  Date'),
            'TRACKING_NUMBER' => Yii::t('app', 'Tracking  Number'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'DELIVERY_NAME' => Yii::t('app', 'Delivery  Name'),
            'CANCELED' => Yii::t('app', 'Canceled'),
            'DATE_CANCELED' => Yii::t('app', 'Date  Canceled'),
            'EMP_CANCELED_ID' => Yii::t('app', 'Emp  Canceled '),
            'REASON_CANCELED' => Yii::t('app', 'Reason  Canceled'),
            'MARKED' => Yii::t('app', 'Marked'),
            'DATE_MARKED' => Yii::t('app', 'Date  Marked'),
            'EMP_MARKED_ID' => Yii::t('app', 'Emp  Marked '),
            'REASON_MARKED' => Yii::t('app', 'Reason  Marked'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'SYSTEM' => Yii::t('app', 'System'),
            'RESPONSIBLE_ID' => Yii::t('app', 'Responsible '),
            'EMP_RESPONSIBLE_ID' => Yii::t('app', 'Emp  Responsible '),
            'DATE_RESPONSIBLE_ID' => Yii::t('app', 'Date  Responsible '),
            'COMMENTS' => Yii::t('app', 'Comments'),
            'COMPANY_ID' => Yii::t('app', 'Company '),
            'TRACKING_STATUS' => Yii::t('app', 'Tracking  Status'),
            'TRACKING_DESCRIPTION' => Yii::t('app', 'Tracking  Description'),
            'TRACKING_LAST_CHECK' => Yii::t('app', 'Tracking  Last  Check'),
            'TRACKING_LAST_CHANGE' => Yii::t('app', 'Tracking  Last  Change'),
            'ID_1C' => Yii::t('app', 'Id 1 C'),
            'VERSION_1C' => Yii::t('app', 'Version 1 C'),
            'EXTERNAL_DELIVERY' => Yii::t('app', 'External  Delivery'),
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
