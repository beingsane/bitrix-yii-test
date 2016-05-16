<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_event_day".
 *
 * @property integer $ID
 * @property string $DATE_STAT
 * @property string $DATE_LAST
 * @property integer $EVENT_ID
 * @property string $MONEY
 * @property integer $COUNTER
 */
class BStatEventDay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_event_day';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_STAT', 'DATE_LAST'], 'safe'],
            [['EVENT_ID', 'COUNTER'], 'integer'],
            [['MONEY'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DATE_STAT' => Yii::t('app', 'Date  Stat'),
            'DATE_LAST' => Yii::t('app', 'Date  Last'),
            'EVENT_ID' => Yii::t('app', 'Event '),
            'MONEY' => Yii::t('app', 'Money'),
            'COUNTER' => Yii::t('app', 'Counter'),
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
