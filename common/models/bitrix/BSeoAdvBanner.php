<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_seo_adv_banner".
 *
 * @property integer $ID
 * @property integer $ENGINE_ID
 * @property string $OWNER_ID
 * @property string $OWNER_NAME
 * @property string $ACTIVE
 * @property string $XML_ID
 * @property string $LAST_UPDATE
 * @property string $NAME
 * @property string $SETTINGS
 * @property integer $CAMPAIGN_ID
 * @property integer $GROUP_ID
 * @property string $AUTO_QUANTITY_OFF
 * @property string $AUTO_QUANTITY_ON
 */
class BSeoAdvBanner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_seo_adv_banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ENGINE_ID', 'OWNER_ID', 'OWNER_NAME', 'XML_ID', 'NAME', 'CAMPAIGN_ID'], 'required'],
            [['ENGINE_ID', 'CAMPAIGN_ID', 'GROUP_ID'], 'integer'],
            [['LAST_UPDATE'], 'safe'],
            [['SETTINGS'], 'string'],
            [['OWNER_ID', 'OWNER_NAME', 'XML_ID', 'NAME'], 'string', 'max' => 255],
            [['ACTIVE', 'AUTO_QUANTITY_OFF', 'AUTO_QUANTITY_ON'], 'string', 'max' => 1],
            [['ENGINE_ID', 'XML_ID'], 'unique', 'targetAttribute' => ['ENGINE_ID', 'XML_ID'], 'message' => 'The combination of Engine  and Xml  has already been taken.']
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
            'OWNER_ID' => Yii::t('app', 'Owner '),
            'OWNER_NAME' => Yii::t('app', 'Owner  Name'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'LAST_UPDATE' => Yii::t('app', 'Last  Update'),
            'NAME' => Yii::t('app', 'Name'),
            'SETTINGS' => Yii::t('app', 'Settings'),
            'CAMPAIGN_ID' => Yii::t('app', 'Campaign '),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'AUTO_QUANTITY_OFF' => Yii::t('app', 'Auto  Quantity  Off'),
            'AUTO_QUANTITY_ON' => Yii::t('app', 'Auto  Quantity  On'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
