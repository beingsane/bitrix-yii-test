<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_discount_coupon".
 *
 * @property integer $ID
 * @property integer $DISCOUNT_ID
 * @property string $ACTIVE
 * @property string $COUPON
 * @property string $DATE_APPLY
 * @property string $ONE_TIME
 * @property string $TIMESTAMP_X
 * @property integer $MODIFIED_BY
 * @property string $DATE_CREATE
 * @property integer $CREATED_BY
 * @property string $DESCRIPTION
 */
class BCatalogDiscountCoupon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_discount_coupon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISCOUNT_ID', 'COUPON'], 'required'],
            [['DISCOUNT_ID', 'MODIFIED_BY', 'CREATED_BY'], 'integer'],
            [['DATE_APPLY', 'TIMESTAMP_X', 'DATE_CREATE'], 'safe'],
            [['DESCRIPTION'], 'string'],
            [['ACTIVE', 'ONE_TIME'], 'string', 'max' => 1],
            [['COUPON'], 'string', 'max' => 32],
            [['DISCOUNT_ID', 'COUPON'], 'unique', 'targetAttribute' => ['DISCOUNT_ID', 'COUPON'], 'message' => 'The combination of Discount  and Coupon has already been taken.']
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
            'COUPON' => Yii::t('app', 'Coupon'),
            'DATE_APPLY' => Yii::t('app', 'Date  Apply'),
            'ONE_TIME' => Yii::t('app', 'One  Time'),
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
