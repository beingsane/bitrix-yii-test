<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_hit".
 *
 * @property integer $ID
 * @property integer $SESSION_ID
 * @property string $DATE_HIT
 * @property integer $GUEST_ID
 * @property string $NEW_GUEST
 * @property integer $USER_ID
 * @property string $USER_AUTH
 * @property string $URL
 * @property string $URL_404
 * @property string $URL_FROM
 * @property string $IP
 * @property string $METHOD
 * @property string $COOKIES
 * @property string $USER_AGENT
 * @property integer $STOP_LIST_ID
 * @property string $COUNTRY_ID
 * @property integer $CITY_ID
 * @property string $SITE_ID
 */
class BStatHit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_hit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SESSION_ID', 'GUEST_ID', 'USER_ID', 'STOP_LIST_ID', 'CITY_ID'], 'integer'],
            [['DATE_HIT'], 'safe'],
            [['URL', 'URL_FROM', 'COOKIES', 'USER_AGENT'], 'string'],
            [['NEW_GUEST', 'USER_AUTH', 'URL_404'], 'string', 'max' => 1],
            [['IP'], 'string', 'max' => 15],
            [['METHOD'], 'string', 'max' => 10],
            [['COUNTRY_ID', 'SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SESSION_ID' => Yii::t('app', 'Session '),
            'DATE_HIT' => Yii::t('app', 'Date  Hit'),
            'GUEST_ID' => Yii::t('app', 'Guest '),
            'NEW_GUEST' => Yii::t('app', 'New  Guest'),
            'USER_ID' => Yii::t('app', 'User '),
            'USER_AUTH' => Yii::t('app', 'User  Auth'),
            'URL' => Yii::t('app', 'Url'),
            'URL_404' => Yii::t('app', 'Url 404'),
            'URL_FROM' => Yii::t('app', 'Url  From'),
            'IP' => Yii::t('app', 'Ip'),
            'METHOD' => Yii::t('app', 'Method'),
            'COOKIES' => Yii::t('app', 'Cookies'),
            'USER_AGENT' => Yii::t('app', 'User  Agent'),
            'STOP_LIST_ID' => Yii::t('app', 'Stop  List '),
            'COUNTRY_ID' => Yii::t('app', 'Country '),
            'CITY_ID' => Yii::t('app', 'City '),
            'SITE_ID' => Yii::t('app', 'Site '),
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
