<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_log_comment".
 *
 * @property integer $ID
 * @property integer $LOG_ID
 * @property string $ENTITY_TYPE
 * @property integer $ENTITY_ID
 * @property string $EVENT_ID
 * @property integer $USER_ID
 * @property string $LOG_DATE
 * @property string $MESSAGE
 * @property string $TEXT_MESSAGE
 * @property string $MODULE_ID
 * @property integer $SOURCE_ID
 * @property string $URL
 * @property string $RATING_TYPE_ID
 * @property integer $RATING_ENTITY_ID
 */
class BSonetLogComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_log_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOG_ID', 'ENTITY_ID', 'EVENT_ID', 'LOG_DATE'], 'required'],
            [['LOG_ID', 'ENTITY_ID', 'USER_ID', 'SOURCE_ID', 'RATING_ENTITY_ID'], 'integer'],
            [['LOG_DATE'], 'safe'],
            [['MESSAGE', 'TEXT_MESSAGE'], 'string'],
            [['ENTITY_TYPE', 'EVENT_ID', 'MODULE_ID', 'RATING_TYPE_ID'], 'string', 'max' => 50],
            [['URL'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'LOG_ID' => Yii::t('app', 'Log '),
            'ENTITY_TYPE' => Yii::t('app', 'Entity  Type'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'EVENT_ID' => Yii::t('app', 'Event '),
            'USER_ID' => Yii::t('app', 'User '),
            'LOG_DATE' => Yii::t('app', 'Log  Date'),
            'MESSAGE' => Yii::t('app', 'Message'),
            'TEXT_MESSAGE' => Yii::t('app', 'Text  Message'),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'SOURCE_ID' => Yii::t('app', 'Source '),
            'URL' => Yii::t('app', 'Url'),
            'RATING_TYPE_ID' => Yii::t('app', 'Rating  Type '),
            'RATING_ENTITY_ID' => Yii::t('app', 'Rating  Entity '),
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
