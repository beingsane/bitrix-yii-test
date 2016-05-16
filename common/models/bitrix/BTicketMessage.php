<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_message".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $DATE_CREATE
 * @property string $DAY_CREATE
 * @property integer $C_NUMBER
 * @property integer $TICKET_ID
 * @property string $IS_HIDDEN
 * @property string $IS_LOG
 * @property string $IS_OVERDUE
 * @property integer $CURRENT_RESPONSIBLE_USER_ID
 * @property string $NOTIFY_AGENT_DONE
 * @property string $EXPIRE_AGENT_DONE
 * @property string $MESSAGE
 * @property string $MESSAGE_SEARCH
 * @property string $IS_SPAM
 * @property integer $EXTERNAL_ID
 * @property string $EXTERNAL_FIELD_1
 * @property integer $OWNER_USER_ID
 * @property integer $OWNER_GUEST_ID
 * @property string $OWNER_SID
 * @property integer $SOURCE_ID
 * @property integer $CREATED_USER_ID
 * @property integer $CREATED_GUEST_ID
 * @property string $CREATED_MODULE_NAME
 * @property integer $MODIFIED_USER_ID
 * @property integer $MODIFIED_GUEST_ID
 * @property string $MESSAGE_BY_SUPPORT_TEAM
 * @property integer $TASK_TIME
 * @property string $NOT_CHANGE_STATUS
 */
class BTicketMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'DATE_CREATE', 'DAY_CREATE'], 'safe'],
            [['C_NUMBER', 'TICKET_ID', 'CURRENT_RESPONSIBLE_USER_ID', 'EXTERNAL_ID', 'OWNER_USER_ID', 'OWNER_GUEST_ID', 'SOURCE_ID', 'CREATED_USER_ID', 'CREATED_GUEST_ID', 'MODIFIED_USER_ID', 'MODIFIED_GUEST_ID', 'TASK_TIME'], 'integer'],
            [['MESSAGE', 'MESSAGE_SEARCH', 'EXTERNAL_FIELD_1', 'OWNER_SID'], 'string'],
            [['IS_HIDDEN', 'IS_LOG', 'IS_OVERDUE', 'NOTIFY_AGENT_DONE', 'EXPIRE_AGENT_DONE', 'IS_SPAM', 'MESSAGE_BY_SUPPORT_TEAM', 'NOT_CHANGE_STATUS'], 'string', 'max' => 1],
            [['CREATED_MODULE_NAME'], 'string', 'max' => 255]
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
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DAY_CREATE' => Yii::t('app', 'Day  Create'),
            'C_NUMBER' => Yii::t('app', 'C  Number'),
            'TICKET_ID' => Yii::t('app', 'Ticket '),
            'IS_HIDDEN' => Yii::t('app', 'Is  Hidden'),
            'IS_LOG' => Yii::t('app', 'Is  Log'),
            'IS_OVERDUE' => Yii::t('app', 'Is  Overdue'),
            'CURRENT_RESPONSIBLE_USER_ID' => Yii::t('app', 'Current  Responsible  User '),
            'NOTIFY_AGENT_DONE' => Yii::t('app', 'Notify  Agent  Done'),
            'EXPIRE_AGENT_DONE' => Yii::t('app', 'Expire  Agent  Done'),
            'MESSAGE' => Yii::t('app', 'Message'),
            'MESSAGE_SEARCH' => Yii::t('app', 'Message  Search'),
            'IS_SPAM' => Yii::t('app', 'Is  Spam'),
            'EXTERNAL_ID' => Yii::t('app', 'External '),
            'EXTERNAL_FIELD_1' => Yii::t('app', 'External  Field 1'),
            'OWNER_USER_ID' => Yii::t('app', 'Owner  User '),
            'OWNER_GUEST_ID' => Yii::t('app', 'Owner  Guest '),
            'OWNER_SID' => Yii::t('app', 'Owner  Sid'),
            'SOURCE_ID' => Yii::t('app', 'Source '),
            'CREATED_USER_ID' => Yii::t('app', 'Created  User '),
            'CREATED_GUEST_ID' => Yii::t('app', 'Created  Guest '),
            'CREATED_MODULE_NAME' => Yii::t('app', 'Created  Module  Name'),
            'MODIFIED_USER_ID' => Yii::t('app', 'Modified  User '),
            'MODIFIED_GUEST_ID' => Yii::t('app', 'Modified  Guest '),
            'MESSAGE_BY_SUPPORT_TEAM' => Yii::t('app', 'Message  By  Support  Team'),
            'TASK_TIME' => Yii::t('app', 'Task  Time'),
            'NOT_CHANGE_STATUS' => Yii::t('app', 'Not  Change  Status'),
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
