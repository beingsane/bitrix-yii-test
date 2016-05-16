<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_mail_mailbox".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $LID
 * @property string $ACTIVE
 * @property integer $SERVICE_ID
 * @property string $NAME
 * @property string $SERVER
 * @property integer $PORT
 * @property string $LINK
 * @property string $LOGIN
 * @property string $CHARSET
 * @property string $PASSWORD
 * @property string $DESCRIPTION
 * @property string $USE_MD5
 * @property string $DELETE_MESSAGES
 * @property integer $PERIOD_CHECK
 * @property integer $MAX_MSG_COUNT
 * @property integer $MAX_MSG_SIZE
 * @property integer $MAX_KEEP_DAYS
 * @property string $USE_TLS
 * @property string $SERVER_TYPE
 * @property string $DOMAINS
 * @property string $RELAY
 * @property string $AUTH_RELAY
 * @property integer $USER_ID
 * @property integer $SYNC_LOCK
 */
class BMailMailbox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_mail_mailbox';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'safe'],
            [['LID'], 'required'],
            [['SERVICE_ID', 'PORT', 'PERIOD_CHECK', 'MAX_MSG_COUNT', 'MAX_MSG_SIZE', 'MAX_KEEP_DAYS', 'USER_ID', 'SYNC_LOCK'], 'integer'],
            [['DESCRIPTION'], 'string'],
            [['LID'], 'string', 'max' => 2],
            [['ACTIVE', 'USE_MD5', 'DELETE_MESSAGES', 'USE_TLS', 'RELAY', 'AUTH_RELAY'], 'string', 'max' => 1],
            [['NAME', 'SERVER', 'LINK', 'LOGIN', 'CHARSET', 'PASSWORD', 'DOMAINS'], 'string', 'max' => 255],
            [['SERVER_TYPE'], 'string', 'max' => 10]
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
            'LID' => Yii::t('app', 'Lid'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SERVICE_ID' => Yii::t('app', 'Service '),
            'NAME' => Yii::t('app', 'Name'),
            'SERVER' => Yii::t('app', 'Server'),
            'PORT' => Yii::t('app', 'Port'),
            'LINK' => Yii::t('app', 'Link'),
            'LOGIN' => Yii::t('app', 'Login'),
            'CHARSET' => Yii::t('app', 'Charset'),
            'PASSWORD' => Yii::t('app', 'Password'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'USE_MD5' => Yii::t('app', 'Use  Md5'),
            'DELETE_MESSAGES' => Yii::t('app', 'Delete  Messages'),
            'PERIOD_CHECK' => Yii::t('app', 'Period  Check'),
            'MAX_MSG_COUNT' => Yii::t('app', 'Max  Msg  Count'),
            'MAX_MSG_SIZE' => Yii::t('app', 'Max  Msg  Size'),
            'MAX_KEEP_DAYS' => Yii::t('app', 'Max  Keep  Days'),
            'USE_TLS' => Yii::t('app', 'Use  Tls'),
            'SERVER_TYPE' => Yii::t('app', 'Server  Type'),
            'DOMAINS' => Yii::t('app', 'Domains'),
            'RELAY' => Yii::t('app', 'Relay'),
            'AUTH_RELAY' => Yii::t('app', 'Auth  Relay'),
            'USER_ID' => Yii::t('app', 'User '),
            'SYNC_LOCK' => Yii::t('app', 'Sync  Lock'),
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
