<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_im_bot".
 *
 * @property integer $BOT_ID
 * @property string $MODULE_ID
 * @property string $CODE
 * @property string $TYPE
 * @property string $CLASS
 * @property string $METHOD_BOT_DELETE
 * @property string $METHOD_MESSAGE_ADD
 * @property string $METHOD_WELCOME_MESSAGE
 * @property integer $COUNT_COMMAND
 * @property integer $COUNT_MESSAGE
 * @property integer $COUNT_CHAT
 * @property integer $COUNT_USER
 * @property string $APP_ID
 */
class BImBot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_im_bot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BOT_ID', 'MODULE_ID', 'CODE'], 'required'],
            [['BOT_ID', 'COUNT_COMMAND', 'COUNT_MESSAGE', 'COUNT_CHAT', 'COUNT_USER'], 'integer'],
            [['MODULE_ID', 'CODE'], 'string', 'max' => 50],
            [['TYPE'], 'string', 'max' => 1],
            [['CLASS', 'METHOD_BOT_DELETE', 'METHOD_MESSAGE_ADD', 'METHOD_WELCOME_MESSAGE'], 'string', 'max' => 255],
            [['APP_ID'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'BOT_ID' => Yii::t('app', 'Bot '),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'CODE' => Yii::t('app', 'Code'),
            'TYPE' => Yii::t('app', 'Type'),
            'CLASS' => Yii::t('app', 'Class'),
            'METHOD_BOT_DELETE' => Yii::t('app', 'Method  Bot  Delete'),
            'METHOD_MESSAGE_ADD' => Yii::t('app', 'Method  Message  Add'),
            'METHOD_WELCOME_MESSAGE' => Yii::t('app', 'Method  Welcome  Message'),
            'COUNT_COMMAND' => Yii::t('app', 'Count  Command'),
            'COUNT_MESSAGE' => Yii::t('app', 'Count  Message'),
            'COUNT_CHAT' => Yii::t('app', 'Count  Chat'),
            'COUNT_USER' => Yii::t('app', 'Count  User'),
            'APP_ID' => Yii::t('app', 'App '),
        ];
    }

    public function getName()
    {
        return $this->BOT_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'BOT_ID', 'BOT_ID');
        return $list;
    }
}
