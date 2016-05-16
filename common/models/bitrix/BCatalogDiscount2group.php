<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_discount2group".
 *
 * @property integer $ID
 * @property integer $DISCOUNT_ID
 * @property integer $GROUP_ID
 */
class BCatalogDiscount2group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_discount2group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISCOUNT_ID', 'GROUP_ID'], 'required'],
            [['DISCOUNT_ID', 'GROUP_ID'], 'integer'],
            [['GROUP_ID', 'DISCOUNT_ID'], 'unique', 'targetAttribute' => ['GROUP_ID', 'DISCOUNT_ID'], 'message' => 'The combination of Discount  and Group  has already been taken.'],
            [['DISCOUNT_ID', 'GROUP_ID'], 'unique', 'targetAttribute' => ['DISCOUNT_ID', 'GROUP_ID'], 'message' => 'The combination of Discount  and Group  has already been taken.']
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
            'GROUP_ID' => Yii::t('app', 'Group '),
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
