<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_event_message_site".
 *
 * @property integer $EVENT_MESSAGE_ID
 * @property string $SITE_ID
 */
class BEventMessageSite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_event_message_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EVENT_MESSAGE_ID', 'SITE_ID'], 'required'],
            [['EVENT_MESSAGE_ID'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'EVENT_MESSAGE_ID' => Yii::t('app', 'Event  Message '),
            'SITE_ID' => Yii::t('app', 'Site '),
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
