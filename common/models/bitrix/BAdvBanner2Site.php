<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_adv_banner_2_site".
 *
 * @property integer $BANNER_ID
 * @property string $SITE_ID
 */
class BAdvBanner2Site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_adv_banner_2_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BANNER_ID', 'SITE_ID'], 'required'],
            [['BANNER_ID'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'BANNER_ID' => Yii::t('app', 'Banner '),
            'SITE_ID' => Yii::t('app', 'Site '),
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
