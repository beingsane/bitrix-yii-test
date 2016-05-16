<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_sla_shedule".
 *
 * @property integer $ID
 * @property integer $SLA_ID
 * @property integer $WEEKDAY_NUMBER
 * @property string $OPEN_TIME
 * @property integer $MINUTE_FROM
 * @property integer $MINUTE_TILL
 * @property integer $TIMETABLE_ID
 */
class BTicketSlaShedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_sla_shedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SLA_ID', 'WEEKDAY_NUMBER', 'MINUTE_FROM', 'MINUTE_TILL', 'TIMETABLE_ID'], 'integer'],
            [['OPEN_TIME'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SLA_ID' => Yii::t('app', 'Sla '),
            'WEEKDAY_NUMBER' => Yii::t('app', 'Weekday  Number'),
            'OPEN_TIME' => Yii::t('app', 'Open  Time'),
            'MINUTE_FROM' => Yii::t('app', 'Minute  From'),
            'MINUTE_TILL' => Yii::t('app', 'Minute  Till'),
            'TIMETABLE_ID' => Yii::t('app', 'Timetable '),
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
