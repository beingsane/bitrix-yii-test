<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_calendar_event".
 *
 * @property integer $ID
 * @property integer $PARENT_ID
 * @property string $ACTIVE
 * @property string $DELETED
 * @property string $CAL_TYPE
 * @property integer $OWNER_ID
 * @property string $NAME
 * @property string $DATE_FROM
 * @property string $DATE_TO
 * @property string $TZ_FROM
 * @property string $TZ_TO
 * @property integer $TZ_OFFSET_FROM
 * @property integer $TZ_OFFSET_TO
 * @property integer $DATE_FROM_TS_UTC
 * @property integer $DATE_TO_TS_UTC
 * @property string $DT_SKIP_TIME
 * @property string $DT_LENGTH
 * @property string $EVENT_TYPE
 * @property integer $CREATED_BY
 * @property string $DATE_CREATE
 * @property string $TIMESTAMP_X
 * @property string $DESCRIPTION
 * @property string $DT_FROM
 * @property string $DT_TO
 * @property string $PRIVATE_EVENT
 * @property string $ACCESSIBILITY
 * @property string $IMPORTANCE
 * @property string $IS_MEETING
 * @property string $MEETING_STATUS
 * @property integer $MEETING_HOST
 * @property string $MEETING
 * @property string $LOCATION
 * @property string $REMIND
 * @property string $EXTERNAL_ID
 * @property string $COLOR
 * @property string $TEXT_COLOR
 * @property string $RRULE
 * @property string $EXRULE
 * @property string $RDATE
 * @property string $EXDATE
 * @property string $DAV_XML_ID
 * @property string $DAV_EXCH_LABEL
 * @property string $CAL_DAV_LABEL
 * @property string $VERSION
 * @property string $ATTENDEES_CODES
 */
class BCalendarEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_calendar_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PARENT_ID', 'OWNER_ID', 'TZ_OFFSET_FROM', 'TZ_OFFSET_TO', 'DATE_FROM_TS_UTC', 'DATE_TO_TS_UTC', 'DT_LENGTH', 'CREATED_BY', 'MEETING_HOST'], 'integer'],
            [['OWNER_ID', 'CREATED_BY'], 'required'],
            [['DATE_FROM', 'DATE_TO', 'DATE_CREATE', 'TIMESTAMP_X', 'DT_FROM', 'DT_TO'], 'safe'],
            [['DESCRIPTION', 'MEETING', 'RDATE', 'EXDATE'], 'string'],
            [['ACTIVE', 'DELETED', 'DT_SKIP_TIME', 'IS_MEETING', 'MEETING_STATUS'], 'string', 'max' => 1],
            [['CAL_TYPE'], 'string', 'max' => 100],
            [['NAME', 'LOCATION', 'REMIND', 'EXTERNAL_ID', 'RRULE', 'EXRULE', 'DAV_XML_ID', 'DAV_EXCH_LABEL', 'CAL_DAV_LABEL', 'VERSION', 'ATTENDEES_CODES'], 'string', 'max' => 255],
            [['TZ_FROM', 'TZ_TO', 'EVENT_TYPE'], 'string', 'max' => 50],
            [['PRIVATE_EVENT', 'ACCESSIBILITY', 'IMPORTANCE', 'COLOR', 'TEXT_COLOR'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PARENT_ID' => Yii::t('app', 'Parent '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'DELETED' => Yii::t('app', 'Deleted'),
            'CAL_TYPE' => Yii::t('app', 'Cal  Type'),
            'OWNER_ID' => Yii::t('app', 'Owner '),
            'NAME' => Yii::t('app', 'Name'),
            'DATE_FROM' => Yii::t('app', 'Date  From'),
            'DATE_TO' => Yii::t('app', 'Date  To'),
            'TZ_FROM' => Yii::t('app', 'Tz  From'),
            'TZ_TO' => Yii::t('app', 'Tz  To'),
            'TZ_OFFSET_FROM' => Yii::t('app', 'Tz  Offset  From'),
            'TZ_OFFSET_TO' => Yii::t('app', 'Tz  Offset  To'),
            'DATE_FROM_TS_UTC' => Yii::t('app', 'Date  From  Ts  Utc'),
            'DATE_TO_TS_UTC' => Yii::t('app', 'Date  To  Ts  Utc'),
            'DT_SKIP_TIME' => Yii::t('app', 'Dt  Skip  Time'),
            'DT_LENGTH' => Yii::t('app', 'Dt  Length'),
            'EVENT_TYPE' => Yii::t('app', 'Event  Type'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'DT_FROM' => Yii::t('app', 'Dt  From'),
            'DT_TO' => Yii::t('app', 'Dt  To'),
            'PRIVATE_EVENT' => Yii::t('app', 'Private  Event'),
            'ACCESSIBILITY' => Yii::t('app', 'Accessibility'),
            'IMPORTANCE' => Yii::t('app', 'Importance'),
            'IS_MEETING' => Yii::t('app', 'Is  Meeting'),
            'MEETING_STATUS' => Yii::t('app', 'Meeting  Status'),
            'MEETING_HOST' => Yii::t('app', 'Meeting  Host'),
            'MEETING' => Yii::t('app', 'Meeting'),
            'LOCATION' => Yii::t('app', 'Location'),
            'REMIND' => Yii::t('app', 'Remind'),
            'EXTERNAL_ID' => Yii::t('app', 'External '),
            'COLOR' => Yii::t('app', 'Color'),
            'TEXT_COLOR' => Yii::t('app', 'Text  Color'),
            'RRULE' => Yii::t('app', 'Rrule'),
            'EXRULE' => Yii::t('app', 'Exrule'),
            'RDATE' => Yii::t('app', 'Rdate'),
            'EXDATE' => Yii::t('app', 'Exdate'),
            'DAV_XML_ID' => Yii::t('app', 'Dav  Xml '),
            'DAV_EXCH_LABEL' => Yii::t('app', 'Dav  Exch  Label'),
            'CAL_DAV_LABEL' => Yii::t('app', 'Cal  Dav  Label'),
            'VERSION' => Yii::t('app', 'Version'),
            'ATTENDEES_CODES' => Yii::t('app', 'Attendees  Codes'),
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
