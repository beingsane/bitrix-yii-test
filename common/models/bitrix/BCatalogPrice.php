<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_price".
 *
 * @property integer $ID
 * @property integer $PRODUCT_ID
 * @property integer $EXTRA_ID
 * @property integer $CATALOG_GROUP_ID
 * @property string $PRICE
 * @property string $CURRENCY
 * @property string $TIMESTAMP_X
 * @property integer $QUANTITY_FROM
 * @property integer $QUANTITY_TO
 * @property string $TMP_ID
 * @property string $PRICE_SCALE
 */
class BCatalogPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PRODUCT_ID', 'CATALOG_GROUP_ID', 'PRICE', 'CURRENCY', 'TIMESTAMP_X'], 'required'],
            [['PRODUCT_ID', 'EXTRA_ID', 'CATALOG_GROUP_ID', 'QUANTITY_FROM', 'QUANTITY_TO'], 'integer'],
            [['PRICE', 'PRICE_SCALE'], 'number'],
            [['TIMESTAMP_X'], 'safe'],
            [['CURRENCY'], 'string', 'max' => 3],
            [['TMP_ID'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PRODUCT_ID' => Yii::t('app', 'Product '),
            'EXTRA_ID' => Yii::t('app', 'Extra '),
            'CATALOG_GROUP_ID' => Yii::t('app', 'Catalog  Group '),
            'PRICE' => Yii::t('app', 'Price'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'QUANTITY_FROM' => Yii::t('app', 'Quantity  From'),
            'QUANTITY_TO' => Yii::t('app', 'Quantity  To'),
            'TMP_ID' => Yii::t('app', 'Tmp '),
            'PRICE_SCALE' => Yii::t('app', 'Price  Scale'),
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
