<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_user_ugroup".
 *
 * @property integer $USER_ID
 * @property integer $GROUP_ID
 * @property string $CAN_VIEW_GROUP_MESSAGES
 * @property string $CAN_MAIL_GROUP_MESSAGES
 * @property string $CAN_MAIL_UPDATE_GROUP_MESSAGES
 */
class BTicketUserUgroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_user_ugroup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'GROUP_ID'], 'required'],
            [['USER_ID', 'GROUP_ID'], 'integer'],
            [['CAN_VIEW_GROUP_MESSAGES', 'CAN_MAIL_GROUP_MESSAGES', 'CAN_MAIL_UPDATE_GROUP_MESSAGES'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User '),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'CAN_VIEW_GROUP_MESSAGES' => Yii::t('app', 'Can  View  Group  Messages'),
            'CAN_MAIL_GROUP_MESSAGES' => Yii::t('app', 'Can  Mail  Group  Messages'),
            'CAN_MAIL_UPDATE_GROUP_MESSAGES' => Yii::t('app', 'Can  Mail  Update  Group  Messages'),
        ];
    }

    public function getName()
    {
        return $this->USER_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'USER_ID', 'USER_ID');
        return $list;
    }
}
