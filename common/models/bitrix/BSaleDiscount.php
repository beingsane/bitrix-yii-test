<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_discount".
 *
 * @property integer $ID
 * @property string $XML_ID
 * @property string $LID
 * @property string $NAME
 * @property string $PRICE_FROM
 * @property string $PRICE_TO
 * @property string $CURRENCY
 * @property string $DISCOUNT_VALUE
 * @property string $DISCOUNT_TYPE
 * @property string $ACTIVE
 * @property integer $SORT
 * @property string $ACTIVE_FROM
 * @property string $ACTIVE_TO
 * @property string $TIMESTAMP_X
 * @property integer $MODIFIED_BY
 * @property string $DATE_CREATE
 * @property integer $CREATED_BY
 * @property integer $PRIORITY
 * @property string $LAST_DISCOUNT
 * @property integer $VERSION
 * @property string $CONDITIONS
 * @property string $UNPACK
 * @property string $ACTIONS
 * @property string $APPLICATION
 * @property string $USE_COUPONS
 * @property string $EXECUTE_MODULE
 */
class BSaleDiscount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_discount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LID', 'DISCOUNT_VALUE'], 'required'],
            [['PRICE_FROM', 'PRICE_TO', 'DISCOUNT_VALUE'], 'number'],
            [['SORT', 'MODIFIED_BY', 'CREATED_BY', 'PRIORITY', 'VERSION'], 'integer'],
            [['ACTIVE_FROM', 'ACTIVE_TO', 'TIMESTAMP_X', 'DATE_CREATE'], 'safe'],
            [['CONDITIONS', 'UNPACK', 'ACTIONS', 'APPLICATION'], 'string'],
            [['XML_ID', 'NAME'], 'string', 'max' => 255],
            [['LID'], 'string', 'max' => 2],
            [['CURRENCY'], 'string', 'max' => 3],
            [['DISCOUNT_TYPE', 'ACTIVE', 'LAST_DISCOUNT', 'USE_COUPONS'], 'string', 'max' => 1],
            [['EXECUTE_MODULE'], 'string', 'max' => 50]
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
            'LID' => Yii::t('app', 'Lid'),
            'NAME' => Yii::t('app', 'Name'),
            'PRICE_FROM' => Yii::t('app', 'Price  From'),
            'PRICE_TO' => Yii::t('app', 'Price  To'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'DISCOUNT_VALUE' => Yii::t('app', 'Discount  Value'),
            'DISCOUNT_TYPE' => Yii::t('app', 'Discount  Type'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SORT' => Yii::t('app', 'Sort'),
            'ACTIVE_FROM' => Yii::t('app', 'Active  From'),
            'ACTIVE_TO' => Yii::t('app', 'Active  To'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'PRIORITY' => Yii::t('app', 'Priority'),
            'LAST_DISCOUNT' => Yii::t('app', 'Last  Discount'),
            'VERSION' => Yii::t('app', 'Version'),
            'CONDITIONS' => Yii::t('app', 'Conditions'),
            'UNPACK' => Yii::t('app', 'Unpack'),
            'ACTIONS' => Yii::t('app', 'Actions'),
            'APPLICATION' => Yii::t('app', 'Application'),
            'USE_COUPONS' => Yii::t('app', 'Use  Coupons'),
            'EXECUTE_MODULE' => Yii::t('app', 'Execute  Module'),
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
