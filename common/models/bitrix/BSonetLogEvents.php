<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_log_events".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $ENTITY_TYPE
 * @property integer $ENTITY_ID
 * @property string $ENTITY_CB
 * @property string $ENTITY_MY
 * @property string $EVENT_ID
 * @property string $SITE_ID
 * @property string $MAIL_EVENT
 * @property string $TRANSPORT
 * @property string $VISIBLE
 */
class BSonetLogEvents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_log_events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'ENTITY_ID', 'EVENT_ID'], 'required'],
            [['USER_ID', 'ENTITY_ID'], 'integer'],
            [['ENTITY_TYPE', 'EVENT_ID'], 'string', 'max' => 50],
            [['ENTITY_CB', 'ENTITY_MY', 'MAIL_EVENT', 'TRANSPORT', 'VISIBLE'], 'string', 'max' => 1],
            [['SITE_ID'], 'string', 'max' => 2],
            [['USER_ID', 'ENTITY_TYPE', 'ENTITY_ID', 'ENTITY_CB', 'ENTITY_MY', 'EVENT_ID', 'SITE_ID'], 'unique', 'targetAttribute' => ['USER_ID', 'ENTITY_TYPE', 'ENTITY_ID', 'ENTITY_CB', 'ENTITY_MY', 'EVENT_ID', 'SITE_ID'], 'message' => 'The combination of User , Entity  Type, Entity , Entity  Cb, Entity  My, Event  and Site  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_ID' => Yii::t('app', 'User '),
            'ENTITY_TYPE' => Yii::t('app', 'Entity  Type'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'ENTITY_CB' => Yii::t('app', 'Entity  Cb'),
            'ENTITY_MY' => Yii::t('app', 'Entity  My'),
            'EVENT_ID' => Yii::t('app', 'Event '),
            'SITE_ID' => Yii::t('app', 'Site '),
            'MAIL_EVENT' => Yii::t('app', 'Mail  Event'),
            'TRANSPORT' => Yii::t('app', 'Transport'),
            'VISIBLE' => Yii::t('app', 'Visible'),
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
