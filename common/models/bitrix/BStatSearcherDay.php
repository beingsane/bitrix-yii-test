<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_searcher_day".
 *
 * @property integer $ID
 * @property string $DATE_STAT
 * @property string $DATE_LAST
 * @property integer $SEARCHER_ID
 * @property integer $TOTAL_HITS
 */
class BStatSearcherDay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_searcher_day';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_STAT', 'DATE_LAST'], 'safe'],
            [['SEARCHER_ID', 'TOTAL_HITS'], 'integer']
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
            'SEARCHER_ID' => Yii::t('app', 'Searcher '),
            'TOTAL_HITS' => Yii::t('app', 'Total  Hits'),
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
