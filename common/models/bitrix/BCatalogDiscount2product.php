<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_discount2product".
 *
 * @property integer $ID
 * @property integer $DISCOUNT_ID
 * @property integer $PRODUCT_ID
 */
class BCatalogDiscount2product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_discount2product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISCOUNT_ID', 'PRODUCT_ID'], 'required'],
            [['DISCOUNT_ID', 'PRODUCT_ID'], 'integer'],
            [['PRODUCT_ID', 'DISCOUNT_ID'], 'unique', 'targetAttribute' => ['PRODUCT_ID', 'DISCOUNT_ID'], 'message' => 'The combination of Discount  and Product  has already been taken.'],
            [['DISCOUNT_ID', 'PRODUCT_ID'], 'unique', 'targetAttribute' => ['DISCOUNT_ID', 'PRODUCT_ID'], 'message' => 'The combination of Discount  and Product  has already been taken.']
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
            'PRODUCT_ID' => Yii::t('app', 'Product '),
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
