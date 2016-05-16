<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_calendar_event_sect".
 *
 * @property integer $EVENT_ID
 * @property integer $SECT_ID
 * @property string $REL
 */
class BCalendarEventSect extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_calendar_event_sect';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EVENT_ID', 'SECT_ID'], 'required'],
            [['EVENT_ID', 'SECT_ID'], 'integer'],
            [['REL'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'EVENT_ID' => Yii::t('app', 'Event '),
            'SECT_ID' => Yii::t('app', 'Sect '),
            'REL' => Yii::t('app', 'Rel'),
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
