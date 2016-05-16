<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket".
 *
 * @property integer $ID
 * @property string $SITE_ID
 * @property string $DATE_CREATE
 * @property string $DAY_CREATE
 * @property string $TIMESTAMP_X
 * @property string $DATE_CLOSE
 * @property string $AUTO_CLOSED
 * @property integer $AUTO_CLOSE_DAYS
 * @property integer $SLA_ID
 * @property integer $NOTIFY_AGENT_ID
 * @property integer $EXPIRE_AGENT_ID
 * @property integer $OVERDUE_MESSAGES
 * @property string $IS_NOTIFIED
 * @property string $IS_OVERDUE
 * @property integer $CATEGORY_ID
 * @property integer $CRITICALITY_ID
 * @property integer $STATUS_ID
 * @property integer $MARK_ID
 * @property integer $SOURCE_ID
 * @property integer $DIFFICULTY_ID
 * @property string $TITLE
 * @property integer $MESSAGES
 * @property string $IS_SPAM
 * @property integer $OWNER_USER_ID
 * @property integer $OWNER_GUEST_ID
 * @property string $OWNER_SID
 * @property integer $CREATED_USER_ID
 * @property integer $CREATED_GUEST_ID
 * @property string $CREATED_MODULE_NAME
 * @property integer $RESPONSIBLE_USER_ID
 * @property integer $MODIFIED_USER_ID
 * @property integer $MODIFIED_GUEST_ID
 * @property string $MODIFIED_MODULE_NAME
 * @property integer $LAST_MESSAGE_USER_ID
 * @property integer $LAST_MESSAGE_GUEST_ID
 * @property string $LAST_MESSAGE_SID
 * @property string $LAST_MESSAGE_BY_SUPPORT_TEAM
 * @property string $LAST_MESSAGE_DATE
 * @property string $SUPPORT_COMMENTS
 * @property integer $PROBLEM_TIME
 * @property string $HOLD_ON
 * @property string $REOPEN
 * @property string $COUPON
 * @property string $SUPPORT_DEADLINE
 * @property string $SUPPORT_DEADLINE_NOTIFY
 * @property string $D_1_USER_M_AFTER_SUP_M
 * @property integer $ID_1_USER_M_AFTER_SUP_M
 * @property string $DEADLINE_SOURCE_DATE
 */
