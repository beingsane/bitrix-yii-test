<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_discount_group".
 *
 * @property integer $ID
 * @property integer $DISCOUNT_ID
 * @property string $ACTIVE
 * @property integer $GROUP_ID
 */
class BSaleDiscountGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_discount_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISCOUNT_ID', 'GROUP_ID'], 'required'],
            [['DISCOUNT_ID', 'GROUP_ID'], 'integer'],
            [['ACTIVE'], 'string', 'max' => 1],
            [['DISCOUNT_ID', 'GROUP_ID'], 'unique', 'targetAttribute' => ['DISCOUNT_ID', 'GROUP_ID'], 'message' => 'The combination of Discount  and Group  has already been taken.'],
            [['GROUP_ID', 'DISCOUNT_ID'], 'unique', 'targetAttribute' => ['GROUP_ID', 'DISCOUNT_ID'], 'message' => 'The combination of Discount  and Group  has already been taken.']
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
            'ACTIVE' => Yii::t('app', 'Active'),
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
