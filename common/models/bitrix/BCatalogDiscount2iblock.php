<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_discount2iblock".
 *
 * @property integer $ID
 * @property integer $DISCOUNT_ID
 * @property integer $IBLOCK_ID
 */
class BCatalogDiscount2iblock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_discount2iblock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISCOUNT_ID', 'IBLOCK_ID'], 'required'],
            [['DISCOUNT_ID', 'IBLOCK_ID'], 'integer'],
            [['IBLOCK_ID', 'DISCOUNT_ID'], 'unique', 'targetAttribute' => ['IBLOCK_ID', 'DISCOUNT_ID'], 'message' => 'The combination of Discount  and Iblock  has already been taken.'],
            [['DISCOUNT_ID', 'IBLOCK_ID'], 'unique', 'targetAttribute' => ['DISCOUNT_ID', 'IBLOCK_ID'], 'message' => 'The combination of Discount  and Iblock  has already been taken.']
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
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
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
