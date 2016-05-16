<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sender_posting".
 *
 * @property integer $ID
 * @property string $DATE_UPDATE
 * @property integer $MAILING_ID
 * @property integer $MAILING_CHAIN_ID
 * @property string $STATUS
 * @property string $DATE_SENT
 * @property string $DATE_CREATE
 * @property integer $COUNT_SEND_ALL
 * @property integer $COUNT_SEND_NONE
 * @property integer $COUNT_SEND_ERROR
 * @property integer $COUNT_SEND_SUCCESS
 * @property integer $COUNT_SEND_DENY
 * @property integer $COUNT_READ
 * @property integer $COUNT_CLICK
 * @property integer $COUNT_UNSUB
 */
class BSenderPosting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sender_posting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_UPDATE', 'DATE_SENT', 'DATE_CREATE'], 'safe'],
            [['MAILING_ID', 'MAILING_CHAIN_ID'], 'required'],
            [['MAILING_ID', 'MAILING_CHAIN_ID', 'COUNT_SEND_ALL', 'COUNT_SEND_NONE', 'COUNT_SEND_ERROR', 'COUNT_SEND_SUCCESS', 'COUNT_SEND_DENY', 'COUNT_READ', 'COUNT_CLICK', 'COUNT_UNSUB'], 'integer'],
            [['STATUS'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'MAILING_ID' => Yii::t('app', 'Mailing '),
            'MAILING_CHAIN_ID' => Yii::t('app', 'Mailing  Chain '),
            'STATUS' => Yii::t('app', 'Status'),
            'DATE_SENT' => Yii::t('app', 'Date  Sent'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'COUNT_SEND_ALL' => Yii::t('app', 'Count  Send  All'),
            'COUNT_SEND_NONE' => Yii::t('app', 'Count  Send  None'),
            'COUNT_SEND_ERROR' => Yii::t('app', 'Count  Send  Error'),
            'COUNT_SEND_SUCCESS' => Yii::t('app', 'Count  Send  Success'),
            'COUNT_SEND_DENY' => Yii::t('app', 'Count  Send  Deny'),
            'COUNT_READ' => Yii::t('app', 'Count  Read'),
            'COUNT_CLICK' => Yii::t('app', 'Count  Click'),
            'COUNT_UNSUB' => Yii::t('app', 'Count  Unsub'),
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
