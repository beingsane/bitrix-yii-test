<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_im_bot_chat".
 *
 * @property integer $ID
 * @property integer $BOT_ID
 * @property integer $CHAT_ID
 */
class BImBotChat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_im_bot_chat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BOT_ID', 'CHAT_ID'], 'required'],
            [['BOT_ID', 'CHAT_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'BOT_ID' => Yii::t('app', 'Bot '),
            'CHAT_ID' => Yii::t('app', 'Chat '),
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
