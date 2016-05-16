<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_posting".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $STATUS
 * @property string $VERSION
 * @property string $DATE_SENT
 * @property string $SENT_BCC
 * @property string $FROM_FIELD
 * @property string $TO_FIELD
 * @property string $BCC_FIELD
 * @property string $EMAIL_FILTER
 * @property string $SUBJECT
 * @property string $BODY_TYPE
 * @property string $BODY
 * @property string $DIRECT_SEND
 * @property string $CHARSET
 * @property string $MSG_CHARSET
 * @property string $SUBSCR_FORMAT
 * @property string $ERROR_EMAIL
 * @property string $AUTO_SEND_TIME
 * @property string $BCC_TO_SEND
 */
class BPosting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_posting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'FROM_FIELD', 'SUBJECT', 'BODY'], 'required'],
            [['TIMESTAMP_X', 'DATE_SENT', 'AUTO_SEND_TIME'], 'safe'],
            [['SENT_BCC', 'BCC_FIELD', 'BODY', 'ERROR_EMAIL', 'BCC_TO_SEND'], 'string'],
            [['STATUS', 'VERSION', 'DIRECT_SEND'], 'string', 'max' => 1],
            [['FROM_FIELD', 'TO_FIELD', 'EMAIL_FILTER', 'SUBJECT', 'MSG_CHARSET'], 'string', 'max' => 255],
            [['BODY_TYPE', 'SUBSCR_FORMAT'], 'string', 'max' => 4],
            [['CHARSET'], 'string', 'max' => 50]
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
            'STATUS' => Yii::t('app', 'Status'),
            'VERSION' => Yii::t('app', 'Version'),
            'DATE_SENT' => Yii::t('app', 'Date  Sent'),
            'SENT_BCC' => Yii::t('app', 'Sent  Bcc'),
            'FROM_FIELD' => Yii::t('app', 'From  Field'),
            'TO_FIELD' => Yii::t('app', 'To  Field'),
            'BCC_FIELD' => Yii::t('app', 'Bcc  Field'),
            'EMAIL_FILTER' => Yii::t('app', 'Email  Filter'),
            'SUBJECT' => Yii::t('app', 'Subject'),
            'BODY_TYPE' => Yii::t('app', 'Body  Type'),
            'BODY' => Yii::t('app', 'Body'),
            'DIRECT_SEND' => Yii::t('app', 'Direct  Send'),
            'CHARSET' => Yii::t('app', 'Charset'),
            'MSG_CHARSET' => Yii::t('app', 'Msg  Charset'),
            'SUBSCR_FORMAT' => Yii::t('app', 'Subscr  Format'),
            'ERROR_EMAIL' => Yii::t('app', 'Error  Email'),
            'AUTO_SEND_TIME' => Yii::t('app', 'Auto  Send  Time'),
            'BCC_TO_SEND' => Yii::t('app', 'Bcc  To  Send'),
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
