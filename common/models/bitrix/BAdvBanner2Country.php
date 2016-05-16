<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_adv_banner_2_country".
 *
 * @property integer $BANNER_ID
 * @property string $COUNTRY_ID
 * @property string $REGION
 * @property integer $CITY_ID
 */
class BAdvBanner2Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_adv_banner_2_country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BANNER_ID', 'CITY_ID'], 'integer'],
            [['COUNTRY_ID'], 'required'],
            [['COUNTRY_ID'], 'string', 'max' => 2],
            [['REGION'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'BANNER_ID' => Yii::t('app', 'Banner '),
            'COUNTRY_ID' => Yii::t('app', 'Country '),
            'REGION' => Yii::t('app', 'Region'),
            'CITY_ID' => Yii::t('app', 'City '),
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
