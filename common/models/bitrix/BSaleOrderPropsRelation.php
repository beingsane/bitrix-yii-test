<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_props_relation".
 *
 * @property integer $PROPERTY_ID
 * @property string $ENTITY_ID
 * @property string $ENTITY_TYPE
 */
class BSaleOrderPropsRelation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_props_relation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PROPERTY_ID', 'ENTITY_ID', 'ENTITY_TYPE'], 'required'],
            [['PROPERTY_ID'], 'integer'],
            [['ENTITY_ID'], 'string', 'max' => 35],
            [['ENTITY_TYPE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PROPERTY_ID' => Yii::t('app', 'Property '),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'ENTITY_TYPE' => Yii::t('app', 'Entity  Type'),
        ];
    }

    public function getName()
    {
        return $this->PROPERTY_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'PROPERTY_ID', 'PROPERTY_ID');
        return $list;
    }
}
