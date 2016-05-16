<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_mail_filter".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property integer $MAILBOX_ID
 * @property integer $PARENT_FILTER_ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property integer $SORT
 * @property string $ACTIVE
 * @property string $PHP_CONDITION
 * @property string $WHEN_MAIL_RECEIVED
 * @property string $WHEN_MANUALLY_RUN
 * @property string $SPAM_RATING
 * @property string $SPAM_RATING_TYPE
 * @property integer $MESSAGE_SIZE
 * @property string $MESSAGE_SIZE_TYPE
 * @property string $MESSAGE_SIZE_UNIT
 * @property string $ACTION_STOP_EXEC
 * @property string $ACTION_DELETE_MESSAGE
 * @property string $ACTION_READ
 * @property string $ACTION_PHP
 * @property string $ACTION_TYPE
 * @property string $ACTION_VARS
 * @property string $ACTION_SPAM
 */
class BMailFilter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_mail_filter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'safe'],
            [['MAILBOX_ID'], 'required'],
            [['MAILBOX_ID', 'PARENT_FILTER_ID', 'SORT', 'MESSAGE_SIZE'], 'integer'],
            [['DESCRIPTION', 'PHP_CONDITION', 'ACTION_PHP', 'ACTION_VARS'], 'string'],
            [['SPAM_RATING'], 'number'],
            [['NAME'], 'string', 'max' => 255],
            [['ACTIVE', 'WHEN_MAIL_RECEIVED', 'WHEN_MANUALLY_RUN', 'SPAM_RATING_TYPE', 'MESSAGE_SIZE_TYPE', 'MESSAGE_SIZE_UNIT', 'ACTION_STOP_EXEC', 'ACTION_DELETE_MESSAGE', 'ACTION_READ', 'ACTION_SPAM'], 'string', 'max' => 1],
            [['ACTION_TYPE'], 'string', 'max' => 50]
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
            'MAILBOX_ID' => Yii::t('app', 'Mailbox '),
            'PARENT_FILTER_ID' => Yii::t('app', 'Parent  Filter '),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'SORT' => Yii::t('app', 'Sort'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'PHP_CONDITION' => Yii::t('app', 'Php  Condition'),
            'WHEN_MAIL_RECEIVED' => Yii::t('app', 'When  Mail  Received'),
            'WHEN_MANUALLY_RUN' => Yii::t('app', 'When  Manually  Run'),
            'SPAM_RATING' => Yii::t('app', 'Spam  Rating'),
            'SPAM_RATING_TYPE' => Yii::t('app', 'Spam  Rating  Type'),
            'MESSAGE_SIZE' => Yii::t('app', 'Message  Size'),
            'MESSAGE_SIZE_TYPE' => Yii::t('app', 'Message  Size  Type'),
            'MESSAGE_SIZE_UNIT' => Yii::t('app', 'Message  Size  Unit'),
            'ACTION_STOP_EXEC' => Yii::t('app', 'Action  Stop  Exec'),
            'ACTION_DELETE_MESSAGE' => Yii::t('app', 'Action  Delete  Message'),
            'ACTION_READ' => Yii::t('app', 'Action  Read'),
            'ACTION_PHP' => Yii::t('app', 'Action  Php'),
            'ACTION_TYPE' => Yii::t('app', 'Action  Type'),
            'ACTION_VARS' => Yii::t('app', 'Action  Vars'),
            'ACTION_SPAM' => Yii::t('app', 'Action  Spam'),
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
