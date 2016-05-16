<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_adv_day".
 *
 * @property integer $ID
 * @property integer $ADV_ID
 * @property string $DATE_STAT
 * @property integer $GUESTS
 * @property integer $GUESTS_DAY
 * @property integer $NEW_GUESTS
 * @property integer $FAVORITES
 * @property integer $C_HOSTS
 * @property integer $C_HOSTS_DAY
 * @property integer $SESSIONS
 * @property integer $HITS
 * @property integer $GUESTS_BACK
 * @property integer $GUESTS_DAY_BACK
 * @property integer $FAVORITES_BACK
 * @property integer $HOSTS_BACK
 * @property integer $HOSTS_DAY_BACK
 * @property integer $SESSIONS_BACK
 * @property integer $HITS_BACK
 */
class BStatAdvDay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_adv_day';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ADV_ID', 'GUESTS', 'GUESTS_DAY', 'NEW_GUESTS', 'FAVORITES', 'C_HOSTS', 'C_HOSTS_DAY', 'SESSIONS', 'HITS', 'GUESTS_BACK', 'GUESTS_DAY_BACK', 'FAVORITES_BACK', 'HOSTS_BACK', 'HOSTS_DAY_BACK', 'SESSIONS_BACK', 'HITS_BACK'], 'integer'],
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
            'ADV_ID' => Yii::t('app', 'Adv '),
            'DATE_STAT' => Yii::t('app', 'Date  Stat'),
            'GUESTS' => Yii::t('app', 'Guests'),
            'GUESTS_DAY' => Yii::t('app', 'Guests  Day'),
            'NEW_GUESTS' => Yii::t('app', 'New  Guests'),
            'FAVORITES' => Yii::t('app', 'Favorites'),
            'C_HOSTS' => Yii::t('app', 'C  Hosts'),
            'C_HOSTS_DAY' => Yii::t('app', 'C  Hosts  Day'),
            'SESSIONS' => Yii::t('app', 'Sessions'),
            'HITS' => Yii::t('app', 'Hits'),
            'GUESTS_BACK' => Yii::t('app', 'Guests  Back'),
            'GUESTS_DAY_BACK' => Yii::t('app', 'Guests  Day  Back'),
            'FAVORITES_BACK' => Yii::t('app', 'Favorites  Back'),
            'HOSTS_BACK' => Yii::t('app', 'Hosts  Back'),
            'HOSTS_DAY_BACK' => Yii::t('app', 'Hosts  Day  Back'),
            'SESSIONS_BACK' => Yii::t('app', 'Sessions  Back'),
            'HITS_BACK' => Yii::t('app', 'Hits  Back'),
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
