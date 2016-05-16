<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_discount_coupon".
 *
 * @property integer $ID
 * @property integer $DISCOUNT_ID
 * @property string $ACTIVE
 * @property string $ACTIVE_FROM
 * @property string $ACTIVE_TO
 * @property string $COUPON
 * @property integer $TYPE
 * @property integer $MAX_USE
 * @property integer $USE_COUNT
 * @property integer $USER_ID
 * @property string $DATE_APPLY
 * @property string $TIMESTAMP_X
 * @property integer $MODIFIED_BY
 * @property string $DATE_CREATE
 * @property integer $CREATED_BY
 * @property string $DESCRIPTION
 */
class BSaleDiscountCoupon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_discount_coupon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISCOUNT_ID', 'COUPON'], 'required'],
            [['DISCOUNT_ID', 'TYPE', 'MAX_USE', 'USE_COUNT', 'USER_ID', 'MODIFIED_BY', 'CREATED_BY'], 'integer'],
            [['ACTIVE_FROM', 'ACTIVE_TO', 'DATE_APPLY', 'TIMESTAMP_X', 'DATE_CREATE'], 'safe'],
            [['DESCRIPTION'], 'string'],
            [['ACTIVE'], 'string', 'max' => 1],
            [['COUPON'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DISCOUNT_ID' => Yii::t('app', 'Discount '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'ACTIVE_FROM' => Yii::t('app', 'Active  From'),
            'ACTIVE_TO' => Yii::t('app', 'Active  To'),
            'COUPON' => Yii::t('app', 'Coupon'),
            'TYPE' => Yii::t('app', 'Type'),
            'MAX_USE' => Yii::t('app', 'Max  Use'),
            'USE_COUNT' => Yii::t('app', 'Use  Count'),
            'USER_ID' => Yii::t('app', 'User '),
            'DATE_APPLY' => Yii::t('app', 'Date  Apply'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
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
