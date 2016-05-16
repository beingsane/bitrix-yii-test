<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_page_adv".
 *
 * @property integer $ID
 * @property string $DATE_STAT
 * @property integer $PAGE_ID
 * @property integer $ADV_ID
 * @property integer $COUNTER
 * @property integer $ENTER_COUNTER
 * @property integer $EXIT_COUNTER
 * @property integer $COUNTER_BACK
 * @property integer $ENTER_COUNTER_BACK
 * @property integer $EXIT_COUNTER_BACK
 */
class BStatPageAdv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_page_adv';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_STAT'], 'safe'],
            [['PAGE_ID', 'ADV_ID', 'COUNTER', 'ENTER_COUNTER', 'EXIT_COUNTER', 'COUNTER_BACK', 'ENTER_COUNTER_BACK', 'EXIT_COUNTER_BACK'], 'integer']
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
            'PAGE_ID' => Yii::t('app', 'Page '),
            'ADV_ID' => Yii::t('app', 'Adv '),
            'COUNTER' => Yii::t('app', 'Counter'),
            'ENTER_COUNTER' => Yii::t('app', 'Enter  Counter'),
            'EXIT_COUNTER' => Yii::t('app', 'Exit  Counter'),
            'COUNTER_BACK' => Yii::t('app', 'Counter  Back'),
            'ENTER_COUNTER_BACK' => Yii::t('app', 'Enter  Counter  Back'),
            'EXIT_COUNTER_BACK' => Yii::t('app', 'Exit  Counter  Back'),
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
