<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_mail_log".
 *
 * @property integer $ID
 * @property integer $MAILBOX_ID
 * @property integer $FILTER_ID
 * @property integer $MESSAGE_ID
 * @property string $LOG_TYPE
 * @property string $DATE_INSERT
 * @property string $STATUS_GOOD
 * @property string $MESSAGE
 */
class BMailLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_mail_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MAILBOX_ID', 'FILTER_ID', 'MESSAGE_ID'], 'integer'],
            [['DATE_INSERT'], 'required'],
            [['DATE_INSERT'], 'safe'],
            [['LOG_TYPE'], 'string', 'max' => 50],
            [['STATUS_GOOD'], 'string', 'max' => 1],
            [['MESSAGE'], 'string', 'max' => 255]
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
            'FILTER_ID' => Yii::t('app', 'Filter '),
            'MESSAGE_ID' => Yii::t('app', 'Message '),
            'LOG_TYPE' => Yii::t('app', 'Log  Type'),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
            'STATUS_GOOD' => Yii::t('app', 'Status  Good'),
            'MESSAGE' => Yii::t('app', 'Message'),
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
