<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_store_barcode".
 *
 * @property integer $ID
 * @property integer $PRODUCT_ID
 * @property string $BARCODE
 * @property integer $STORE_ID
 * @property integer $ORDER_ID
 * @property string $DATE_MODIFY
 * @property string $DATE_CREATE
 * @property integer $CREATED_BY
 * @property integer $MODIFIED_BY
 */
class BCatalogStoreBarcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_store_barcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PRODUCT_ID'], 'required'],
            [['PRODUCT_ID', 'STORE_ID', 'ORDER_ID', 'CREATED_BY', 'MODIFIED_BY'], 'integer'],
            [['DATE_MODIFY', 'DATE_CREATE'], 'safe'],
            [['BARCODE'], 'string', 'max' => 100],
            [['BARCODE'], 'unique']
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
            'BARCODE' => Yii::t('app', 'Barcode'),
            'STORE_ID' => Yii::t('app', 'Store '),
            'ORDER_ID' => Yii::t('app', 'Order '),
            'DATE_MODIFY' => Yii::t('app', 'Date  Modify'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
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
