<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_seo_yandex_direct_stat".
 *
 * @property integer $ID
 * @property integer $CAMPAIGN_ID
 * @property integer $BANNER_ID
 * @property string $DATE_DAY
 * @property string $CURRENCY
 * @property double $SUM
 * @property double $SUM_SEARCH
 * @property double $SUM_CONTEXT
 * @property integer $CLICKS
 * @property integer $CLICKS_SEARCH
 * @property integer $CLICKS_CONTEXT
 * @property integer $SHOWS
 * @property integer $SHOWS_SEARCH
 * @property integer $SHOWS_CONTEXT
 */
class BSeoYandexDirectStat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_seo_yandex_direct_stat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CAMPAIGN_ID', 'BANNER_ID', 'DATE_DAY'], 'required'],
            [['CAMPAIGN_ID', 'BANNER_ID', 'CLICKS', 'CLICKS_SEARCH', 'CLICKS_CONTEXT', 'SHOWS', 'SHOWS_SEARCH', 'SHOWS_CONTEXT'], 'integer'],
            [['DATE_DAY'], 'safe'],
            [['SUM', 'SUM_SEARCH', 'SUM_CONTEXT'], 'number'],
            [['CURRENCY'], 'string', 'max' => 3],
            [['BANNER_ID', 'DATE_DAY'], 'unique', 'targetAttribute' => ['BANNER_ID', 'DATE_DAY'], 'message' => 'The combination of Banner  and Date  Day has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CAMPAIGN_ID' => Yii::t('app', 'Campaign '),
            'BANNER_ID' => Yii::t('app', 'Banner '),
            'DATE_DAY' => Yii::t('app', 'Date  Day'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'SUM' => Yii::t('app', 'Sum'),
            'SUM_SEARCH' => Yii::t('app', 'Sum  Search'),
            'SUM_CONTEXT' => Yii::t('app', 'Sum  Context'),
            'CLICKS' => Yii::t('app', 'Clicks'),
            'CLICKS_SEARCH' => Yii::t('app', 'Clicks  Search'),
            'CLICKS_CONTEXT' => Yii::t('app', 'Clicks  Context'),
            'SHOWS' => Yii::t('app', 'Shows'),
            'SHOWS_SEARCH' => Yii::t('app', 'Shows  Search'),
            'SHOWS_CONTEXT' => Yii::t('app', 'Shows  Context'),
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
