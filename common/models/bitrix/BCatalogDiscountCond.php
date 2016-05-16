<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_discount_cond".
 *
 * @property integer $ID
 * @property integer $DISCOUNT_ID
 * @property string $ACTIVE
 * @property integer $USER_GROUP_ID
 * @property integer $PRICE_TYPE_ID
 */
class BCatalogDiscountCond extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_discount_cond';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISCOUNT_ID'], 'required'],
            [['DISCOUNT_ID', 'USER_GROUP_ID', 'PRICE_TYPE_ID'], 'integer'],
            [['ACTIVE'], 'string', 'max' => 1]
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
            'USER_GROUP_ID' => Yii::t('app', 'User  Group '),
            'PRICE_TYPE_ID' => Yii::t('app', 'Price  Type '),
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
