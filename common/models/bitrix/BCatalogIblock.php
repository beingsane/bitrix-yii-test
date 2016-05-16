<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_iblock".
 *
 * @property integer $IBLOCK_ID
 * @property string $YANDEX_EXPORT
 * @property string $SUBSCRIPTION
 * @property integer $VAT_ID
 * @property integer $PRODUCT_IBLOCK_ID
 * @property integer $SKU_PROPERTY_ID
 */
class BCatalogIblock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_iblock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ID'], 'required'],
            [['IBLOCK_ID', 'VAT_ID', 'PRODUCT_IBLOCK_ID', 'SKU_PROPERTY_ID'], 'integer'],
            [['YANDEX_EXPORT', 'SUBSCRIPTION'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'YANDEX_EXPORT' => Yii::t('app', 'Yandex  Export'),
            'SUBSCRIPTION' => Yii::t('app', 'Subscription'),
            'VAT_ID' => Yii::t('app', 'Vat '),
            'PRODUCT_IBLOCK_ID' => Yii::t('app', 'Product  Iblock '),
            'SKU_PROPERTY_ID' => Yii::t('app', 'Sku  Property '),
        ];
    }

    public function getName()
    {
        return $this->IBLOCK_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'IBLOCK_ID', 'IBLOCK_ID');
        return $list;
    }
}
