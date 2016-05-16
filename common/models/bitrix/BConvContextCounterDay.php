<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_conv_context_counter_day".
 *
 * @property string $DAY
 * @property string $CONTEXT_ID
 * @property string $NAME
 * @property double $VALUE
 */
class BConvContextCounterDay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_conv_context_counter_day';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DAY', 'CONTEXT_ID', 'NAME', 'VALUE'], 'required'],
            [['DAY'], 'safe'],
            [['CONTEXT_ID'], 'integer'],
            [['VALUE'], 'number'],
            [['NAME'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DAY' => Yii::t('app', 'Day'),
            'CONTEXT_ID' => Yii::t('app', 'Context '),
            'NAME' => Yii::t('app', 'Name'),
            'VALUE' => Yii::t('app', 'Value'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'DAY', 'NAME');
        return $list;
    }
}
