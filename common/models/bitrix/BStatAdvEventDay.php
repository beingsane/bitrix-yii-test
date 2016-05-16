<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_adv_event_day".
 *
 * @property integer $ID
 * @property integer $ADV_ID
 * @property integer $EVENT_ID
 * @property string $DATE_STAT
 * @property integer $COUNTER
 * @property integer $COUNTER_BACK
 * @property string $MONEY
 * @property string $MONEY_BACK
 */
class BStatAdvEventDay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_adv_event_day';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ADV_ID', 'EVENT_ID', 'COUNTER', 'COUNTER_BACK'], 'integer'],
            [['DATE_STAT'], 'safe'],
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
            'DATE_STAT' => Yii::t('app', 'Date  Stat'),
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
