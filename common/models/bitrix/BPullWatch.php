<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_pull_watch".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $CHANNEL_ID
 * @property string $TAG
 * @property string $DATE_CREATE
 */
class BPullWatch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_pull_watch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'CHANNEL_ID', 'TAG', 'DATE_CREATE'], 'required'],
            [['USER_ID'], 'integer'],
            [['DATE_CREATE'], 'safe'],
            [['CHANNEL_ID'], 'string', 'max' => 50],
            [['TAG'], 'string', 'max' => 255]
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
            'CHANNEL_ID' => Yii::t('app', 'Channel '),
            'TAG' => Yii::t('app', 'Tag'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
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
