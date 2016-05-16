<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_timetable_cache".
 *
 * @property integer $ID
 * @property integer $SLA_ID
 * @property string $DATE_FROM
 * @property string $DATE_TILL
 * @property integer $W_TIME
 * @property integer $W_TIME_INC
 */
class BTicketTimetableCache extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_timetable_cache';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SLA_ID', 'DATE_FROM', 'DATE_TILL', 'W_TIME', 'W_TIME_INC'], 'required'],
            [['SLA_ID', 'W_TIME', 'W_TIME_INC'], 'integer'],
            [['DATE_FROM', 'DATE_TILL'], 'safe']
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
            'DATE_FROM' => Yii::t('app', 'Date  From'),
            'DATE_TILL' => Yii::t('app', 'Date  Till'),
            'W_TIME' => Yii::t('app', 'W  Time'),
            'W_TIME_INC' => Yii::t('app', 'W  Time  Inc'),
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
