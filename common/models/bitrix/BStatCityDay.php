<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_city_day".
 *
 * @property integer $ID
 * @property integer $CITY_ID
 * @property string $DATE_STAT
 * @property integer $SESSIONS
 * @property integer $NEW_GUESTS
 * @property integer $HITS
 * @property integer $C_EVENTS
 */
class BStatCityDay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_city_day';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CITY_ID', 'DATE_STAT'], 'required'],
            [['CITY_ID', 'SESSIONS', 'NEW_GUESTS', 'HITS', 'C_EVENTS'], 'integer'],
            [['DATE_STAT'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CITY_ID' => Yii::t('app', 'City '),
            'DATE_STAT' => Yii::t('app', 'Date  Stat'),
            'SESSIONS' => Yii::t('app', 'Sessions'),
            'NEW_GUESTS' => Yii::t('app', 'New  Guests'),
            'HITS' => Yii::t('app', 'Hits'),
            'C_EVENTS' => Yii::t('app', 'C  Events'),
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
