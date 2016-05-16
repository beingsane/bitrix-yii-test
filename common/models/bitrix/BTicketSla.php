<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_sla".
 *
 * @property integer $ID
 * @property integer $PRIORITY
 * @property string $FIRST_SITE_ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property integer $RESPONSE_TIME
 * @property string $RESPONSE_TIME_UNIT
 * @property integer $NOTICE_TIME
 * @property string $NOTICE_TIME_UNIT
 * @property integer $RESPONSIBLE_USER_ID
 * @property string $DATE_CREATE
 * @property integer $CREATED_USER_ID
 * @property integer $CREATED_GUEST_ID
 * @property string $DATE_MODIFY
 * @property integer $MODIFIED_USER_ID
 * @property integer $MODIFIED_GUEST_ID
 * @property integer $TIMETABLE_ID
 * @property string $DEADLINE_SOURCE
 */
class BTicketSla extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_sla';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PRIORITY', 'RESPONSE_TIME', 'NOTICE_TIME', 'RESPONSIBLE_USER_ID', 'CREATED_USER_ID', 'CREATED_GUEST_ID', 'MODIFIED_USER_ID', 'MODIFIED_GUEST_ID', 'TIMETABLE_ID'], 'integer'],
            [['NAME'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['DATE_CREATE', 'DATE_MODIFY'], 'safe'],
            [['FIRST_SITE_ID'], 'string', 'max' => 5],
            [['NAME'], 'string', 'max' => 255],
            [['RESPONSE_TIME_UNIT', 'NOTICE_TIME_UNIT'], 'string', 'max' => 10],
            [['DEADLINE_SOURCE'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PRIORITY' => Yii::t('app', 'Priority'),
            'FIRST_SITE_ID' => Yii::t('app', 'First  Site '),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'RESPONSE_TIME' => Yii::t('app', 'Response  Time'),
            'RESPONSE_TIME_UNIT' => Yii::t('app', 'Response  Time  Unit'),
            'NOTICE_TIME' => Yii::t('app', 'Notice  Time'),
            'NOTICE_TIME_UNIT' => Yii::t('app', 'Notice  Time  Unit'),
            'RESPONSIBLE_USER_ID' => Yii::t('app', 'Responsible  User '),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_USER_ID' => Yii::t('app', 'Created  User '),
            'CREATED_GUEST_ID' => Yii::t('app', 'Created  Guest '),
            'DATE_MODIFY' => Yii::t('app', 'Date  Modify'),
            'MODIFIED_USER_ID' => Yii::t('app', 'Modified  User '),
            'MODIFIED_GUEST_ID' => Yii::t('app', 'Modified  Guest '),
            'TIMETABLE_ID' => Yii::t('app', 'Timetable '),
            'DEADLINE_SOURCE' => Yii::t('app', 'Deadline  Source'),
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
