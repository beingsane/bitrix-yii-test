<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_path_adv".
 *
 * @property integer $ID
 * @property integer $ADV_ID
 * @property integer $PATH_ID
 * @property string $DATE_STAT
 * @property integer $COUNTER
 * @property integer $COUNTER_BACK
 * @property integer $COUNTER_FULL_PATH
 * @property integer $COUNTER_FULL_PATH_BACK
 * @property integer $STEPS
 */
class BStatPathAdv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_path_adv';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ADV_ID', 'PATH_ID', 'COUNTER', 'COUNTER_BACK', 'COUNTER_FULL_PATH', 'COUNTER_FULL_PATH_BACK', 'STEPS'], 'integer'],
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
            'PATH_ID' => Yii::t('app', 'Path '),
            'DATE_STAT' => Yii::t('app', 'Date  Stat'),
            'COUNTER' => Yii::t('app', 'Counter'),
            'COUNTER_BACK' => Yii::t('app', 'Counter  Back'),
            'COUNTER_FULL_PATH' => Yii::t('app', 'Counter  Full  Path'),
            'COUNTER_FULL_PATH_BACK' => Yii::t('app', 'Counter  Full  Path  Back'),
            'STEPS' => Yii::t('app', 'Steps'),
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
