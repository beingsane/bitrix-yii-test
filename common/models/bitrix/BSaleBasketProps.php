<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_basket_props".
 *
 * @property integer $ID
 * @property integer $BASKET_ID
 * @property string $NAME
 * @property string $VALUE
 * @property string $CODE
 * @property integer $SORT
 */
class BSaleBasketProps extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_basket_props';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BASKET_ID', 'NAME'], 'required'],
            [['BASKET_ID', 'SORT'], 'integer'],
            [['NAME', 'VALUE', 'CODE'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'BASKET_ID' => Yii::t('app', 'Basket '),
            'NAME' => Yii::t('app', 'Name'),
            'VALUE' => Yii::t('app', 'Value'),
            'CODE' => Yii::t('app', 'Code'),
            'SORT' => Yii::t('app', 'Sort'),
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
