<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_discount2section".
 *
 * @property integer $ID
 * @property integer $DISCOUNT_ID
 * @property integer $SECTION_ID
 */
class BCatalogDiscount2section extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_discount2section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISCOUNT_ID', 'SECTION_ID'], 'required'],
            [['DISCOUNT_ID', 'SECTION_ID'], 'integer'],
            [['SECTION_ID', 'DISCOUNT_ID'], 'unique', 'targetAttribute' => ['SECTION_ID', 'DISCOUNT_ID'], 'message' => 'The combination of Discount  and Section  has already been taken.'],
            [['DISCOUNT_ID', 'SECTION_ID'], 'unique', 'targetAttribute' => ['DISCOUNT_ID', 'SECTION_ID'], 'message' => 'The combination of Discount  and Section  has already been taken.']
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
            'SECTION_ID' => Yii::t('app', 'Section '),
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
