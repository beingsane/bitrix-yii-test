<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_props_variant".
 *
 * @property integer $ID
 * @property integer $ORDER_PROPS_ID
 * @property string $NAME
 * @property string $VALUE
 * @property integer $SORT
 * @property string $DESCRIPTION
 */
class BSaleOrderPropsVariant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_props_variant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_PROPS_ID', 'NAME'], 'required'],
            [['ORDER_PROPS_ID', 'SORT'], 'integer'],
            [['NAME', 'VALUE', 'DESCRIPTION'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ORDER_PROPS_ID' => Yii::t('app', 'Order  Props '),
            'NAME' => Yii::t('app', 'Name'),
            'VALUE' => Yii::t('app', 'Value'),
            'SORT' => Yii::t('app', 'Sort'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
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
