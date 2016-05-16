<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_conv_context_entity_item".
 *
 * @property string $ENTITY
 * @property string $ITEM
 * @property string $CONTEXT_ID
 */
class BConvContextEntityItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_conv_context_entity_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ENTITY', 'ITEM', 'CONTEXT_ID'], 'required'],
            [['CONTEXT_ID'], 'integer'],
            [['ENTITY', 'ITEM'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ENTITY' => Yii::t('app', 'Entity'),
            'ITEM' => Yii::t('app', 'Item'),
            'CONTEXT_ID' => Yii::t('app', 'Context '),
        ];
    }

    public function getName()
    {
        return $this->ENTITY;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ENTITY', 'ENTITY');
        return $list;
    }
}
