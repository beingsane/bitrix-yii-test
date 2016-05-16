<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_discount".
 *
 * @property integer $ID
 * @property string $XML_ID
 * @property string $SITE_ID
 * @property integer $TYPE
 * @property string $ACTIVE
 * @property string $ACTIVE_FROM
 * @property string $ACTIVE_TO
 * @property string $RENEWAL
 * @property string $NAME
 * @property integer $MAX_USES
 * @property integer $COUNT_USES
 * @property string $COUPON
 * @property integer $SORT
 * @property string $MAX_DISCOUNT
 * @property string $VALUE_TYPE
 * @property string $VALUE
 * @property string $CURRENCY
 * @property string $MIN_ORDER_SUM
 * @property string $TIMESTAMP_X
 * @property string $COUNT_PERIOD
 * @property integer $COUNT_SIZE
 * @property string $COUNT_TYPE
 * @property string $COUNT_FROM
 * @property string $COUNT_TO
 * @property integer $ACTION_SIZE
 * @property string $ACTION_TYPE
 * @property integer $MODIFIED_BY
 * @property string $DATE_CREATE
 * @property integer $CREATED_BY
 * @property integer $PRIORITY
 * @property string $LAST_DISCOUNT
 * @property integer $VERSION
 * @property string $NOTES
 * @property string $CONDITIONS
 * @property string $UNPACK
 */
class BCatalogDiscount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_discount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITE_ID', 'CURRENCY', 'TIMESTAMP_X'], 'required'],
            [['TYPE', 'MAX_USES', 'COUNT_USES', 'SORT', 'COUNT_SIZE', 'ACTION_SIZE', 'MODIFIED_BY', 'CREATED_BY', 'PRIORITY', 'VERSION'], 'integer'],
            [['ACTIVE_FROM', 'ACTIVE_TO', 'TIMESTAMP_X', 'COUNT_FROM', 'COUNT_TO', 'DATE_CREATE'], 'safe'],
            [['MAX_DISCOUNT', 'VALUE', 'MIN_ORDER_SUM'], 'number'],
            [['CONDITIONS', 'UNPACK'], 'string'],
            [['XML_ID', 'NAME', 'NOTES'], 'string', 'max' => 255],
            [['SITE_ID'], 'string', 'max' => 2],
            [['ACTIVE', 'RENEWAL', 'VALUE_TYPE', 'COUNT_PERIOD', 'COUNT_TYPE', 'ACTION_TYPE', 'LAST_DISCOUNT'], 'string', 'max' => 1],
            [['COUPON'], 'string', 'max' => 20],
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
            'XML_ID' => Yii::t('app', 'Xml '),
            'SITE_ID' => Yii::t('app', 'Site '),
            'TYPE' => Yii::t('app', 'Type'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'ACTIVE_FROM' => Yii::t('app', 'Active  From'),
            'ACTIVE_TO' => Yii::t('app', 'Active  To'),
            'RENEWAL' => Yii::t('app', 'Renewal'),
            'NAME' => Yii::t('app', 'Name'),
            'MAX_USES' => Yii::t('app', 'Max  Uses'),
            'COUNT_USES' => Yii::t('app', 'Count  Uses'),
            'COUPON' => Yii::t('app', 'Coupon'),
            'SORT' => Yii::t('app', 'Sort'),
            'MAX_DISCOUNT' => Yii::t('app', 'Max  Discount'),
            'VALUE_TYPE' => Yii::t('app', 'Value  Type'),
            'VALUE' => Yii::t('app', 'Value'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'MIN_ORDER_SUM' => Yii::t('app', 'Min  Order  Sum'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'COUNT_PERIOD' => Yii::t('app', 'Count  Period'),
            'COUNT_SIZE' => Yii::t('app', 'Count  Size'),
            'COUNT_TYPE' => Yii::t('app', 'Count  Type'),
            'COUNT_FROM' => Yii::t('app', 'Count  From'),
            'COUNT_TO' => Yii::t('app', 'Count  To'),
            'ACTION_SIZE' => Yii::t('app', 'Action  Size'),
            'ACTION_TYPE' => Yii::t('app', 'Action  Type'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'PRIORITY' => Yii::t('app', 'Priority'),
            'LAST_DISCOUNT' => Yii::t('app', 'Last  Discount'),
            'VERSION' => Yii::t('app', 'Version'),
            'NOTES' => Yii::t('app', 'Notes'),
            'CONDITIONS' => Yii::t('app', 'Conditions'),
            'UNPACK' => Yii::t('app', 'Unpack'),
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
