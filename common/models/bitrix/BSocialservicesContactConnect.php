<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_socialservices_contact_connect".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property integer $CONTACT_ID
 * @property integer $LINK_ID
 * @property integer $CONTACT_PROFILE_ID
 * @property string $CONTACT_PORTAL
 * @property string $CONNECT_TYPE
 * @property string $LAST_AUTHORIZE
 */
class BSocialservicesContactConnect extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_socialservices_contact_connect';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'LAST_AUTHORIZE'], 'safe'],
            [['CONTACT_ID', 'LINK_ID', 'CONTACT_PROFILE_ID'], 'integer'],
            [['CONTACT_PROFILE_ID', 'CONTACT_PORTAL'], 'required'],
            [['CONTACT_PORTAL'], 'string', 'max' => 255],
            [['CONNECT_TYPE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'CONTACT_ID' => Yii::t('app', 'Contact '),
            'LINK_ID' => Yii::t('app', 'Link '),
            'CONTACT_PROFILE_ID' => Yii::t('app', 'Contact  Profile '),
            'CONTACT_PORTAL' => Yii::t('app', 'Contact  Portal'),
            'CONNECT_TYPE' => Yii::t('app', 'Connect  Type'),
            'LAST_AUTHORIZE' => Yii::t('app', 'Last  Authorize'),
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
