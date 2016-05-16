<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_tp_map_entity".
 *
 * @property integer $ID
 * @property integer $TRADING_PLATFORM_ID
 * @property string $CODE
 */
class BSaleTpMapEntity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_tp_map_entity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TRADING_PLATFORM_ID', 'CODE'], 'required'],
            [['TRADING_PLATFORM_ID'], 'integer'],
            [['CODE'], 'string', 'max' => 255],
            [['TRADING_PLATFORM_ID', 'CODE'], 'unique', 'targetAttribute' => ['TRADING_PLATFORM_ID', 'CODE'], 'message' => 'The combination of Trading  Platform  and Code has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TRADING_PLATFORM_ID' => Yii::t('app', 'Trading  Platform '),
            'CODE' => Yii::t('app', 'Code'),
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
