<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_session".
 *
 * @property integer $ID
 * @property integer $GUEST_ID
 * @property string $NEW_GUEST
 * @property integer $USER_ID
 * @property string $USER_AUTH
 * @property integer $C_EVENTS
 * @property integer $HITS
 * @property string $FAVORITES
 * @property string $URL_FROM
 * @property string $URL_TO
 * @property string $URL_TO_404
 * @property string $URL_LAST
 * @property string $URL_LAST_404
 * @property string $USER_AGENT
 * @property string $DATE_STAT
 * @property string $DATE_FIRST
 * @property string $DATE_LAST
 * @property string $IP_FIRST
 * @property string $IP_FIRST_NUMBER
 * @property string $IP_LAST
 * @property string $IP_LAST_NUMBER
 * @property integer $FIRST_HIT_ID
 * @property integer $LAST_HIT_ID
 * @property string $PHPSESSID
 * @property integer $ADV_ID
 * @property string $ADV_BACK
 * @property string $REFERER1
 * @property string $REFERER2
 * @property string $REFERER3
 * @property integer $STOP_LIST_ID
 * @property string $COUNTRY_ID
 * @property integer $CITY_ID
 * @property string $FIRST_SITE_ID
 * @property string $LAST_SITE_ID
 */
class BStatSession extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_session';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GUEST_ID', 'USER_ID', 'C_EVENTS', 'HITS', 'IP_FIRST_NUMBER', 'IP_LAST_NUMBER', 'FIRST_HIT_ID', 'LAST_HIT_ID', 'ADV_ID', 'STOP_LIST_ID', 'CITY_ID'], 'integer'],
            [['URL_FROM', 'URL_TO', 'URL_LAST', 'USER_AGENT'], 'string'],
            [['DATE_STAT', 'DATE_FIRST', 'DATE_LAST'], 'safe'],
            [['NEW_GUEST', 'USER_AUTH', 'FAVORITES', 'URL_TO_404', 'URL_LAST_404', 'ADV_BACK'], 'string', 'max' => 1],
            [['IP_FIRST', 'IP_LAST'], 'string', 'max' => 15],
            [['PHPSESSID', 'REFERER1', 'REFERER2', 'REFERER3'], 'string', 'max' => 255],
            [['COUNTRY_ID', 'FIRST_SITE_ID', 'LAST_SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'GUEST_ID' => Yii::t('app', 'Guest '),
            'NEW_GUEST' => Yii::t('app', 'New  Guest'),
            'USER_ID' => Yii::t('app', 'User '),
            'USER_AUTH' => Yii::t('app', 'User  Auth'),
            'C_EVENTS' => Yii::t('app', 'C  Events'),
            'HITS' => Yii::t('app', 'Hits'),
            'FAVORITES' => Yii::t('app', 'Favorites'),
            'URL_FROM' => Yii::t('app', 'Url  From'),
            'URL_TO' => Yii::t('app', 'Url  To'),
            'URL_TO_404' => Yii::t('app', 'Url  To 404'),
            'URL_LAST' => Yii::t('app', 'Url  Last'),
            'URL_LAST_404' => Yii::t('app', 'Url  Last 404'),
            'USER_AGENT' => Yii::t('app', 'User  Agent'),
            'DATE_STAT' => Yii::t('app', 'Date  Stat'),
            'DATE_FIRST' => Yii::t('app', 'Date  First'),
            'DATE_LAST' => Yii::t('app', 'Date  Last'),
            'IP_FIRST' => Yii::t('app', 'Ip  First'),
            'IP_FIRST_NUMBER' => Yii::t('app', 'Ip  First  Number'),
            'IP_LAST' => Yii::t('app', 'Ip  Last'),
            'IP_LAST_NUMBER' => Yii::t('app', 'Ip  Last  Number'),
            'FIRST_HIT_ID' => Yii::t('app', 'First  Hit '),
            'LAST_HIT_ID' => Yii::t('app', 'Last  Hit '),
            'PHPSESSID' => Yii::t('app', 'Phpsessid'),
            'ADV_ID' => Yii::t('app', 'Adv '),
            'ADV_BACK' => Yii::t('app', 'Adv  Back'),
            'REFERER1' => Yii::t('app', 'Referer1'),
            'REFERER2' => Yii::t('app', 'Referer2'),
            'REFERER3' => Yii::t('app', 'Referer3'),
            'STOP_LIST_ID' => Yii::t('app', 'Stop  List '),
            'COUNTRY_ID' => Yii::t('app', 'Country '),
            'CITY_ID' => Yii::t('app', 'City '),
            'FIRST_SITE_ID' => Yii::t('app', 'First  Site '),
            'LAST_SITE_ID' => Yii::t('app', 'Last  Site '),
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
