<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_mail_message".
 *
 * @property integer $ID
 * @property integer $MAILBOX_ID
 * @property string $DATE_INSERT
 * @property string $FULL_TEXT
 * @property integer $MESSAGE_SIZE
 * @property string $HEADER
 * @property string $FIELD_DATE
 * @property string $FIELD_FROM
 * @property string $FIELD_REPLY_TO
 * @property string $FIELD_TO
 * @property string $FIELD_CC
 * @property string $FIELD_BCC
 * @property integer $FIELD_PRIORITY
 * @property string $SUBJECT
 * @property string $BODY
 * @property integer $ATTACHMENTS
 * @property string $NEW_MESSAGE
 * @property string $SPAM
 * @property string $SPAM_RATING
 * @property string $SPAM_WORDS
 * @property string $SPAM_LAST_RESULT
 * @property string $FOR_SPAM_TEST
 * @property string $EXTERNAL_ID
 * @property string $MSG_ID
 * @property string $IN_REPLY_TO
 */
class BMailMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_mail_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MAILBOX_ID', 'DATE_INSERT', 'MESSAGE_SIZE'], 'required'],
            [['MAILBOX_ID', 'MESSAGE_SIZE', 'FIELD_PRIORITY', 'ATTACHMENTS'], 'integer'],
            [['DATE_INSERT', 'FIELD_DATE'], 'safe'],
            [['FULL_TEXT', 'HEADER', 'BODY', 'FOR_SPAM_TEST'], 'string'],
            [['SPAM_RATING'], 'number'],
            [['FIELD_FROM', 'FIELD_REPLY_TO', 'FIELD_TO', 'FIELD_CC', 'FIELD_BCC', 'SUBJECT', 'SPAM_WORDS', 'EXTERNAL_ID', 'MSG_ID', 'IN_REPLY_TO'], 'string', 'max' => 255],
            [['NEW_MESSAGE', 'SPAM', 'SPAM_LAST_RESULT'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'MAILBOX_ID' => Yii::t('app', 'Mailbox '),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
            'FULL_TEXT' => Yii::t('app', 'Full  Text'),
            'MESSAGE_SIZE' => Yii::t('app', 'Message  Size'),
            'HEADER' => Yii::t('app', 'Header'),
            'FIELD_DATE' => Yii::t('app', 'Field  Date'),
            'FIELD_FROM' => Yii::t('app', 'Field  From'),
            'FIELD_REPLY_TO' => Yii::t('app', 'Field  Reply  To'),
            'FIELD_TO' => Yii::t('app', 'Field  To'),
            'FIELD_CC' => Yii::t('app', 'Field  Cc'),
            'FIELD_BCC' => Yii::t('app', 'Field  Bcc'),
            'FIELD_PRIORITY' => Yii::t('app', 'Field  Priority'),
            'SUBJECT' => Yii::t('app', 'Subject'),
            'BODY' => Yii::t('app', 'Body'),
            'ATTACHMENTS' => Yii::t('app', 'Attachments'),
            'NEW_MESSAGE' => Yii::t('app', 'New  Message'),
            'SPAM' => Yii::t('app', 'Spam'),
            'SPAM_RATING' => Yii::t('app', 'Spam  Rating'),
            'SPAM_WORDS' => Yii::t('app', 'Spam  Words'),
            'SPAM_LAST_RESULT' => Yii::t('app', 'Spam  Last  Result'),
            'FOR_SPAM_TEST' => Yii::t('app', 'For  Spam  Test'),
            'EXTERNAL_ID' => Yii::t('app', 'External '),
            'MSG_ID' => Yii::t('app', 'Msg '),
            'IN_REPLY_TO' => Yii::t('app', 'In  Reply  To'),
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
