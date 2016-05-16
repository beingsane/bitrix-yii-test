<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_log_page".
 *
 * @property integer $USER_ID
 * @property string $SITE_ID
 * @property string $GROUP_CODE
 * @property integer $PAGE_SIZE
 * @property integer $PAGE_NUM
 * @property string $PAGE_LAST_DATE
 * @property integer $TRAFFIC_AVG
 * @property integer $TRAFFIC_CNT
 * @property string $TRAFFIC_LAST_DATE
 */
class BSonetLogPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_log_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'SITE_ID', 'GROUP_CODE', 'PAGE_SIZE', 'PAGE_NUM'], 'required'],
            [['USER_ID', 'PAGE_SIZE', 'PAGE_NUM', 'TRAFFIC_AVG', 'TRAFFIC_CNT'], 'integer'],
            [['PAGE_LAST_DATE', 'TRAFFIC_LAST_DATE'], 'safe'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['GROUP_CODE'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User '),
            'SITE_ID' => Yii::t('app', 'Site '),
            'GROUP_CODE' => Yii::t('app', 'Group  Code'),
            'PAGE_SIZE' => Yii::t('app', 'Page  Size'),
            'PAGE_NUM' => Yii::t('app', 'Page  Num'),
            'PAGE_LAST_DATE' => Yii::t('app', 'Page  Last  Date'),
            'TRAFFIC_AVG' => Yii::t('app', 'Traffic  Avg'),
            'TRAFFIC_CNT' => Yii::t('app', 'Traffic  Cnt'),
            'TRAFFIC_LAST_DATE' => Yii::t('app', 'Traffic  Last  Date'),
        ];
    }

    public function getName()
    {
        return $this->USER_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'USER_ID', 'USER_ID');
        return $list;
    }
}
