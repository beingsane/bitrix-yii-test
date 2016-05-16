<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_gift_related_data".
 *
 * @property integer $ID
 * @property integer $DISCOUNT_ID
 * @property integer $ELEMENT_ID
 * @property integer $SECTION_ID
 * @property integer $MAIN_PRODUCT_SECTION_ID
 */
class BSaleGiftRelatedData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_gift_related_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISCOUNT_ID'], 'required'],
            [['DISCOUNT_ID', 'ELEMENT_ID', 'SECTION_ID', 'MAIN_PRODUCT_SECTION_ID'], 'integer']
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
            'ELEMENT_ID' => Yii::t('app', 'Element '),
            'SECTION_ID' => Yii::t('app', 'Section '),
            'MAIN_PRODUCT_SECTION_ID' => Yii::t('app', 'Main  Product  Section '),
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
