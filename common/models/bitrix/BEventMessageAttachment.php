<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_event_message_attachment".
 *
 * @property integer $EVENT_MESSAGE_ID
 * @property integer $FILE_ID
 */
class BEventMessageAttachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_event_message_attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EVENT_MESSAGE_ID', 'FILE_ID'], 'required'],
            [['EVENT_MESSAGE_ID', 'FILE_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'EVENT_MESSAGE_ID' => Yii::t('app', 'Event  Message '),
            'FILE_ID' => Yii::t('app', 'File '),
        ];
    }

    public function getName()
    {
        return $this->EVENT_MESSAGE_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'EVENT_MESSAGE_ID', 'EVENT_MESSAGE_ID');
        return $list;
    }
}
