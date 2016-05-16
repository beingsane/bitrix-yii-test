<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_tp_map".
 *
 * @property integer $ID
 * @property integer $ENTITY_ID
 * @property string $VALUE_EXTERNAL
 * @property string $VALUE_INTERNAL
 * @property string $PARAMS
 */
class BSaleTpMap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_tp_map';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ENTITY_ID', 'VALUE_EXTERNAL', 'VALUE_INTERNAL'], 'required'],
            [['ENTITY_ID'], 'integer'],
            [['PARAMS'], 'string'],
            [['VALUE_EXTERNAL', 'VALUE_INTERNAL'], 'string', 'max' => 100],
            [['ENTITY_ID', 'VALUE_EXTERNAL', 'VALUE_INTERNAL'], 'unique', 'targetAttribute' => ['ENTITY_ID', 'VALUE_EXTERNAL', 'VALUE_INTERNAL'], 'message' => 'The combination of Entity , Value  External and Value  Internal has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'VALUE_EXTERNAL' => Yii::t('app', 'Value  External'),
            'VALUE_INTERNAL' => Yii::t('app', 'Value  Internal'),
            'PARAMS' => Yii::t('app', 'Params'),
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
