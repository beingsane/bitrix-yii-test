<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_im_relation".
 *
 * @property integer $ID
 * @property integer $CHAT_ID
 * @property string $MESSAGE_TYPE
 * @property integer $USER_ID
 * @property integer $START_ID
 * @property integer $LAST_ID
 * @property integer $LAST_SEND_ID
 * @property integer $LAST_FILE_ID
 * @property string $LAST_READ
 * @property integer $STATUS
 * @property integer $CALL_STATUS
 * @property string $NOTIFY_BLOCK
 */
class BImRelation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_im_relation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CHAT_ID', 'USER_ID'], 'required'],
            [['CHAT_ID', 'USER_ID', 'START_ID', 'LAST_ID', 'LAST_SEND_ID', 'LAST_FILE_ID', 'STATUS', 'CALL_STATUS'], 'integer'],
            [['LAST_READ'], 'safe'],
            [['MESSAGE_TYPE', 'NOTIFY_BLOCK'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CHAT_ID' => Yii::t('app', 'Chat '),
            'MESSAGE_TYPE' => Yii::t('app', 'Message  Type'),
            'USER_ID' => Yii::t('app', 'User '),
            'START_ID' => Yii::t('app', 'Start '),
            'LAST_ID' => Yii::t('app', 'Last '),
            'LAST_SEND_ID' => Yii::t('app', 'Last  Send '),
            'LAST_FILE_ID' => Yii::t('app', 'Last  File '),
            'LAST_READ' => Yii::t('app', 'Last  Read'),
            'STATUS' => Yii::t('app', 'Status'),
            'CALL_STATUS' => Yii::t('app', 'Call  Status'),
            'NOTIFY_BLOCK' => Yii::t('app', 'Notify  Block'),
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
