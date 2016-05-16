<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_socialservices_user".
 *
 * @property integer $ID
 * @property string $LOGIN
 * @property string $NAME
 * @property string $LAST_NAME
 * @property string $EMAIL
 * @property integer $PERSONAL_PHOTO
 * @property string $EXTERNAL_AUTH_ID
 * @property integer $USER_ID
 * @property string $XML_ID
 * @property string $CAN_DELETE
 * @property string $PERSONAL_WWW
 * @property string $PERMISSIONS
 * @property string $OATOKEN
 * @property integer $OATOKEN_EXPIRES
 * @property string $OASECRET
 * @property string $REFRESH_TOKEN
 * @property string $SEND_ACTIVITY
 * @property string $SITE_ID
 * @property string $INITIALIZED
 */
class BSocialservicesUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_socialservices_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOGIN', 'EXTERNAL_AUTH_ID', 'USER_ID', 'XML_ID'], 'required'],
            [['PERSONAL_PHOTO', 'USER_ID', 'OATOKEN_EXPIRES'], 'integer'],
            [['LOGIN', 'NAME', 'LAST_NAME', 'EMAIL', 'EXTERNAL_AUTH_ID', 'XML_ID', 'PERSONAL_WWW'], 'string', 'max' => 100],
            [['CAN_DELETE', 'SEND_ACTIVITY', 'INITIALIZED'], 'string', 'max' => 1],
            [['PERMISSIONS'], 'string', 'max' => 555],
            [['OATOKEN'], 'string', 'max' => 3000],
            [['OASECRET'], 'string', 'max' => 250],
            [['REFRESH_TOKEN'], 'string', 'max' => 1000],
            [['SITE_ID'], 'string', 'max' => 50],
            [['XML_ID', 'EXTERNAL_AUTH_ID'], 'unique', 'targetAttribute' => ['XML_ID', 'EXTERNAL_AUTH_ID'], 'message' => 'The combination of External  Auth  and Xml  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'LOGIN' => Yii::t('app', 'Login'),
            'NAME' => Yii::t('app', 'Name'),
            'LAST_NAME' => Yii::t('app', 'Last  Name'),
            'EMAIL' => Yii::t('app', 'Email'),
            'PERSONAL_PHOTO' => Yii::t('app', 'Personal  Photo'),
            'EXTERNAL_AUTH_ID' => Yii::t('app', 'External  Auth '),
            'USER_ID' => Yii::t('app', 'User '),
            'XML_ID' => Yii::t('app', 'Xml '),
            'CAN_DELETE' => Yii::t('app', 'Can  Delete'),
            'PERSONAL_WWW' => Yii::t('app', 'Personal  Www'),
            'PERMISSIONS' => Yii::t('app', 'Permissions'),
            'OATOKEN' => Yii::t('app', 'Oatoken'),
            'OATOKEN_EXPIRES' => Yii::t('app', 'Oatoken  Expires'),
            'OASECRET' => Yii::t('app', 'Oasecret'),
            'REFRESH_TOKEN' => Yii::t('app', 'Refresh  Token'),
            'SEND_ACTIVITY' => Yii::t('app', 'Send  Activity'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'INITIALIZED' => Yii::t('app', 'Initialized'),
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
