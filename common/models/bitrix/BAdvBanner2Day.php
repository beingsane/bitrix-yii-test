<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_adv_banner_2_day".
 *
 * @property string $DATE_STAT
 * @property integer $BANNER_ID
 * @property integer $SHOW_COUNT
 * @property integer $CLICK_COUNT
 * @property integer $VISITOR_COUNT
 */
class BAdvBanner2Day extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_adv_banner_2_day';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_STAT', 'BANNER_ID'], 'required'],
            [['DATE_STAT'], 'safe'],
            [['BANNER_ID', 'SHOW_COUNT', 'CLICK_COUNT', 'VISITOR_COUNT'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DATE_STAT' => Yii::t('app', 'Date  Stat'),
            'BANNER_ID' => Yii::t('app', 'Banner '),
            'SHOW_COUNT' => Yii::t('app', 'Show  Count'),
            'CLICK_COUNT' => Yii::t('app', 'Click  Count'),
            'VISITOR_COUNT' => Yii::t('app', 'Visitor  Count'),
        ];
    }

    public function getName()
    {
        return $this->DATE_STAT;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'DATE_STAT', 'DATE_STAT');
        return $list;
    }
}
