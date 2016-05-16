<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_seo_adv_autolog".
 *
 * @property integer $ID
 * @property integer $ENGINE_ID
 * @property string $TIMESTAMP_X
 * @property integer $CAMPAIGN_ID
 * @property string $CAMPAIGN_XML_ID
 * @property integer $BANNER_ID
 * @property string $BANNER_XML_ID
 * @property integer $CAUSE_CODE
 * @property string $SUCCESS
 */
class BSeoAdvAutolog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_seo_adv_autolog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ENGINE_ID', 'TIMESTAMP_X', 'CAMPAIGN_ID', 'CAMPAIGN_XML_ID', 'BANNER_ID', 'BANNER_XML_ID'], 'required'],
            [['ENGINE_ID', 'CAMPAIGN_ID', 'BANNER_ID', 'CAUSE_CODE'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['CAMPAIGN_XML_ID', 'BANNER_XML_ID'], 'string', 'max' => 255],
            [['SUCCESS'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ENGINE_ID' => Yii::t('app', 'Engine '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'CAMPAIGN_ID' => Yii::t('app', 'Campaign '),
            'CAMPAIGN_XML_ID' => Yii::t('app', 'Campaign  Xml '),
            'BANNER_ID' => Yii::t('app', 'Banner '),
            'BANNER_XML_ID' => Yii::t('app', 'Banner  Xml '),
            'CAUSE_CODE' => Yii::t('app', 'Cause  Code'),
            'SUCCESS' => Yii::t('app', 'Success'),
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
