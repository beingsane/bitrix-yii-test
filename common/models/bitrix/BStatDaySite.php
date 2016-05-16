<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_day_site".
 *
 * @property integer $ID
 * @property string $DATE_STAT
 * @property string $SITE_ID
 * @property integer $HITS
 * @property integer $C_HOSTS
 * @property integer $SESSIONS
 * @property integer $C_EVENTS
 * @property integer $GUESTS
 * @property integer $NEW_GUESTS
 * @property integer $FAVORITES
 * @property integer $TOTAL_HOSTS
 * @property string $AM_AVERAGE_TIME
 * @property integer $AM_1
 * @property integer $AM_1_3
 * @property integer $AM_3_6
 * @property integer $AM_6_9
 * @property integer $AM_9_12
 * @property integer $AM_12_15
 * @property integer $AM_15_18
 * @property integer $AM_18_21
 * @property integer $AM_21_24
 * @property integer $AM_24
 * @property string $AH_AVERAGE_HITS
 * @property integer $AH_1
 * @property integer $AH_2_5
 * @property integer $AH_6_9
 * @property integer $AH_10_13
 * @property integer $AH_14_17
 * @property integer $AH_18_21
 * @property integer $AH_22_25
 * @property integer $AH_26_29
 * @property integer $AH_30_33
 * @property integer $AH_34
 * @property integer $HOUR_HOST_0
 * @property integer $HOUR_HOST_1
 * @property integer $HOUR_HOST_2
 * @property integer $HOUR_HOST_3
 * @property integer $HOUR_HOST_4
 * @property integer $HOUR_HOST_5
 * @property integer $HOUR_HOST_6
 * @property integer $HOUR_HOST_7
 * @property integer $HOUR_HOST_8
 * @property integer $HOUR_HOST_9
 * @property integer $HOUR_HOST_10
 * @property integer $HOUR_HOST_11
 * @property integer $HOUR_HOST_12
 * @property integer $HOUR_HOST_13
 * @property integer $HOUR_HOST_14
 * @property integer $HOUR_HOST_15
 * @property integer $HOUR_HOST_16
 * @property integer $HOUR_HOST_17
 * @property integer $HOUR_HOST_18
 * @property integer $HOUR_HOST_19
 * @property integer $HOUR_HOST_20
 * @property integer $HOUR_HOST_21
 * @property integer $HOUR_HOST_22
 * @property integer $HOUR_HOST_23
 * @property integer $HOUR_GUEST_0
 * @property integer $HOUR_GUEST_1
 * @property integer $HOUR_GUEST_2
 * @property integer $HOUR_GUEST_3
 * @property integer $HOUR_GUEST_4
 * @property integer $HOUR_GUEST_5
 * @property integer $HOUR_GUEST_6
 * @property integer $HOUR_GUEST_7
 * @property integer $HOUR_GUEST_8
 * @property integer $HOUR_GUEST_9
 * @property integer $HOUR_GUEST_10
 * @property integer $HOUR_GUEST_11
 * @property integer $HOUR_GUEST_12
 * @property integer $HOUR_GUEST_13
 * @property integer $HOUR_GUEST_14
 * @property integer $HOUR_GUEST_15
 * @property integer $HOUR_GUEST_16
 * @property integer $HOUR_GUEST_17
 * @property integer $HOUR_GUEST_18
 * @property integer $HOUR_GUEST_19
 * @property integer $HOUR_GUEST_20
 * @property integer $HOUR_GUEST_21
 * @property integer $HOUR_GUEST_22
 * @property integer $HOUR_GUEST_23
 * @property integer $HOUR_NEW_GUEST_0
 * @property integer $HOUR_NEW_GUEST_1
 * @property integer $HOUR_NEW_GUEST_2
 * @property integer $HOUR_NEW_GUEST_3
 * @property integer $HOUR_NEW_GUEST_4
 * @property integer $HOUR_NEW_GUEST_5
 * @property integer $HOUR_NEW_GUEST_6
 * @property integer $HOUR_NEW_GUEST_7
 * @property integer $HOUR_NEW_GUEST_8
 * @property integer $HOUR_NEW_GUEST_9
 * @property integer $HOUR_NEW_GUEST_10
 * @property integer $HOUR_NEW_GUEST_11
 * @property integer $HOUR_NEW_GUEST_12
 * @property integer $HOUR_NEW_GUEST_13
 * @property integer $HOUR_NEW_GUEST_14
 * @property integer $HOUR_NEW_GUEST_15
 * @property integer $HOUR_NEW_GUEST_16
 * @property integer $HOUR_NEW_GUEST_17
 * @property integer $HOUR_NEW_GUEST_18
 * @property integer $HOUR_NEW_GUEST_19
 * @property integer $HOUR_NEW_GUEST_20
 * @property integer $HOUR_NEW_GUEST_21
 * @property integer $HOUR_NEW_GUEST_22
 * @property integer $HOUR_NEW_GUEST_23
 * @property integer $HOUR_SESSION_0
 * @property integer $HOUR_SESSION_1
 * @property integer $HOUR_SESSION_2
 * @property integer $HOUR_SESSION_3
 * @property integer $HOUR_SESSION_4
 * @property integer $HOUR_SESSION_5
 * @property integer $HOUR_SESSION_6
 * @property integer $HOUR_SESSION_7
 * @property integer $HOUR_SESSION_8
 * @property integer $HOUR_SESSION_9
 * @property integer $HOUR_SESSION_10
 * @property integer $HOUR_SESSION_11
 * @property integer $HOUR_SESSION_12
 * @property integer $HOUR_SESSION_13
 * @property integer $HOUR_SESSION_14
 * @property integer $HOUR_SESSION_15
 * @property integer $HOUR_SESSION_16
 * @property integer $HOUR_SESSION_17
 * @property integer $HOUR_SESSION_18
 * @property integer $HOUR_SESSION_19
 * @property integer $HOUR_SESSION_20
 * @property integer $HOUR_SESSION_21
 * @property integer $HOUR_SESSION_22
 * @property integer $HOUR_SESSION_23
 * @property integer $HOUR_HIT_0
 * @property integer $HOUR_HIT_1
 * @property integer $HOUR_HIT_2
 * @property integer $HOUR_HIT_3
 * @property integer $HOUR_HIT_4
 * @property integer $HOUR_HIT_5
 * @property integer $HOUR_HIT_6
 * @property integer $HOUR_HIT_7
 * @property integer $HOUR_HIT_8
 * @property integer $HOUR_HIT_9
 * @property integer $HOUR_HIT_10
 * @property integer $HOUR_HIT_11
 * @property integer $HOUR_HIT_12
 * @property integer $HOUR_HIT_13
 * @property integer $HOUR_HIT_14
 * @property integer $HOUR_HIT_15
 * @property integer $HOUR_HIT_16
 * @property integer $HOUR_HIT_17
 * @property integer $HOUR_HIT_18
 * @property integer $HOUR_HIT_19
 * @property integer $HOUR_HIT_20
 * @property integer $HOUR_HIT_21
 * @property integer $HOUR_HIT_22
 * @property integer $HOUR_HIT_23
 * @property integer $HOUR_EVENT_0
 * @property integer $HOUR_EVENT_1
 * @property integer $HOUR_EVENT_2
 * @property integer $HOUR_EVENT_3
 * @property integer $HOUR_EVENT_4
 * @property integer $HOUR_EVENT_5
 * @property integer $HOUR_EVENT_6
 * @property integer $HOUR_EVENT_7
 * @property integer $HOUR_EVENT_8
 * @property integer $HOUR_EVENT_9
 * @property integer $HOUR_EVENT_10
 * @property integer $HOUR_EVENT_11
 * @property integer $HOUR_EVENT_12
 * @property integer $HOUR_EVENT_13
 * @property integer $HOUR_EVENT_14
 * @property integer $HOUR_EVENT_15
 * @property integer $HOUR_EVENT_16
 * @property integer $HOUR_EVENT_17
 * @property integer $HOUR_EVENT_18
 * @property integer $HOUR_EVENT_19
 * @property integer $HOUR_EVENT_20
 * @property integer $HOUR_EVENT_21
 * @property integer $HOUR_EVENT_22
 * @property integer $HOUR_EVENT_23
 * @property integer $HOUR_FAVORITE_0
 * @property integer $HOUR_FAVORITE_1
 * @property integer $HOUR_FAVORITE_2
 * @property integer $HOUR_FAVORITE_3
 * @property integer $HOUR_FAVORITE_4
 * @property integer $HOUR_FAVORITE_5
 * @property integer $HOUR_FAVORITE_6
 * @property integer $HOUR_FAVORITE_7
 * @property integer $HOUR_FAVORITE_8
 * @property integer $HOUR_FAVORITE_9
 * @property integer $HOUR_FAVORITE_10
 * @property integer $HOUR_FAVORITE_11
 * @property integer $HOUR_FAVORITE_12
 * @property integer $HOUR_FAVORITE_13
 * @property integer $HOUR_FAVORITE_14
 * @property integer $HOUR_FAVORITE_15
 * @property integer $HOUR_FAVORITE_16
 * @property integer $HOUR_FAVORITE_17
 * @property integer $HOUR_FAVORITE_18
 * @property integer $HOUR_FAVORITE_19
 * @property integer $HOUR_FAVORITE_20
 * @property integer $HOUR_FAVORITE_21
 * @property integer $HOUR_FAVORITE_22
 * @property integer $HOUR_FAVORITE_23
 * @property integer $WEEKDAY_HOST_0
 * @property integer $WEEKDAY_HOST_1
 * @property integer $WEEKDAY_HOST_2
 * @property integer $WEEKDAY_HOST_3
 * @property integer $WEEKDAY_HOST_4
 * @property integer $WEEKDAY_HOST_5
 * @property integer $WEEKDAY_HOST_6
 * @property integer $WEEKDAY_GUEST_0
 * @property integer $WEEKDAY_GUEST_1
 * @property integer $WEEKDAY_GUEST_2
 * @property integer $WEEKDAY_GUEST_3
 * @property integer $WEEKDAY_GUEST_4
 * @property integer $WEEKDAY_GUEST_5
 * @property integer $WEEKDAY_GUEST_6
 * @property integer $WEEKDAY_NEW_GUEST_0
 * @property integer $WEEKDAY_NEW_GUEST_1
 * @property integer $WEEKDAY_NEW_GUEST_2
 * @property integer $WEEKDAY_NEW_GUEST_3
 * @property integer $WEEKDAY_NEW_GUEST_4
 * @property integer $WEEKDAY_NEW_GUEST_5
 * @property integer $WEEKDAY_NEW_GUEST_6
 * @property integer $WEEKDAY_SESSION_0
 * @property integer $WEEKDAY_SESSION_1
 * @property integer $WEEKDAY_SESSION_2
 * @property integer $WEEKDAY_SESSION_3
 * @property integer $WEEKDAY_SESSION_4
 * @property integer $WEEKDAY_SESSION_5
 * @property integer $WEEKDAY_SESSION_6
 * @property integer $WEEKDAY_HIT_0
 * @property integer $WEEKDAY_HIT_1
 * @property integer $WEEKDAY_HIT_2
 * @property integer $WEEKDAY_HIT_3
 * @property integer $WEEKDAY_HIT_4
 * @property integer $WEEKDAY_HIT_5
 * @property integer $WEEKDAY_HIT_6
 * @property integer $WEEKDAY_EVENT_0
 * @property integer $WEEKDAY_EVENT_1
 * @property integer $WEEKDAY_EVENT_2
 * @property integer $WEEKDAY_EVENT_3
 * @property integer $WEEKDAY_EVENT_4
 * @property integer $WEEKDAY_EVENT_5
 * @property integer $WEEKDAY_EVENT_6
 * @property integer $WEEKDAY_FAVORITE_0
 * @property integer $WEEKDAY_FAVORITE_1
 * @property integer $WEEKDAY_FAVORITE_2
 * @property integer $WEEKDAY_FAVORITE_3
 * @property integer $WEEKDAY_FAVORITE_4
 * @property integer $WEEKDAY_FAVORITE_5
 * @property integer $WEEKDAY_FAVORITE_6
 * @property integer $MONTH_HOST_1
 * @property integer $MONTH_HOST_2
 * @property integer $MONTH_HOST_3
 * @property integer $MONTH_HOST_4
 * @property integer $MONTH_HOST_5
 * @property integer $MONTH_HOST_6
 * @property integer $MONTH_HOST_7
 * @property integer $MONTH_HOST_8
 * @property integer $MONTH_HOST_9
 * @property integer $MONTH_HOST_10
 * @property integer $MONTH_HOST_11
 * @property integer $MONTH_HOST_12
 * @property integer $MONTH_GUEST_1
 * @property integer $MONTH_GUEST_2
 * @property integer $MONTH_GUEST_3
 * @property integer $MONTH_GUEST_4
 * @property integer $MONTH_GUEST_5
 * @property integer $MONTH_GUEST_6
 * @property integer $MONTH_GUEST_7
 * @property integer $MONTH_GUEST_8
 * @property integer $MONTH_GUEST_9
 * @property integer $MONTH_GUEST_10
 * @property integer $MONTH_GUEST_11
 * @property integer $MONTH_GUEST_12
 * @property integer $MONTH_NEW_GUEST_1
 * @property integer $MONTH_NEW_GUEST_2
 * @property integer $MONTH_NEW_GUEST_3
 * @property integer $MONTH_NEW_GUEST_4
 * @property integer $MONTH_NEW_GUEST_5
 * @property integer $MONTH_NEW_GUEST_6
 * @property integer $MONTH_NEW_GUEST_7
 * @property integer $MONTH_NEW_GUEST_8
 * @property integer $MONTH_NEW_GUEST_9
 * @property integer $MONTH_NEW_GUEST_10
 * @property integer $MONTH_NEW_GUEST_11
 * @property integer $MONTH_NEW_GUEST_12
 * @property integer $MONTH_SESSION_1
 * @property integer $MONTH_SESSION_2
 * @property integer $MONTH_SESSION_3
 * @property integer $MONTH_SESSION_4
 * @property integer $MONTH_SESSION_5
 * @property integer $MONTH_SESSION_6
 * @property integer $MONTH_SESSION_7
 * @property integer $MONTH_SESSION_8
 * @property integer $MONTH_SESSION_9
 * @property integer $MONTH_SESSION_10
 * @property integer $MONTH_SESSION_11
 * @property integer $MONTH_SESSION_12
 * @property integer $MONTH_HIT_1
 * @property integer $MONTH_HIT_2
 * @property integer $MONTH_HIT_3
 * @property integer $MONTH_HIT_4
 * @property integer $MONTH_HIT_5
 * @property integer $MONTH_HIT_6
 * @property integer $MONTH_HIT_7
 * @property integer $MONTH_HIT_8
 * @property integer $MONTH_HIT_9
 * @property integer $MONTH_HIT_10
 * @property integer $MONTH_HIT_11
 * @property integer $MONTH_HIT_12
 * @property integer $MONTH_EVENT_1
 * @property integer $MONTH_EVENT_2
 * @property integer $MONTH_EVENT_3
 * @property integer $MONTH_EVENT_4
 * @property integer $MONTH_EVENT_5
 * @property integer $MONTH_EVENT_6
 * @property integer $MONTH_EVENT_7
 * @property integer $MONTH_EVENT_8
 * @property integer $MONTH_EVENT_9
 * @property integer $MONTH_EVENT_10
 * @property integer $MONTH_EVENT_11
 * @property integer $MONTH_EVENT_12
 * @property integer $MONTH_FAVORITE_1
 * @property integer $MONTH_FAVORITE_2
 * @property integer $MONTH_FAVORITE_3
 * @property integer $MONTH_FAVORITE_4
 * @property integer $MONTH_FAVORITE_5
 * @property integer $MONTH_FAVORITE_6
 * @property integer $MONTH_FAVORITE_7
 * @property integer $MONTH_FAVORITE_8
 * @property integer $MONTH_FAVORITE_9
 * @property integer $MONTH_FAVORITE_10
 * @property integer $MONTH_FAVORITE_11
 * @property integer $MONTH_FAVORITE_12
 */
