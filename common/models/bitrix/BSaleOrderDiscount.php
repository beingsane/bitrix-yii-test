<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_discount".
 *
 * @property integer $ID
 * @property string $MODULE_ID
 * @property integer $DISCOUNT_ID
 * @property string $NAME
 * @property string $DISCOUNT_HASH
 * @property string $CONDITIONS
 * @property string $UNPACK
 * @property string $ACTIONS
 * @property string $APPLICATION
 * @property string $USE_COUPONS
 * @property integer $SORT
 * @property integer $PRIORITY
 * @property string $LAST_DISCOUNT
 * @property string $ACTIONS_DESCR
 */
class BSaleOrderDiscount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_discount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MODULE_ID', 'DISCOUNT_ID', 'NAME', 'DISCOUNT_HASH', 'USE_COUPONS', 'SORT', 'PRIORITY', 'LAST_DISCOUNT'], 'required'],
            [['DISCOUNT_ID', 'SORT', 'PRIORITY'], 'integer'],
            [['CONDITIONS', 'UNPACK', 'ACTIONS', 'APPLICATION', 'ACTIONS_DESCR'], 'string'],
            [['MODULE_ID'], 'string', 'max' => 50],
            [['NAME'], 'string', 'max' => 255],
            [['DISCOUNT_HASH'], 'string', 'max' => 32],
            [['USE_COUPONS', 'LAST_DISCOUNT'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'DISCOUNT_ID' => Yii::t('app', 'Discount '),
            'NAME' => Yii::t('app', 'Name'),
            'DISCOUNT_HASH' => Yii::t('app', 'Discount  Hash'),
            'CONDITIONS' => Yii::t('app', 'Conditions'),
            'UNPACK' => Yii::t('app', 'Unpack'),
            'ACTIONS' => Yii::t('app', 'Actions'),
            'APPLICATION' => Yii::t('app', 'Application'),
            'USE_COUPONS' => Yii::t('app', 'Use  Coupons'),
            'SORT' => Yii::t('app', 'Sort'),
            'PRIORITY' => Yii::t('app', 'Priority'),
            'LAST_DISCOUNT' => Yii::t('app', 'Last  Discount'),
            'ACTIONS_DESCR' => Yii::t('app', 'Actions  Descr'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
