<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sender_mailing_chain".
 *
 * @property integer $ID
 * @property integer $MAILING_ID
 * @property string $STATUS
 * @property integer $POSTING_ID
 * @property integer $CREATED_BY
 * @property integer $PARENT_ID
 * @property string $IS_TRIGGER
 * @property string $DATE_INSERT
 * @property integer $TIME_SHIFT
 * @property string $LAST_EXECUTED
 * @property string $AUTO_SEND_TIME
 * @property string $EMAIL_FROM
 * @property string $SUBJECT
 * @property string $MESSAGE
 * @property string $PRIORITY
 * @property string $LINK_PARAMS
 * @property string $TEMPLATE_TYPE
 * @property string $TEMPLATE_ID
 * @property string $REITERATE
 * @property string $DAYS_OF_MONTH
 * @property string $DAYS_OF_WEEK
 * @property string $TIMES_OF_DAY
 */
class BSenderMailingChain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sender_mailing_chain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MAILING_ID', 'STATUS', 'EMAIL_FROM'], 'required'],
            [['MAILING_ID', 'POSTING_ID', 'CREATED_BY', 'PARENT_ID', 'TIME_SHIFT'], 'integer'],
            [['DATE_INSERT', 'LAST_EXECUTED', 'AUTO_SEND_TIME'], 'safe'],
            [['MESSAGE'], 'string'],
            [['STATUS', 'IS_TRIGGER', 'REITERATE'], 'string', 'max' => 1],
            [['EMAIL_FROM', 'SUBJECT', 'LINK_PARAMS', 'TIMES_OF_DAY'], 'string', 'max' => 255],
            [['PRIORITY', 'TEMPLATE_ID'], 'string', 'max' => 60],
            [['TEMPLATE_TYPE'], 'string', 'max' => 30],
            [['DAYS_OF_MONTH'], 'string', 'max' => 100],
            [['DAYS_OF_WEEK'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'MAILING_ID' => Yii::t('app', 'Mailing '),
            'STATUS' => Yii::t('app', 'Status'),
            'POSTING_ID' => Yii::t('app', 'Posting '),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'PARENT_ID' => Yii::t('app', 'Parent '),
            'IS_TRIGGER' => Yii::t('app', 'Is  Trigger'),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
            'TIME_SHIFT' => Yii::t('app', 'Time  Shift'),
            'LAST_EXECUTED' => Yii::t('app', 'Last  Executed'),
            'AUTO_SEND_TIME' => Yii::t('app', 'Auto  Send  Time'),
            'EMAIL_FROM' => Yii::t('app', 'Email  From'),
            'SUBJECT' => Yii::t('app', 'Subject'),
            'MESSAGE' => Yii::t('app', 'Message'),
            'PRIORITY' => Yii::t('app', 'Priority'),
            'LINK_PARAMS' => Yii::t('app', 'Link  Params'),
            'TEMPLATE_TYPE' => Yii::t('app', 'Template  Type'),
            'TEMPLATE_ID' => Yii::t('app', 'Template '),
            'REITERATE' => Yii::t('app', 'Reiterate'),
            'DAYS_OF_MONTH' => Yii::t('app', 'Days  Of  Month'),
            'DAYS_OF_WEEK' => Yii::t('app', 'Days  Of  Week'),
            'TIMES_OF_DAY' => Yii::t('app', 'Times  Of  Day'),
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
