<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_adv_contract_2_weekday".
 *
 * @property integer $CONTRACT_ID
 * @property string $C_WEEKDAY
 * @property integer $C_HOUR
 */
class BAdvContract2Weekday extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_adv_contract_2_weekday';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CONTRACT_ID', 'C_WEEKDAY', 'C_HOUR'], 'required'],
            [['CONTRACT_ID', 'C_HOUR'], 'integer'],
            [['C_WEEKDAY'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CONTRACT_ID' => Yii::t('app', 'Contract '),
            'C_WEEKDAY' => Yii::t('app', 'C  Weekday'),
            'C_HOUR' => Yii::t('app', 'C  Hour'),
        ];
    }

    public function getName()
    {
        return $this->CONTRACT_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'CONTRACT_ID', 'CONTRACT_ID');
        return $list;
    }
}
