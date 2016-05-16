<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_pull_push_queue".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $TAG
 * @property string $SUB_TAG
 * @property string $MESSAGE
 * @property string $PARAMS
 * @property string $ADVANCED_PARAMS
 * @property integer $BADGE
 * @property string $DATE_CREATE
 * @property string $APP_ID
 */
class BPullPushQueue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_pull_push_queue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID'], 'required'],
            [['USER_ID', 'BADGE'], 'integer'],
            [['MESSAGE', 'PARAMS', 'ADVANCED_PARAMS'], 'string'],
            [['DATE_CREATE'], 'safe'],
            [['TAG', 'SUB_TAG'], 'string', 'max' => 255],
            [['APP_ID'], 'string', 'max' => 50]
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
            'TAG' => Yii::t('app', 'Tag'),
            'SUB_TAG' => Yii::t('app', 'Sub  Tag'),
            'MESSAGE' => Yii::t('app', 'Message'),
            'PARAMS' => Yii::t('app', 'Params'),
            'ADVANCED_PARAMS' => Yii::t('app', 'Advanced  Params'),
            'BADGE' => Yii::t('app', 'Badge'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'APP_ID' => Yii::t('app', 'App '),
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
