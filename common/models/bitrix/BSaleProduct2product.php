<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_product2product".
 *
 * @property integer $ID
 * @property integer $PRODUCT_ID
 * @property integer $PARENT_PRODUCT_ID
 * @property integer $CNT
 */
class BSaleProduct2product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_product2product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PRODUCT_ID', 'PARENT_PRODUCT_ID', 'CNT'], 'required'],
            [['PRODUCT_ID', 'PARENT_PRODUCT_ID', 'CNT'], 'integer']
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
            'PARENT_PRODUCT_ID' => Yii::t('app', 'Parent  Product '),
            'CNT' => Yii::t('app', 'Cnt'),
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
