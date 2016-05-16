<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_store_product".
 *
 * @property integer $ID
 * @property integer $PRODUCT_ID
 * @property double $AMOUNT
 * @property integer $STORE_ID
 */
class BCatalogStoreProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_store_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PRODUCT_ID', 'STORE_ID'], 'required'],
            [['PRODUCT_ID', 'STORE_ID'], 'integer'],
            [['AMOUNT'], 'number'],
            [['PRODUCT_ID', 'STORE_ID'], 'unique', 'targetAttribute' => ['PRODUCT_ID', 'STORE_ID'], 'message' => 'The combination of Product  and Store  has already been taken.']
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
            'AMOUNT' => Yii::t('app', 'Amount'),
            'STORE_ID' => Yii::t('app', 'Store '),
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
