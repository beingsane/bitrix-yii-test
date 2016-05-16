<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_discount2cat".
 *
 * @property integer $ID
 * @property integer $DISCOUNT_ID
 * @property integer $CATALOG_GROUP_ID
 */
class BCatalogDiscount2cat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_discount2cat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISCOUNT_ID', 'CATALOG_GROUP_ID'], 'required'],
            [['DISCOUNT_ID', 'CATALOG_GROUP_ID'], 'integer'],
            [['CATALOG_GROUP_ID', 'DISCOUNT_ID'], 'unique', 'targetAttribute' => ['CATALOG_GROUP_ID', 'DISCOUNT_ID'], 'message' => 'The combination of Discount  and Catalog  Group  has already been taken.'],
            [['DISCOUNT_ID', 'CATALOG_GROUP_ID'], 'unique', 'targetAttribute' => ['DISCOUNT_ID', 'CATALOG_GROUP_ID'], 'message' => 'The combination of Discount  and Catalog  Group  has already been taken.']
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
            'CATALOG_GROUP_ID' => Yii::t('app', 'Catalog  Group '),
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
