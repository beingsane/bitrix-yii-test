<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_event_message".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $EVENT_NAME
 * @property string $LID
 * @property string $ACTIVE
 * @property string $EMAIL_FROM
 * @property string $EMAIL_TO
 * @property string $SUBJECT
 * @property string $MESSAGE
 * @property string $MESSAGE_PHP
 * @property string $BODY_TYPE
 * @property string $BCC
 * @property string $REPLY_TO
 * @property string $CC
 * @property string $IN_REPLY_TO
 * @property string $PRIORITY
 * @property string $FIELD1_NAME
 * @property string $FIELD1_VALUE
 * @property string $FIELD2_NAME
 * @property string $FIELD2_VALUE
 * @property string $SITE_TEMPLATE_ID
 * @property string $ADDITIONAL_FIELD
 */
class BEventMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_event_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'safe'],
            [['EVENT_NAME'], 'required'],
            [['MESSAGE', 'MESSAGE_PHP', 'BCC', 'ADDITIONAL_FIELD'], 'string'],
            [['EVENT_NAME', 'EMAIL_FROM', 'EMAIL_TO', 'SUBJECT', 'REPLY_TO', 'CC', 'IN_REPLY_TO', 'FIELD1_VALUE', 'FIELD2_VALUE', 'SITE_TEMPLATE_ID'], 'string', 'max' => 255],
            [['LID'], 'string', 'max' => 2],
            [['ACTIVE'], 'string', 'max' => 1],
            [['BODY_TYPE'], 'string', 'max' => 4],
            [['PRIORITY', 'FIELD1_NAME', 'FIELD2_NAME'], 'string', 'max' => 50]
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
            'EVENT_NAME' => Yii::t('app', 'Event  Name'),
            'LID' => Yii::t('app', 'Lid'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'EMAIL_FROM' => Yii::t('app', 'Email  From'),
            'EMAIL_TO' => Yii::t('app', 'Email  To'),
            'SUBJECT' => Yii::t('app', 'Subject'),
            'MESSAGE' => Yii::t('app', 'Message'),
            'MESSAGE_PHP' => Yii::t('app', 'Message  Php'),
            'BODY_TYPE' => Yii::t('app', 'Body  Type'),
            'BCC' => Yii::t('app', 'Bcc'),
            'REPLY_TO' => Yii::t('app', 'Reply  To'),
            'CC' => Yii::t('app', 'Cc'),
            'IN_REPLY_TO' => Yii::t('app', 'In  Reply  To'),
            'PRIORITY' => Yii::t('app', 'Priority'),
            'FIELD1_NAME' => Yii::t('app', 'Field1  Name'),
            'FIELD1_VALUE' => Yii::t('app', 'Field1  Value'),
            'FIELD2_NAME' => Yii::t('app', 'Field2  Name'),
            'FIELD2_VALUE' => Yii::t('app', 'Field2  Value'),
            'SITE_TEMPLATE_ID' => Yii::t('app', 'Site  Template '),
            'ADDITIONAL_FIELD' => Yii::t('app', 'Additional  Field'),
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
