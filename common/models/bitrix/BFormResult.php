<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_form_result".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $DATE_CREATE
 * @property integer $STATUS_ID
 * @property integer $FORM_ID
 * @property integer $USER_ID
 * @property string $USER_AUTH
 * @property integer $STAT_GUEST_ID
 * @property integer $STAT_SESSION_ID
 * @property string $SENT_TO_CRM
 */
class BFormResult extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_form_result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'DATE_CREATE'], 'safe'],
            [['STATUS_ID', 'FORM_ID', 'USER_ID', 'STAT_GUEST_ID', 'STAT_SESSION_ID'], 'integer'],
            [['USER_AUTH', 'SENT_TO_CRM'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'STATUS_ID' => Yii::t('app', 'Status '),
            'FORM_ID' => Yii::t('app', 'Form '),
            'USER_ID' => Yii::t('app', 'User '),
            'USER_AUTH' => Yii::t('app', 'User  Auth'),
            'STAT_GUEST_ID' => Yii::t('app', 'Stat  Guest '),
            'STAT_SESSION_ID' => Yii::t('app', 'Stat  Session '),
            'SENT_TO_CRM' => Yii::t('app', 'Sent  To  Crm'),
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
