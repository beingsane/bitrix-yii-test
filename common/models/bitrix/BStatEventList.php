<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_event_list".
 *
 * @property integer $ID
 * @property integer $EVENT_ID
 * @property string $EVENT3
 * @property string $MONEY
 * @property string $DATE_ENTER
 * @property string $REFERER_URL
 * @property string $URL
 * @property string $REDIRECT_URL
 * @property integer $SESSION_ID
 * @property integer $GUEST_ID
 * @property integer $ADV_ID
 * @property string $ADV_BACK
 * @property integer $HIT_ID
 * @property string $COUNTRY_ID
 * @property integer $KEEP_DAYS
 * @property string $CHARGEBACK
 * @property string $SITE_ID
 * @property string $REFERER_SITE_ID
 */
class BStatEventList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_event_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EVENT_ID', 'SESSION_ID', 'GUEST_ID', 'ADV_ID', 'HIT_ID', 'KEEP_DAYS'], 'integer'],
            [['MONEY'], 'number'],
            [['DATE_ENTER'], 'safe'],
            [['REFERER_URL', 'URL', 'REDIRECT_URL'], 'string'],
            [['EVENT3'], 'string', 'max' => 255],
            [['ADV_BACK', 'CHARGEBACK'], 'string', 'max' => 1],
            [['COUNTRY_ID', 'SITE_ID', 'REFERER_SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'EVENT_ID' => Yii::t('app', 'Event '),
            'EVENT3' => Yii::t('app', 'Event3'),
            'MONEY' => Yii::t('app', 'Money'),
            'DATE_ENTER' => Yii::t('app', 'Date  Enter'),
            'REFERER_URL' => Yii::t('app', 'Referer  Url'),
            'URL' => Yii::t('app', 'Url'),
            'REDIRECT_URL' => Yii::t('app', 'Redirect  Url'),
            'SESSION_ID' => Yii::t('app', 'Session '),
            'GUEST_ID' => Yii::t('app', 'Guest '),
            'ADV_ID' => Yii::t('app', 'Adv '),
            'ADV_BACK' => Yii::t('app', 'Adv  Back'),
            'HIT_ID' => Yii::t('app', 'Hit '),
            'COUNTRY_ID' => Yii::t('app', 'Country '),
            'KEEP_DAYS' => Yii::t('app', 'Keep  Days'),
            'CHARGEBACK' => Yii::t('app', 'Chargeback'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'REFERER_SITE_ID' => Yii::t('app', 'Referer  Site '),
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