class BTicket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITE_ID', 'TITLE'], 'required'],
            [['DATE_CREATE', 'DAY_CREATE', 'TIMESTAMP_X', 'DATE_CLOSE', 'LAST_MESSAGE_DATE', 'SUPPORT_DEADLINE', 'SUPPORT_DEADLINE_NOTIFY', 'D_1_USER_M_AFTER_SUP_M', 'DEADLINE_SOURCE_DATE'], 'safe'],
            [['AUTO_CLOSE_DAYS', 'SLA_ID', 'NOTIFY_AGENT_ID', 'EXPIRE_AGENT_ID', 'OVERDUE_MESSAGES', 'CATEGORY_ID', 'CRITICALITY_ID', 'STATUS_ID', 'MARK_ID', 'SOURCE_ID', 'DIFFICULTY_ID', 'MESSAGES', 'OWNER_USER_ID', 'OWNER_GUEST_ID', 'CREATED_USER_ID', 'CREATED_GUEST_ID', 'RESPONSIBLE_USER_ID', 'MODIFIED_USER_ID', 'MODIFIED_GUEST_ID', 'LAST_MESSAGE_USER_ID', 'LAST_MESSAGE_GUEST_ID', 'PROBLEM_TIME', 'ID_1_USER_M_AFTER_SUP_M'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['AUTO_CLOSED', 'IS_NOTIFIED', 'IS_OVERDUE', 'IS_SPAM', 'LAST_MESSAGE_BY_SUPPORT_TEAM', 'HOLD_ON', 'REOPEN'], 'string', 'max' => 1],
            [['TITLE', 'OWNER_SID', 'CREATED_MODULE_NAME', 'MODIFIED_MODULE_NAME', 'LAST_MESSAGE_SID', 'SUPPORT_COMMENTS', 'COUPON'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DAY_CREATE' => Yii::t('app', 'Day  Create'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'DATE_CLOSE' => Yii::t('app', 'Date  Close'),
            'AUTO_CLOSED' => Yii::t('app', 'Auto  Closed'),
            'AUTO_CLOSE_DAYS' => Yii::t('app', 'Auto  Close  Days'),
            'SLA_ID' => Yii::t('app', 'Sla '),
            'NOTIFY_AGENT_ID' => Yii::t('app', 'Notify  Agent '),
            'EXPIRE_AGENT_ID' => Yii::t('app', 'Expire  Agent '),
            'OVERDUE_MESSAGES' => Yii::t('app', 'Overdue  Messages'),
            'IS_NOTIFIED' => Yii::t('app', 'Is  Notified'),
            'IS_OVERDUE' => Yii::t('app', 'Is  Overdue'),
            'CATEGORY_ID' => Yii::t('app', 'Category '),
            'CRITICALITY_ID' => Yii::t('app', 'Criticality '),
            'STATUS_ID' => Yii::t('app', 'Status '),
            'MARK_ID' => Yii::t('app', 'Mark '),
            'SOURCE_ID' => Yii::t('app', 'Source '),
            'DIFFICULTY_ID' => Yii::t('app', 'Difficulty '),
            'TITLE' => Yii::t('app', 'Title'),
            'MESSAGES' => Yii::t('app', 'Messages'),
            'IS_SPAM' => Yii::t('app', 'Is  Spam'),
            'OWNER_USER_ID' => Yii::t('app', 'Owner  User '),
            'OWNER_GUEST_ID' => Yii::t('app', 'Owner  Guest '),
            'OWNER_SID' => Yii::t('app', 'Owner  Sid'),
            'CREATED_USER_ID' => Yii::t('app', 'Created  User '),
            'CREATED_GUEST_ID' => Yii::t('app', 'Created  Guest '),
            'CREATED_MODULE_NAME' => Yii::t('app', 'Created  Module  Name'),
            'RESPONSIBLE_USER_ID' => Yii::t('app', 'Responsible  User '),
            'MODIFIED_USER_ID' => Yii::t('app', 'Modified  User '),
            'MODIFIED_GUEST_ID' => Yii::t('app', 'Modified  Guest '),
            'MODIFIED_MODULE_NAME' => Yii::t('app', 'Modified  Module  Name'),
            'LAST_MESSAGE_USER_ID' => Yii::t('app', 'Last  Message  User '),
            'LAST_MESSAGE_GUEST_ID' => Yii::t('app', 'Last  Message  Guest '),
            'LAST_MESSAGE_SID' => Yii::t('app', 'Last  Message  Sid'),
            'LAST_MESSAGE_BY_SUPPORT_TEAM' => Yii::t('app', 'Last  Message  By  Support  Team'),
            'LAST_MESSAGE_DATE' => Yii::t('app', 'Last  Message  Date'),
            'SUPPORT_COMMENTS' => Yii::t('app', 'Support  Comments'),
            'PROBLEM_TIME' => Yii::t('app', 'Problem  Time'),
            'HOLD_ON' => Yii::t('app', 'Hold  On'),
            'REOPEN' => Yii::t('app', 'Reopen'),
            'COUPON' => Yii::t('app', 'Coupon'),
            'SUPPORT_DEADLINE' => Yii::t('app', 'Support  Deadline'),
            'SUPPORT_DEADLINE_NOTIFY' => Yii::t('app', 'Support  Deadline  Notify'),
            'D_1_USER_M_AFTER_SUP_M' => Yii::t('app', 'D 1  User  M  After  Sup  M'),
            'ID_1_USER_M_AFTER_SUP_M' => Yii::t('app', 'Id 1  User  M  After  Sup  M'),
            'DEADLINE_SOURCE_DATE' => Yii::t('app', 'Deadline  Source  Date'),
        ];
    }

    public function getName()
    {
        return $this->TITLE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'TITLE');
        return $list;
    }
}
