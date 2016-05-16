<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_adv_banner_2_weekday".
 *
 * @property integer $BANNER_ID
 * @property string $C_WEEKDAY
 * @property integer $C_HOUR
 */
class BAdvBanner2Weekday extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_adv_banner_2_weekday';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BANNER_ID', 'C_WEEKDAY', 'C_HOUR'], 'required'],
            [['BANNER_ID', 'C_HOUR'], 'integer'],
            [['C_WEEKDAY'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'BANNER_ID' => Yii::t('app', 'Banner '),
            'C_WEEKDAY' => Yii::t('app', 'C  Weekday'),
            'C_HOUR' => Yii::t('app', 'C  Hour'),
        ];
    }

    public function getName()
    {
        return $this->BANNER_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'BANNER_ID', 'BANNER_ID');
        return $list;
    }
}
