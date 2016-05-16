<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_pull_channel".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $CHANNEL_TYPE
 * @property string $CHANNEL_ID
 * @property integer $LAST_ID
 * @property string $DATE_CREATE
 */
class BPullChannel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_pull_channel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'CHANNEL_ID', 'DATE_CREATE'], 'required'],
            [['USER_ID', 'LAST_ID'], 'integer'],
            [['DATE_CREATE'], 'safe'],
            [['CHANNEL_TYPE', 'CHANNEL_ID'], 'string', 'max' => 50],
            [['USER_ID', 'CHANNEL_TYPE'], 'unique', 'targetAttribute' => ['USER_ID', 'CHANNEL_TYPE'], 'message' => 'The combination of User  and Channel  Type has already been taken.']
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
            'CHANNEL_TYPE' => Yii::t('app', 'Channel  Type'),
            'CHANNEL_ID' => Yii::t('app', 'Channel '),
            'LAST_ID' => Yii::t('app', 'Last '),
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
