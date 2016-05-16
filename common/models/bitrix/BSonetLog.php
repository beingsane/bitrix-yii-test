<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_log".
 *
 * @property integer $ID
 * @property string $ENTITY_TYPE
 * @property integer $ENTITY_ID
 * @property string $EVENT_ID
 * @property integer $USER_ID
 * @property string $LOG_DATE
 * @property string $SITE_ID
 * @property string $TITLE_TEMPLATE
 * @property string $TITLE
 * @property string $MESSAGE
 * @property string $TEXT_MESSAGE
 * @property string $URL
 * @property string $MODULE_ID
 * @property string $CALLBACK_FUNC
 * @property string $EXTERNAL_ID
 * @property string $PARAMS
 * @property integer $TMP_ID
 * @property integer $SOURCE_ID
 * @property string $LOG_UPDATE
 * @property integer $COMMENTS_COUNT
 * @property string $ENABLE_COMMENTS
 * @property string $RATING_TYPE_ID
 * @property integer $RATING_ENTITY_ID
 * @property string $SOURCE_TYPE
 */
class BSonetLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ENTITY_ID', 'EVENT_ID', 'LOG_DATE', 'TITLE', 'LOG_UPDATE'], 'required'],
            [['ENTITY_ID', 'USER_ID', 'TMP_ID', 'SOURCE_ID', 'COMMENTS_COUNT', 'RATING_ENTITY_ID'], 'integer'],
            [['LOG_DATE', 'LOG_UPDATE'], 'safe'],
            [['MESSAGE', 'TEXT_MESSAGE', 'PARAMS'], 'string'],
            [['ENTITY_TYPE', 'EVENT_ID', 'MODULE_ID', 'RATING_TYPE_ID', 'SOURCE_TYPE'], 'string', 'max' => 50],
            [['SITE_ID'], 'string', 'max' => 2],
            [['TITLE_TEMPLATE', 'TITLE', 'CALLBACK_FUNC', 'EXTERNAL_ID'], 'string', 'max' => 250],
            [['URL'], 'string', 'max' => 500],
            [['ENABLE_COMMENTS'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ENTITY_TYPE' => Yii::t('app', 'Entity  Type'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'EVENT_ID' => Yii::t('app', 'Event '),
            'USER_ID' => Yii::t('app', 'User '),
            'LOG_DATE' => Yii::t('app', 'Log  Date'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'TITLE_TEMPLATE' => Yii::t('app', 'Title  Template'),
            'TITLE' => Yii::t('app', 'Title'),
            'MESSAGE' => Yii::t('app', 'Message'),
            'TEXT_MESSAGE' => Yii::t('app', 'Text  Message'),
            'URL' => Yii::t('app', 'Url'),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'CALLBACK_FUNC' => Yii::t('app', 'Callback  Func'),
            'EXTERNAL_ID' => Yii::t('app', 'External '),
            'PARAMS' => Yii::t('app', 'Params'),
            'TMP_ID' => Yii::t('app', 'Tmp '),
            'SOURCE_ID' => Yii::t('app', 'Source '),
            'LOG_UPDATE' => Yii::t('app', 'Log  Update'),
            'COMMENTS_COUNT' => Yii::t('app', 'Comments  Count'),
            'ENABLE_COMMENTS' => Yii::t('app', 'Enable  Comments'),
            'RATING_TYPE_ID' => Yii::t('app', 'Rating  Type '),
            'RATING_ENTITY_ID' => Yii::t('app', 'Rating  Entity '),
            'SOURCE_TYPE' => Yii::t('app', 'Source  Type'),
        ];
    }

    public function getName()
    {
        return $this->TITLE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'TITLE');
        return $list;
    }
}