class BStatDaySite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_day_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_STAT'], 'safe'],
            [['SITE_ID'], 'required'],
            [['HITS', 'C_HOSTS', 'SESSIONS', 'C_EVENTS', 'GUESTS', 'NEW_GUESTS', 'FAVORITES', 'TOTAL_HOSTS', 'AM_1', 'AM_1_3', 'AM_3_6', 'AM_6_9', 'AM_9_12', 'AM_12_15', 'AM_15_18', 'AM_18_21', 'AM_21_24', 'AM_24', 'AH_1', 'AH_2_5', 'AH_6_9', 'AH_10_13', 'AH_14_17', 'AH_18_21', 'AH_22_25', 'AH_26_29', 'AH_30_33', 'AH_34', 'HOUR_HOST_0', 'HOUR_HOST_1', 'HOUR_HOST_2', 'HOUR_HOST_3', 'HOUR_HOST_4', 'HOUR_HOST_5', 'HOUR_HOST_6', 'HOUR_HOST_7', 'HOUR_HOST_8', 'HOUR_HOST_9', 'HOUR_HOST_10', 'HOUR_HOST_11', 'HOUR_HOST_12', 'HOUR_HOST_13', 'HOUR_HOST_14', 'HOUR_HOST_15', 'HOUR_HOST_16', 'HOUR_HOST_17', 'HOUR_HOST_18', 'HOUR_HOST_19', 'HOUR_HOST_20', 'HOUR_HOST_21', 'HOUR_HOST_22', 'HOUR_HOST_23', 'HOUR_GUEST_0', 'HOUR_GUEST_1', 'HOUR_GUEST_2', 'HOUR_GUEST_3', 'HOUR_GUEST_4', 'HOUR_GUEST_5', 'HOUR_GUEST_6', 'HOUR_GUEST_7', 'HOUR_GUEST_8', 'HOUR_GUEST_9', 'HOUR_GUEST_10', 'HOUR_GUEST_11', 'HOUR_GUEST_12', 'HOUR_GUEST_13', 'HOUR_GUEST_14', 'HOUR_GUEST_15', 'HOUR_GUEST_16', 'HOUR_GUEST_17', 'HOUR_GUEST_18', 'HOUR_GUEST_19', 'HOUR_GUEST_20', 'HOUR_GUEST_21', 'HOUR_GUEST_22', 'HOUR_GUEST_23', 'HOUR_NEW_GUEST_0', 'HOUR_NEW_GUEST_1', 'HOUR_NEW_GUEST_2', 'HOUR_NEW_GUEST_3', 'HOUR_NEW_GUEST_4', 'HOUR_NEW_GUEST_5', 'HOUR_NEW_GUEST_6', 'HOUR_NEW_GUEST_7', 'HOUR_NEW_GUEST_8', 'HOUR_NEW_GUEST_9', 'HOUR_NEW_GUEST_10', 'HOUR_NEW_GUEST_11', 'HOUR_NEW_GUEST_12', 'HOUR_NEW_GUEST_13', 'HOUR_NEW_GUEST_14', 'HOUR_NEW_GUEST_15', 'HOUR_NEW_GUEST_16', 'HOUR_NEW_GUEST_17', 'HOUR_NEW_GUEST_18', 'HOUR_NEW_GUEST_19', 'HOUR_NEW_GUEST_20', 'HOUR_NEW_GUEST_21', 'HOUR_NEW_GUEST_22', 'HOUR_NEW_GUEST_23', 'HOUR_SESSION_0', 'HOUR_SESSION_1', 'HOUR_SESSION_2', 'HOUR_SESSION_3', 'HOUR_SESSION_4', 'HOUR_SESSION_5', 'HOUR_SESSION_6', 'HOUR_SESSION_7', 'HOUR_SESSION_8', 'HOUR_SESSION_9', 'HOUR_SESSION_10', 'HOUR_SESSION_11', 'HOUR_SESSION_12', 'HOUR_SESSION_13', 'HOUR_SESSION_14', 'HOUR_SESSION_15', 'HOUR_SESSION_16', 'HOUR_SESSION_17', 'HOUR_SESSION_18', 'HOUR_SESSION_19', 'HOUR_SESSION_20', 'HOUR_SESSION_21', 'HOUR_SESSION_22', 'HOUR_SESSION_23', 'HOUR_HIT_0', 'HOUR_HIT_1', 'HOUR_HIT_2', 'HOUR_HIT_3', 'HOUR_HIT_4', 'HOUR_HIT_5', 'HOUR_HIT_6', 'HOUR_HIT_7', 'HOUR_HIT_8', 'HOUR_HIT_9', 'HOUR_HIT_10', 'HOUR_HIT_11', 'HOUR_HIT_12', 'HOUR_HIT_13', 'HOUR_HIT_14', 'HOUR_HIT_15', 'HOUR_HIT_16', 'HOUR_HIT_17', 'HOUR_HIT_18', 'HOUR_HIT_19', 'HOUR_HIT_20', 'HOUR_HIT_21', 'HOUR_HIT_22', 'HOUR_HIT_23', 'HOUR_EVENT_0', 'HOUR_EVENT_1', 'HOUR_EVENT_2', 'HOUR_EVENT_3', 'HOUR_EVENT_4', 'HOUR_EVENT_5', 'HOUR_EVENT_6', 'HOUR_EVENT_7', 'HOUR_EVENT_8', 'HOUR_EVENT_9', 'HOUR_EVENT_10', 'HOUR_EVENT_11', 'HOUR_EVENT_12', 'HOUR_EVENT_13', 'HOUR_EVENT_14', 'HOUR_EVENT_15', 'HOUR_EVENT_16', 'HOUR_EVENT_17', 'HOUR_EVENT_18', 'HOUR_EVENT_19', 'HOUR_EVENT_20', 'HOUR_EVENT_21', 'HOUR_EVENT_22', 'HOUR_EVENT_23', 'HOUR_FAVORITE_0', 'HOUR_FAVORITE_1', 'HOUR_FAVORITE_2', 'HOUR_FAVORITE_3', 'HOUR_FAVORITE_4', 'HOUR_FAVORITE_5', 'HOUR_FAVORITE_6', 'HOUR_FAVORITE_7', 'HOUR_FAVORITE_8', 'HOUR_FAVORITE_9', 'HOUR_FAVORITE_10', 'HOUR_FAVORITE_11', 'HOUR_FAVORITE_12', 'HOUR_FAVORITE_13', 'HOUR_FAVORITE_14', 'HOUR_FAVORITE_15', 'HOUR_FAVORITE_16', 'HOUR_FAVORITE_17', 'HOUR_FAVORITE_18', 'HOUR_FAVORITE_19', 'HOUR_FAVORITE_20', 'HOUR_FAVORITE_21', 'HOUR_FAVORITE_22', 'HOUR_FAVORITE_23', 'WEEKDAY_HOST_0', 'WEEKDAY_HOST_1', 'WEEKDAY_HOST_2', 'WEEKDAY_HOST_3', 'WEEKDAY_HOST_4', 'WEEKDAY_HOST_5', 'WEEKDAY_HOST_6', 'WEEKDAY_GUEST_0', 'WEEKDAY_GUEST_1', 'WEEKDAY_GUEST_2', 'WEEKDAY_GUEST_3', 'WEEKDAY_GUEST_4', 'WEEKDAY_GUEST_5', 'WEEKDAY_GUEST_6', 'WEEKDAY_NEW_GUEST_0', 'WEEKDAY_NEW_GUEST_1', 'WEEKDAY_NEW_GUEST_2', 'WEEKDAY_NEW_GUEST_3', 'WEEKDAY_NEW_GUEST_4', 'WEEKDAY_NEW_GUEST_5', 'WEEKDAY_NEW_GUEST_6', 'WEEKDAY_SESSION_0', 'WEEKDAY_SESSION_1', 'WEEKDAY_SESSION_2', 'WEEKDAY_SESSION_3', 'WEEKDAY_SESSION_4', 'WEEKDAY_SESSION_5', 'WEEKDAY_SESSION_6', 'WEEKDAY_HIT_0', 'WEEKDAY_HIT_1', 'WEEKDAY_HIT_2', 'WEEKDAY_HIT_3', 'WEEKDAY_HIT_4', 'WEEKDAY_HIT_5', 'WEEKDAY_HIT_6', 'WEEKDAY_EVENT_0', 'WEEKDAY_EVENT_1', 'WEEKDAY_EVENT_2', 'WEEKDAY_EVENT_3', 'WEEKDAY_EVENT_4', 'WEEKDAY_EVENT_5', 'WEEKDAY_EVENT_6', 'WEEKDAY_FAVORITE_0', 'WEEKDAY_FAVORITE_1', 'WEEKDAY_FAVORITE_2', 'WEEKDAY_FAVORITE_3', 'WEEKDAY_FAVORITE_4', 'WEEKDAY_FAVORITE_5', 'WEEKDAY_FAVORITE_6', 'MONTH_HOST_1', 'MONTH_HOST_2', 'MONTH_HOST_3', 'MONTH_HOST_4', 'MONTH_HOST_5', 'MONTH_HOST_6', 'MONTH_HOST_7', 'MONTH_HOST_8', 'MONTH_HOST_9', 'MONTH_HOST_10', 'MONTH_HOST_11', 'MONTH_HOST_12', 'MONTH_GUEST_1', 'MONTH_GUEST_2', 'MONTH_GUEST_3', 'MONTH_GUEST_4', 'MONTH_GUEST_5', 'MONTH_GUEST_6', 'MONTH_GUEST_7', 'MONTH_GUEST_8', 'MONTH_GUEST_9', 'MONTH_GUEST_10', 'MONTH_GUEST_11', 'MONTH_GUEST_12', 'MONTH_NEW_GUEST_1', 'MONTH_NEW_GUEST_2', 'MONTH_NEW_GUEST_3', 'MONTH_NEW_GUEST_4', 'MONTH_NEW_GUEST_5', 'MONTH_NEW_GUEST_6', 'MONTH_NEW_GUEST_7', 'MONTH_NEW_GUEST_8', 'MONTH_NEW_GUEST_9', 'MONTH_NEW_GUEST_10', 'MONTH_NEW_GUEST_11', 'MONTH_NEW_GUEST_12', 'MONTH_SESSION_1', 'MONTH_SESSION_2', 'MONTH_SESSION_3', 'MONTH_SESSION_4', 'MONTH_SESSION_5', 'MONTH_SESSION_6', 'MONTH_SESSION_7', 'MONTH_SESSION_8', 'MONTH_SESSION_9', 'MONTH_SESSION_10', 'MONTH_SESSION_11', 'MONTH_SESSION_12', 'MONTH_HIT_1', 'MONTH_HIT_2', 'MONTH_HIT_3', 'MONTH_HIT_4', 'MONTH_HIT_5', 'MONTH_HIT_6', 'MONTH_HIT_7', 'MONTH_HIT_8', 'MONTH_HIT_9', 'MONTH_HIT_10', 'MONTH_HIT_11', 'MONTH_HIT_12', 'MONTH_EVENT_1', 'MONTH_EVENT_2', 'MONTH_EVENT_3', 'MONTH_EVENT_4', 'MONTH_EVENT_5', 'MONTH_EVENT_6', 'MONTH_EVENT_7', 'MONTH_EVENT_8', 'MONTH_EVENT_9', 'MONTH_EVENT_10', 'MONTH_EVENT_11', 'MONTH_EVENT_12', 'MONTH_FAVORITE_1', 'MONTH_FAVORITE_2', 'MONTH_FAVORITE_3', 'MONTH_FAVORITE_4', 'MONTH_FAVORITE_5', 'MONTH_FAVORITE_6', 'MONTH_FAVORITE_7', 'MONTH_FAVORITE_8', 'MONTH_FAVORITE_9', 'MONTH_FAVORITE_10', 'MONTH_FAVORITE_11', 'MONTH_FAVORITE_12'], 'integer'],
            [['AM_AVERAGE_TIME', 'AH_AVERAGE_HITS'], 'number'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['SITE_ID', 'DATE_STAT'], 'unique', 'targetAttribute' => ['SITE_ID', 'DATE_STAT'], 'message' => 'The combination of Date  Stat and Site  has already been taken.']
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
            'SITE_ID' => Yii::t('app', 'Site '),
            'HITS' => Yii::t('app', 'Hits'),
            'C_HOSTS' => Yii::t('app', 'C  Hosts'),
            'SESSIONS' => Yii::t('app', 'Sessions'),
            'C_EVENTS' => Yii::t('app', 'C  Events'),
            'GUESTS' => Yii::t('app', 'Guests'),
            'NEW_GUESTS' => Yii::t('app', 'New  Guests'),
            'FAVORITES' => Yii::t('app', 'Favorites'),
            'TOTAL_HOSTS' => Yii::t('app', 'Total  Hosts'),
            'AM_AVERAGE_TIME' => Yii::t('app', 'Am  Average  Time'),
            'AM_1' => Yii::t('app', 'Am 1'),
            'AM_1_3' => Yii::t('app', 'Am 1 3'),
            'AM_3_6' => Yii::t('app', 'Am 3 6'),
            'AM_6_9' => Yii::t('app', 'Am 6 9'),
            'AM_9_12' => Yii::t('app', 'Am 9 12'),
            'AM_12_15' => Yii::t('app', 'Am 12 15'),
            'AM_15_18' => Yii::t('app', 'Am 15 18'),
            'AM_18_21' => Yii::t('app', 'Am 18 21'),
            'AM_21_24' => Yii::t('app', 'Am 21 24'),
            'AM_24' => Yii::t('app', 'Am 24'),
            'AH_AVERAGE_HITS' => Yii::t('app', 'Ah  Average  Hits'),
            'AH_1' => Yii::t('app', 'Ah 1'),
            'AH_2_5' => Yii::t('app', 'Ah 2 5'),
            'AH_6_9' => Yii::t('app', 'Ah 6 9'),
            'AH_10_13' => Yii::t('app', 'Ah 10 13'),
            'AH_14_17' => Yii::t('app', 'Ah 14 17'),
            'AH_18_21' => Yii::t('app', 'Ah 18 21'),
            'AH_22_25' => Yii::t('app', 'Ah 22 25'),
            'AH_26_29' => Yii::t('app', 'Ah 26 29'),
            'AH_30_33' => Yii::t('app', 'Ah 30 33'),
            'AH_34' => Yii::t('app', 'Ah 34'),
            'HOUR_HOST_0' => Yii::t('app', 'Hour  Host 0'),
            'HOUR_HOST_1' => Yii::t('app', 'Hour  Host 1'),
            'HOUR_HOST_2' => Yii::t('app', 'Hour  Host 2'),
            'HOUR_HOST_3' => Yii::t('app', 'Hour  Host 3'),
            'HOUR_HOST_4' => Yii::t('app', 'Hour  Host 4'),
            'HOUR_HOST_5' => Yii::t('app', 'Hour  Host 5'),
            'HOUR_HOST_6' => Yii::t('app', 'Hour  Host 6'),
            'HOUR_HOST_7' => Yii::t('app', 'Hour  Host 7'),
            'HOUR_HOST_8' => Yii::t('app', 'Hour  Host 8'),
            'HOUR_HOST_9' => Yii::t('app', 'Hour  Host 9'),
            'HOUR_HOST_10' => Yii::t('app', 'Hour  Host 10'),
            'HOUR_HOST_11' => Yii::t('app', 'Hour  Host 11'),
            'HOUR_HOST_12' => Yii::t('app', 'Hour  Host 12'),
            'HOUR_HOST_13' => Yii::t('app', 'Hour  Host 13'),
            'HOUR_HOST_14' => Yii::t('app', 'Hour  Host 14'),
            'HOUR_HOST_15' => Yii::t('app', 'Hour  Host 15'),
            'HOUR_HOST_16' => Yii::t('app', 'Hour  Host 16'),
            'HOUR_HOST_17' => Yii::t('app', 'Hour  Host 17'),
            'HOUR_HOST_18' => Yii::t('app', 'Hour  Host 18'),
            'HOUR_HOST_19' => Yii::t('app', 'Hour  Host 19'),
            'HOUR_HOST_20' => Yii::t('app', 'Hour  Host 20'),
            'HOUR_HOST_21' => Yii::t('app', 'Hour  Host 21'),
            'HOUR_HOST_22' => Yii::t('app', 'Hour  Host 22'),
            'HOUR_HOST_23' => Yii::t('app', 'Hour  Host 23'),
            'HOUR_GUEST_0' => Yii::t('app', 'Hour  Guest 0'),
            'HOUR_GUEST_1' => Yii::t('app', 'Hour  Guest 1'),
            'HOUR_GUEST_2' => Yii::t('app', 'Hour  Guest 2'),
            'HOUR_GUEST_3' => Yii::t('app', 'Hour  Guest 3'),
            'HOUR_GUEST_4' => Yii::t('app', 'Hour  Guest 4'),
            'HOUR_GUEST_5' => Yii::t('app', 'Hour  Guest 5'),
            'HOUR_GUEST_6' => Yii::t('app', 'Hour  Guest 6'),
            'HOUR_GUEST_7' => Yii::t('app', 'Hour  Guest 7'),
            'HOUR_GUEST_8' => Yii::t('app', 'Hour  Guest 8'),
            'HOUR_GUEST_9' => Yii::t('app', 'Hour  Guest 9'),
            'HOUR_GUEST_10' => Yii::t('app', 'Hour  Guest 10'),
            'HOUR_GUEST_11' => Yii::t('app', 'Hour  Guest 11'),
            'HOUR_GUEST_12' => Yii::t('app', 'Hour  Guest 12'),
            'HOUR_GUEST_13' => Yii::t('app', 'Hour  Guest 13'),
            'HOUR_GUEST_14' => Yii::t('app', 'Hour  Guest 14'),
            'HOUR_GUEST_15' => Yii::t('app', 'Hour  Guest 15'),
            'HOUR_GUEST_16' => Yii::t('app', 'Hour  Guest 16'),
            'HOUR_GUEST_17' => Yii::t('app', 'Hour  Guest 17'),
            'HOUR_GUEST_18' => Yii::t('app', 'Hour  Guest 18'),
            'HOUR_GUEST_19' => Yii::t('app', 'Hour  Guest 19'),
            'HOUR_GUEST_20' => Yii::t('app', 'Hour  Guest 20'),
            'HOUR_GUEST_21' => Yii::t('app', 'Hour  Guest 21'),
            'HOUR_GUEST_22' => Yii::t('app', 'Hour  Guest 22'),
            'HOUR_GUEST_23' => Yii::t('app', 'Hour  Guest 23'),
            'HOUR_NEW_GUEST_0' => Yii::t('app', 'Hour  New  Guest 0'),
            'HOUR_NEW_GUEST_1' => Yii::t('app', 'Hour  New  Guest 1'),
            'HOUR_NEW_GUEST_2' => Yii::t('app', 'Hour  New  Guest 2'),
            'HOUR_NEW_GUEST_3' => Yii::t('app', 'Hour  New  Guest 3'),
            'HOUR_NEW_GUEST_4' => Yii::t('app', 'Hour  New  Guest 4'),
            'HOUR_NEW_GUEST_5' => Yii::t('app', 'Hour  New  Guest 5'),
            'HOUR_NEW_GUEST_6' => Yii::t('app', 'Hour  New  Guest 6'),
            'HOUR_NEW_GUEST_7' => Yii::t('app', 'Hour  New  Guest 7'),
            'HOUR_NEW_GUEST_8' => Yii::t('app', 'Hour  New  Guest 8'),
            'HOUR_NEW_GUEST_9' => Yii::t('app', 'Hour  New  Guest 9'),
            'HOUR_NEW_GUEST_10' => Yii::t('app', 'Hour  New  Guest 10'),
            'HOUR_NEW_GUEST_11' => Yii::t('app', 'Hour  New  Guest 11'),
            'HOUR_NEW_GUEST_12' => Yii::t('app', 'Hour  New  Guest 12'),
            'HOUR_NEW_GUEST_13' => Yii::t('app', 'Hour  New  Guest 13'),
            'HOUR_NEW_GUEST_14' => Yii::t('app', 'Hour  New  Guest 14'),
            'HOUR_NEW_GUEST_15' => Yii::t('app', 'Hour  New  Guest 15'),
            'HOUR_NEW_GUEST_16' => Yii::t('app', 'Hour  New  Guest 16'),
            'HOUR_NEW_GUEST_17' => Yii::t('app', 'Hour  New  Guest 17'),
            'HOUR_NEW_GUEST_18' => Yii::t('app', 'Hour  New  Guest 18'),
            'HOUR_NEW_GUEST_19' => Yii::t('app', 'Hour  New  Guest 19'),
            'HOUR_NEW_GUEST_20' => Yii::t('app', 'Hour  New  Guest 20'),
            'HOUR_NEW_GUEST_21' => Yii::t('app', 'Hour  New  Guest 21'),
            'HOUR_NEW_GUEST_22' => Yii::t('app', 'Hour  New  Guest 22'),
            'HOUR_NEW_GUEST_23' => Yii::t('app', 'Hour  New  Guest 23'),
            'HOUR_SESSION_0' => Yii::t('app', 'Hour  Session 0'),
            'HOUR_SESSION_1' => Yii::t('app', 'Hour  Session 1'),
            'HOUR_SESSION_2' => Yii::t('app', 'Hour  Session 2'),
            'HOUR_SESSION_3' => Yii::t('app', 'Hour  Session 3'),
            'HOUR_SESSION_4' => Yii::t('app', 'Hour  Session 4'),
            'HOUR_SESSION_5' => Yii::t('app', 'Hour  Session 5'),
            'HOUR_SESSION_6' => Yii::t('app', 'Hour  Session 6'),
            'HOUR_SESSION_7' => Yii::t('app', 'Hour  Session 7'),
            'HOUR_SESSION_8' => Yii::t('app', 'Hour  Session 8'),
            'HOUR_SESSION_9' => Yii::t('app', 'Hour  Session 9'),
            'HOUR_SESSION_10' => Yii::t('app', 'Hour  Session 10'),
            'HOUR_SESSION_11' => Yii::t('app', 'Hour  Session 11'),
            'HOUR_SESSION_12' => Yii::t('app', 'Hour  Session 12'),
            'HOUR_SESSION_13' => Yii::t('app', 'Hour  Session 13'),
            'HOUR_SESSION_14' => Yii::t('app', 'Hour  Session 14'),
            'HOUR_SESSION_15' => Yii::t('app', 'Hour  Session 15'),
            'HOUR_SESSION_16' => Yii::t('app', 'Hour  Session 16'),
            'HOUR_SESSION_17' => Yii::t('app', 'Hour  Session 17'),
            'HOUR_SESSION_18' => Yii::t('app', 'Hour  Session 18'),
            'HOUR_SESSION_19' => Yii::t('app', 'Hour  Session 19'),
            'HOUR_SESSION_20' => Yii::t('app', 'Hour  Session 20'),
            'HOUR_SESSION_21' => Yii::t('app', 'Hour  Session 21'),
            'HOUR_SESSION_22' => Yii::t('app', 'Hour  Session 22'),
            'HOUR_SESSION_23' => Yii::t('app', 'Hour  Session 23'),
            'HOUR_HIT_0' => Yii::t('app', 'Hour  Hit 0'),
            'HOUR_HIT_1' => Yii::t('app', 'Hour  Hit 1'),
            'HOUR_HIT_2' => Yii::t('app', 'Hour  Hit 2'),
            'HOUR_HIT_3' => Yii::t('app', 'Hour  Hit 3'),
            'HOUR_HIT_4' => Yii::t('app', 'Hour  Hit 4'),
            'HOUR_HIT_5' => Yii::t('app', 'Hour  Hit 5'),
            'HOUR_HIT_6' => Yii::t('app', 'Hour  Hit 6'),
            'HOUR_HIT_7' => Yii::t('app', 'Hour  Hit 7'),
            'HOUR_HIT_8' => Yii::t('app', 'Hour  Hit 8'),
            'HOUR_HIT_9' => Yii::t('app', 'Hour  Hit 9'),
            'HOUR_HIT_10' => Yii::t('app', 'Hour  Hit 10'),
            'HOUR_HIT_11' => Yii::t('app', 'Hour  Hit 11'),
            'HOUR_HIT_12' => Yii::t('app', 'Hour  Hit 12'),
            'HOUR_HIT_13' => Yii::t('app', 'Hour  Hit 13'),
            'HOUR_HIT_14' => Yii::t('app', 'Hour  Hit 14'),
            'HOUR_HIT_15' => Yii::t('app', 'Hour  Hit 15'),
            'HOUR_HIT_16' => Yii::t('app', 'Hour  Hit 16'),
            'HOUR_HIT_17' => Yii::t('app', 'Hour  Hit 17'),
            'HOUR_HIT_18' => Yii::t('app', 'Hour  Hit 18'),
            'HOUR_HIT_19' => Yii::t('app', 'Hour  Hit 19'),
            'HOUR_HIT_20' => Yii::t('app', 'Hour  Hit 20'),
            'HOUR_HIT_21' => Yii::t('app', 'Hour  Hit 21'),
            'HOUR_HIT_22' => Yii::t('app', 'Hour  Hit 22'),
            'HOUR_HIT_23' => Yii::t('app', 'Hour  Hit 23'),
            'HOUR_EVENT_0' => Yii::t('app', 'Hour  Event 0'),
            'HOUR_EVENT_1' => Yii::t('app', 'Hour  Event 1'),
            'HOUR_EVENT_2' => Yii::t('app', 'Hour  Event 2'),
            'HOUR_EVENT_3' => Yii::t('app', 'Hour  Event 3'),
            'HOUR_EVENT_4' => Yii::t('app', 'Hour  Event 4'),
            'HOUR_EVENT_5' => Yii::t('app', 'Hour  Event 5'),
            'HOUR_EVENT_6' => Yii::t('app', 'Hour  Event 6'),
            'HOUR_EVENT_7' => Yii::t('app', 'Hour  Event 7'),
            'HOUR_EVENT_8' => Yii::t('app', 'Hour  Event 8'),
            'HOUR_EVENT_9' => Yii::t('app', 'Hour  Event 9'),
            'HOUR_EVENT_10' => Yii::t('app', 'Hour  Event 10'),
            'HOUR_EVENT_11' => Yii::t('app', 'Hour  Event 11'),
            'HOUR_EVENT_12' => Yii::t('app', 'Hour  Event 12'),
            'HOUR_EVENT_13' => Yii::t('app', 'Hour  Event 13'),
            'HOUR_EVENT_14' => Yii::t('app', 'Hour  Event 14'),
            'HOUR_EVENT_15' => Yii::t('app', 'Hour  Event 15'),
            'HOUR_EVENT_16' => Yii::t('app', 'Hour  Event 16'),
            'HOUR_EVENT_17' => Yii::t('app', 'Hour  Event 17'),
            'HOUR_EVENT_18' => Yii::t('app', 'Hour  Event 18'),
            'HOUR_EVENT_19' => Yii::t('app', 'Hour  Event 19'),
            'HOUR_EVENT_20' => Yii::t('app', 'Hour  Event 20'),
            'HOUR_EVENT_21' => Yii::t('app', 'Hour  Event 21'),
            'HOUR_EVENT_22' => Yii::t('app', 'Hour  Event 22'),
            'HOUR_EVENT_23' => Yii::t('app', 'Hour  Event 23'),
            'HOUR_FAVORITE_0' => Yii::t('app', 'Hour  Favorite 0'),
            'HOUR_FAVORITE_1' => Yii::t('app', 'Hour  Favorite 1'),
            'HOUR_FAVORITE_2' => Yii::t('app', 'Hour  Favorite 2'),
            'HOUR_FAVORITE_3' => Yii::t('app', 'Hour  Favorite 3'),
            'HOUR_FAVORITE_4' => Yii::t('app', 'Hour  Favorite 4'),
            'HOUR_FAVORITE_5' => Yii::t('app', 'Hour  Favorite 5'),
            'HOUR_FAVORITE_6' => Yii::t('app', 'Hour  Favorite 6'),
            'HOUR_FAVORITE_7' => Yii::t('app', 'Hour  Favorite 7'),
            'HOUR_FAVORITE_8' => Yii::t('app', 'Hour  Favorite 8'),
            'HOUR_FAVORITE_9' => Yii::t('app', 'Hour  Favorite 9'),
            'HOUR_FAVORITE_10' => Yii::t('app', 'Hour  Favorite 10'),
            'HOUR_FAVORITE_11' => Yii::t('app', 'Hour  Favorite 11'),
            'HOUR_FAVORITE_12' => Yii::t('app', 'Hour  Favorite 12'),
            'HOUR_FAVORITE_13' => Yii::t('app', 'Hour  Favorite 13'),
            'HOUR_FAVORITE_14' => Yii::t('app', 'Hour  Favorite 14'),
            'HOUR_FAVORITE_15' => Yii::t('app', 'Hour  Favorite 15'),
            'HOUR_FAVORITE_16' => Yii::t('app', 'Hour  Favorite 16'),
            'HOUR_FAVORITE_17' => Yii::t('app', 'Hour  Favorite 17'),
            'HOUR_FAVORITE_18' => Yii::t('app', 'Hour  Favorite 18'),
            'HOUR_FAVORITE_19' => Yii::t('app', 'Hour  Favorite 19'),
            'HOUR_FAVORITE_20' => Yii::t('app', 'Hour  Favorite 20'),
            'HOUR_FAVORITE_21' => Yii::t('app', 'Hour  Favorite 21'),
            'HOUR_FAVORITE_22' => Yii::t('app', 'Hour  Favorite 22'),
            'HOUR_FAVORITE_23' => Yii::t('app', 'Hour  Favorite 23'),
            'WEEKDAY_HOST_0' => Yii::t('app', 'Weekday  Host 0'),
            'WEEKDAY_HOST_1' => Yii::t('app', 'Weekday  Host 1'),
            'WEEKDAY_HOST_2' => Yii::t('app', 'Weekday  Host 2'),
            'WEEKDAY_HOST_3' => Yii::t('app', 'Weekday  Host 3'),
            'WEEKDAY_HOST_4' => Yii::t('app', 'Weekday  Host 4'),
            'WEEKDAY_HOST_5' => Yii::t('app', 'Weekday  Host 5'),
            'WEEKDAY_HOST_6' => Yii::t('app', 'Weekday  Host 6'),
            'WEEKDAY_GUEST_0' => Yii::t('app', 'Weekday  Guest 0'),
            'WEEKDAY_GUEST_1' => Yii::t('app', 'Weekday  Guest 1'),
            'WEEKDAY_GUEST_2' => Yii::t('app', 'Weekday  Guest 2'),
            'WEEKDAY_GUEST_3' => Yii::t('app', 'Weekday  Guest 3'),
            'WEEKDAY_GUEST_4' => Yii::t('app', 'Weekday  Guest 4'),
            'WEEKDAY_GUEST_5' => Yii::t('app', 'Weekday  Guest 5'),
            'WEEKDAY_GUEST_6' => Yii::t('app', 'Weekday  Guest 6'),
            'WEEKDAY_NEW_GUEST_0' => Yii::t('app', 'Weekday  New  Guest 0'),
            'WEEKDAY_NEW_GUEST_1' => Yii::t('app', 'Weekday  New  Guest 1'),
            'WEEKDAY_NEW_GUEST_2' => Yii::t('app', 'Weekday  New  Guest 2'),
            'WEEKDAY_NEW_GUEST_3' => Yii::t('app', 'Weekday  New  Guest 3'),
            'WEEKDAY_NEW_GUEST_4' => Yii::t('app', 'Weekday  New  Guest 4'),
            'WEEKDAY_NEW_GUEST_5' => Yii::t('app', 'Weekday  New  Guest 5'),
            'WEEKDAY_NEW_GUEST_6' => Yii::t('app', 'Weekday  New  Guest 6'),
            'WEEKDAY_SESSION_0' => Yii::t('app', 'Weekday  Session 0'),
            'WEEKDAY_SESSION_1' => Yii::t('app', 'Weekday  Session 1'),
            'WEEKDAY_SESSION_2' => Yii::t('app', 'Weekday  Session 2'),
            'WEEKDAY_SESSION_3' => Yii::t('app', 'Weekday  Session 3'),
            'WEEKDAY_SESSION_4' => Yii::t('app', 'Weekday  Session 4'),
            'WEEKDAY_SESSION_5' => Yii::t('app', 'Weekday  Session 5'),
            'WEEKDAY_SESSION_6' => Yii::t('app', 'Weekday  Session 6'),
            'WEEKDAY_HIT_0' => Yii::t('app', 'Weekday  Hit 0'),
            'WEEKDAY_HIT_1' => Yii::t('app', 'Weekday  Hit 1'),
            'WEEKDAY_HIT_2' => Yii::t('app', 'Weekday  Hit 2'),
            'WEEKDAY_HIT_3' => Yii::t('app', 'Weekday  Hit 3'),
            'WEEKDAY_HIT_4' => Yii::t('app', 'Weekday  Hit 4'),
            'WEEKDAY_HIT_5' => Yii::t('app', 'Weekday  Hit 5'),
            'WEEKDAY_HIT_6' => Yii::t('app', 'Weekday  Hit 6'),
            'WEEKDAY_EVENT_0' => Yii::t('app', 'Weekday  Event 0'),
            'WEEKDAY_EVENT_1' => Yii::t('app', 'Weekday  Event 1'),
            'WEEKDAY_EVENT_2' => Yii::t('app', 'Weekday  Event 2'),
            'WEEKDAY_EVENT_3' => Yii::t('app', 'Weekday  Event 3'),
            'WEEKDAY_EVENT_4' => Yii::t('app', 'Weekday  Event 4'),
            'WEEKDAY_EVENT_5' => Yii::t('app', 'Weekday  Event 5'),
            'WEEKDAY_EVENT_6' => Yii::t('app', 'Weekday  Event 6'),
            'WEEKDAY_FAVORITE_0' => Yii::t('app', 'Weekday  Favorite 0'),
            'WEEKDAY_FAVORITE_1' => Yii::t('app', 'Weekday  Favorite 1'),
            'WEEKDAY_FAVORITE_2' => Yii::t('app', 'Weekday  Favorite 2'),
            'WEEKDAY_FAVORITE_3' => Yii::t('app', 'Weekday  Favorite 3'),
            'WEEKDAY_FAVORITE_4' => Yii::t('app', 'Weekday  Favorite 4'),
            'WEEKDAY_FAVORITE_5' => Yii::t('app', 'Weekday  Favorite 5'),
            'WEEKDAY_FAVORITE_6' => Yii::t('app', 'Weekday  Favorite 6'),
            'MONTH_HOST_1' => Yii::t('app', 'Month  Host 1'),
            'MONTH_HOST_2' => Yii::t('app', 'Month  Host 2'),
            'MONTH_HOST_3' => Yii::t('app', 'Month  Host 3'),
            'MONTH_HOST_4' => Yii::t('app', 'Month  Host 4'),
            'MONTH_HOST_5' => Yii::t('app', 'Month  Host 5'),
            'MONTH_HOST_6' => Yii::t('app', 'Month  Host 6'),
            'MONTH_HOST_7' => Yii::t('app', 'Month  Host 7'),
            'MONTH_HOST_8' => Yii::t('app', 'Month  Host 8'),
            'MONTH_HOST_9' => Yii::t('app', 'Month  Host 9'),
            'MONTH_HOST_10' => Yii::t('app', 'Month  Host 10'),
            'MONTH_HOST_11' => Yii::t('app', 'Month  Host 11'),
            'MONTH_HOST_12' => Yii::t('app', 'Month  Host 12'),
            'MONTH_GUEST_1' => Yii::t('app', 'Month  Guest 1'),
            'MONTH_GUEST_2' => Yii::t('app', 'Month  Guest 2'),
            'MONTH_GUEST_3' => Yii::t('app', 'Month  Guest 3'),
            'MONTH_GUEST_4' => Yii::t('app', 'Month  Guest 4'),
            'MONTH_GUEST_5' => Yii::t('app', 'Month  Guest 5'),
            'MONTH_GUEST_6' => Yii::t('app', 'Month  Guest 6'),
            'MONTH_GUEST_7' => Yii::t('app', 'Month  Guest 7'),
            'MONTH_GUEST_8' => Yii::t('app', 'Month  Guest 8'),
            'MONTH_GUEST_9' => Yii::t('app', 'Month  Guest 9'),
            'MONTH_GUEST_10' => Yii::t('app', 'Month  Guest 10'),
            'MONTH_GUEST_11' => Yii::t('app', 'Month  Guest 11'),
            'MONTH_GUEST_12' => Yii::t('app', 'Month  Guest 12'),
            'MONTH_NEW_GUEST_1' => Yii::t('app', 'Month  New  Guest 1'),
            'MONTH_NEW_GUEST_2' => Yii::t('app', 'Month  New  Guest 2'),
            'MONTH_NEW_GUEST_3' => Yii::t('app', 'Month  New  Guest 3'),
            'MONTH_NEW_GUEST_4' => Yii::t('app', 'Month  New  Guest 4'),
            'MONTH_NEW_GUEST_5' => Yii::t('app', 'Month  New  Guest 5'),
            'MONTH_NEW_GUEST_6' => Yii::t('app', 'Month  New  Guest 6'),
            'MONTH_NEW_GUEST_7' => Yii::t('app', 'Month  New  Guest 7'),
            'MONTH_NEW_GUEST_8' => Yii::t('app', 'Month  New  Guest 8'),
            'MONTH_NEW_GUEST_9' => Yii::t('app', 'Month  New  Guest 9'),
            'MONTH_NEW_GUEST_10' => Yii::t('app', 'Month  New  Guest 10'),
            'MONTH_NEW_GUEST_11' => Yii::t('app', 'Month  New  Guest 11'),
            'MONTH_NEW_GUEST_12' => Yii::t('app', 'Month  New  Guest 12'),
            'MONTH_SESSION_1' => Yii::t('app', 'Month  Session 1'),
            'MONTH_SESSION_2' => Yii::t('app', 'Month  Session 2'),
            'MONTH_SESSION_3' => Yii::t('app', 'Month  Session 3'),
            'MONTH_SESSION_4' => Yii::t('app', 'Month  Session 4'),
            'MONTH_SESSION_5' => Yii::t('app', 'Month  Session 5'),
            'MONTH_SESSION_6' => Yii::t('app', 'Month  Session 6'),
            'MONTH_SESSION_7' => Yii::t('app', 'Month  Session 7'),
            'MONTH_SESSION_8' => Yii::t('app', 'Month  Session 8'),
            'MONTH_SESSION_9' => Yii::t('app', 'Month  Session 9'),
            'MONTH_SESSION_10' => Yii::t('app', 'Month  Session 10'),
            'MONTH_SESSION_11' => Yii::t('app', 'Month  Session 11'),
            'MONTH_SESSION_12' => Yii::t('app', 'Month  Session 12'),
            'MONTH_HIT_1' => Yii::t('app', 'Month  Hit 1'),
            'MONTH_HIT_2' => Yii::t('app', 'Month  Hit 2'),
            'MONTH_HIT_3' => Yii::t('app', 'Month  Hit 3'),
            'MONTH_HIT_4' => Yii::t('app', 'Month  Hit 4'),
            'MONTH_HIT_5' => Yii::t('app', 'Month  Hit 5'),
            'MONTH_HIT_6' => Yii::t('app', 'Month  Hit 6'),
            'MONTH_HIT_7' => Yii::t('app', 'Month  Hit 7'),
            'MONTH_HIT_8' => Yii::t('app', 'Month  Hit 8'),
            'MONTH_HIT_9' => Yii::t('app', 'Month  Hit 9'),
            'MONTH_HIT_10' => Yii::t('app', 'Month  Hit 10'),
            'MONTH_HIT_11' => Yii::t('app', 'Month  Hit 11'),
            'MONTH_HIT_12' => Yii::t('app', 'Month  Hit 12'),
            'MONTH_EVENT_1' => Yii::t('app', 'Month  Event 1'),
            'MONTH_EVENT_2' => Yii::t('app', 'Month  Event 2'),
            'MONTH_EVENT_3' => Yii::t('app', 'Month  Event 3'),
            'MONTH_EVENT_4' => Yii::t('app', 'Month  Event 4'),
            'MONTH_EVENT_5' => Yii::t('app', 'Month  Event 5'),
            'MONTH_EVENT_6' => Yii::t('app', 'Month  Event 6'),
            'MONTH_EVENT_7' => Yii::t('app', 'Month  Event 7'),
            'MONTH_EVENT_8' => Yii::t('app', 'Month  Event 8'),
            'MONTH_EVENT_9' => Yii::t('app', 'Month  Event 9'),
            'MONTH_EVENT_10' => Yii::t('app', 'Month  Event 10'),
            'MONTH_EVENT_11' => Yii::t('app', 'Month  Event 11'),
            'MONTH_EVENT_12' => Yii::t('app', 'Month  Event 12'),
            'MONTH_FAVORITE_1' => Yii::t('app', 'Month  Favorite 1'),
            'MONTH_FAVORITE_2' => Yii::t('app', 'Month  Favorite 2'),
            'MONTH_FAVORITE_3' => Yii::t('app', 'Month  Favorite 3'),
            'MONTH_FAVORITE_4' => Yii::t('app', 'Month  Favorite 4'),
            'MONTH_FAVORITE_5' => Yii::t('app', 'Month  Favorite 5'),
            'MONTH_FAVORITE_6' => Yii::t('app', 'Month  Favorite 6'),
            'MONTH_FAVORITE_7' => Yii::t('app', 'Month  Favorite 7'),
            'MONTH_FAVORITE_8' => Yii::t('app', 'Month  Favorite 8'),
            'MONTH_FAVORITE_9' => Yii::t('app', 'Month  Favorite 9'),
            'MONTH_FAVORITE_10' => Yii::t('app', 'Month  Favorite 10'),
            'MONTH_FAVORITE_11' => Yii::t('app', 'Month  Favorite 11'),
            'MONTH_FAVORITE_12' => Yii::t('app', 'Month  Favorite 12'),
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
