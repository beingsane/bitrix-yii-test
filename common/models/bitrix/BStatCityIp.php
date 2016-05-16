<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_city_ip".
 *
 * @property string $START_IP
 * @property string $END_IP
 * @property string $COUNTRY_ID
 * @property integer $CITY_ID
 */
class BStatCityIp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_city_ip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['START_IP', 'END_IP', 'COUNTRY_ID', 'CITY_ID'], 'required'],
            [['START_IP', 'END_IP', 'CITY_ID'], 'integer'],
            [['COUNTRY_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'START_IP' => Yii::t('app', 'Start  Ip'),
            'END_IP' => Yii::t('app', 'End  Ip'),
            'COUNTRY_ID' => Yii::t('app', 'Country '),
            'CITY_ID' => Yii::t('app', 'City '),
        ];
    }

    public function getName()
    {
        return $this->START_IP;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'START_IP', 'START_IP');
        return $list;
    }
}
