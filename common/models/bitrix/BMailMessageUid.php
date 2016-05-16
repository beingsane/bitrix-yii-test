<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_mail_message_uid".
 *
 * @property string $ID
 * @property integer $MAILBOX_ID
 * @property string $SESSION_ID
 * @property string $TIMESTAMP_X
 * @property string $DATE_INSERT
 * @property integer $MESSAGE_ID
 */
class BMailMessageUid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_mail_message_uid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'MAILBOX_ID', 'SESSION_ID', 'DATE_INSERT', 'MESSAGE_ID'], 'required'],
            [['MAILBOX_ID', 'MESSAGE_ID'], 'integer'],
            [['TIMESTAMP_X', 'DATE_INSERT'], 'safe'],
            [['ID', 'SESSION_ID'], 'string', 'max' => 32]
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
            'SESSION_ID' => Yii::t('app', 'Session '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
            'MESSAGE_ID' => Yii::t('app', 'Message '),
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
