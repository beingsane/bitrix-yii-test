<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_im_message".
 *
 * @property integer $ID
 * @property integer $CHAT_ID
 * @property integer $AUTHOR_ID
 * @property string $MESSAGE
 * @property string $MESSAGE_OUT
 * @property string $DATE_CREATE
 * @property string $EMAIL_TEMPLATE
 * @property integer $NOTIFY_TYPE
 * @property string $NOTIFY_MODULE
 * @property string $NOTIFY_EVENT
 * @property string $NOTIFY_TAG
 * @property string $NOTIFY_SUB_TAG
 * @property string $NOTIFY_TITLE
 * @property string $NOTIFY_BUTTONS
 * @property string $NOTIFY_READ
 * @property integer $IMPORT_ID
 */
class BImMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_im_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CHAT_ID', 'AUTHOR_ID', 'DATE_CREATE'], 'required'],
            [['CHAT_ID', 'AUTHOR_ID', 'NOTIFY_TYPE', 'IMPORT_ID'], 'integer'],
            [['MESSAGE', 'MESSAGE_OUT', 'NOTIFY_BUTTONS'], 'string'],
            [['DATE_CREATE'], 'safe'],
            [['EMAIL_TEMPLATE', 'NOTIFY_MODULE', 'NOTIFY_EVENT', 'NOTIFY_TAG', 'NOTIFY_SUB_TAG', 'NOTIFY_TITLE'], 'string', 'max' => 255],
            [['NOTIFY_READ'], 'string', 'max' => 1]
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
            'AUTHOR_ID' => Yii::t('app', 'Author '),
            'MESSAGE' => Yii::t('app', 'Message'),
            'MESSAGE_OUT' => Yii::t('app', 'Message  Out'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'EMAIL_TEMPLATE' => Yii::t('app', 'Email  Template'),
            'NOTIFY_TYPE' => Yii::t('app', 'Notify  Type'),
            'NOTIFY_MODULE' => Yii::t('app', 'Notify  Module'),
            'NOTIFY_EVENT' => Yii::t('app', 'Notify  Event'),
            'NOTIFY_TAG' => Yii::t('app', 'Notify  Tag'),
            'NOTIFY_SUB_TAG' => Yii::t('app', 'Notify  Sub  Tag'),
            'NOTIFY_TITLE' => Yii::t('app', 'Notify  Title'),
            'NOTIFY_BUTTONS' => Yii::t('app', 'Notify  Buttons'),
            'NOTIFY_READ' => Yii::t('app', 'Notify  Read'),
            'IMPORT_ID' => Yii::t('app', 'Import '),
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
