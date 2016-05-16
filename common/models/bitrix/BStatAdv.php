<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_adv".
 *
 * @property integer $ID
 * @property string $REFERER1
 * @property string $REFERER2
 * @property string $COST
 * @property string $REVENUE
 * @property string $EVENTS_VIEW
 * @property integer $GUESTS
 * @property integer $NEW_GUESTS
 * @property integer $FAVORITES
 * @property integer $C_HOSTS
 * @property integer $SESSIONS
 * @property integer $HITS
 * @property string $DATE_FIRST
 * @property string $DATE_LAST
 * @property integer $GUESTS_BACK
 * @property integer $FAVORITES_BACK
 * @property integer $HOSTS_BACK
 * @property integer $SESSIONS_BACK
 * @property integer $HITS_BACK
 * @property string $DESCRIPTION
 * @property integer $PRIORITY
 */
class BStatAdv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_adv';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['COST', 'REVENUE'], 'number'],
            [['GUESTS', 'NEW_GUESTS', 'FAVORITES', 'C_HOSTS', 'SESSIONS', 'HITS', 'GUESTS_BACK', 'FAVORITES_BACK', 'HOSTS_BACK', 'SESSIONS_BACK', 'HITS_BACK', 'PRIORITY'], 'integer'],
            [['DATE_FIRST', 'DATE_LAST'], 'safe'],
            [['DESCRIPTION'], 'string'],
            [['REFERER1', 'REFERER2', 'EVENTS_VIEW'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'REFERER1' => Yii::t('app', 'Referer1'),
            'REFERER2' => Yii::t('app', 'Referer2'),
            'COST' => Yii::t('app', 'Cost'),
            'REVENUE' => Yii::t('app', 'Revenue'),
            'EVENTS_VIEW' => Yii::t('app', 'Events  View'),
            'GUESTS' => Yii::t('app', 'Guests'),
            'NEW_GUESTS' => Yii::t('app', 'New  Guests'),
            'FAVORITES' => Yii::t('app', 'Favorites'),
            'C_HOSTS' => Yii::t('app', 'C  Hosts'),
            'SESSIONS' => Yii::t('app', 'Sessions'),
            'HITS' => Yii::t('app', 'Hits'),
            'DATE_FIRST' => Yii::t('app', 'Date  First'),
            'DATE_LAST' => Yii::t('app', 'Date  Last'),
            'GUESTS_BACK' => Yii::t('app', 'Guests  Back'),
            'FAVORITES_BACK' => Yii::t('app', 'Favorites  Back'),
            'HOSTS_BACK' => Yii::t('app', 'Hosts  Back'),
            'SESSIONS_BACK' => Yii::t('app', 'Sessions  Back'),
            'HITS_BACK' => Yii::t('app', 'Hits  Back'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'PRIORITY' => Yii::t('app', 'Priority'),
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
