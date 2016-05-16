<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_event_log".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $SEVERITY
 * @property string $AUDIT_TYPE_ID
 * @property string $MODULE_ID
 * @property string $ITEM_ID
 * @property string $REMOTE_ADDR
 * @property string $USER_AGENT
 * @property string $REQUEST_URI
 * @property string $SITE_ID
 * @property integer $USER_ID
 * @property integer $GUEST_ID
 * @property string $DESCRIPTION
 */
class BEventLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_event_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'SEVERITY', 'AUDIT_TYPE_ID', 'MODULE_ID', 'ITEM_ID'], 'required'],
            [['TIMESTAMP_X'], 'safe'],
            [['USER_AGENT', 'REQUEST_URI', 'DESCRIPTION'], 'string'],
            [['USER_ID', 'GUEST_ID'], 'integer'],
            [['SEVERITY', 'AUDIT_TYPE_ID', 'MODULE_ID'], 'string', 'max' => 50],
            [['ITEM_ID'], 'string', 'max' => 255],
            [['REMOTE_ADDR'], 'string', 'max' => 40],
            [['SITE_ID'], 'string', 'max' => 2]
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
            'SEVERITY' => Yii::t('app', 'Severity'),
            'AUDIT_TYPE_ID' => Yii::t('app', 'Audit  Type '),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'ITEM_ID' => Yii::t('app', 'Item '),
            'REMOTE_ADDR' => Yii::t('app', 'Remote  Addr'),
            'USER_AGENT' => Yii::t('app', 'User  Agent'),
            'REQUEST_URI' => Yii::t('app', 'Request  Uri'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'USER_ID' => Yii::t('app', 'User '),
            'GUEST_ID' => Yii::t('app', 'Guest '),
            'DESCRIPTION' => Yii::t('app', 'Description'),
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
