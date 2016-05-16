<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_calendar_attendees".
 *
 * @property integer $EVENT_ID
 * @property string $USER_KEY
 * @property integer $USER_ID
 * @property string $USER_EMAIL
 * @property string $USER_NAME
 * @property string $STATUS
 * @property string $DESCRIPTION
 * @property string $ACCESSIBILITY
 * @property string $REMIND
 * @property integer $SECT_ID
 * @property string $COLOR
 * @property string $TEXT_COLOR
 */
class BCalendarAttendees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_calendar_attendees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EVENT_ID', 'USER_KEY'], 'required'],
            [['EVENT_ID', 'USER_ID', 'SECT_ID'], 'integer'],
            [['USER_KEY', 'USER_EMAIL', 'USER_NAME', 'DESCRIPTION', 'REMIND'], 'string', 'max' => 255],
            [['STATUS', 'ACCESSIBILITY', 'COLOR', 'TEXT_COLOR'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'EVENT_ID' => Yii::t('app', 'Event '),
            'USER_KEY' => Yii::t('app', 'User  Key'),
            'USER_ID' => Yii::t('app', 'User '),
            'USER_EMAIL' => Yii::t('app', 'User  Email'),
            'USER_NAME' => Yii::t('app', 'User  Name'),
            'STATUS' => Yii::t('app', 'Status'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'ACCESSIBILITY' => Yii::t('app', 'Accessibility'),
            'REMIND' => Yii::t('app', 'Remind'),
            'SECT_ID' => Yii::t('app', 'Sect '),
            'COLOR' => Yii::t('app', 'Color'),
            'TEXT_COLOR' => Yii::t('app', 'Text  Color'),
        ];
    }

    public function getName()
    {
        return $this->EVENT_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'EVENT_ID', 'EVENT_ID');
        return $list;
    }
}
