<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_seo_adv_campaign".
 *
 * @property integer $ID
 * @property integer $ENGINE_ID
 * @property string $ACTIVE
 * @property string $OWNER_ID
 * @property string $OWNER_NAME
 * @property string $XML_ID
 * @property string $NAME
 * @property string $LAST_UPDATE
 * @property string $SETTINGS
 */
class BSeoAdvCampaign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_seo_adv_campaign';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ENGINE_ID', 'OWNER_ID', 'OWNER_NAME', 'XML_ID', 'NAME'], 'required'],
            [['ENGINE_ID'], 'integer'],
            [['LAST_UPDATE'], 'safe'],
            [['SETTINGS'], 'string'],
            [['ACTIVE'], 'string', 'max' => 1],
            [['OWNER_ID', 'OWNER_NAME', 'XML_ID', 'NAME'], 'string', 'max' => 255],
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
            'ACTIVE' => Yii::t('app', 'Active'),
            'OWNER_ID' => Yii::t('app', 'Owner '),
            'OWNER_NAME' => Yii::t('app', 'Owner  Name'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'NAME' => Yii::t('app', 'Name'),
            'LAST_UPDATE' => Yii::t('app', 'Last  Update'),
            'SETTINGS' => Yii::t('app', 'Settings'),
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
