<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_guest".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $FAVORITES
 * @property integer $C_EVENTS
 * @property integer $SESSIONS
 * @property integer $HITS
 * @property string $REPAIR
 * @property integer $FIRST_SESSION_ID
 * @property string $FIRST_DATE
 * @property string $FIRST_URL_FROM
 * @property string $FIRST_URL_TO
 * @property string $FIRST_URL_TO_404
 * @property string $FIRST_SITE_ID
 * @property integer $FIRST_ADV_ID
 * @property string $FIRST_REFERER1
 * @property string $FIRST_REFERER2
 * @property string $FIRST_REFERER3
 * @property integer $LAST_SESSION_ID
 * @property string $LAST_DATE
 * @property integer $LAST_USER_ID
 * @property string $LAST_USER_AUTH
 * @property string $LAST_URL_LAST
 * @property string $LAST_URL_LAST_404
 * @property string $LAST_USER_AGENT
 * @property string $LAST_IP
 * @property string $LAST_COOKIE
 * @property string $LAST_LANGUAGE
 * @property integer $LAST_ADV_ID
 * @property string $LAST_ADV_BACK
 * @property string $LAST_REFERER1
 * @property string $LAST_REFERER2
 * @property string $LAST_REFERER3
 * @property string $LAST_SITE_ID
 * @property string $LAST_COUNTRY_ID
 * @property integer $LAST_CITY_ID
 * @property string $LAST_CITY_INFO
 */
class BStatGuest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_guest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'FIRST_DATE', 'LAST_DATE'], 'safe'],
            [['C_EVENTS', 'SESSIONS', 'HITS', 'FIRST_SESSION_ID', 'FIRST_ADV_ID', 'LAST_SESSION_ID', 'LAST_USER_ID', 'LAST_ADV_ID', 'LAST_CITY_ID'], 'integer'],
            [['FIRST_URL_FROM', 'FIRST_URL_TO', 'LAST_URL_LAST', 'LAST_USER_AGENT', 'LAST_COOKIE', 'LAST_CITY_INFO'], 'string'],
            [['FAVORITES', 'REPAIR', 'FIRST_URL_TO_404', 'LAST_USER_AUTH', 'LAST_URL_LAST_404', 'LAST_ADV_BACK'], 'string', 'max' => 1],
            [['FIRST_SITE_ID', 'LAST_SITE_ID', 'LAST_COUNTRY_ID'], 'string', 'max' => 2],
            [['FIRST_REFERER1', 'FIRST_REFERER2', 'FIRST_REFERER3', 'LAST_LANGUAGE', 'LAST_REFERER1', 'LAST_REFERER2', 'LAST_REFERER3'], 'string', 'max' => 255],
            [['LAST_IP'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'FAVORITES' => Yii::t('app', 'Favorites'),
            'C_EVENTS' => Yii::t('app', 'C  Events'),
            'SESSIONS' => Yii::t('app', 'Sessions'),
            'HITS' => Yii::t('app', 'Hits'),
            'REPAIR' => Yii::t('app', 'Repair'),
            'FIRST_SESSION_ID' => Yii::t('app', 'First  Session '),
            'FIRST_DATE' => Yii::t('app', 'First  Date'),
            'FIRST_URL_FROM' => Yii::t('app', 'First  Url  From'),
            'FIRST_URL_TO' => Yii::t('app', 'First  Url  To'),
            'FIRST_URL_TO_404' => Yii::t('app', 'First  Url  To 404'),
            'FIRST_SITE_ID' => Yii::t('app', 'First  Site '),
            'FIRST_ADV_ID' => Yii::t('app', 'First  Adv '),
            'FIRST_REFERER1' => Yii::t('app', 'First  Referer1'),
            'FIRST_REFERER2' => Yii::t('app', 'First  Referer2'),
            'FIRST_REFERER3' => Yii::t('app', 'First  Referer3'),
            'LAST_SESSION_ID' => Yii::t('app', 'Last  Session '),
            'LAST_DATE' => Yii::t('app', 'Last  Date'),
            'LAST_USER_ID' => Yii::t('app', 'Last  User '),
            'LAST_USER_AUTH' => Yii::t('app', 'Last  User  Auth'),
            'LAST_URL_LAST' => Yii::t('app', 'Last  Url  Last'),
            'LAST_URL_LAST_404' => Yii::t('app', 'Last  Url  Last 404'),
            'LAST_USER_AGENT' => Yii::t('app', 'Last  User  Agent'),
            'LAST_IP' => Yii::t('app', 'Last  Ip'),
            'LAST_COOKIE' => Yii::t('app', 'Last  Cookie'),
            'LAST_LANGUAGE' => Yii::t('app', 'Last  Language'),
            'LAST_ADV_ID' => Yii::t('app', 'Last  Adv '),
            'LAST_ADV_BACK' => Yii::t('app', 'Last  Adv  Back'),
            'LAST_REFERER1' => Yii::t('app', 'Last  Referer1'),
            'LAST_REFERER2' => Yii::t('app', 'Last  Referer2'),
            'LAST_REFERER3' => Yii::t('app', 'Last  Referer3'),
            'LAST_SITE_ID' => Yii::t('app', 'Last  Site '),
            'LAST_COUNTRY_ID' => Yii::t('app', 'Last  Country '),
            'LAST_CITY_ID' => Yii::t('app', 'Last  City '),
            'LAST_CITY_INFO' => Yii::t('app', 'Last  City  Info'),
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
