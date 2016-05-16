<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_props_value".
 *
 * @property integer $ID
 * @property integer $ORDER_ID
 * @property integer $ORDER_PROPS_ID
 * @property string $NAME
 * @property string $VALUE
 * @property string $CODE
 */
class BSaleOrderPropsValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_props_value';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'NAME'], 'required'],
            [['ORDER_ID', 'ORDER_PROPS_ID'], 'integer'],
            [['NAME'], 'string', 'max' => 255],
            [['VALUE'], 'string', 'max' => 500],
            [['CODE'], 'string', 'max' => 50],
            [['ORDER_ID', 'ORDER_PROPS_ID'], 'unique', 'targetAttribute' => ['ORDER_ID', 'ORDER_PROPS_ID'], 'message' => 'The combination of Order  and Order  Props  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ORDER_ID' => Yii::t('app', 'Order '),
            'ORDER_PROPS_ID' => Yii::t('app', 'Order  Props '),
            'NAME' => Yii::t('app', 'Name'),
            'VALUE' => Yii::t('app', 'Value'),
            'CODE' => Yii::t('app', 'Code'),
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
