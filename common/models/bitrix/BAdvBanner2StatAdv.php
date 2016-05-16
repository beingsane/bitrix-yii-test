<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_adv_banner_2_stat_adv".
 *
 * @property integer $BANNER_ID
 * @property integer $STAT_ADV_ID
 */
class BAdvBanner2StatAdv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_adv_banner_2_stat_adv';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BANNER_ID', 'STAT_ADV_ID'], 'required'],
            [['BANNER_ID', 'STAT_ADV_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'BANNER_ID' => Yii::t('app', 'Banner '),
            'STAT_ADV_ID' => Yii::t('app', 'Stat  Adv '),
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
