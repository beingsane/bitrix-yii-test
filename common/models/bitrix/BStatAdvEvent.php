<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_adv_event".
 *
 * @property integer $ID
 * @property integer $ADV_ID
 * @property integer $EVENT_ID
 * @property integer $COUNTER
 * @property integer $COUNTER_BACK
 * @property string $MONEY
 * @property string $MONEY_BACK
 */
class BStatAdvEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_adv_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ADV_ID', 'EVENT_ID', 'COUNTER', 'COUNTER_BACK'], 'integer'],
            [['MONEY', 'MONEY_BACK'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ADV_ID' => Yii::t('app', 'Adv '),
            'EVENT_ID' => Yii::t('app', 'Event '),
            'COUNTER' => Yii::t('app', 'Counter'),
            'COUNTER_BACK' => Yii::t('app', 'Counter  Back'),
            'MONEY' => Yii::t('app', 'Money'),
            'MONEY_BACK' => Yii::t('app', 'Money  Back'),
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
