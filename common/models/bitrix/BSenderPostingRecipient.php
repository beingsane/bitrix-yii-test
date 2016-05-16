<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sender_posting_recipient".
 *
 * @property integer $ID
 * @property integer $POSTING_ID
 * @property string $STATUS
 * @property string $DATE_SENT
 * @property string $NAME
 * @property string $EMAIL
 * @property string $PHONE
 * @property integer $USER_ID
 * @property string $DATE_DENY
 * @property string $FIELDS
 * @property integer $ROOT_ID
 * @property string $IS_READ
 * @property string $IS_CLICK
 * @property string $IS_UNSUB
 */
class BSenderPostingRecipient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sender_posting_recipient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['POSTING_ID', 'STATUS'], 'required'],
            [['POSTING_ID', 'USER_ID', 'ROOT_ID'], 'integer'],
            [['DATE_SENT', 'DATE_DENY'], 'safe'],
            [['STATUS', 'IS_READ', 'IS_CLICK', 'IS_UNSUB'], 'string', 'max' => 1],
            [['NAME', 'EMAIL'], 'string', 'max' => 255],
            [['PHONE'], 'string', 'max' => 20],
            [['FIELDS'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'POSTING_ID' => Yii::t('app', 'Posting '),
            'STATUS' => Yii::t('app', 'Status'),
            'DATE_SENT' => Yii::t('app', 'Date  Sent'),
            'NAME' => Yii::t('app', 'Name'),
            'EMAIL' => Yii::t('app', 'Email'),
            'PHONE' => Yii::t('app', 'Phone'),
            'USER_ID' => Yii::t('app', 'User '),
            'DATE_DENY' => Yii::t('app', 'Date  Deny'),
            'FIELDS' => Yii::t('app', 'Fields'),
            'ROOT_ID' => Yii::t('app', 'Root '),
            'IS_READ' => Yii::t('app', 'Is  Read'),
            'IS_CLICK' => Yii::t('app', 'Is  Click'),
            'IS_UNSUB' => Yii::t('app', 'Is  Unsub'),
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
